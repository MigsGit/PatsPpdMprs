<!-- jQuery -->
<script src="{{ asset('public/template/jquery/js/jquery.min.js') }}"></script>

<!-- Bootstrap 5 -->
<script src="{{ asset('public/template/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/template/bootstrap/js/popper.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('public/template/adminlte/js/adminlte.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('public/template/datatables/js/datatables.min.js') }}"></script>
{{-- <script src="{{ asset('/template/datatables/js/dataTables.bootstrap5.min.js') }}"></script> --}}

<!-- Select2 -->
<script src="{{ asset('public/template/select2/js/select2.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('public/template/toastr/js/toastr.min.js') }}"></script>


<!-- Custom JS -->
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "iconClass":  "toast-custom"
    };
</script>

<script src="{{ asset('public/js/main/User.js?n=1') }}" defer></script>
<script src="{{ asset('public/js/main/Machine.js?n=1') }}" defer></script>
<script src="{{ asset('public/js/main/MachineParameter.js?n=3') }}" defer></script>
<script src="{{ asset('public/js/main/Common.js') }}" defer></script>
