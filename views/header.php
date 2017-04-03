<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | FlipShop</title>

	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/prettyPhoto.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/price-range.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/responsive.css">

    <!--Data Table-->
     <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/datatable/css/dataTables.bootstrap.min.css">


    <!--User defined for login panel-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/style.css">    
    <!--forloginpanel-->    
    <link href="<?php echo URL; ?>public/css/sb-admin-2.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>s
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo URL; ?>public/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL; ?>public/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL; ?>public/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL; ?>public/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo URL; ?>public/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

<header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> sanjeev@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?php echo URL; ?>index"><img src="<?php echo URL; ?>public/images/home/logo.png" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                         
                            
                            <div class="btn-group">
                               
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                               <!--  <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
                                <li><a href="<?php echo URL; ?>order/viewCart"><i class="fa fa-shopping-cart"></i> Cart 
                                <?php 
                                    if(isset($_SESSION["shopping_cart"])){
                                        echo sizeof($_SESSION["shopping_cart"]);
                                    }

                                ?></a></li>
                                <!-- <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                              <!--   <li><a href="index.html" class="active">Home</a></li> -->
                              <!--   <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                        <li><a href="product-details.html">Product Details</a></li> 
                                        <li><a href="checkout.html">Checkout</a></li> 
                                        <li><a href="cart.html">Cart</a></li> 
                                        <li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
                                <li><a href="404.html">404</a></li>
                                <li><a href="contact-us.html">Contact</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                     
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

