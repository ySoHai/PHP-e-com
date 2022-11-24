<?php require_once('header.php'); 
require_once ('../Models/user_class.php');
require_once('../Models/database.php');

if(isset($_SESSION['userId'])){
   $user = new User((int)$_SESSION['userId']);
}else{
   echo '<script>alert("Not Login In!");</script>';
}


?>
      <!--  account -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>My Account</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="three_box">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="box_text">
                                 <h3>My Infomation</h3>
                                    <p>
                                       <b>Email:</b> <?php echo $user->getEmail(); ?> <br>
                                       <b>First Name:</b> <?php echo $user->getFName(); ?> <br>
                                       <b>Last Name:</b> <?php echo $user->getLName(); ?> <br>
                                       <?php if($user->getPhone()!= ''){
                                                echo '<b>Phone Number:</b>' .$user->getPhone(). '<br>';
                                             }?>
                                       <b>Address:</b> <?php echo $user->getAdd(); ?> <br>
                                    </p>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="box_text">
                                 <li class="nav-item">
                                    <a class="nav-link h3" href="addlisting.php"><b>List An item</b></a>
                                 </li>
                                 <li class="nav-item">   
                                    <a class="nav-link h3" href="listing.php"><b>My Listings</b></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link h3" href="order.php"><b>My Orders</b></a>
                                 </li>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="three_box"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- end account -->
<?php require_once('footer.php'); ?>