<?php 
  include 'Dbconnect.php';
  include 'Authinticate.php';
?>

<?php
  $store = new Authinticate();
  $err = array();
  if(isset($_POST) && !empty($_POST)){
    $requests = $_POST;
    $err = $store->checkErrors($requests);


    if(empty($err)){
      $credentials = $store->paymentAuth($requests);

      $err[0] = $credentials;
    }
  }
  
?>
 <?php
                            if(!empty($err)){
                              foreach ($err as $errprint) { 
                              # for printing the errors returned from the auth class
                              echo $errprint.' ';
                              }
                            } 
                          ?>