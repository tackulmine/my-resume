<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        {!! Form::text('title', $education->title, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="major" class="col-sm-2 col-form-label">Major</label>
    <div class="col-sm-10">
        {!! Form::text('major', $education->major, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="gpa" class="col-sm-2 col-form-label">GPA</label>
    <div class="col-sm-10">
        {!! Form::text('gpa', $education->gpa, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="gpa" class="col-sm-2 col-form-label">Date</label>
    <div class="col-sm-10">
        <div class="input-group">
            {!! Form::date('start_date', $education->start_date, ['class' => 'form-control']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text">-</span>
            </div>
            {!! Form::date('end_date', $education->end_date, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="city" class="col-sm-2 col-form-label">City</label>
    <div class="col-sm-10">
        {!! Form::text('city', $education->city, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="province" class="col-sm-2 col-form-label">Province</label>
    <div class="col-sm-10">
        {!! Form::text('province', $education->province, ['class' => 'form-control']) !!}
    </div>
</div>
