<header class="resume-header pt-4 pt-md-0">
    <div class="row">
        <div class="col-block col-md-auto resume-picture-holder text-center text-md-start">
            <img class="picture" src="{{ \Illuminate\Support\Facades\Storage::disk('shared')->url(optional($user->userProfile)->photo) }}" alt="{{ $user->name }}" onerror="this.src='/assets/images/profile.jpg';">
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
                    <ul class="resume-social list-unstyled">
                        <li class="mb-3"><a class="text-link" href="//linkedin.com/in/meftahul-jannah"><span class="fa-container text-center me-2"><i class="fab fa-linkedin-in fa-fw"></i></span>linkedin.com/in/meftahul-jannah</a></li>
                        <li class="mb-3"><a class="text-link" href="//github.com/tackulmine"><span class="fa-container text-center me-2"><i class="fab fa-github-alt fa-fw"></i></span>github.com/tackulmine</a></li>
                        <li class="mb-3"><a class="text-link" href="//codepen.io/tackulmine"><span class="fa-container text-center me-2"><i class="fab fa-codepen fa-fw"></i></span>codepen.io/tackulmine</a></li>
                        <li><a class="text-link" href="#!"><span class="fa-container text-center me-2"><i class="fas fa-globe"></i></span>meftahul.com</a></li>
                    </ul>
                </div><!--//secondary-info-->
            </div><!--//row-->

        </div><!--//col-->
    </div><!--//row-->
</header>
