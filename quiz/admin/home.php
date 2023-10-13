<?php include 'header.php';?>
<?php
if (isset($_SESSION['cnic'])) {
	$cnic = $_SESSION['cnic'];
}
?>

<!-- Content Wrapper. Contains page content -->

  	<div class="content-wrapper" style="background-color: white;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div style="margin-top: 100px;">
      		<img src="images/picture2.png" height="300" width="550">
      	</div>
      </section>
    </div>

    <!--------------------------
      | Your Page Content Here |
      -------------------------->
  

<!-- /.content-wrapper -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- REQUIRED JS SCRIPTS -->


<?php include 'footer.php';?>