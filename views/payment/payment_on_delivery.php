	<section id="cart_items">
		<div class="container">

<div class="shopper-informations">

			<form action="<?php echo URL; ?>order/savePaymentOnDelivery" method="post">
				<div class="row">	
					<div class="col-md-8">

					<div class="form-group">
					    <p>Shopper Information</p>
							<input type="Email" placeholder="Email" name="email" required="">
							<input type="text" placeholder="User Name" name="user_name" required="">
							<input type="text" placeholder="Mobile Phone" name="phone" required="">
			  		</div>


					<div class="form-group">
					    <p>Shipping Address</p>
							<input type="text" placeholder="Address 2" name="address" required="">
							<input type="text" placeholder="City" name="city" required="">
							<input type="text" placeholder="Postal Code*" name="postal_code" required="">
			  		</div>
			  		<div class="form-group">
                          <button name="submit" class="btn btn-primary">Continue</button>
			  		</div>
				</div>
			  	
			</form>
	
				<div class="row">
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
					 <table class="table">
					    <thead>
					      <tr>
					        <th colspan="2">Item Name</th>
					        <th>Quantity</th>
					      </tr>
							<tbody>
							<?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
						<tr>
							<td class="cart_description" colspan="2">
								<h4><a href=""><?php echo $values["item_name"]; ?></a></h4>
								
							</td>
							
							<td class="cart_quantity">
									<?php echo $values["item_quantity"];?>
							</td>
						
						</tr>
						 <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="2" align="right">Total</td>  
                               <td align="right"><p class="cart_total_price">$ <?php echo number_format($total, 2); ?></p></td>  
                         		
                          </tr>
                      

                          <?php  
                          }  
                          ?> 
                          </tbody>
                          </table>
							
						</div>	
					</div>					
				</div>
			</div>

			</div>
			</section>