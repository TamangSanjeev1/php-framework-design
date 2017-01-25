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
                                  <p><?php echo $value['product_details']; ?></p>
                                  <a href="delete/<?php echo $value['product_id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                </div>
                             
                            </div>
                          </div>
                          <?php } ?>

                    </div>
                    </div>
                
                        <!-- /.panel-body -->
            </div>
                    <!-- /.panel -->
        </div>
    </div>
</div>


