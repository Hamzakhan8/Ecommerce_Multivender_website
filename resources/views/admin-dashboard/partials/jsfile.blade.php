
     <!-- JavaScript files-->
    <script src="{{url('adm-assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('adm-assets/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{url('adm-assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('adm-assets/js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
    <script src="{{url('adm-assets/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{url('adm-assets/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('adm-assets/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{url('adm-assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{url('adm-assets/js/charts-home.js')}}"></script>
    <!-- Main File-->
    <script src="{{url('adm-assets/js/front.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );


        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
        });
        }, 4000);
    </script>
