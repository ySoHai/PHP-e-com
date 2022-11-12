<?php
//Display error codes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
$dirs = explode('/', $uri);
$app_path = '/' . $dirs[1] . '/' . $dirs[2] . '/Views/';
$controller_path = '/' . $dirs[1] . '/' . $dirs[2] . '/Controllers/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>TechTrade</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?php echo $app_path; ?>css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="<?php echo $app_path; ?>css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?php echo $app_path; ?>css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="<?php echo $app_path; ?>images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?php echo $app_path; ?>css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout inner_posituong computer_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="<?php echo $app_path; ?>images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="../index.php">TechTrade</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='index.php') echo 'active';?>">
                                 <a class="nav-link" href="<?php echo $app_path; ?>index.php">Home</a>
                              </li>
                              <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='about.php') echo 'active';?>">
                                 <a class="nav-link" href="<?php echo $app_path; ?>about.php">About</a>
                              </li>
                              <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='product.php') echo 'active';?>">
                                 <a class="nav-link" href="<?php echo $app_path; ?>product.php">Listings</a>
                              </li>
                              <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='contact.php') echo 'active';?>">
                                 <a class="nav-link" href="<?php echo $app_path; ?>contact.php">Contact</a>
                              </li>
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                              </li>
                              <?php
                              if (isset($_SESSION['user'])) {
                                 echo '<li class="nav-item d_none">
                                          <a class="nav-link" href="">My Account</a>
                                       </li>
                                       <li class="nav-item d_none">
                                          <a class="nav-link" href="' . $controller_path . 'logout.php">Logout</a>
                                       </li>';
                              } else {
                                 echo '<li class="nav-item d_none">
                                          <a class="nav-link" href="' . $app_path . 'login.php">Login</a>
                                       </li>
                                       <li class="nav-item d_none">
                                          <a class="nav-link" href="' . $app_path . 'signup.php">Sign up</a>
                                       </li>';  
                              }

                              ?>

                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->