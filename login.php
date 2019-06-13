<?php
    if(isset($_SESSION)){
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="houses for rental and sale">
    <meta name="author" content="@mahiiilaz">

    <!--	Favicon-->
    <link rel="icon" type="image/png" href="images/logo/favicon.ico">

    <title>Build- 0001</title>

    <!--Style Sheets-->
    <link rel="stylesheet" href="css/bs/bootstrap.min.css">
    <link rel="stylesheet" href="css/bs/bootstrap.css">
    <link rel="stylesheet" href="fonts/FontAwesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/stylezzz.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobi.css">
    <link rel="stylesheet" href="css/font.css">
    
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> -->
    <!--===============================================================================================-->	
        <!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
    <!--===============================================================================================-->
        <!-- <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> -->
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/log-util.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
    <!--===============================================================================================-->

</head>

<body>
    <row>
        <div class="col-md-12 nopad">
            <nav class="navbar navbar-inverse  navbar-static-top nomarg" style="margin: 0px;">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php" id="brando">
                            <span class="brando">BUILD.LK</span>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="postadd.php">Post Your Ads </a>
                            </li>
                            <li>
                                <a href="#">Build Your House</a>
                            </li>
                            <li>
                                <a href="#">Housing Loan</a>
                            </li>
                            <li>
                                <a href="#">Hardware Items</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li  class="active">
                                <a href='login.php'>
                                    <!-- <i class='fa fa-sign-in-alt'></i> -->
                                    Login
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li> <a href='signup.php'>
                                    Sign up
                                    <!-- <i class='fa fa-sign-in-alt'> </i> -->
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            <!-- Navigation bar ends -->
        </div>


            <!-- Main -->
            <!-- Breadcrumbs -->
            <div class="container-fluid">
                <div class="col-md-12">
            
                    <!-- Banner -->
                    <!-- <div class="col-md-3 col-sm-12 mo-no-pad des-rpad">
                        <div class="test">
                            <h1 class="right">Banners</h1>
                        </div>
                    </div> -->
                    <!-- End of Banner -->
                    
                    <div class="limiter">
                        <div class="container-login100">
                            <div class="wrap-login100 bshadow">
                                <div class="login100-pic js-tilt" data-tilt>
                                    <img src="images/user_uploads/p_images/729d6a3f41e397f0a24226e18336f8479314348.jpg" alt="IMG">
                                </div>
                
                                <form action="query/login_p.php" method="post" class="login100-form validate-form">
                                    <span class="login100-form-title">
                                        Login to Build
                                    </span>
                
                                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                        <input class="input100" type="text" name="email" placeholder="Email">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </span>
                                    </div>
                
                                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                        <input class="input100" type="password" name="pass" placeholder="Password">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    
                                    <div class="container-login100-form-btn">
                                        <input type="submit" name="login" id="login" value="Login" class="login100-form-btn">
                                    </div>
                
                                    <div class="text-center p-t-12">
                                        <span class="txt1">
                                            Forgot
                                        </span>
                                        <a class="txt2" href="#">
                                            Username / Password?
                                        </a>
                                    </div>
                
                                    <div class="text-center p-t-5">
                                        <a class="txt2" href="signup.php">
                                            Create your Account
                                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Secondary section -->
            </div>


            <!-- <div class="col-md-3" style="background-color: #55595C; height: 300px;">

        </div>
         -->
    </row>
    </div>

    <!-- Site footer -->
    <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6>About</h6>
              <p class="text-justify">LA LA LA <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
            </div>
  
            <div class="col-xs-6 col-md-3">
              <h6>Categories</h6>
              <ul class="footer-links">
                <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
                <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
                <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
                <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
              </ul>
            </div>
  
            <div class="col-xs-6 col-md-3">
              <h6>Quick Links</h6>
              <ul class="footer-links">
                <li><a href="http://scanfcode.com/about/">About Us</a></li>
                <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
              </ul>
            </div>
          </div>
          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
           <a href="#">@mahiiilaz</a>.
              </p>
            </div>
  
            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>   
              </ul>
            </div>
          </div>
        </div>
  </footer>


    <!--Script-->
    <!--<script src="js/bs/bootstrap.bundle.js"></script> -->
    <script src="js/script.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bs/bootstrap.js"></script>
    <script src="js/bs/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
    </script>
    <!--===============================================================================================-->
	<script src="js/login.js"></script>
</body>

</html>