<?php
   require_once('header.php'); 
   require_once('../Models/database.php');
   require_once('../Models/order_item.php');
   require_once('../Models/order_db.php');

   $order_items = OrderDB::get_order_items($_GET['orderID']);
?>
      <!--  orders -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>My Order</h2>
                  </div>
                  <table class="table table-hover table-striped table-dark">
                     <tr class="thead-dark">
                        <th scope="col">Order ID</th>
                        <th scope="col">Product ID</th>
						<th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                     </tr>
					 <?php
					 $price = 0;
						foreach ($order_items as $order_item) {
							$product = ProductDB::get_product_by_id($order_item->getProductId);
							$price = $order_item->getAmount * $product->getPrice;
							echo '<tr>
							<td style="vertical-align: middle;>'. $order_item->getOrderId .'</td>
							<td style="vertical-align: middle;>'. $order_item->getProductId .'</td>
							<td style="vertical-align: middle;> $'. $order_item->getAmount .'</td>
							<td style="vertical-align: middle;> $'. $price .'</td>
							</tr >';
						}
					 ?>
					 	<tr class="thead-dark">
					       <th scope="col" style="vertical-align: middle;">SubTotal</th>
						   <th scope="col" style="vertical-align: middle;"></th>
						   <th scope="col" style="vertical-align: middle;"></th>
					       <th scope="col" style="vertical-align: middle;">$<?php echo $order_item->getTotal ?></th>
					    </tr>
					    <tr class="thead-dark">
					       <th scope="col" style="vertical-align: middle;">Total</th>
						   <th scope="col" style="vertical-align: middle;"></th>
						   <th scope="col" style="vertical-align: middle;"></th>
					       <th scope="col" style="vertical-align: middle;">$<?php echo OrderDB::get_grand_total($order_item->getOrderId) ?></th>
					    </tr>
                  </table>
               </div>
            </div>
        </div>
      <!-- end orders -->
<?php require_once('footer.php'); ?>