@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header text-uppercase">{{ __('Educations') }}</div>

        <div class="card-body">
            <p><a href="{{ route('admin.education.create') }}">Create new</a></p>

            @include('shared.status')

            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Major</th>
                        <th>GPA</th>
                        <th>Date</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($educations as $item)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->major }}</td>
                            <td>{{ $item->gpa }}</td>
                            <td>{{ (!empty($item->start_date) && !empty($item->end_date))
                                ? $item->start_date->format('M Y').' - '.$item->end_date->format('M Y')
                                : (
                                    !empty($item->end_date)
                                    ? $item->start_date->format('M Y').' - present'
                                    : '-'
                                ) }}</td>
                            <td>{{ $item->city ?? '-' }}</td>
                            <td>{{ $item->province ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.education.edit', $item->id) }}">Edit</a> |
                                <a href="#!"
                                    onclick="if(confirm('Yakin menghapus data ini?')) { event.preventDefault();
                                    document.getElementById('delete-form-{!! $item->id !!}').submit(); };"
                                    >Delete</a>
                                {!! Form::open([
                                    'route' => ['admin.education.destroy', $item->id],
                                    'method' => 'delete',
                                    'id' => 'delete-form-'.$item->id,
                                    'style' => 'display: none;',
                                ]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="10">No data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $educations->links() }}
        </div>
    </div>
@endsection
