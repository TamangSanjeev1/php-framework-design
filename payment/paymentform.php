<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payment Gateway</title>

    <!-- Bootstrap -->
    <link href="<?php echo URL; ?>payment/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo URL; ?>payment/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo URL; ?>payment/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo URL; ?>payment/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo URL; ?>payment/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-check-square-o"></i>
                          </div>
                          <div class="count">Rs. <?php 
								print_r($_SESSION['total']);
							?></div>

                          <h3>Total Amount</h3>
                          <p>Please Insert Your User Name and Password to transfer fund and make purchase</p>
                        </div>
                    <!--   </div>

                       <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12"> -->
                       <?php if ($this->error) { ?>
                        <div class="tile-stats">
                          <div class="icon"><i class="glyphicon glyphicon-remove"></i>
                          </div>
                          <div class="count"><?php
                          		
                          			# code...
                          			echo $this->error;
                          		
                          ?></div>
                          <h3>Insufficient Balance</h3>
                          
                        </div>
                          <?php } ?>

                          
                      </div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo URL; ?>payment/engine/paymentauth.php" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                <!-- <a class="btn btn-default submit" href="">Log in</a> -->
                <div class="form-group">
                      <div class="row">
                        <div class="col-sm-3 col-sm-offset-3">
                          <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-primary" value="Log In">

                        </div>
                      </div>
                    </div>
                    <?php
                            if(!empty($err)){
                              foreach ($err as $errprint) { 
                              # for printing the errors returned from the auth class
                              echo $errprint.' ';
                              }
                            } 
                          ?>
               <!--  <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Flip Pay</h1>
                  <p>©2016 All Rights Reserved. Flip Pay</p>
                </div>
              </div>
            </form>
          </section>
        </div>


        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
