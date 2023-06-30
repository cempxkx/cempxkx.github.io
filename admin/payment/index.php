<?php
      include 'request.php';  
     // require_once 'checkout.php'
     //header('Location:: request.php');
     //include 'view_po.php';
?> 
<?php 

$qry = $conn->query("SELECT p.*,s.name as supplier FROM purchase_order_list p inner join supplier_list s on p.supplier_id = s.id  where p.id = '{$_GET['id']}'");
if($qry->num_rows >0){
    foreach($qry->fetch_array() as $k => $v){
        $$k = $v;
    }
}
?>
<?php 
// if(isset($_GET['id'])){
//     $qry = $conn->query("SELECT * FROM po_items  where p.id = '{$_GET['id']}'");
//     if($qry->num_rows >0){
//         foreach($qry->fetch_array() as $k => $v){
//             $$k = $v;
//         }
//     }
//}
?>
<style>
    select[readonly].select2-hidden-accessible + .select2-container {
        pointer-events: none;
        touch-action: none;
        background: #eee;
        box-shadow: none;
    }
</style>

<div class="card-body">
		<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <!-- <h3 class="text-center p-1 text-primary">Fill the details to complete your order</h3> -->
                

<div class="card card-outline card-primary">

	<div class="card-header">
    <div class="card-body" id="print_out">
    <h4 class="text-info">Orders</h4>
            <table class="table table-striped table-bordered" id="list">
                <colgroup>
                    <col width="10%">
                    <col width="10%">
                    <col width="30%">
                    <col width="25%">
                    <col width="25%">
                </colgroup>
                <thead>
                    <tr class="text-light bg-navy">
                        <th class="text-center py-1 px-2">Qty</th>
                        <th class="text-center py-1 px-2">Unit</th>
                        <th class="text-center py-1 px-2">Item</th>
                        <th class="text-center py-1 px-2">Cost</th> 
                         <th class="text-center py-1 px-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $id = 'po_code'; // Initialize the $id variable
                    // global $conn;
                    // $total = 0;
                    // $qry = $conn->query("SELECT p.*,i.name,i.description FROM `po_items` p inner join item_list i on p.item_id = i.id where p.po_id = '{$id}'");
                    // while($row = $qry->fetch_assoc()):
                    //     $total += $row['total']
                    $total = 0;
                    $qry = $conn->query("SELECT p.*,i.name,i.description FROM `po_items` p inner join item_list i on p.item_id = i.id where p.po_id = '{$id}'");
                    while($row = $qry->fetch_assoc()):
                        $total += $row['total']
                    ?>
                    <tr>
                        <td class="py-1 px-2 text-center"><?php echo number_format($row['quantity'],2) ?></td>
                        <td class="py-1 px-2 text-center"><?php echo ($row['unit']) ?></td>
                        <td class="py-1 px-2">
                            <?php echo $row['name'] ?> <br>
                            <?php echo $row['description'] ?>
                        </td>
                        <td class="py-1 px-2 text-right"><?php echo number_format($row['price']) ?></td>
                        <td class="py-1 px-2 text-right"><?php echo number_format($row['total']) ?></td>
                    </tr>

                    <?php endwhile; ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <!-- <th class="text-right py-1 px-2" colspan="4">Sub Total</th>
                        <th class="text-right py-1 px-2 sub-total"><?php echo number_format($total,2)  ?></th>
                    </tr>  -->
                    <!-- <tr>
                        <th class="text-right py-1 px-2" colspan="4">Discount <?php echo isset($discount_perc) ? $discount_perc : 0 ?>%</th>
                        <th class="text-right py-1 px-2 discount"><?php echo isset($discount) ? number_format($discount,2) : 0 ?></th>
                    </tr>
                    <tr>
                        <th class="text-right py-1 px-2" colspan="4">Tax <?php echo isset($tax_perc) ? $tax_perc : 0 ?>%</th>
                        <th class="text-right py-1 px-2 tax"><?php echo isset($tax) ? number_format($tax,2) : 0 ?></th>
                    </tr> -->
                    <tr>
                        <th class="text-right py-1 px-2" colspan="4">Total</th>
                        <th class="text-right py-1 px-2 grand-total"><?php echo isset($amount) ? number_format($amount,2) : 0 ?></th>
                    </tr>
                </tfoot>
            </table>
            
<table id="clone_list" class="d-none">
    <tr>
        <td class="py-1 px-2 text-center">
            <button class="btn btn-outline-danger btn-sm rem_row" type="button"><i class="fa fa-times"></i></button>
        </td>
        <td class="py-1 px-2 text-center qty">
            <span class="visible"></span>
            <input type="hidden" name="item_id[]">
            <input type="hidden" name="unit[]">
            <input type="hidden" name="qty[]">
            <input type="hidden" name="price[]">
            <input type="hidden" name="total[]">
        </td>
        <td class="py-1 px-2 text-center unit">
        </td>
        <td class="py-1 px-2 item">
        </td>
        <td class="py-1 px-2 text-right cost">
        </td>
        <td class="py-1 px-2 text-right total">
        </td>
    </tr>
</table>
	</div>









    <div class="card-header">
		<h3 class="card-title">Checkout Payment</h3>
	</div> 
<form action="request.php" id="payment-form" method="POST" >
    <div class="card-body">
		<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <h3 class="text-center p-1 text-primary">Fill the details to complete your order</h3>
                <form action="request.php" id="payment-form" method="POST" > 
                    <input type="hidden" name="item_id[]">
                    <input type="hidden" name="unit[]">
                    <input type="hidden" name="qty[]">
                    <input type="hidden" name="price[]">
                    <input type="hidden" name="total[]">


                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
                            <!-- try link dgn sales report -->
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" placeholder="Enter your username" required>
                            <!-- try link dgn sales report -->
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div><!-- try add default form info  -->
                        <div>
                         <a class="btn btn-flat btn-primary" type="submit" position="center">Checkout-Pay</a> 
                        </div>
                
                </form> 
        </div>
    </div>

<script>
          $('#payment-form').submit(function(e)){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_payment",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				}})}
 </script>