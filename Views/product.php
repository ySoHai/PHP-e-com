<?php
	require_once('header.php');
	require_once('../Models/product_db.php');
	$productDB = new ProductDB();
	$products = $productDB->get_products();
?>
      <!-- products -->
      <div  class="products">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Listings</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="our_products">
                     <div class="row">
					 <?php
						foreach ($products as $product) {
							echo '<div class="col-md-4 margin_bottom1">
							   <div class="product_box">
								  <h3>'.$product->getName().'</h3>
								  <p>'.$product->getDescription().'<br><b>$'.$product->getPrice().'</b></p>
							   </div>
							</div>';
						}
					  ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end products -->
<?php require_once('footer.php'); ?>
