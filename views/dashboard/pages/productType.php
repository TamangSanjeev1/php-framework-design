        <?php $data = $this->typeList; ?>
          <div id="page-wrapper" style="padding-top: 2em;">  

            <div class="row">
                <div class="col-lg-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Add Items Type
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="../user/addproducttype" method="post" enctype="multipart/form-data">
                                
                        
                                <div class="form-group">
                                    <label for="Product Name">
                                        Product Type Name
                                    </label>
                                        <input type="text" name="product_cat" class="form-control" placeholder="product name" required>
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
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Product Type List
                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S.N</th>
                                                    <th>Type Name</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                                                                                
                                                  for ($i=0; $i < sizeof($this->typeList); $i++) { 
                                                    # code...
                                            ?>
                                                <tr>
                                                    <th>
                                            <?php        
                                                    echo $i+1;
                                            ?>

                                                    </th>
                                                    <th>
                                            <?php
                                                    echo $data[$i]['product_cat_name'];
                                            ?>
                                                </th>
                                               
                                                    <th>
                                                    <a href="<?php echo URL; ?>user/deleteProductType/<?php echo $data[$i]['product_cat_id']; ?>"><button class="btn btn-danger"><span class="fa fa-times-circle fa-1x"></span></button>
                                                    </a>
                                                    
                                            <?php
                                                            
                                                }
                                            ?>

                                                    </th>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

