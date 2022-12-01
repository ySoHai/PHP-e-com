<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
   require_once('header.php'); 
   require_once('../Models/database.php');
   require_once('../Models/order_item.php');
   require_once('../Models/order_db.php');
   require_once('../Models/product_db.php');
   require_once('../Models/product.php');
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
                        <th scope="col">Product Name</th>
						      <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                     </tr>
					 <?php
					 $price = 0;
					 $total = 0;
						foreach ($order_items as $order_item) {
							$product = ProductDB::get_product_by_id($order_item->getProductID());
							$price = $order_item->getTotal() * $order_item->getAmount();
							$total += $price;
							echo '<tr>
							<td style="vertical-align: middle;">'. $order_item->getOrderID() .'</td>
							<td style="vertical-align: middle;">'. $product->getName() .'</td>
							<td style="vertical-align: middle;">'. $order_item->getAmount() .'</td>
							<td style="vertical-align: middle;"> $'. $order_item->getTotal() .'</td>
							</tr >';
						}
					 ?>
					 	<tr class="thead-dark">
					       <th scope="col" style="vertical-align: middle;">Total</th>
						   <th scope="col" style="vertical-align: middle;"></th>
						   <th scope="col" style="vertical-align: middle;"></th>
					       <th scope="col" style="vertical-align: middle;">$<?php echo $total ?></th>
					    </tr>
                  </table>
               </div>
            </div>
        </div>
      <!-- end orders -->
<?php require_once('footer.php'); ?>