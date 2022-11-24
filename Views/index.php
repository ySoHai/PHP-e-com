<?php
	require_once('header.php');
	require_once('../Models/database.php');
	require_once('../Models/category.php');
	require_once('../Models/category_db.php');
	$catDB = new CategoryDB();
	$cats = $catDB->get_categories();
?>
      <!-- banner -->
      <section class="banner_main">
         <div id="banner1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#banner1" data-slide-to="0" class="active"></li>
               <li data-target="#banner1" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="text-bg">
                                 <span>TechTrade</span>
                                 <h1>Sell</h1>
                                 <p>Sell new and used items that you do not need anymore!</p>
                                 <a href="account.php">My account</a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="text_img">
                                 <figure><img src="<?php echo $app_path; ?>images/pct.png" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="text-bg">
                                 <span>TechTrade</span>
                                 <h1>Buy</h1>
                                 <p>Get great items for the best price!</p>
                                 <a href="product.php">Login</a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="text_img">
                                 <figure><img src="<?php echo $app_path; ?>images/pct.png" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
         </div>
      </section>
      <!-- end banner -->
      <!-- three_box -->
      <div class="three_box">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="box_text">
                     <i><img src="<?php echo $app_path; ?>images/thr.png" alt="#"/></i>
                     <h3>Sell</h3>
                     <p>Sell new and used items that you do not need anymore!</p>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="box_text">
                     <i><img src="<?php echo $app_path; ?>images/thr2.png" alt="#"/></i>
                     <h3>Buy</h3>
                     <p>Get great items for the best price!</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- three_box -->
      <!-- products -->
      <div  class="products">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Categories</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="our_products">
                     <div class="row">
						<?php
							foreach ($cats as $cat) {
								echo '<div class="col-md-4 margin_bottom1"><a href="product.php?cat='.$cat->getID().'">
								   <div class="product_box">
									  <h3>'.$cat->getDescription().'</h3>
								   </div></a>
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
      <!-- laptop  section -->
      <div class="laptop" style="margin-top: 0px;">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="titlepage">
                     <p>List your own items</p>
                     <h2>for FREE !</h2>
                     <a class="read_more" href="addlisting.php">Add Listing</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="laptop_box">
                     <figure><img src="<?php echo $app_path; ?>images/pc.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- end laptop  section -->
<?php require_once('footer.php'); ?>
