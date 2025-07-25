<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Patients</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Select2 CSS -->
<!-- jQuery -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    

{{-- {!! Html::style('admin/plugins/fontawesome-free/css/all.min.css') !!} --}}
<!-- Ionicons -->
    {{-- {!! Html::style('admin/css/ionicons/2.0.1/css/ionicons.min.css') !!} --}}
    <!-- Tempusdominus Bootstrap 4 -->
{{--    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">--}}
{{-- {!! Html::style('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!} --}}

<!-- iCheck -->
{{--    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">--}}
{{-- {!! Html::style('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!} --}}

<!-- JQVMap -->
{{--    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">--}}
{{-- {!! Html::style('admin/plugins/jqvmap/jqvmap.min.css') !!} --}}
<!-- Theme style -->
{{--    <link rel="stylesheet" href="dist/css/adminlte.min.css">--}}
{{-- {!! Html::style('admin/dist/css/adminlte.min.css') !!} --}}
<!-- overlayScrollbars -->
{{--    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">--}}
{{-- {!! Html::style('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!} --}}
<!-- Daterange picker -->
{{--    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">--}}
{{-- {!! Html::style('admin/plugins/daterangepicker/daterangepicker.css') !!} --}}
<!-- summernote -->
    {{--    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">--}}
    {{-- {!! Html::style('admin/plugins/summernote/summernote-bs4.min.css') !!} --}}
    {{-- {!! Html::style('admin/plugins/flatpickr/dist/flatpickr.min.css') !!} --}}

    <!-- fontawesome link -->
    <script src="https://kit.fontawesome.com/794cc97646.js" crossorigin="anonymous"></script>
    <script>
        Laravel = {
            'url': '{{url("")}}'
        }
    </script>
    {{-- {!! Html::style('admin/css/custom-admin.css') !!} --}}

@yield('style')

<!-- Bootstrap link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!-- Bootstrap link -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
{{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Include Highlight.js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/highlight.js@10.7.2/styles/default.min.css">
<script src="https://cdn.jsdelivr.net/npm/highlight.js@10.7.2/highlight.min.js"></script>

  
    

{{-- @include('admin.layouts.menubar') --}}
@yield('content')
{{-- @include('admin.layouts.footer') --}}


<!-- jQuery -->
{{--<script src="plugins/jquery/jquery.min.js"></script>--}}
{{-- {!! Html::script('admin/plugins/jquery/jquery.min.js') !!} --}}
<!-- jQuery UI 1.11.4 -->
{{--<script src="plugins/jquery-ui/jquery-ui.min.js"></script>--}}
{{-- {!! Html::script('admin/plugins/jquery-ui/jquery-ui.min.js') !!} --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
{{--<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{{-- {!! Html::script('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') !!} --}}
<!-- ChartJS -->
{{--<script src="plugins/chart.js/Chart.min.js"></script>--}}
{{-- {!! Html::script('admin/plugins/chart.js/Chart.min.js') !!} --}}
<!-- Sparkline -->
{{--<script src="plugins/sparklines/sparkline.js"></script>--}}
{{-- {!! Html::script('admin/plugins/sparklines/sparkline.js') !!} --}}
<!-- JQVMap -->
{{--<script src="plugins/jqvmap/jquery.vmap.min.js"></script>--}}
{{-- {!! Html::script('admin/plugins/jqvmap/jquery.vmap.min.js') !!} --}}
{{--<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>--}}
{{-- {!! Html::script('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') !!} --}}
<!-- jQuery Knob Chart -->
{{--<script src="plugins/jquery-knob/jquery.knob.min.js"></script>--}}
{{-- {!! Html::script('admin/plugins/jquery-knob/jquery.knob.min.js') !!} --}}
<!-- daterangepicker -->
{{--<script src="plugins/moment/moment.min.js"></script>--}}
{{-- {!! Html::script('admin/plugins/moment/moment.min.js') !!} --}}
{{--<script src="plugins/daterangepicker/daterangepicker.js"></script>--}}
{{-- {!! Html::script('admin/plugins/daterangepicker/daterangepicker.js') !!} --}}
<!-- Tempusdominus Bootstrap 4 -->
{{--<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>--}}
{{-- {!! Html::script('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!} --}}
<!-- Summernote -->
{{--<script src="plugins/summernote/summernote-bs4.min.js"></script>--}}
{{-- {!! Html::script('admin/plugins/summernote/summernote-bs4.min.js') !!} --}}
<!-- overlayScrollbars -->
{{--<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>--}}
{{-- {!! Html::script('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!} --}}
<!-- AdminLTE App -->
{{--<script src="dist/js/adminlte.js"></script>--}}
{{-- {!! Html::script('admin/dist/js/adminlte.js') !!} --}}
<!-- AdminLTE for demo purposes -->
{{--<script src="dist/js/demo.js"></script>--}}
{{-- {!! Html::script('admin/dist/js/demo.js') !!} --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="dist/js/services/dashboard.js"></script>--}}
{{-- {!! Html::script('admintheme/tinymce/tinymce.min.js') !!} --}}
{{-- {!! Html::script('admin/plugins/flatpickr/dist/flatpickr.js') !!} --}}
{{-- {!! Html::style('admin/css/custom-admin.css') !!} --}}

{{-- {!! Html::style('admin/confirm/jquery-confirm.min.css') !!} --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include jQuery-confirm plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Include CSS for jQuery-confirm (optional) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(".getDate").flatpickr({
        dateFormat: "Y-m-d"
    });

    $(".myDate").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });

    function successDisplay(title) {
        $.confirm({
            title: title,
            content: false,
            type: 'red',
            typeAnimated: true,
            buttons: {
                close: function () {
                }
            }
        });
    }

    //displaying error message
    function errorDisplay(title) {
        $.confirm({
            title: title,
            content: false,
            type: 'red',
            typeAnimated: true,
            buttons: {
                close: function () {
                }
            }
        });
    }
    function start_loader() {
        $('#loader').addClass('is-active');
    }

    //ending loader
    function end_loader() {
        $('#loader').removeClass('is-active');
    }



    function filterList() {
        debugger;

        var baseurl = window.location.origin+window.location.pathname;
        window.location = baseurl+'?'+$('#search').serialize();
    }

    function initTinymce() {
        tinymce.init({ selector:'.content',
            height: 500,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{url('')}}/uploadimage',
            // here we add custom filepicker only to Image dialog
            file_picker_types: 'image',
            file_browser_callback_types: 'file image media',

            // and here's our custom image picker
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                // Note: In modern browsers input[type="file"] is functional without
                // even adding it to the DOM, but that might not be the case in some older
                // or quirky browsers like IE, so you might want to add it to the DOM
                // just in case, and visually hide it. And do not forget do remove it
                // once you do not need it anymore.

                input.onchange = function() {
                    var file = this.files[0];

                    // Note: Now we need to register the blob in TinyMCEs image blob
                    // registry. In the next release this part hopefully won't be
                    // necessary, as we are looking to handle it internally.
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var blobInfo = blobCache.create(id, file);
                    blobCache.add(blobInfo);

                    // call the callback and populate the Title field with the file name
                    cb(blobInfo.blobUri(), { title: file.name });
                };

                input.click();
            },
            imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
            content_css: [
                {{--                    "{{url('admin/tinymce/')}}"+'/css/codepen.min.css'--}}
            ],
            link_assume_external_targets: true,
            relative_urls : false,
        });
    }

    
    // initTinymce();
</script>

@yield('script')
</body>
</html>
