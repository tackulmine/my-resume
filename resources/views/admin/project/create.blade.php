@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Create new Project') }}</div>

        {!! Form::open(['route' => 'admin.project.store', 'files' => true, 'id' => 'project-form']) !!}

        <div class="card-body">

            @include('shared.errors')
            @include('admin.project.form')

        </div>

        @include('shared.form-buttons')

        {!! Form::close() !!}
    </div>
@endsection

@include('admin.project.asset')
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\ProjectStoreRequest', '#project-form') !!}
@endpush
