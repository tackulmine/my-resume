<header class="resume-header pt-4 pt-md-0">
    <div class="row">
        <div class="col-block col-md-auto resume-picture-holder text-center text-md-start">
            <img class="picture" src="{{ Storage::disk('shared')->url(optional($user->userProfile)->photo) }}" alt="{{ $user->name }}" onerror="this.src='/assets/images/profile.jpg';">
        </div><!--//col-->
        <div class="col">
            <div class="row p-4 justify-content-center justify-content-md-between">
                <div class="primary-info col-auto">
                    <h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase">{{ $user->name }}</h1>
                    <div class="title mb-3">{{ optional($user->userProfile)->job_title  }}</div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a class="text-link" href="mailto:{{ $user->email  }}"><i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i>{{ $user->email  }}</a></li>
                        <li><a class="text-link" href="tel:{{ str_replace(' ', '', optional($user->userProfile)->phone)  }}"><i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i>{{ optional($user->userProfile)->phone  }}</a></li>
                    </ul>
                </div><!--//primary-info-->
                <div class="secondary-info col-auto mt-2">
                    @if(!$user->socialMedia->isEmpty())
                    <ul class="resume-social list-unstyled">
                        @foreach ($user->socialMedia as $socialMedia)
                            <li {!! $loop->iteration < count($user->socialMedia) ? 'class="mb-3"' : '' !!}>
                                <a class="text-link" href="{{ $socialMedia->url }}" target="_blank">
                                    <span class="fa-container text-center me-2">
                                    <i class="{{ $socialMedia->fa_class }}"></i></span>{{ $socialMedia->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div><!--//secondary-info-->
            </div><!--//row-->

        </div><!--//col-->
    </div><!--//row-->
</header>
