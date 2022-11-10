<?php require_once('header.php'); ?>
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
                  <form id="request" class="main_form" method="post" action="../Controllers/signup.php">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Enter Email" type="email" name="email" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter Phone Number" type="type" name="phoneNumber" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter First Name" type="type" name="firstName" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter Last Name" type="type" name="lastName" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter Address" type="type" name="address" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Enter Password" type="password" name="password" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Confirm Password" type="password" name="confirmPassword" required> 
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