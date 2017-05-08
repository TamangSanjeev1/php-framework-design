<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo URL; ?>public/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> FilpShop, Inc.
          <small class="pull-right">Date: <?php echo date('Y-m-d'); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Flip Shop, Inc.</strong><br>
          Boudha - 07, Kathmandu<br>
          Phone: (804) 123-5432<br>
          Email: flipshopmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong> <?php 
        print_r($_SESSION['name']);
      ?></strong><br>
          <!-- 95 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address> -->
      </div>

      <!-- /.col -->
  <!--     <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div> -->
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
           <td class="image">Item Name</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="price">Sub Total Price</td>
          </tr>
          </thead>
          <tbody>
            <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          { 
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
            <tr>
              <td class="cart_description">
                <h4><?php echo $values["item_name"]; ?></h4>
                
              </td>
              <td class="cart_price">
                <p>RS <?php echo $values["item_price"]; ?></p>
              </td>
              <td class="cart_quantity">
                  <h4><?php echo $values["item_quantity"]; ?></h4>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></p>
              </td>
            </tr>
             <?php  
                                    // $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          
                          }  
              ?>  
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Payment Methods:</p>
       <!--  <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          The items will be shipped based upon the information you have listed. 
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Amount Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td><?php    if(!empty($_SESSION["shopping_cart"]))  
                          { 
                                $total = 0;
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                            
                              $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                             
                                    // $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                             echo $total;
                          }  
              ?></td>
            </tr>
            <tr>
              <th>Tax </th>
              <td>2%</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>Rs. 120</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>Rs.
                
<?php    if(!empty($_SESSION["shopping_cart"]))  
                          { 
                                $total = 0;
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                            
                              $total = $total + ($values["item_quantity"] * $values["item_price"]);
                              $total = $total +120 - ($total*2/100);  
                             
                                    // $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                             echo $total;
                          }  
              ?>


            </td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
