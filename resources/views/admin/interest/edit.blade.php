@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Edit Interest')." '{$interest->title}'" }}</div>

        {!! Form::open(['route' => ['admin.interest.update', $interest->id], 'id' => 'interest-form']) !!}

        @method('PUT')

        <div class="card-body">

            @include('shared.errors')
            @include('admin.interest.form')

        </div>

        @include('shared.form-buttons')

        {!! Form::close() !!}
    </div>
@endsection

@include('admin.interest.asset')
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\InterestUpdateRequest', '#interest-form') !!}
@endpush
