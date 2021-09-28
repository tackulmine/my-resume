@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header text-uppercase">{{ __('Social Medias') }}</div>

        <div class="card-body">
            <p><a href="{{ route('admin.social-media.create') }}">Create new</a></p>

            @include('shared.status')

            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Font Icon</th>
                        <th>Order No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($socialMedias as $item)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! empty($item->url) ? $item->title : '<a href="'.$item->url.'">'.$item->title.'</a>' !!}</td>
                            <td>{!! !empty($item->url) ? '<i class="'.$item->fa_class.'"></i>' : '' !!}</td>
                            <td>{{ $item->order_no }}</td>
                            <td>
                                <a href="{{ route('admin.social-media.edit', $item->id) }}">Edit</a> |
                                <a href="#!"
                                    onclick="if(confirm('Yakin menghapus data ini?')) { event.preventDefault();
                                    document.getElementById('delete-form-{!! $item->id !!}').submit(); };"
                                    >Delete</a>
                                {!! Form::open([
                                    'route' => ['admin.social-media.destroy', $item->id],
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

            {{ $socialMedias->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/assets/fontawesome/js/all.min.js"></script>
@endpush
