<?php 
session_start();

if(!isset($_SESSION['userId'])){
	header("Location: ./login.php");
	die('Something went very wrong :(');
}

require_once('header.php');
require_once('../Models/database.php');
require_once('../Models/category_db.php');
require_once('../Models/category.php');
$categories = CategoryDB::get_categories();
?>
      <!--  add listing -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Add Listing</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-10 offset-md-1" style="margin-bottom: 15px;">
			   <?php if (isset($error_listing)&&$error_listing) echo '<script>alert("Please try again!");</script>'; ?>
                  <form id="request" class="main_form" method="post" action="../Controllers/list.php">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Product Name" type="type" name="prodName" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Product Description" type="type" name="prodDesc" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="List Price" type="number" name="price" min="1" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Sale Quantity" type="number" name="quantity" min="1" required> 
                        </div>
                        <div class="col-md-12">
                           <label for="New" style="color:white;font-size:1.2rem;line-height:1.1;display:grid;grid-template-columns:1em auto;gap:0.5em;">New</label>
                           <input id="New" class="contactus" type="radio" name="quality" value="1" style="width:1.15em;height:1.15em;border-radius:50%;">
                           <label for="Used" style="color:white;font-size:1.2rem;line-height:1.1;display:grid;grid-template-columns:1em auto;gap:0.5em;">Used</label>
                           <input id="Used" class="contactus" type="radio" name="quality" value="0" checked style="width:1.15em;height:1.15em;border-radius:50%;">
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Days to Ship" type="number" name="shipDays" min="1" required> 
                        </div>
                        <div class="col-md-12">
                           <label for="Category" style="color:white; font-size:1.2em;">Category</label>
                           <select class="contactus" id="Category" name="category" required>
                              <?php foreach($categories as $category) : ?>
                                 <option value="<?php echo $category->getID(); ?>" style="color:black;">
                                       <?php echo $category->getDescription(); ?>
                                 </option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">List Product</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
        </div>
      <!-- end add listing -->
<?php require_once('footer.php'); ?>