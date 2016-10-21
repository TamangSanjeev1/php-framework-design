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
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="../dashboard/createUser" class="ajxCall" method="post">
                                
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


                                    <div class="form-group">
                                        <label for="country">
                                            Country
                                        </label>
                                        
                                        <select class="form-control" name="country" required="">

                                            <option value="">
                                                --Select your country--
                                            </option>

                                            <option value="Np">
                                                Nepal
                                            </option>
                                            <option value="Ch">
                                                China
                                            </option>
                                            <option value="Bang">
                                                Bangladesh
                                            </option>
                                            <option value="USA">
                                                USA
                                            </option>
                                            <option value="Canada">
                                                Canada
                                            </option>
                                            <option value="aus">
                                                Australia
                                            </option>
                                        </select>
                                    </div>

                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
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

               
                
                