<?php 
   require_once('header.php'); 
	require_once('../Models/database.php');
	require_once('../Models/order.php');
	require_once('../Models/order_db.php');
   //require_once('../Models/order_item.php');
   if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

   $orders = OrderDB::get_orders($_SESSION['userId']);
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
                     </tr>
                     <?php
						if (empty($orders)) {
							echo '<tr>
                           <td>NO </td>
                           <td>ORDERS</td>
                           <td>MADE</td>
                           </tr>';
						}
						else {
							foreach ($orders as $order) {
							echo '<tr>
                           <td>'. $order->getOrderId .'</td>
                           <td>'. $order->getOrderDate .'</td>
                           <td>'. $order->getGrandTotal .'</td>
                           </tr>';
							}
						}
					  ?>
                  </table>
               </div>
            </div>
        </div>
      <!-- end orders -->
<?php require_once('footer.php'); ?>