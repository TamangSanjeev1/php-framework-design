        <?php $data = $this->check; ?>
          <div id="page-wrapper" style="padding-top: 2em;">  
            <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Users List
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Address</th>
                                                    <th>Date Added</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                                                                                
                                                  for ($i=0; $i < sizeof($this->check); $i++) { 
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
                                                    echo $data[$i]['user_name'];
                                            ?>
                                                </th>
                                                <th>
                                            <?php        
                                                    echo $data[$i]['email'].'</th>';
                                                    echo '<th>'.$data[$i]['phone_number'].'</th>';
                                                    echo '<th>'.$data[$i]['address'].'</th>';
                                                    echo '<th>'.$data[$i]['date_added'].'</th>';

                                            ?>
                                                    <th>
                                                    <a href="<?php echo URL; ?>dashboard/deleteUsers/<?php echo $data[$i]['user_id']; ?>"><button class="btn btn-danger"><span class="fa fa-times-circle fa-1x"></span></button>
                                                    </a>
                                                    <a href="<?php echo URL; ?>dashboard/editUsers/<?php echo $data[$i]['user_id']; ?>"><button class="btn btn-success"><span class="fa fa-pencil-square-o"></span></button>
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

    