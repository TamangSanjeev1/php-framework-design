<?php session_start(); ?>

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
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="../../order/transactionConfirmation" method="post">
              <h1> Payment Confirmation</h1>
              <div>
                	<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
				  	<input type="hidden" name="transaction_id" value="<?php echo $_SESSION['t_id']; ?>">
				  	<input type="hidden" name="amount" value="<?php echo $_SESSION['total']; ?>">
              </div>
              <div>
              <div class="col-md-10">
                  	<input type="submit" value="Submit"  name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-primary">
                  	</div>
              </div>
              <div>
               <!--  <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>
            </form>
          </section>


  


        </div>

      </div>
    </div>
  </body>
</html>
