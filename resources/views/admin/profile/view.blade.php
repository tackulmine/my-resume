@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header text-uppercase">{{ __('My Profile') }}</div>

        <div class="card-body">

            @include('shared.status')

            <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <div class="pt-2">
                        {{ $user->name }}
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <div class="pt-2">
                        {{ $user->email }}
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="job_title" class="col-sm-2 col-form-label">Job Title</label>
                <div class="col-sm-10">
                    <div class="pt-2">
                        {{ optional($user->userProfile)->job_title }}
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <div class="pt-2">
                        {{ optional($user->userProfile)->phone }}
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="career_summary" class="col-sm-2 col-form-label">Career Summary</label>
                <div class="col-sm-10">
                    <div class="pt-2">
                        {!! optional($user->userProfile)->career_summary !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <img
                        width="100"
                        src="{{ ($user->userProfile && $user->userProfile->photo) ? Storage::disk('shared')->url(optional($user->userProfile)->photo) : dummyAvatar($user->email) }}"
                        alt=""
                        onError="this.src='{{ dummyAvatar($user->email) }}'"
                        >
                </div>
            </div>

        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <a href="{!! route('admin.profile.edit') !!}" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
