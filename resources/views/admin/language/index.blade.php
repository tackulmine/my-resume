@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header text-uppercase">{{ __('Languages') }}</div>

        <div class="card-body">
            <p><a href="{{ route('admin.language.create') }}">Create new</a></p>

            @include('shared.status')

            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($languages as $item)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->value }}</td>
                            <td>
                                <a href="{{ route('admin.language.edit', $item->id) }}">Edit</a> |
                                <a href="#!"
                                    onclick="if(confirm('Yakin menghapus data ini?')) { event.preventDefault();
                                    document.getElementById('delete-form-{!! $item->id !!}').submit(); };"
                                    >Delete</a>
                                {!! Form::open([
                                    'route' => ['admin.language.destroy', $item->id],
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

            {{ $languages->links() }}
        </div>
    </div>
@endsection
