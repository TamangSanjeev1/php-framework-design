	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					  <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
						<tr>
							<td class="cart_product">
								<a href=""><img width="200" height="136" src="<?php echo URL; ?>/public/images/product-details/<?php echo $values["item_img"]; ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $values["item_name"]; ?></a></h4>
								
							</td>
							<td class="cart_price">
								<p>RS <?php echo $values["item_price"]; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $values["item_quantity"]; ?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo URL; ?>order/deleteFromCart/<?php echo $values["item_id"]; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						 <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                                    $_SESSION['total'] = $total;
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right"><p class="cart_total_price">$ <?php echo number_format($total, 2); ?></p></td>  
                          </tr>  

                          <tr>
                          	<td>
                          	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editDept"><i
                                                class="fa fa-crosshairs"></i> Checkout</button></td>
                          </tr>

                          <?php  
                          }  
                          ?>  
					
					</tbody>
				</table>

				<div class="modal fade" id="editDept" tabindex="-1" role="dialog" aria-labelledby="editDeptModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: rgb(255,63,0)">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="editDeptModalLabel" style="color: white;">Payment Method</h4>
                                            </div>
                                            <div class="modal-body form-group">
                                                <form method="POST" commandName="department" action="<?php echo URL; ?>order/checkout">
                                                    <select name="payment" id="userID" size="1">
													    <option>Cash On Delivery</option>
													    <option>Paypal</option>
													  </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-default">Submit</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>






			</div>
		</div>
	</section> <!--/#cart_items-->

