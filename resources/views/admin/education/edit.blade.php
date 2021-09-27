@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Edit Education')." '{$education->title}'" }}</div>

        {!! Form::open(['route' => ['admin.education.update', $education->id], 'id' => 'education-form']) !!}

        @method('PUT')

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
    {!! JsValidator::formRequest('App\Http\Requests\EducationUpdateRequest', '#education-form') !!}
@endpush
