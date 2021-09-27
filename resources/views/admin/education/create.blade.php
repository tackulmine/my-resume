@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Create new Education') }}</div>

        {!! Form::open(['route' => 'admin.education.store', 'id' => 'education-form']) !!}

        <div class="card-body">

            @include('shared.errors')
            @include('admin.education.form')

        </div>

        @include('shared.form-buttons')

        {!! Form::close() !!}
    </div>
@endsection

@include('admin.education.asset')
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\EducationStoreRequest', '#education-form') !!}
@endpush
