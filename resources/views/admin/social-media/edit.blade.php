@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Edit Social Media')." '{$socialMedia->title}'" }}</div>

        {!! Form::open(['route' => ['admin.social-media.update', $socialMedia->id], 'id' => 'social-media-form']) !!}

        @method('PUT')

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
    {!! JsValidator::formRequest('App\Http\Requests\SocialMediaUpdateRequest', '#social-media-form') !!}
@endpush
