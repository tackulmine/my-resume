<div class="form-group row">
    <label for="project_type_id" class="col-sm-2 col-form-label">Project Type</label>
    <div class="col-sm-10">
        {!! Form::select('project_type_id', $projectTypeOptions, optional($project->projectType)->title, ['class' => 'form-control', 'data-placeholder' => 'Select or create']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        {!! Form::text('title', $project->title, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">URL</label>
    <div class="col-sm-10">
        {!! Form::text('url', $project->url, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="gpa" class="col-sm-2 col-form-label">Date</label>
    <div class="col-sm-10">
        <div class="input-group">
            {!! Form::date('start_date', $project->start_date, ['class' => 'form-control']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text">-</span>
            </div>
            {!! Form::date('end_date', $project->end_date, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Summary</label>
    <div class="col-sm-10">
        {!! Form::textarea('description', $project->description, ['class' => 'form-control', 'rows' => 5]) !!}
    </div>
</div>
<div class="form-group row">
    <label for="photo" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-10">
        <p><img
            width="100"
            src="{{ (!empty($project->photo)) ? Storage::disk('shared')->url($project->photo) : dummyImage(300, 200, '?random='.($project->id ?? 0)) }}"
            alt=""
            onError="this.src='{{ dummyImage(300, 200, '?random='.($project->id ?? 0)) }}'"
            ></p>
        {!! Form::file('photo', ['class' => 'form-control']) !!}
    </div>
</div>
