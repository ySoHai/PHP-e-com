<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}

if(isset($_SESSION['userId'])){
    header("Location: ./account.php");
	die('Something went very wrong :(');
}

require_once('header.php');
?>
      <!--  signup -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Sign Up</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-10 offset-md-1">
			   <?php if (isset($error_signup)&&$error_signup) echo '<script>alert("Invalid input!");</script>'; ?>
                  <form id="request" class="main_form" method="post" action="../Controllers/signup.php">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Enter Email (required)" type="email" name="email" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter Phone Number (required)" type="tel" name="phoneNumber" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter First Name (required)" type="text" name="firstName" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter Last Name (required)" type="text" name="lastName" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter Address (required)" type="text" name="address" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter Password (required)" type="password" name="password" required> 
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Sign Up</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end signup -->
<?php require_once('footer.php'); ?>