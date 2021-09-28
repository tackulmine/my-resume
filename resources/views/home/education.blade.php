@if (!$user->education->isEmpty())
<section class="resume-section education-section mb-5">
    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Education</h2>
    <div class="resume-section-content">
        <ul class="list-unstyled">
            @foreach ($user->education as $education)
            <li class="mb-2">
                <div class="resume-degree"><strong>{{ $education->major }}</strong>{!! !empty($education->gpa) ? "<br><small>GPA: {$education->gpa}</small>" : '' !!}</div>
                <div class="resume-degree-org">{{ $education->title }}</div>
                <div class="resume-degree-time">{{
                    (!empty($education->start_date) && !empty($education->end_date))
                    ? $education->start_date->format('M Y').' - '.$education->end_date->format('M Y')
                    : (
                        !empty($education->end_date)
                        ? $education->start_date->format('M Y').' - present'
                        : '-'
                    ) }}
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section><!--//education-section-->
@endif
