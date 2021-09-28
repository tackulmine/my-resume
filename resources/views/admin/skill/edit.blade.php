@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Edit Skill')." '{$skill->title}'" }}</div>

        {!! Form::open(['route' => ['admin.skill.update', $skill->id], 'files' => true, 'id' => 'skill-form']) !!}

        @method('PUT')

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
    {!! JsValidator::formRequest('App\Http\Requests\SkillUpdateRequest', '#skill-form') !!}
@endpush
