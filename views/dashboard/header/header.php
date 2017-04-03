<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-commerce</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL; ?>public/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo URL; ?>public/admin/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URL; ?>public/admin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo URL; ?>public/admin/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link href="<?php echo URL; ?>public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     
</head>

<body>
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo URL; ?>dashboard"><?php echo $_SESSION['user_name']; ?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <?php 
                            if(sizeof($_SESSION['notify']) > 0){
                                ?>
                      <span class="label label-danger">
                            <?php
                                echo sizeof($_SESSION['notify']);
                            }

                      ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                    <?php 
                        if($_SESSION['notify'] > 0){
                            foreach ($_SESSION['notify'] as $value) {
                                # code...
                    ?>
                        <li>
                            <a href="">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> <?php echo 'The stock of '.$value['product_name'].' is 0' ?>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    <?php       }
                        }else{

                             ?>

                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>No Notification
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    <?php } ?>
                            
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php
                                echo URL; 
                               if (Session::get('type') == 2) {
                                    # code...
                                    echo "user/userProfile";
                                }
                             ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL; ?>dashboard/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>
                             <?php 
                                if (Session::get('type') == 1) {
                                    # code...
                                    echo "for admin";
                                }elseif (Session::get('type') == 2) {
                                    # code...
                                    echo "Product";
                                }
                             ?> <!-- Charts -->
                        <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <?php if (Session::get('type') == 2) { ?>
                                <li>
                                    <a href="<?php echo URL; ?>user/listitems">
                                    <?php 
                                        
                                             # code...
                                            echo "List Product";
                                         
                             ?> <!-- Charts --></a></li><?php } ?>
                                
                                <?php if (Session::get('type') == 2) { ?>
                                <li>
                                    <a href="<?php echo URL; ?>user/additems">
                                    <?php 
                                        
                                             # code...
                                            echo "Add Product";
                                         
                             ?> <!-- Charts --></a> </li><?php } ?>
                               
                                <?php if (Session::get('type') == 2) { ?>
                                 <li>
                                    <a href="<?php echo URL; ?>user/producttype">
                                    <?php 
                                        
                                             # code...
                                            echo "Add Product Type";
                                         
                             ?> <!-- Charts --></a></li><?php } ?>
                                
                                <?php
                                        if (Session::get('type') == 2) {
                                ?>
                                 <li>
                                    <a href="<?php echo URL; ?>user/featuredItemsList">
                                    <?php 
                                             # code...
                                            echo "List Featured Item";
                                       
                             ?> <!-- Charts --></a></li><?php } ?>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                           <?php 
                                        if (Session::get('type') == 2) {
                            ?>
                            <a href="<?php echo URL; ?>user/getOrder"><i class="fa glyphicon glyphicon-yen fa-fw"></i> 
                            <?php    
                                             # code...
                                            echo "Orders";
                                         
                             ?></a></li><?php } ?>
                        
                         
                          <?php
                            if (Session::get('type') == 2) {
                          ?>
                           <li>
                            <a href="<?php echo URL; ?>user/getSalesReport"><i class="fa glyphicon glyphicon-file fa-fw"></i> <?php 
                                        
                                             # code...
                                            echo "Reports";
                                        
                             ?></a></li><?php  } ?>

                              <?php
                            if (Session::get('type') == 2) {
                          ?>
                           <li>
                            <a href="<?php echo URL; ?>user/deliveredProducts"><i class="fa glyphicon glyphicon-file fa-fw"></i> <?php 
                                        
                                             # code...
                                            echo "Delivered Products";
                                        
                             ?></a></li><?php  } ?>
                        
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
