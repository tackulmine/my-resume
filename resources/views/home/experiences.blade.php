@if (!empty($user->workExperiences))
<section class="resume-section experience-section mb-5">
    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Work Experience</h2>
    <div class="resume-section-content">
        <div class="resume-timeline position-relative">
            @foreach ($user->workExperiences as $workExperience)
                <article class="resume-timeline-item position-relative {{ $loop->iteration < count($user->workExperiences) ? 'pb-5' : '' }}">

                    <div class="resume-timeline-item-header mb-2">
                        <div class="d-flex flex-column flex-md-row">
                            <h3 class="resume-position-title font-weight-bold mb-1">{{ $workExperience->title }}</h3>
                            <div class="resume-company-name ms-auto">{{ $workExperience->company }}</div>
                        </div><!--//row-->
                        <div class="resume-position-time">{{
                            (!empty($workExperience->start_date) && !empty($workExperience->end_date))
                            ? $workExperience->start_date->format('M Y').' - '.$workExperience->end_date->format('M Y')
                            : (
                                (!empty($workExperience->start_date) && empty($workExperience->end_date))
                                ? $workExperience->start_date->format('M Y').' - Present'
                                : '-'
                            ) }}
                        </div>
                    </div><!--//resume-timeline-item-header-->
                    <div class="resume-timeline-item-desc">
                        {!! $workExperience->summary !!}
                        @if ($workExperience->tags)
                            <h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
                            <ul class="list-inline">
                                @foreach ($workExperience->tags->pluck('name')->sort() as $tagName)
                                    <li class="list-inline-item"><span class="badge rounded-pill bg-primary">{{ $tagName }}</span></li>
                                @endforeach
                            </ul>
                        @endif
                    </div><!--//resume-timeline-item-desc-->
                </article><!--//resume-timeline-item-->
            @endforeach
           {{--  <article class="resume-timeline-item position-relative">

                <div class="resume-timeline-item-header mb-2">
                    <div class="d-flex flex-column flex-md-row">
                        <h3 class="resume-position-title font-weight-bold mb-1">Web Developer <small class="text-muted">(Intern)</small></h3>
                        <div class="resume-company-name ms-auto">Amazon</div>
                    </div><!--//row-->
                    <div class="resume-position-time">2011 - 2012</div>
                </div><!--//resume-timeline-item-header-->
                <div class="resume-timeline-item-desc">
                    <p>Role description goes here ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum.</p>
                    <h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
                    <ul class="list-inline">
                        <li class="list-inline-item"><span class="badge bg-primary badge-pill">Ruby on Rails</span></li>
                        <li class="list-inline-item"><span class="badge bg-primary badge-pill">jQuery</span></li>
                        <li class="list-inline-item"><span class="badge bg-primary badge-pill">HTML/LESS</span></li>
                        <li class="list-inline-item"><span class="badge bg-primary badge-pill">MongoDB</span></li>
                    </ul>
                </div><!--//resume-timeline-item-desc-->
            </article><!--//resume-timeline-item--> --}}

        </div><!--//resume-timeline-->

    </div>
</section><!--//experience-section-->
@endif
