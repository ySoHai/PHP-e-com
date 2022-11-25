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
                     <h4><b><?php echo 'Price: ' . '$' . $product->getPrice() . ' (' . $product->getQualityS() . ')'; ?></b></h4>
                     <p><b>Description: </b><?php echo $product->getDescription(); ?></p>
					 <p><b>Quantity: </b><?php echo $product->getQuantity() . ' available'; ?></b></p>
                     <p><b>Expected ship date: </b><?php echo date('Y-m-d', strtotime($date. ' + '.$product->getShip_days().' days')); ?></p>
                     <a class="read_more" href="">Add to cart</a> <a class="read_more" href="product.php">Show Listings</a>
                  </div>
               </div>
               <div class="col-md-7">
               </div>
            </div>
         </div>
      </div>
      </div>
<?php require_once('footer.php'); ?>