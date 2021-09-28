@if (!$user->projects->isEmpty())
<section class="resume-section experience-section mb-5">
    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Projects</h2>
    <div class="resume-section-content">
        <div class="resume-timeline position-relative">
            @foreach ($user->projects as $project)
                <article class="resume-timeline-item position-relative {{ $loop->iteration < count($user->projects) ? 'pb-5' : '' }}">

                    <div class="resume-timeline-item-header mb-2">
                        <div class="d-flex flex-column flex-md-row">
                            <h3 class="resume-position-title font-weight-bold mb-1">{{ $project->title }}</h3>
                            <div class="resume-company-name ms-auto">{{ optional($project->projectType)->title }}</div>
                        </div><!--//row-->
                        @if (!empty($project->start_date))
                            <div class="resume-position-time">{{
                                (!empty($project->start_date) && !empty($project->end_date))
                                ? $project->start_date->format('M Y').' - '.$project->end_date->format('M Y')
                                : (
                                    (!empty($project->start_date) && empty($project->end_date))
                                    ? $project->start_date->format('M Y').' - Present'
                                    : '-'
                                ) }}
                            </div>
                        @endif
                    </div><!--//resume-timeline-item-header-->
                    <div class="resume-timeline-item-desc">
                        @if (!empty($project->photo))
                        <a href="{!! $project->url !!}" target="_blank">
                        @endif
                        @if (!empty($project->photo))
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('shared')->url($project->photo) }}"
                            alt="{{ $project->title }}"
                            width="200"
                            >
                        @endif
                        @if (!empty($project->photo))
                        </a>
                        @endif
                        {{-- {!! $project->summary !!} --}}
                       {{--  @if ($project->tags)
                            <h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
                            <ul class="list-inline">
                                @foreach ($project->tags->pluck('name')->sort() as $tagName)
                                    <li class="list-inline-item"><span class="badge rounded-pill bg-primary">{{ $tagName }}</span></li>
                                @endforeach
                            </ul>
                        @endif --}}
                    </div><!--//resume-timeline-item-desc-->
                </article><!--//resume-timeline-item-->
            @endforeach
        </div><!--//resume-timeline-->

    </div>
</section><!--//experience-section-->
@endif
