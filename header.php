<?php 
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
header('Location: logout.php');
}
?>
<!doctype html>
<html class="no-js" lang="en">
 <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Lost Ark - Free to Play MMO Action </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
 
		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/odometer.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/meanmenu.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
            .clr{
                color: #fff;
            }
            
            #myVideo {
              /*position: fixed;*/
              right: 0;
              bottom: 0;
              min-width: 100%; 
              min-height: 100%;
              width: 100%;
            }
            
            .content {
              position: absolute;
              bottom: 0;
              /*background: rgba(0, 0, 0, 0.5);*/
              color: #f1f1f1;
              width: 100%;
              padding: 20px;
              top: 50%;
              text-align: center;
            }
            
        </style>
        
	</head>
    <body>

        

        <!-- header-area -->
        <header class="header-style-four">
            <div class="header-top-area s-header-top-area" id="cookieNotice"  >
                
                <div class="container custom-container-two">
                    <div class="row align-items-center">
                        <div class="col-lg-9 d-none d-lg-block">
                            <div class="header-top-offer">
                                <img src="img/infoIcon.png"/>&nbsp;<p style="color:#fff;"> Select your cookie preferences
								</p>
								<p>We use cookies and similar tools to provide our services, understand how customers use our services so we can make improvements, and display ads.
								</p>
                               
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-social mb-3 btn-wrap">
                               <button class="btn btn-style-two" style="padding: 11px;color:#fff;" onclick="acceptCookieConsent();">Accept All </button>
                           
								
                            </div>
							
							 
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="header-four-wrap">
                <div class="container custom-container-two">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-menu menu-style-two">
                                <nav>
                                    <div class="logo">
                                        <a href="index.php"><img src="img/logo/logo1.png" alt="Logo"></a>
                                    </div>
                                    <div id="mobile-menu" class="navbar-wrap d-none d-lg-flex">
                                        <ul>
                                            <li class="show"><a href="#">Game</a>
                                                <ul class="submenu">
                                                    <li><a href="about.php">About</a></li>
                                                    <li><a href="story.php">Story</a></li>
                                                    <li ><a href="classes.php">Classes</a></li>
                                                    <li><a href="media.php">Media</a></li>
                                                    <li><a href="faq.php">FAQ</a></li>
                                                  
                                                   
                                                </ul>
                                            </li>
											  <li><a href="news.php">News</a></li>
                                            <li><a href="#">Community</a>
                                                <ul class="submenu">
                                                    <li><a href="social-feed.php"> Social Feed</a></li>
                                                    <li><a href="creator-program.php">Creator Program</a></li>
                                                    <li><a href="armory-extention.php">Armory Extension</a></li>
													 <li><a href="forum.php">Forums</a></li>
                                                </ul>
                                            </li>
                                            
                                            <li><a href="#">Support</a>
                                                <ul class="submenu">
                                                    <li><a href="server-status.php">Server Status</a></li>
                                                  
                                                </ul>
                                            </li>
                                            
                                        <?php 
                                            if(isset($_SESSION['user']))
                                            {
                                                $query1 ="select * from user where id= :em";
                                                $stm=$db->prepare($query1);
                                                $stm->bindParam(":em",$_SESSION['user']);
                                                $stm->execute();
                                                $result=$stm->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                                <li><a href="#">Welcome, <?php echo $result['name']; ?></a>
                                                    <ul class="submenu">
                                                        <li><a href="dashboard.php">View Log Data</a></li>
                                                        <li><a href="upload.php">Add Attachment</a></li>
                                                        <li><a href="view_attachment.php">View Attachment</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="logout.php">Logout</a></li>
                                        <?php
                                            }
                                        ?>
                                         
                                        </ul>
                                    </div>
                                    <div class="header-action">
                                     <a href="signin.php"> <button class="btn btn-style-two" style="padding: 11px;color:#fff;">Login</button></a>
                                      <a href="signup.php"><button class="btn btn-style-two" style="padding: 11px;color:#fff;">Sign Up</button></a>
								   </div>
                                </nav>
                            </div>
                            <div class="mobile-menu"></div>
                        </div>
                        <!-- Modal Search -->
                        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form>
                                        <input type="text" placeholder="Search here...">
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->