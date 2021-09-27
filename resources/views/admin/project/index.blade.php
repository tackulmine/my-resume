@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header text-uppercase">{{ __('Projects') }}</div>

        <div class="card-body">
            <p><a href="{{ route('admin.project.create') }}">Create new</a></p>

            @include('shared.status')

            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Photo</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $item)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ optional($item->projectType)->title }}</td>
                            <td><img
                                width="100"
                                src="{{ (!empty($item->photo)) ? \Illuminate\Support\Facades\Storage::disk('shared')->url($item->photo) : '//placeimg.com/200/200/tech' }}"
                                alt=""
                                onError="this.src='//placeimg.com/200/200/tech'"
                                ></td>
                            <td>{{ (!empty($item->start_date) && !empty($item->end_date))
                                ? $item->start_date->format('M Y').' - '.$item->end_date->format('M Y')
                                : (
                                    !empty($item->end_date)
                                    ? $item->start_date->format('M Y').' - present'
                                    : '-'
                                ) }}</td>
                            <td>
                                <a href="{{ route('admin.project.edit', $item->id) }}">Edit</a> |
                                <a href="#!"
                                    onclick="if(confirm('Yakin menghapus data ini?')) { event.preventDefault();
                                    document.getElementById('delete-form-{!! $item->id !!}').submit(); };"
                                    >Delete</a>
                                {!! Form::open([
                                    'route' => ['admin.project.destroy', $item->id],
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

            {{ $projects->links() }}
        </div>
    </div>
@endsection
