@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header text-uppercase">{{ __('Edit My Profile') }}</div>

    {!! Form::open(['route' => 'admin.profile.update', 'id' => 'profile-form', 'files' => true]) !!}

    @method('PUT')

    <div class="card-body">

      @include('shared.errors')
      @include('admin.profile.form')

    </div>

    {{-- <div class="card-footer">
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <a href="{{ route('admin.profile.index') }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                </div>
            </div>
        </div> --}}
    @include('shared.form-buttons')

    {!! Form::close() !!}
  </div>
@endsection

@push('scripts')
  <script src="//cdn.tiny.cloud/1/8xcs375t3qs2p5bcnjvy4z0gjtnwvgdx4m5otyi820tl49t5/tinymce/5/tinymce.min.js"
    referrerpolicy="origin" crossorigin="anonymous"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      menubar: false,
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>
@endpush
