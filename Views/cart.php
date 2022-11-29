<?php
require_once('header.php'); 
require_once('../Models/database.php');
require_once('../Models/product.php');
require_once('../Models/product_db.php');
$date = date("Y/m/d");
?>
      <!--  orders -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>My Cart</h2>
                  </div>
                  <table class="table table-hover table-striped table-dark">
                     <tr class="thead-dark">
                        <th scope="col">Item</th>
                        <th scope="col">Quantity</th>
						<th scope="col">Expected ship date</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                     </tr>
					 <?php
					 $price = 0;
					 if (empty($_SESSION['cart'])) {
						echo '<tr>
							   <td colspan="5" style="vertical-align: middle;">NO ITEMS</td>
							   </tr>';
					 }
					 else {
						foreach ($_SESSION['cart'] as $index => $item) {
							$product = ProductDB::get_product_by_id($item[0]);
							$price += $product->getPrice();
							echo '<tr>
							   <td style="vertical-align: middle;">'. $product->getName() .'</td>
							   <td style="vertical-align: middle;">'. $item[1] .'</td>
							   <td style="vertical-align: middle;">'. date('Y-m-d', strtotime($date. ' + '.$product->getShip_days().' days')).'</td>
							   <td style="vertical-align: middle;">$'. $product->getPrice().'</td>
							   <td style="vertical-align: middle;"><a class="read_more" href="../Controllers/cart.php?action=remove&index='.$index.'">Remove</a></td>
							   </tr>';
						}
					 }
					 ?>
					    <tr class="thead-dark">
					       <th scope="col" style="vertical-align: middle;">Subtotal</th>
						   <th scope="col" style="vertical-align: middle;"></th>
						   <th scope="col" style="vertical-align: middle;"></th>
					       <th scope="col" style="vertical-align: middle;">$<?php echo $price ?></th>
						   <th scope="col" style="vertical-align: middle;"><a class="read_more" href="../Controllers/cart.php?action=order">Place order</a></th>
					    </tr>
                  </table>
               </div>
            </div>
        </div>
      <!-- end orders -->
<?php require_once('footer.php'); ?>