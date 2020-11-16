<?php 
  include_once '../controller/session_functions.php';
  landing_page_session_check();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PST Call Taxi</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">

  <link rel="stylesheet" href="../js/datatable/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../js/datatable/responsive.bootstrap.min.css">
  <script src="../js/jquery.min.js" ></script>
</head>
<body class="hold-transition sidebar-mini skin-blue-light">
<div class="wrapper">
  <!-- header -->
  <header class="main-header">
    <a href="index.php" class="logo">
      <span class="logo-mini"><b>PST</b>Call Taxi</span>
      <span class="logo-lg"><b>PST Call Taxi</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../img/profile.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Mohan</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="../img/profile.jpg" class="img-circle" alt="User Image">
                <p>
                  Mohan
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../controller/logout_controller.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- sidebar -->
 <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu">
          <li><a href="dashboard.php"><i class="fa fa-circle-o text-yellow"></i> <span>Dashboard</span></a></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-circle-o text-purple"></i>
              <span>Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="customers.php"><i class="fa fa-circle-o text-yellow"></i> <span>Customers</span></a></li>
              <li><a href="vehicles.php"><i class="fa fa-circle-o text-purple"></i> <span>Vehicles</span></a></li>
              <li><a href="drivers.php"><i class="fa fa-circle-o text-yellow"></i> <span>Drivers</span></a></li>
              <li><a href="pricing.php"><i class="fa fa-circle-o text-yellow"></i> <span>Pricing Master</span></a></li>
              <li><a href="add_pricing.php"><i class="fa fa-circle-o text-yellow"></i> <span>Add Pricing</span></a></li>
              <li><a href="login_pin.php"><i class="fa fa-circle-o text-yellow"></i> <span>Change Pin</span></a></li>

            </ul>
          </li>
          <li><a href="entry.php"><i class="fa fa-circle-o text-green"></i> <span>Entry</span></a></li>
          <li><a href="view_entry.php"><i class="fa fa-circle-o text-green"></i> <span>View&nbsp;entry</span></a></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-file-pdf-o text-yellow"></i>
              <span>Report</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span> 
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="vehicle_report.php"><i class="fa fa-circle-o text-purple"></i> <span>Vehicle Wise Report</span></a></li>
              <li><a href="attendance.php"><i class="fa fa-circle-o text-yellow"></i> <span>Attendance</span></a></li>
              <li><a href="view_attendance.php"><i class="fa fa-circle-o text-purple"></i> <span>View Attendance Report</span></a></li>

            </ul>
          </li>        
      </section>
  </aside>
  <!-- Content -->
  <div class="content-wrapper">
    <section class="content">
       <?php
          if(isset($_GET['status'])){
            $status = $_GET['status'];
          }else{
            $status = "";
          }
          switch ($status) {
            case 'inserted':
              echo '<div class="alert alert-success" id="dynamic-alart" ><strong>Success!</strong> New '.$_GET['slug'].' added successfully.</div>';
            break;
             case 'updated':
              echo '<div class="alert alert-success" id="dynamic-alart" ><strong>Success!</strong> '.$_GET['slug'].' updated successfully.</div>';
            break;
            case 'deleted':
              echo '<div class="alert alert-danger" id="dynamic-alart" ><strong>Success!</strong> A '.$_GET['slug'].' deleted successfully.</div>';
            break;
            case 'error':
              echo '<div class="alert alert-warning" id="dynamic-alart" ><strong>Sorry!</strong> '.$_GET['slug'].' name already present or Something went wrongly.</div>';
            break;
            default:
            echo "";
            break;
          }