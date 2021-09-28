@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Create new Language') }}</div>

        {!! Form::open(['route' => 'admin.language.store', 'id' => 'language-form']) !!}

        <div class="card-body">

            @include('shared.errors')
            @include('admin.language.form')

        </div>

        @include('shared.form-buttons')

        {!! Form::close() !!}
    </div>
@endsection

@include('admin.language.asset')
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\LanguageStoreRequest', '#language-form') !!}
@endpush
