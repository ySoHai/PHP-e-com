<?php 
session_start();

if(isset($_SESSION['userId'])){
	header("Location: ./account.php");
	die('Something went very wrong :(');
}

require_once('header.php');
?>
      <!--  login -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Login</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-10 offset-md-1" style="margin-bottom: 15px;">
				<?php if (isset($error_login)&&$error_login) echo '<script>alert("Invalid input!");</script>'; ?>
                  <form id="request" class="main_form" method="post" action="../Controllers/login.php">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Enter Email (required)" type="type" name="email" required>
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter Password (required)" type="password" name="password" required> 
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Login</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
			<br>
         </div>
      </div>
      <!-- end login -->
<?php require_once('footer.php'); ?>