<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
   require_once('header.php'); 
	require_once('../Models/database.php');
	require_once('../Models/order.php');
	require_once('../Models/order_db.php');
   //require_once('../Models/order_item.php');
   
   if(OrderDB::orders_exist($_SESSION['userId'])){
      $orders = OrderDB::get_orders($_SESSION['userId']);
   }else{
      $orders = false;
   }
?>
      <!--  orders -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>My Orders</h2>
                  </div>
                  <table class="table table-hover table-striped table-dark">
                     <tr class="thead-dark">
                        <th scope="col">Order ID</th>
                        <th scope="col">Ordered Date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Order Link</th>
                     </tr>
                     <?php
						if ($orders == false) {
							echo '<tr>
                           <td colspan="4" style="vertical-align: middle;">NO ORDERS</td>
                           </tr>';
						}
						else {
							foreach ($orders as $order) {
							echo '<tr>
                           <td style="vertical-align: middle;>'. $order->getOrderId .'</td>
                           <td style="vertical-align: middle;>'. $order->getOrderDate .'</td>
                           <td style="vertical-align: middle;> $'. $order->getGrandTotal .'</td>
                           <td style="vertical-align: middle;><a href="order_item.php?orderID='. $order->getOrderId .'">View Order</a></td>
                           </tr >';
							}
						}
					  ?>
                  </table>
                  <?php echo OrderDB::orders_exist($_SESSION['userId']);
                        foreach($OrderDB::test($_SESSION['userId'])['data'] as $result) {
                           echo $result['type'], '<br>';
                       }
                  ?>
               </div>
            </div>
        </div>
      <!-- end orders -->
<?php require_once('footer.php'); ?>