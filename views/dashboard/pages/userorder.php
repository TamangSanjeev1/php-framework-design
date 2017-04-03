 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Orders List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Order Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Product Name</th>
                                        <th>Product Quantity</th>
                                        <th>Request Date</th>
                                        <th>Delivery Day</th>
                                        <th>Delivery Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                          $count = 1;
                                                foreach($this->list as $list){ 
                                                    ?>
                                     <tr class="odd gradeX">

                                                <?php
                                                    echo "<td>".$count."</td>";
                                                    $count++;
                                                    echo "<td>".$list['product_name']."</td>";
                                                    echo "<td>".$list['product_quantity']."</td>";
                                                    echo "<td>".$list['req_date']."</td>";
                                                    echo "<td>".$list['d_limit']."</td>";
                                                    echo "<td>".$list['status']."</td>";
                                                    ?>
                                                     <td>
                                                    <?php
                                                    if ($list['status'] == 'Not Delivered') {
                                                        # code...
                                                    
                                                ?>
                                           <a href="<?php echo URL; ?>user/deliveryCheckout/<?php echo $list['cust_product_id']; ?>"><button type="button" class="btn btn-primary">Checkout as Delivered</button></a>
                                            <?php }else{
                                                    echo "Checked Out";
                                               
                                            ?>
                                                <?php  } ?>
                                                </td>
                                    </tr>
                                            <?php 
                                            }?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->