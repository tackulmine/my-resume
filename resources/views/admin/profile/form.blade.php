<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="job_title" class="col-sm-2 col-form-label">Job Title</label>
    <div class="col-sm-10">
        {!! Form::text('job_title', optional($user->userProfile)->job_title, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
        {!! Form::text('phone', optional($user->userProfile)->phone, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="career_summary" class="col-sm-2 col-form-label">Career Summary</label>
    <div class="col-sm-10">
        {!! Form::textarea('career_summary', optional($user->userProfile)->career_summary, ['class' => 'form-control', 'rows' => 10]) !!}
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="password_confirmation" class="col-sm-2 col-form-label">Password Confirmation</label>
    <div class="col-sm-10">
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="photo" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-10">
        <p><img
            width="100"
            src="{{ (!empty($user->userProfile) && !empty($user->userProfile->photo)) ? \Illuminate\Support\Facades\Storage::disk('shared')->url(optional($user->userProfile)->photo) : '//placeimg.com/200/300/people' }}"
            alt=""
            onError="this.src='//placeimg.com/200/300/people'"
            ></p>
        {!! Form::file('photo', ['class' => 'form-control']) !!}
    </div>
</div>
