        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
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
                            <form action="../dashboard/createUser"  method="post" enctype="multipart/form-data">
                                
                                <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="fname">
                                                First Name
                                            </label>
                                                <input type="text" name="fname" class="form-control" placeholder="name" required>
                                        </div>
                                    
                                        <div class="form-group col-md-6">
                                            <label for="lastname">
                                                Last Name
                                            </label>
                                                <input type="text" name="lname" class="form-control" placeholder="last name" required>
                                        </div>
                                            
                                </div>

                                <div class="form-group">
                                    <label for="email">
                                        Email
                                    </label>
                                        <input type="text" name="email" class="form-control" placeholder="email" required>
                                </div>
                                
                                    <div class="form-group">
                                        <label for="address">
                                            Address
                                        </label>
                                            <input type="text" name="address" class="form-control" placeholder="address" required>
                                    </div>
                                        
                                
                                    <div class="form-group">
                                        <label for="phonenumber">
                                            Phone Number
                                        </label>
                                            <input type="text" name="number" class="form-control" placeholder="Phone Number" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phonenumber">
                                            Password
                                        </label>
                                            <input type="text" name="password" class="form-control" placeholder="password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phonenumber">
                                            Retype-Password
                                        </label>
                                            <input type="text" name="re-password" class="form-control" placeholder=" retype-password" required>
                                    </div>                            

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <i class="fa fa-users fa-fw"></i> Company Details
                                            </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="company-name">
                                                            Company Name
                                                        </label>
                                                        <input type="text" name="company_name" class="form-control" placeholder="company name" required>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="company-address">
                                                            Company Address
                                                        </label>
                                                        <input type="text" name="company_address" class="form-control" placeholder="address" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="company-phone">
                                                            Company Phone
                                                        </label>
                                                        <input type="text" name="company_phone" class="form-control" placeholder="phone" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="company-image">
                                                            Company Image
                                                        </label>
                                                        <input id="file-0a" class="file" type="file" name="fileToUpload[]">
                                                    </div>
                                                </div>    
                                            </div>        
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

               
                
                