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
    <script src="https://cdn.tiny.cloud/1/l0pvvgqrdsn5vgso9k8t8xnz0197h9khnyad9kphjt3i7fam/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
        menubar: false,
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
    });
    </script>
@endpush
