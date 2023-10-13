<?php
require_once 'includes/db_connection.php';
session_start();
$user = $_SESSION['cnic'];

if ($user == true) {

} else {
	header('Location:index.php');
}

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
    <a href="home.php" class="logo" style="background-">
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

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <!-- <div class="pull-left image">
          <img src="dist/img/user.png" class="img-circle" alt="User Image">
        </div> -->
<?php
$query = "SELECT * FROM user_signup WHERE cnic = $user ";
$result = mysqli_query($connection, $query);
if (!$result) {
	echo "Query failed";
}
$data = mysqli_fetch_assoc($result);
?>
        <div style="color: white;padding-left: 10px; ">
          <h4><?php echo $data['name']; ?></h4>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#" id="menu"><i class="fa fa-link"></i> <span>ADMINISTRATION</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="add_user_category.php">User Roles</a></li> -->
            <li><a href="user_signup.php">User SignUp</a></li>
            <!-- <li><a href="change_password.php">Change Password</a></li> -->
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#" id="menu"><i class="fa fa-link"></i> <span>Add Quiz</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="subject.php"><i class="fa fa-link"></i> <span>Add Subject </span></a></li>
           <li><a href="add_topic.php"><i class="fa fa-link"></i> <span>Add Topic</span></a></li>
           <li><a href="add_quiz.php"><i class="fa fa-link"></i> <span>Add Simple Quiz </span></a></li>
           <li><a href="add_quiz_option.php"><i class="fa fa-link"></i> <span>Add Optional Quiz </span></a></li>
          </ul>
        </li>
        <!-- Optionally, you can add icons to the links -->
        
        <li class="treeview">
          <a href="#" id="menu"><i class="fa fa-link"></i> <span>LOGOUT</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="logout.php">Logout</a></li>

          </ul>
        </li>
        
    
        </li>

       <!--  <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="quiz/add_chapter.php">Add Chapter</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper" style="background-color:white;">
    <!-- Main content -->
    <section class="content container-fluid">