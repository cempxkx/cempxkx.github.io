<h1 class="">Welcome to <?php echo $_settings->info('name') ?></h1>
<hr>
<div class="row">


    <div class="col-12 col-sm-6 col-md-3">
    <a href="<?php echo base_url ?>admin/?page=purchase_order">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-th-list"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">PO Records</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `purchase_order_list`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

  
    <div class="col-13 col-sm-6 col-md-3">
    <a href="<?php echo base_url ?>admin/?page=receiving">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-boxes"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Receiving Records</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `receiving_list`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
 
 
    <!-- <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-exchange-alt"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">BO Records</span>
            <span class="info-box-number text-right">
                <?php 
                    //echo $conn->query("SELECT * FROM `back_order_list`")->num_rows;
                ?>
            </span>
            </div>
            <!- /.info-box-content 
        </div>
        <!- /.info-box --
    </div> -->

    <div class="col-12 col-sm-6 col-md-3">
    <a href="<?php echo base_url ?>admin/?page=return">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-undo"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Return Records</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `return_list`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    
    
    <div class="col-12 col-sm-6 col-md-3">
    <a href="<?php echo base_url ?>admin/?page=sales">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Sales Report</span>
            <span class="info-box-number text-right">
                <?php 
                  echo $conn->query("SELECT * FROM `sales_list`")->num_rows;
                  //  echo $conn->query("SELECT * FROM `purchase_order_list`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div> 


    <div class="col-12 col-sm-6 col-md-3">
    <a href="<?php echo base_url ?>admin/?page=maintenance/item">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-th-list"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Product</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `item_list` where `status` = 1")->num_rows;
                   // echo $conn->query("SELECT * FROM `receiving_list`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <?php if($_settings->userdata('type') == 1): ?>
 
       <div class="col-12 col-sm-6 col-md-3">
       <a href="<?php echo base_url ?>admin/?page=user/list">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Agents</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `users` where id != 1 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <?php endif; ?>

<!--TRY RANKING AGENTS-->




<!--END RANKING AGENTS-->

  
 <!--    
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-undo"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Return Records</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `return_list`")->num_rows;
                ?>
            </span>
            </div>
            <!- /.info-box-content -->
        </div>
        <!-- /.info-box --
    </div> 
-->

 <!--
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Sales Report</span>
            <span class="info-box-number text-right">
                <?php 
                   // echo $conn->query("SELECT * FROM `sales_list`")->num_rows;
                ?>
            </span>
            </div>
            <!- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
 

<!-- 
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-truck-loading"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Suppliers</span>
            <span class="info-box-number text-right">
                <?php 
                  //  echo $conn->query("SELECT * FROM `supplier_list` where `status` = 1")->num_rows;
                ?>
            </span>
            </div>
            <!- /.info-box-content -->
        </div>
        <!-- /.info-box --
    </div>
    -->
    
 
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-th-list"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Products</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `item_list` where `status` = 1")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box --
    </div>
    



    <?php if($_settings->userdata('type') == 1): ?>

        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Agents</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `users` where id != 1 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <?php endif; ?>
   
</div>