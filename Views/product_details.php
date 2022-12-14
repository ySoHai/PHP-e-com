<?php 
require_once('header.php');
require_once('../Models/database.php');
require_once('../Models/product.php');
require_once('../Models/product_db.php');

$product = ProductDB::get_product_by_id($_GET['id']);

$date = date("Y/m/d");
?>
      <div class="about">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="titlepage">
                     <h2><?php echo $product->getName(); ?></h2>
                     <p><b>Price: </b><?php echo '$' . $product->getPrice() . ' (' . $product->getQualityS() . ')'; ?><br>
                     <b>Description: </b><?php echo $product->getDescription(); ?><br>
					 <b>Quantity: </b><?php echo $product->getQuantity() . ' available'; ?><br>
                     <b>Expected ship date: </b><?php echo date('Y-m-d', strtotime($date. ' + '.$product->getShip_days().' days')); ?></p>
					<?php if ($product->getQuantity()>=1) echo '<form action="../Controllers/cart.php" method="GET">
						<input name="action" type="hidden" value="add">
						<input name="quantity" type="number" value="1" min="1" max="'.$product->getQuantity().'" step="1" style="border: none;" class="read_more">
						<input name="item" type="hidden" value="'.$_GET['id'].'">
						<input type="submit" style="border: none;" class="read_more" value="Add to cart">
						</form>';
					?>
					 <br><br><a class="read_more" style="background-color: transparent; border: #48ca95 solid 2px; color: #48ca95!important;" href="product.php">Show Listings</a>
				  </div>
               </div>
               <div class="col-md-7">
               </div>
            </div>
         </div>
      </div>
      </div>
<?php require_once('footer.php'); ?>