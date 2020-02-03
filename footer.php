
  </div>  
  
  </div>

<!-- jQuery CDN - Slim version (=without AJAX) -->  
    <!-- JavaScript files-->
    
    <!-- <script src="js/addons/datatables.min.js" rel="stylesheet"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <link href="css/addons/datatables-select.min.css" rel="stylesheet">
    <script src="js/addons/datatables-select.min.js" rel="stylesheet"></script> 
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('#footer').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

            // TABEL
            $("#myTable").dataTable({
                "scrollX": true
            });
            $(".dataTables_length").addClass("bs-select");
        });
  </script>   
  </body>
</html>