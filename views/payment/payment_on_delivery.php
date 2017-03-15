	<section id="cart_items">
		<div class="container">

<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="Email" placeholder="Email">
								<input type="text" placeholder="User Name">
							</form>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Shipping Address</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Address 1 *">
									<input type="text" placeholder="Address 2">
									<input type="text" placeholder="City">
									<input type="text" placeholder="Postal Code*">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">
								</form>
							</div>
						</div>
					</div>
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
                           <tr>
                           <td><a class="btn btn-primary" href="">Continue</a> </td>    	 
                          </tr> 

                          </tbody>
                          </table>
							
						</div>	
					</div>					
				</div>
			</div>

			</div>
			</section>