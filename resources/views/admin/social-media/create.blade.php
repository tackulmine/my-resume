@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Create new Social Media') }}</div>

        {!! Form::open(['route' => 'admin.social-media.store', 'id' => 'social-media-form']) !!}

        <div class="card-body">

            @include('shared.errors')
            @include('admin.social-media.form')

        </div>

        @include('shared.form-buttons')

        {!! Form::close() !!}
    </div>
@endsection

@include('admin.social-media.asset')
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\SocialMediaStoreRequest', '#social-media-form') !!}
@endpush
