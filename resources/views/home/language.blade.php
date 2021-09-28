@if (!$user->languages->isEmpty())
<section class="resume-section language-section mb-5">
    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Language</h2>
    <div class="resume-section-content">
        <ul class="list-unstyled resume-lang-list">
            @foreach($user->languages as $language)
            <li class="mb-2"><span class="resume-lang-name font-weight-bold">{{ $language->title }}</span> {{ !empty($language->value) ? '<small class="text-muted font-weight-normal">('.$language->value.')</small>' : '' }})</li>
            @endforeach
        </ul>
    </div>
</section><!--//language-section-->
@endif
