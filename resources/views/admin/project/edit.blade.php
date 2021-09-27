@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Edit Project')." '{$project->title}'" }}</div>

        {!! Form::open(['route' => ['admin.project.update', $project->id], 'files' => true, 'id' => 'project-form']) !!}

        @method('PUT')

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
    {!! JsValidator::formRequest('App\Http\Requests\ProjectUpdateRequest', '#project-form') !!}
@endpush
