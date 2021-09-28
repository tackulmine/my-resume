@if (!$user->interests->isEmpty())
<section class="resume-section interests-section mb-5">
    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Interests</h2>
    <div class="resume-section-content">
        <ul class="list-unstyled">
            @foreach ($user->interests as $interest)
            <li class="mb-1">{{ $interest->title }}</li>
            @endforeach
        </ul>
    </div>
</section><!--//interests-section-->
@endif
