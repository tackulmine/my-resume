@extends('layouts.app')

@section('content')
    <article class="resume-wrapper text-center position-relative">
        <div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">

            @include('home.header')

            <div class="resume-body p-5">

                @include('home.summary')

                <div class="row">
                    <div class="col-lg-9">

                        @include('home.experiences')

                        @include('home.projects')

                    </div>
                    <div class="col-lg-3">

                        @include('home.skills')

                        @include('home.education')

                        {{-- @include('home.reference') --}}

                        @include('home.language')

                        @include('home.interests')

                    </div>
                </div><!--//row-->
            </div><!--//resume-body-->

        </div>
    </article>
@endsection
