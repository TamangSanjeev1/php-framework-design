<div id="page-wrapper">
    <!-- /.row -->
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Product Lists
                </div>
                <!-- /.panel-heading -->
                <!-- <div class="panel-body"> -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <?php 
                            $data = $this->itemList;
                           
                                // print_r(sizeof($data));
                                // print_r($this->itemList);
                            // $size = sizeof($data);
                            // $category = $this->itemList[0]['product_cat_name'];                            
                        ?>
                       
                    </ul>
                    <!-- Tab panes -->
                    <div class="container-fluid" style="padding-top: 2em;">
                         <div class="row">
                        <?php foreach ($data as $value) {
                            # code...
                         ?>
                        <div class="col-md-4">
                            <div class="thumbnail">
                             
                                <img src="<?php echo URL; ?>public/images/product-details/<?php echo $value['image_name']; ?>" alt="Nature" style="width:100%">
                                <div class="caption">
                                  <b>Details</b><p><?php echo $value['product_details']; ?></p>
                                 
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td><?php echo $value['product_name']; ?></td>
                                            <td><?php echo $value['product_quantity']; ?></td>
                                            <td><?php echo $value['product_price']; ?></td>
                                          </tr> 
                                        </tbody>     
                                    </table>    
                                 <a href="<?php echo URL; ?>user/deleteItem/<?php echo $value['product_id']; ?>">
                                  <button type="button" class="btn btn-danger">Delete</button></a>
                                  <a href="<?php echo URL; ?>user/editProduct/<?php echo $value['product_id']; ?>">
                                  <button type="button" class="btn btn-primary">Edit</button></a>
                                </div>
                             
                            </div>
                          </div>
                          <?php } ?>


                    </div>
                    
                    </div>
                        
            </div>
                    <!-- /.panel -->
        </div>
    </div>
</div>

