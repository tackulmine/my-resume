@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Edit Work Experience')." '{$experience->title}'" }}</div>

        {!! Form::open(['route' => ['admin.experience.update', $experience->id], 'id' => 'experience-form']) !!}

        @method('PUT')

        <div class="card-body">

            @include('shared.errors')
            @include('admin.experience.form')

        </div>

        @include('shared.form-buttons')

        {!! Form::close() !!}
    </div>
@endsection

@include('admin.experience.asset')
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\ExperienceUpdateRequest', '#experience-form') !!}
@endpush
