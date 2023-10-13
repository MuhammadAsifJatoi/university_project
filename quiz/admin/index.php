<?php
require_once 'includes/db_connection.php';
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Quiz</title>
  <link rel="shortcut icon" href="images/picture2.png" type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="bower_components/Font-Awesome-master/svg-with-js/css/fa-svg-with-js.min.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" type="text/css" href="style1.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo" style="background-">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SQ</b></span>
      <!-- logo for regular state and mobile devices -->
      <img src="dist/img/picture2.png" height="40" width="140" alt="User Image">
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <!-- <a href="user_signup.com">SignUp</a> -->
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div style="background-color:white;">
    <!-- Main content -->
   <section class="content container-fluid">
<?php
if (isset($_POST['submit'])) {
	$cnic = $_POST['cnic'];
	$password = $_POST['password'];
	$query = "SELECT * FROM user_signup WHERE cnic = $cnic  && password = '$password' ";
	$result = mysqli_query($connection, $query);
	$total = mysqli_num_rows($result);
	if ($total == 1) {

		$_SESSION['cnic'] = $cnic;
		echo "<script>window.location='home.php'</script>";
	} else {
		?>
            <div class="alert alert-dismissible alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <ul>
                <li><h4>Login Failed...</h4></li>
              </ul>

            </div>

            <?php
}

}

?>
      <center>
        <img src="images/picture2.png" height="65" width="210">
        <hr>
        <form method="POST">
          <table>
            <tr>
              <td></td>
              <td>
                <center>
                  <img src="images/picture.jpg" height="100" width="100">
                  <h6 style="color: blue"><b>LOGIN</b></h6>
                </center>
              </td>
            </tr>
            <tr>
              <td id="detail"><b>CNIC:</b></td>
              <td>
                <input type="number" name="cnic" id="input">
              </td>

            </tr>
            <tr>
              <td id="detail"><b>Password:</b></td>
              <td>
                <input type="password" name="password" id="input">
              </td>

            </tr>
            
            <tr class="mt-3">
              <td></td>
              <td>
                <center>
                  <button type="submit" name="submit" class="btn btn-success" id="button">Login</button>
                  <!-- <button class="btn btn-danger" id="button">Cancel</button> -->
                </center>
              </td>
            </tr>
          </table>
        </form>
      </center>
    </section>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="" style="background-color: #3C8DBC;height: 50px;margin-top: 100px;">
    <!-- To the right -->
   <center style="padding-top: 15px;">
      <strong style="color: white;">Copyright &copy; <?php echo date("Y"); ?> All rights reserved | Developed by<b style="font-size: 15px;"> Sadia</b></strong>
    </center>
  </footer>
</div>




<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>