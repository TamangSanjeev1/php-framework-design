 <div id="page-wrapper">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sales Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
               <div class="panel panel-default"> 
                        <div class="panel-heading">
                            
                             <form action="getSalesReport" method="post">
                               <select class="form-control" name="date_value">
                                 <?php
                                    $hold = explode('-', date('Y-m-d'));
                                    $mnth = $hold[1];

                                    for ($i=0; $i < 3; $i++) { 
                                        # code...
                                ?> 
                                    <option>
                                <?php

                                        echo date('Y-'.$mnth.'-1');
                                        $mnth--;


                                ?>        
                                    </option>
                                <?php        
                                    }
                                 ?>
                                </select>
                                <br>
                                <span class="input-group-btn">
                                     <button name="submit" class="btn btn-primary">Submit</button>
                                </span>
                             </form>   
                         
                        </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th>Product Quantity</th>
                                        <th>Delivered Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                          $count = 1;
                                                foreach($this->report as $list){ 
                                                    ?>
                                     <tr class="odd gradeX">

                                                <?php
                                                    echo "<td>".$count."</td>";
                                                    $count++;
                                                    echo "<td>".$list['customer_name']."</td>";
                                                    echo "<td>".$list['product_name']."</td>";
                                                    echo "<td>".$list['product_quantity']."</td>";
                                                    echo "<td>".$list['delivered_date']."</td>";
                                                    ?>                                               
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