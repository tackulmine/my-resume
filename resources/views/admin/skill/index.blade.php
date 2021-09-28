@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header text-uppercase">{{ __('Skills') }}</div>

        <div class="card-body">
            <p><a href="{{ route('admin.skill.create') }}">Create new</a></p>

            @include('shared.status')

            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Percentage</th>
                        <th>Order No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skills as $item)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{{ optional($item->skillType)->title }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->percentage }}</td>
                            <td>{{ $item->order_no }}</td>
                            <td>
                                <a href="{{ route('admin.skill.edit', $item->id) }}">Edit</a> |
                                <a href="#!"
                                    onclick="if(confirm('Yakin menghapus data ini?')) { event.preventDefault();
                                    document.getElementById('delete-form-{!! $item->id !!}').submit(); };"
                                    >Delete</a>
                                {!! Form::open([
                                    'route' => ['admin.skill.destroy', $item->id],
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

            {{ $skills->links() }}
        </div>
    </div>
@endsection
