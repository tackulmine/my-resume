@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Create new Interest') }}</div>

        {!! Form::open(['route' => 'admin.interest.store', 'id' => 'interest-form']) !!}

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
    {!! JsValidator::formRequest('App\Http\Requests\InterestStoreRequest', '#interest-form') !!}
@endpush
