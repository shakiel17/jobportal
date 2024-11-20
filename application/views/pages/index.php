<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Online Job Portal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="<?=base_url();?>design/dist/img/jobportallogo.jpg">

		<!-- CSS here -->
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/flaticon.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/price_rangs.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/slicknav.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/animate.min.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/themify-icons.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/slick.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/nice-select.css">
            <link rel="stylesheet" href="<?=base_url();?>design/assets/css/style.css">
   </head>

   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?=base_url();?>design/dist/img/jobportallogo.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="<?=base_url();?>"><img src="<?=base_url();?>design/dist/img/jobportallogo.jpg" width="199" height="64" alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">                                            
                                            <li><a href="<?=base_url();?>">Home</a></li>                                            
                                            <!-- <li><a href="about.html">About</a></li>
                                            <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="job_details.html">job Details</a></li>
                                                </ul>
                                            </li> -->
                                            <li><a href="<?=base_url();?>user_profile">Profile</a></li>
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    <?php
                                    if($this->session->user_login){
                                        ?>
                                        <a href="<?=base_url();?>user_logout" class="btn head-btn3" onclick="return confirm('Do you wish to logout?');return false();">Logout</a>
                                        <?php
                                    }else{
                                        ?>
                                        <a href="<?=base_url();?>user_signin" class="btn head-btn1">Register</a>
                                        <a href="<?=base_url();?>user_signin" class="btn head-btn2">Login</a>
                                        <?php
                                    }
                                    ?>                                    
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>
    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" style="background:url('<?=base_url();?>design/dist/img/kidapawan.jpg') no-repeat; background-size: cover;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Find the most exciting startup jobs</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- form -->
                                 <?=form_open(base_url()."search_jobs",array('class' => 'search-box'));?>
                                <!-- <form action="#" class="search-box"> -->
                                    <div class="input-form" style="width:78%;">
                                        <input type="text" placeholder="Job Tittle or keyword" required name="description">                                                                 
                                    </div>                                                                    
                                    <!-- <div class="select-form">
                                        <div class="select-itms">
                                            <select name="select" id="select1">
                                                <option value="">Location BD</option>
                                                <option value="">Location PK</option>
                                                <option value="">Location US</option>
                                                <option value="">Location UK</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="search-form">
                                        <input type="submit" name="submit" class="btn btn-primary btn-lg" style="height:70px; padding:9px 33px 9px 32px;" value="Find Job">
                                    </div>
                                    <?=form_close();?>
                                <!-- </form>	 -->
                            </div>                            
                        </div>    
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="browse-btn2 text-center mt-50">
                                        <a href="<?=base_url();?>view_all_jobs" class="border-btn2">Browse All Jobs</a>
                                    </div>
                                </div>
                            </div>                    
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Our Services Start -->        
        <!-- Our Services End -->
        <!-- Online CV Area Start -->         
        </div>
        <!-- Online CV Area End-->
        <!-- Featured_job_start -->
       
        <!-- Featured_job_end -->
        <!-- How  Apply Process Start-->
        
        <!-- How  Apply Process End-->
        <!-- Testimonial Start -->
       
        <!-- Testimonial End -->
         <!-- Support Company Start-->
        
        <!-- Support Company End-->
        <!-- Blog Area Start -->
        
        <!-- Blog Area End -->

    </main>
    <footer>
        <!-- Footer Start-->
        
        <!-- footer-bottom area -->
        <!-- <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex justify-content-between align-items-center">
                         <div class="col-xl-10 col-lg-10 ">
                             <div class="footer-copy-right">
                                 <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
 </p>
                             </div>
                         </div>
                         <div class="col-xl-2 col-lg-2">
                             <div class="footer-social f-right">
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fas fa-globe"></i></a>
                                 <a href="#"><i class="fab fa-behance"></i></a>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div> -->
        <!-- Footer End-->
    </footer>

  <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="<?=base_url();?>design/assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="<?=base_url();?>design/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="<?=base_url();?>design/assets/js/popper.min.js"></script>
        <script src="<?=base_url();?>design/assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="<?=base_url();?>design/assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="<?=base_url();?>design/assets/js/owl.carousel.min.js"></script>
        <script src=".<?=base_url();?>design/assets/js/slick.min.js"></script>
        <script src="<?=base_url();?>design/assets/js/price_rangs.js"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="<?=base_url();?>design/assets/js/wow.min.js"></script>
		<script src="<?=base_url();?>design/assets/js/animated.headline.js"></script>
        <script src="<?=base_url();?>design/assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="<?=base_url();?>design/assets/js/jquery.scrollUp.min.js"></script>
        <script src="<?=base_url();?>design/assets/js/jquery.nice-select.min.js"></script>
		<script src="<?=base_url();?>design/assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="<?=base_url();?>design/assets/js/contact.js"></script>
        <script src="<?=base_url();?>design/assets/js/jquery.form.js"></script>
        <script src="<?=base_url();?>design/assets/js/jquery.validate.min.js"></script>
        <script src="<?=base_url();?>design/assets/js/mail-script.js"></script>
        <script src="<?=base_url();?>design/assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="<?=base_url();?>design/assets/js/plugins.js"></script>
        <script src="<?=base_url();?>design/assets/js/main.js"></script>
        
    </body>
</html>
