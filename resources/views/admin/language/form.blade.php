<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        {!! Form::text('title', $language->title, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="value" class="col-sm-2 col-form-label">Value</label>
    <div class="col-sm-10">
        {!! Form::text('value', $language->value, ['class' => 'form-control']) !!}
    </div>
</div>
