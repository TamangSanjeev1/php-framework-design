        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                                            <!-- /.panel-heading -->
                    <!-- /.panel -->
                    <div class="panel panel-default">
                   <!--  <?php
                        // print_r($this->itemList);
                    ?> -->
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Edit Items
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="<?php echo URL; ?>user/updateProduct/<?php echo $this->itemList[0]['product_id']; ?>" method="post" enctype="multipart/form-data">
                                
                        
                                <div class="form-group">
                                    <label for="Product Name">
                                        Product Name
                                    </label>
                                        <input type="text" name="product_name" class="form-control" value="<?php echo $this->itemList[0]['product_name']; ?>" required>
                                </div>                                                                    

                                <div class="form-group">
                                    <label for="Quantity">
                                        Quantity
                                    </label>
                                        <input type="text" name="quantity" class="form-control" value="<?php echo $this->itemList[0]['product_quantity']; ?>" required>
                                </div>
                                
                                    <div class="form-group">
                                        <label for="price">
                                            Price
                                        </label>
                                            <input type="text" name="price" class="form-control" value="<?php echo $this->itemList[0]['product_price']; ?>" required>
                                    </div>
                                        
                                
                                    <div class="form-group">
                                        <label for="phonenumber">
                                            Product Detail
                                        </label>
                                            <input type="text" name="detail" class="form-control" value="<?php echo $this->itemList[0]['product_details']; ?>" required></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="phonenumber">
                                            brand
                                        </label>
                                            <input type="text" name="brand" class="form-control" value="<?php echo $this->itemList[0]['product_brand']; ?>" required>
                                    </div>

                                   <!--  <div class="form-group">
                                        <label for="image_upload">
                                            image upload
                                        </label>
                                            <input id="file-0a" class="file" type="file" name="fileToUpload[]" multiple>
                                    </div> -->


                                    <div class="form-group">
                                        <label for="category">
                                            category
                                        </label>
                                        
                                        <select class="form-control" name="category" required="">

                                            <option value="">
                                                --Select category--
                                            </option>
                                             <?php
                                                foreach ($this->types as $value) {
                                                    # code...
                                                    
                                            ?>    
                                            <option value="<?php echo $value['product_cat_name']; ?>">
                                                <?php echo $value['product_cat_name']; ?>
                                            </option>
                                            <?php }
                                                
                                             ?>
                                            <!-- <option value="Ch">
                                                Pant
                                            </option>
                                            <option value="Bang">
                                                T-shirt
                                            </option>
                                            <option value="USA">
                                                Trousers
                                            </option> -->
                                        </select>
                                    </div>

                                <div class="form-group">
                                        <button name="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <?php
                                    if (isset($_SESSION['error'])) {
                                        # code...
                                        echo '<div class="col-md-4 col-md-offset-4">
                                                <div class="';

                                        if ($_SESSION['error'] == 'Successfully Added') {
                                                    # code...
                                            echo 'alert alert-success'; 
                                        }else{
                                            echo 'alert alert-danger';
                                        }        
                                        echo      '">
                                                    <strong>'.$_SESSION['error'].'</strong>
                                                </div>
                                                </div>'; 
                                        unset($_SESSION['error']);
                                    }
                                ?>
                            </form>                         
                        </div>
                    </div>
                            <!-- /.row -->
                </div>
                        <!-- /.panel-body -->

                       
            </div>
                    <!-- /.panel -->
        </div>
                <!-- /.col-lg-8 -->

               
                
