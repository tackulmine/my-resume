@if (!empty($user->userProfile) && !empty($user->userProfile->career_summary))
<section class="resume-section summary-section mb-5">
    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Career Summary</h2>
    <div class="resume-section-content">
        <p class="mb-0">{!! $user->userProfile->career_summary !!}</p>
    </div>
</section><!--//summary-section-->
@endif
