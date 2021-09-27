<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        {!! Form::text('title', $experience->title, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="company" class="col-sm-2 col-form-label">Company</label>
    <div class="col-sm-10">
        {!! Form::text('company', $experience->company, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="gpa" class="col-sm-2 col-form-label">Date</label>
    <div class="col-sm-10">
        <div class="input-group">
            {!! Form::date('start_date', $experience->start_date, ['class' => 'form-control']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text">-</span>
            </div>
            {!! Form::date('end_date', $experience->end_date, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="summary" class="col-sm-2 col-form-label">Summary</label>
    <div class="col-sm-10">
        {!! Form::textarea('summary', $experience->summary, ['class' => 'form-control', 'rows' => 15]) !!}
    </div>
</div>
<div class="form-group row">
    <label for="tags" class="col-sm-2 col-form-label">Technologies used:</label>
    <div class="col-sm-10">
        {!! Form::select('tags[]', $tagOptions, $experience->tags, ['class' => 'form-control', 'multiple' => 'true', 'data-placeholder' => 'Type new or choose anything', 'data-allow-clear' => 1]) !!}
    </div>
</div>
