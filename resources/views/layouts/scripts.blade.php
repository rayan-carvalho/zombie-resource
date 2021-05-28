<script src="{{ asset('js/app.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('layouts/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('layouts/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('layouts/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('layouts/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('layouts/admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('layouts/admin/dist/js/demo.js') }}"></script>

<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script type="text/javascript">
    function CPF(cpf) {
        if(cpf.value.length == 3)
            cpf.value = cpf.value + '.';
        if(cpf.value.length == 7)
            cpf.value = cpf.value + '.';
        if(cpf.value.length == 11)
            cpf.value = cpf.value + '-';
    }
    function CNPJ(cnpj) {
        if(cnpj.value.length == 2)
            cnpj.value = cnpj.value + '.';
        if(cnpj.value.length == 6)
            cnpj.value = cnpj.value + '.';
        if(cnpj.value.length == 10)
            cnpj.value = cnpj.value + '/';
        if(cnpj.value.length == 15)
            cnpj.value = cnpj.value + '-';
    }

    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

{{ $slot ?? '' }}
