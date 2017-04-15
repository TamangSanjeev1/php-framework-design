 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Orders</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Customers Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Customer Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php  $count = 1;
                                                foreach($this->orderList as $list){ 
                                                    ?>
                                     <tr class="odd gradeX">

                                                <?php
                                                    echo "<td>".$count."</td>";
                                                    $count++;
                                                    echo "<td>".$list['customer_name']."</td>";
                                                ?>
                                                <td><a href="<?php echo URL; ?>user/customerOrder/<?php echo $list['customer_id']; ?>"><button type="button" class="btn btn-primary">View</button></a></td>

                                    </tr>
                                            <?php }?>
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