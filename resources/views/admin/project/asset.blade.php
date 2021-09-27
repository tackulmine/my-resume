@push('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endpush
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
    $(function() {
        $('select').select2({
            theme: 'bootstrap4',
            tags: true,
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
            closeOnSelect: !$(this).attr('multiple')
        });
    });
    </script>
    <script src="https://cdn.tiny.cloud/1/l0pvvgqrdsn5vgso9k8t8xnz0197h9khnyad9kphjt3i7fam/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
            ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic | bullist numlist outdent indent | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'removeformat | help',
    });
    </script>
    <!-- Laravel Javascript Validation -->
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
@endpush
