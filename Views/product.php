<?php
	require_once('header.php');
	require_once('../Models/database.php');
	require_once('../Models/product.php');
	require_once('../Models/product_db.php');
	if (isset($_GET["cat"])) $products = ProductDB::get_product_by_category($_GET["cat"]);
	else $products = ProductDB::get_active_products();
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
						if (empty($products)) {
							echo '<div class="col-md-12">
								   <div class="product_box">
									  <h4>NO LISTINGS</h4>
								   </div>
								</div>';
						}
						else {
							foreach ($products as $product) {
								echo '<div class="col-md-4">
								   <div class="product_box">
									  <h4><a href="product_details.php?id='.$product->getID().'">'.$product->getName().'</a></h4>
									  <p><b>$'.$product->getPrice().' ('.$product->getQualityS().')</b><br>'.$product->getQuantity().' available</p>
								   </div>
								</div>';
							}
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
