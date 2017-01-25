        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                                            <!-- /.panel-heading -->
                    <!-- /.panel -->
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                      <div class="panel-body">
                        <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $this->usrProfile[0]['company_name']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
                    <img alt="User Pic" src="<?php echo URL; ?>public/images/company-img/<?php echo $this->usrProfile[0]['company_image']; ?>" class="img-circle img-responsive"> 
                </div>
                <div class=" col-md-12 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <td><b>Name:</b></td>
                        <td><?php echo $this->usrProfile[0]['user_name']; ?></td>
                      </tr>
                      <tr>
                        <td><b>E-mail:</b></td>
                        <td><?php echo $this->usrProfile[0]['email']; ?></td>
                      </tr>
                      <tr>
                        <td><b>Phone Number:</b></td>
                        <td><?php echo $this->usrProfile[0]['phone_number']; ?></td>
                      </tr>
                   
                      <tr>
                             
                        <td><b>Address:</b></td>
                        <td><?php echo $this->usrProfile[0]['address']; ?></td>
                      </tr>
                      <tr>
                        <td><b>Date Joined</b></td>
                        <td><?php echo $this->usrProfile[0]['date_added']; ?></td>
                      </tr>

                      <tr>
                        <td><b>Company Address</b></td>
                        <td><?php echo $this->usrProfile[0]['company_address']; ?></td>
                      </tr>

                      <tr>
                        <td><b>Company Phone</b></td>
                        <td><?php echo $this->usrProfile[0]['company_phone']; ?></td>
                      </tr>                    
                     
                    </tbody>
                  </table>
                  
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                       <a href="../user/editProfile" class="btn btn-primary">Edit Profile</a>
                    </div>
            
          </div>  
                        </div>
                    </div>
                            <!-- /.row -->
                </div>
                        <!-- /.panel-body -->
            </div>
                    <!-- /.panel -->
        </div>
                <!-- /.col-lg-8 -->

               
                
