           
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit User</h1>
     
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                                            <!-- /.panel-heading -->
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Add User Form
                        </div>
                        <!-- /.panel-heading --><!--class="ajxCall"-->
                        <div class="panel-body">
                            <form action="<?php echo URL; ?>dashboard/updateUser/<?php echo $this->check[0]['user_id'];?>"  method="post" enctype="multipart/form-data">
                                
                                 <div class="form-group">
                                            <label for="fname">
                                                First Name
                                            </label>
                                            <input type="text" name="fname" class="form-control" value="<?php echo $this->check[0]['user_name']; ?>" required>
                                        </div>

                                <div class="form-group">
                                    <label for="email">
                                        Email
                                    </label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $this->check[0]['email']; ?>" required>
                                </div>
                                
                                    <div class="form-group">
                                        <label for="address">
                                            Address
                                        </label>
                                            <input type="text" name="address" class="form-control" value="<?php echo $this->check[0]['address']; ?>" required>
                                    </div>
                                        
                                
                                    <div class="form-group">
                                        <label for="phonenumber">
                                            Phone Number
                                        </label>
                                            <input type="text" name="number" class="form-control" value="<?php echo $this->check[0]['phone_number']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phonenumber">
                                            Password
                                        </label>
                                            <input type="text" name="password" class="form-control" placeholder="password">
                                    </div>                                   
                        

                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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

               
                
                