@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Create new Skill') }}</div>

        {!! Form::open(['route' => 'admin.skill.store', 'files' => true, 'id' => 'skill-form']) !!}

        <div class="card-body">

            @include('shared.errors')
            @include('admin.skill.form')

        </div>

        @include('shared.form-buttons')

        {!! Form::close() !!}
    </div>
@endsection

@include('admin.skill.asset')
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\SkillStoreRequest', '#skill-form') !!}
@endpush
