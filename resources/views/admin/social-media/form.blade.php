<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        {!! Form::text('title', $socialMedia->title, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">URL</label>
    <div class="col-sm-10">
        {!! Form::text('url', $socialMedia->url, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="fa_class" class="col-sm-2 col-form-label">FontAwesome Classes</label>
    <div class="col-sm-10">
        {!! Form::text('fa_class', $socialMedia->fa_class, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="order_no" class="col-sm-2 col-form-label">Order no</label>
    <div class="col-sm-10">
        {!! Form::number('order_no', $socialMedia->order_no, ['class' => 'form-control', 'min' => 0]) !!}
    </div>
</div>

