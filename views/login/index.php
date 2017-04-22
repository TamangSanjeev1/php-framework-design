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

<body style="background-image: url('<?php echo URL; ?>public/images/login.jpeg');">
 <div id="wrapper" style="margin-top: 7em;">
    <div class="container margin-top-usr">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login/verify" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                        </form>
                            
                    </div>
                </div>
            </div>
            <?php 
                if(isset($_SESSION['error'])){

                    echo  '<div class="col-md-4 col-md-offset-4">
                            <div class="alert alert-danger">
                                <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                            </div>
                    </div>';   
                    unset($_SESSION['error']);    
                }
            ?>  
        </div>
    </div>
</div>
        <!-- jQuery -->
    <script src="<?php echo URL; ?>public/admin/js/jquery.min.js"></script>
    <!--for chart-->
    <script src="<?php echo URL; ?>public/admin/js/Chart.min.js"></script>

    <!--Custom for chart-->
    <script src="<?php echo URL; ?>public/admin/js/app.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL; ?>public/admin/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo URL; ?>public/admin/js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
  <!--   <script src="<?php echo URL; ?>public/admin/js/raphael.min.js"></script>
    <script src="<?php echo URL; ?>public/admin/js/morris.min.js"></script>
    <script src="<?php echo URL; ?>public/admin/js/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo URL; ?>public/admin/js/sb-admin-2.min.js"></script>
    <!--user js-->
    <script src="<?php echo URL; ?>public/admin/js/main.js"></script>   

</body>

</html>
