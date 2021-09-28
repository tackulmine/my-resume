@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Edit Language')." '{$language->title}'" }}</div>

        {!! Form::open(['route' => ['admin.language.update', $language->id], 'id' => 'language-form']) !!}

        @method('PUT')

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
    {!! JsValidator::formRequest('App\Http\Requests\LanguageUpdateRequest', '#language-form') !!}
@endpush
