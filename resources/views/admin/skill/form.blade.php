<div class="form-group row">
    <label for="skill_type_id" class="col-sm-2 col-form-label">Skill Type</label>
    <div class="col-sm-10">
        {!! Form::select('skill_type_id', $skillTypeOptions, optional($skill->skillType)->title, ['class' => 'form-control', 'data-placeholder' => 'Select or create']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        {!! Form::text('title', $skill->title, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="percentage" class="col-sm-2 col-form-label">Percentage</label>
    <div class="col-sm-10">
        <div class="input-group">
            {!! Form::number('percentage', $skill->percentage, ['class' => 'form-control', 'min' => 0, 'step' => 5, 'max' => 100]) !!}
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="order_no" class="col-sm-2 col-form-label">Order no</label>
    <div class="col-sm-10">
        {!! Form::number('order_no', $skill->order_no, ['class' => 'form-control', 'min' => 0]) !!}
    </div>
</div>
