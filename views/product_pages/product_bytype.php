	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							

							<?php $p_list = $this->p_type_list; 
								foreach ($p_list as $value) {
									# code...
								
							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?php echo URL; ?>index/productbyType/<?php echo $value['product_cat_id']; ?>"><?php echo $value['product_cat_name']; ?></a></h4>
								</div>
							</div>
							<?php 
								}
							?>
							</div>
							
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php foreach ($this->company_list as $value) {
										# code...
									 ?>
									<li><a href="#"><!--  <span class="pull-right">(50)</span> --><?php echo $value[0]; ?></a></li>
									<?php } ?>
								
								</ul>
							</div>
						</div><!--/brands_products-->
					
						<div class="shipping text-center"><!--shipping-->
							<img src="<?php echo URL; ?>images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<!-- <h2 class="title text-center"><?php echo $this->p_list[0]['product_cat_name']; ?></h2> -->
						<?php $temp = $this->p_list;
							foreach ($temp as $value) {
								# code...
							
						 ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo URL; ?>/public/images/product-details/<?php echo $value['image_name']; ?>" alt="" />
											<h2>$<?php echo $value['product_price']; ?></h2>
											<p><?php echo $value['product_name']; ?></p>
											
										</div>
										<div class="product-overlay">
											<div class="overlay-content">

												<h2>Rs.<?php echo $value['product_price']; ?></h2>
												<p><?php echo $value['product_details']; ?></p>
												
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="<?php echo URL; ?>index/viewproducts/<?php echo $value['product_id']; ?>"><i class="fa fa-eye"></i>View Product</a></li>
									</ul>
								</div>
							</div>
						</div>
						<? } ?>
						
						
					</div><!--features_items-->
					
				
					
				</div>
			</div>
		</div>
	</section>
	
