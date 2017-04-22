<?php 
  include 'engine/Dbconnect.php';
  include 'engine/Authinticate.php';
?>

<?php
if(isset($_POST['register'])){
  $db = new Dbconnect();
  $conn = $db->connectDb();
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $address = $_POST['address'];
  $query = "INSERT INTO users(user_name, user_email, user_password, user_address) VALUES ('$name','$email','$password','address')";
  mysqli_query($conn,$query);
}

  $store = new Authinticate();
  $err = array();
  if(isset($_POST) && !empty($_POST)){
    $requests = $_POST;
    $err = $store->checkErrors($requests);


    if(empty($err)){
      $credentials = $store->authinticateUser($requests);

      $err[0] = $credentials;
    }
  }
  
?>


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
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
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
            <form action="" method="post">
              <h1>Create Account</h1>
              <div>
                <input type="text" name="name" class="form-control" placeholder="name" required="" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="text" name="address" class="form-control" placeholder="Address" required="" />
              </div>
              <div class="form-group">
                      <div class="row">
                        <div class="col-sm-3 col-sm-offset-3">
                          <input type="submit" name="register" id="login-submit" tabindex="4" class="form-control btn btn-primary" value="Register">

                        </div>
                      </div>
                    </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> FlipShop!</h1>
                  <p>©2016 All Rights Reserved. FlipShop Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
