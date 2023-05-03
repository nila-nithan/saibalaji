<?php include("../config/database.php"); ?>
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SAI BALAJI Admin Dashboard</title>

    <link href="css/plugins/pace/pace.css" rel="stylesheet">
    <script src="js/plugins/pace/pace.js"></script>
    <!-- GLOBAL STYLES - Include these on every page. -->
    <link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> -->

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="css/plugins/datatables/datatables.css" rel="stylesheet">
    <!-- <------------fav icon------>
    <link rel="icon" type="image/png" href="../../../upload/logo/favicon.png">
    <!-- THEME STYLES - Include these on every page. -->
    <link href="css/flex-admin.css" rel="stylesheet">
    <link href="css/plugins.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- THEME DEMO STYLES - Use these styles for reference if needed. Otherwise they can be deleted. -->
    <link href="css/demo.css" rel="stylesheet">
    <!--jquery link-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .daterangepicker td.active,
        .daterangepicker td.active:hover {
            background-color: #16a085;
            border-color: #16a085;
            color: #fff;
        }

        .daterangepicker .ranges li.active,
        .daterangepicker .ranges li:hover {
            background: #16a085;
            border: 1px solid #16a085;
            color: #fff;
        }

        .daterangepicker .ranges li {
            color: #16a085;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".sidebar-collapse">
                    <i class="fa fa-bars"></i> Menu
                </button>
                <div class="navbar-brand">
                    <a href="index.php">
                        <b style="color:white;">SAI BALAJI</b>
                    </a>
                </div>
            </div>
            <div class="nav-top">
                <ul class="nav navbar-left">
                    <li class="tooltip-sidebar-toggle">
                        <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right" title="Sidebar Toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="alerts-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <span class="number">9</span><i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-scroll dropdown-alerts">
                            <li class="dropdown-header">
                                <i class="fa fa-bell"></i> 9 New Alerts
                            </li>
                            <li id="alertScroll">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <div class="alert-icon blue pull-left">
                                                <i class="fa fa-comment"></i>
                                            </div> New Comments
                                            <span class="badge blue pull-right">15</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-footer">
                                <a href="#">View All Notification</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a class="logout_open" href="#logout">
                                    <i class="fa fa-sign-out"></i> Logout
                                    <strong>Admin </strong>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <ul id="side" class="nav navbar-nav side-nav">
                    <li class="side-user hidden-xs">
                        <img class="img-circle" src="img/profile-pic.png" alt="">
                        <p class="welcome">
                            <i class="fa fa-key"></i> Logged in as
                        </p>
                        <p class="name tooltip-sidebar-logout">
                            [Admin] <span class="last-name"></span> <a href="logout.php" style="color: inherit"><i class="fa fa-sign-out"></i></a>
                        </p>
                        <div class="clearfix"></div>
                    </li>
                    <li>
                        <a class="active" href="index.php"> <i class="fa fa-dashboard"></i> Dashboard </a>
                    </li>
                    <li>
                        <a href="product.php"> <i class="fa fa-solid fa-fish"></i>Products </a>
                    </li>
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#cs">
                            <i class="fa fa-home"></i> Home page settings <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="cs">
                            <li> <a href="banner.php"> <i class="fa fa-picture-o" aria-hidden="true"></i> banner </a> </li>
                    </li>
                </ul>
                <li> <a href="category.php"><i class="fa fa-solid fa-list"></i></i> Category </a> </li>
                <li> <a class="" href="Payments.php"> <i class="fa fa-inr"></i>Payments </a> </li>
                <li> <a class="" href="user.php"> <i class="fa fa-users"></i>Users Reports </a> </li>
                <li class="panel">
                    <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#cse">
                        <i class="fa fa-tags"></i> Orders Reports <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="collapse nav" id="cse">
                        <li> <a href="processing.php"> <i class='fa fa-spinner' aria-hidden='true'></i> Processing </a> </li>
                    
                        <li> <a href="shipping.php"> <i class='fa fa-truck' aria-hidden='true'></i> Shipping </a> </li>
                    
                        <li> <a href="delivered.php"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> Delivered </a> </li>
                    </ul>
                </li>
                <li> <a class="" href="orders.php"> <i class="fa fa-list-alt"></i>Total Orders</a> </li>
                <li> <a class="" href="Payments.php"> <i class="fa fa-inr"></i>Payments Reports </a> </li>
                <li> <a href="" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-key"></i>Change password </a> </li>
                <li> <a class="" href="logout.php"> <i class="fa fa-sign-out"></i> Logout </a> </li>
                </ul>
            </div>
        </nav>