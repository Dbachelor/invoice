<footer class="footer">
    © {{ date('Y') }} Powered By <span class='text-danger'>S</span>nap<span class='text-danger'>N</span>et <small class="float-right">version 2.0</small>
   <!-- <span class="d-none d-sm-inline-block" style='display:none'> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
-->
</footer>
<script>
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );

$("#inv").modal({
  fadeDuration: 1000,
  fadeDelay: 0.50
});
</script>
<!-- End Footer -->
<script src="{{ url('https://code.jquery.com/jquery-3.5.1.js')}}"></script>
<script src="{{ url('https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')}}"></script>
  <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js')}}"></script>
    <script src="{{ url('https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js')}}"></script>
<!-- jQuery  -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/waves.min.js') }}"></script>

<!--Morris Chart-->
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>

<script src="{{ asset('pages__/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>


<!-- Resources -->
<script src="{{ url('https://cdn.amcharts.com/lib/4/core.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/4/charts.js') }}"></script>
<script src="{{ url('https://cdn.amcharts.com/lib/4/themes/animated.js') }}"></script>


<!-- Chart code -->



</body>

</html>