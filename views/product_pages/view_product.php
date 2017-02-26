	<section>
		<div class="container">
			<div class="row">
				
				
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo URL; ?>/public/images/product-details/<?php echo $this->product_info[0]['image_name']; ?>" alt="" />
						
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><?php echo $this->product_info[0]['product_details']; ?></h2>
								<!-- <p>Web ID: 1089772</p> -->
								<img src="" alt="" />
								<span>
									<span>NPR <?php echo $this->product_info[0]['product_price']; ?></span>
									<label>Quantity:</label>
									<input type="text" value="0" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> <?php echo $this->product_info[0]['product_quantity']; ?></p>
								<p><b>Brand:</b> <?php echo $this->product_info[0]['product_brand']; ?></p>
								<p><b>Product Details:</b> <?php echo $this->product_info[0]['product_details']; ?></p>
								<a href=""><img src="" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Company Description</a></li>
							</ul>
						</div>
						<div class="tab-content">
							
						
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i><?php echo $this->product_info[0]['company_name'] ?></a></li>
										<!-- <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li> -->
									</ul>
									<p><?php echo $this->product_info[0]['company_address']; ?></p>
									
									
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
			
					
				</div>
			</div>
		</div>
	</section>