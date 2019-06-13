<?php
session_start();
//$user="";
$usr_check="";
$usrrole_check="";

//retrive the saved session

if(isset($_SESSION['ses_usr']) AND isset($_SESSION['ses_usr'])){
    $usr_check=$_SESSION['ses_usr'];
    $usrrole_check=$_SESSION['ses_role'];
    $logout="Logout";
    $logurl="query/logout.php";

    // if($usr_check!=" ")
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css"
        integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/stylezzz.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobi.css">
    <link rel="stylesheet" href="css/font.css">

    <style>
        .text-right {
            text-align: right;
            float: right;
        }

        .text-left {
            text-align: left;
            float: left;
        }

        label,
        .lbl {
            /* font-style: oblique; */
            font-weight: 700;
            color: black;
        }

        @media only screen and (min-width: 560px) {
            html {
                background: url(images/cont.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        }

        body {
            background: url(images/cont.jpg) no-repeat center;
        }

        .gelato {
            background-color: rgb(189, 111, 47);
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <row>
        <div class="col-md-12 nopad">
            <nav class="navbar navbar-inverse  navbar-static-top nomarg" style="margin: 0px;">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse-1" aria-expanded="false">
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
                                <a href="index.php">Home
                                </a>
                            </li>
                            <li>
                                <a href="postadd.php">Post Your Ads </a>
                            </li>
<!--                            <li>-->
<!--                                <a href="#">Build Your House</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">Housing Loan</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">Hardware Items</a>-->
<!--                            </li>-->
                            <li class="active">
                                <a href="contact.php">Contact Us</a>
                                <span class="sr-only">(current)</span>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Login Link -->
                            <?php
                            echo '<li>';
                            if($usr_check !="" && $usrrole_check!=""){   //If the Session is not empty
                                echo"<li><a href='profile/profile.php'>$usr_check</a></li>";
                                echo"<li><a href='query/logout.php'>Logout</a></li>";
                            }else{
                                echo "</li>
                                        <!-- Login Link End -->
                                        <!-- Sign up -->
                                        <li>
                                            <a href='login.php'>
                                                Login
                                            </a>
                                        </li>
                                        <li>
                                            <a href='signup.php'>
                                                Sign up
                                            </a>
                                        </li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            <!-- Navigation bar ends -->

            <!-- Main -->
        </div>

        <!-- Main -->
        <div class="container-fluid">
            <div class="col-md-12 marg-topbot">

                <!-- Breadcrumbs -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="margin-bottom: 10px;">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Contact us
                        </li>
                    </ol>
                </nav>
                <!-- End of Breadcrumbs -->
            </div>
            <!-- End of Secondary section -->

            <!-- Contact us body -->
            <div class="container col-md-6 col-md-push-3 gelato " style="opacity: 0.7 ">
                <h2 class="lbl lora "> Contact Geyak.lk</h2>
                <hr />
                <form method="post" action="query/cont.php">
                    <div class="form-group ">
                        <label for="First Name ">Full Name:</label>
                        <input type="text " class="form-control" id="xname" name="cname"
                            placeholder="Enter Full name " required="true">
                    </div>

                    <div class="form-group ">
                        <label for="email ">Email:</label>
                        <input type="email " class="form-control " id="xmail " name="cmail" placeholder="Enter email"
                            required="true">
                    </div>

                    <div class="form-group ">
                        <label for="Contact No ">Contact #No:</label>
                        <input type="text " class="form-control " id="xcont" name="ccont" placeholder="Enter Mobile Number">
                    </div>

                    <div class="form-group ">
                        <label for="Comment ">Message:</label>
                        <textarea class="form-control " rows="7 " id="xmesgoi9 " name="cmesg" 
                        placeholder="For reporting or any inquires. If your reporting about any posts, please specify the ID"
                        required="true"></textarea>
                    </div>
                    <button type="submit " name="submit" class="btn btn-default focus ">Submit</button>
                </form>
                <br>
            </div>

        </div>


    </row>
    </div>

    <!-- Site footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">LA LA LA <i>CODE WANTS TO BE SIMPLE </i> is an initiative to help the
                        upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or
                        snippets as the code wants to be simple. We will help programmers build up concepts in different
                        programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android,
                        SQL and Algorithm.</p>
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

</body>

</html>
