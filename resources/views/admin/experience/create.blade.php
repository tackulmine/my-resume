@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Create new Work Experience') }}</div>

        {!! Form::open(['route' => 'admin.experience.store', 'id' => 'experience-form']) !!}

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
    {!! JsValidator::formRequest('App\Http\Requests\ExperienceStoreRequest', '#experience-form') !!}
@endpush
