<?php
session_start();
require_once('db/db.php');

if(isset($_SESSION['ses_usr']) AND isset($_SESSION['ses_role']) AND isset($_SESSION['ses_uid'])){
    $uid= $_SESSION['ses_uid'];
    $pid=$_GET['pid'];

    $usr_check=$_SESSION['ses_usr'];
    $usrrole_check=$_SESSION['ses_role'];
    $logout="Logout";
    $logurl="query/logout.php";

    // if($usr_check!=" ")
    /** @var TYPE_NAME $pid */
    echo /** @lang text */
        $pid . "<br> PID " ."<br>";
}
//Property and Features only

$QuePro="SELECT * from t_property, t_feature WHERE t_property.p_id= $pid AND t_feature.f_pid=t_property.p_id;";
$resPro=mysqli_query($con, $QuePro);

if (mysqli_num_rows($resPro) > 0) {
    while ($qPro = mysqli_fetch_assoc($resPro)) {
        $title= $qPro['p_title'];
        $addedon= $qPro['p_addedon'];
        $ptype= $qPro['p_type'];
        $phtype= $qPro['p_hiretype'];
        $bed= $qPro['f_bedrooms'];
        $bath= $qPro['f_bathrooms'];
        $price= $qPro['p_price'];
        $notes= $qPro['p_note'];
    }

    var_dump($QuePro);
    var_dump($resPro);

}

$qusr="SELECT u_fname, u_lname from t_user WHERE u_id=$uid";
$resU=mysqli_query($con, $qusr);

if (mysqli_num_rows($resU) > 0) {
while ($Ures = mysqli_fetch_assoc($resU)) {
    $name= $Ures['u_fname']. " " . $Ures['u_lname'] ;
}}


//Images
$qImg="SELECT * FROM t_photo WHERE pi_pid=$pid";
$resImg=mysqli_query($con, $qImg);


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
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobi.css">
    <link rel="stylesheet" href="css/font.css">

</head>

<body>
    <div class="col-md-12 nopad">
        <nav class="navbar navbar-inverse  navbar-static-top nomarg" style="margin: 0;">
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
                            <a href="index.php">
                                Home
                            </a>
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
        <div class="container">

            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="margin-bottom: 10px;">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View Property ..Name..</li>
                </ol>
            </nav>
            <!-- End of Breadcrumbs -->

            <!-- Main panel -->
            <div class="panel bshadow" style="margin-top: 0;">
                <!-- panel head -->
                <div class="panel-heading">
                    <!-- <a class="right a-promo">Promote this ad</a> -->
                    <h1 class="title-txt"><?php echo $title;?></h1>
                    <!-- <p class="item-intro cardcol-2">
                            <span class="date"> Posted on: 5 Apr 4:44 pm</span><br />
                            <span class="poster">For rent by Sifar. </span>
                            <span class="location">Kolonnawa, Colombo</span>
                        </p> -->
                </div>
                <!-- panel head end-->
            </div>
            <!-- Main panel end -->

            <!-- Panel body -->
            <div class="panel panel-body">
                <!-- Image box -->
                <div class="col-md-8 col-xs-12">
                    <div id="slider">
                        <a href="#" class="control_next"><span class="fa fa-arrow-alt-circle-right"/></a>
                        <a href="#" class="control_prev"><span class="fa fa-arrow-alt-circle-left"/></a>


                        <ul>
                <?php
                        if (mysqli_num_rows($resImg) > 0) {
                        while ($ires = mysqli_fetch_assoc($resImg)) {
                            echo "
                            
                            <li>
                            <img class='img-responsive slimage'
                                    src='images/user_uploads/property/".$ires['pi_url']."' alt='images'></li>
                            
                            ";
                        }
                        }
                ?>
                        </ul>


                    </div>
                </div>
                <!-- Image box end-->


                <div class="col-md-4 col-xs-12" style="border-left: 50px;">
                    <!-- <div class=""> -->
                    <!-- Banner -->
                    <div class="mo-no-pad nopad">
                        <!-- <div class=""> -->

                        <div class="tile">
                            <div class="wrapper">
                                <div class="header">Contact Seller

                                </div>
                                <div class="dates">
                                    <div class="start">
                                        <strong>Posted by:</strong>
                                        <?php echo $name;?>
                                        <span></span>
                                    </div>
                                    <div class="ends">
                                        <strong>Posted on:</strong>
                                        <?php echo $addedon;?>
                                    </div>
                                </div>

                                <!-- Row 1 -->
                                <div class="stats">

                                    <div>
                                        <strong>Property Type</strong> <?php echo $ptype;?>
                                    </div>

                                    <div>
                                        <strong>Hire Type</strong> <?php echo $phtype;?>
                                    </div>

                                </div>

                                <!-- Row 2 -->
                                <div class="stats">

                                    <div>
                                        <strong>Baths</strong> <?php echo $bath;?>
                                    </div>

                                    <div>
                                        <strong>Bedrooms</strong> <?php echo $bed;?>
                                    </div>
                                </div>

                                <!-- Row 3 -->
                                <div class="wrapper header">

<!--                                    <div>-->
<!--                                        <strong>Ratings</strong><i class="fa fa-star">3</i>-->
<!--                                    </div>-->

                                    <div style="color: #0f0f0f;background-color: #F7F8FA;">
                                        <strong>Price</strong> <?php echo $price;?> .LKR
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End of Banner -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Panel body -->


    <div class="row">

        <!-- Feature Summary Box -->
        <div class="container">
            <div class="col-md-12 dt-nolpad dt-norpad">
                <div class="panel panel-default" style="height: auto;">
                    <div class="panel-heading">
                        <h4>
                            <b>Additional Features | Available </b>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <article class="text-justify">
                            <p>
                                <?php echo $notes;?>
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Summary Box Ends -->

        <!-- Property Rules Box -->
        <div class="container">
            <div class="col-md-12 nopad">
                <div class="panel panel-default" style="height: 50%;">
                        <div class="panel-footer gelato">
                                <article class="text-justify well">
                                    <b class="label-danger"><strong>:: Important Notice: </strong></b> This ad has been posted on Royalty.com by the below mentioned advertiser. Royalty.com does not have any connection with this advertiser, nor do we vet the advertisers, guarantee their
                                    services, responsible for the accuracy of the ad's content or are responsible for services provided by the advertisers. Royalty.com does not provide any service other than list the advertisements posted by advertisers. You will be
                                    contacting the advertiser (owner/agent) of this property directly. We advise you to take precaution when making any payments or signing any agreements and be alert of any possible scams. If making any payments we recommend that you
                                    have two permanent & verified methods of contact of the payment receiver such as their landline number and home/business address.
                                </article>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property Rules Box Ends -->

    <span class="clearfix"></span>

    <!-- Site footer -->
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

    <!-- Script for Image Slider -->
    <script>
        jQuery(document).ready(function ($) {

            var slideCount = $('#slider ul li').length;
            var slideWidth = $('#slider ul li').width();
            var slideHeight = $('#slider ul li').height();
            var sliderUlWidth = slideCount * slideWidth;

            $('#slider').css({
                width: slideWidth,
                height: slideHeight
            });

            $('#slider ul').css({
                width: sliderUlWidth,
                marginLeft: -slideWidth
            });

            $('#slider ul li:last-child').prependTo('#slider ul');

            function moveLeft() {

                $('#slider ul').animate({
                    left: +slideWidth
                }, 200, function () {
                    $('#slider ul li:last-child').prependTo('#slider ul');
                    $('#slider ul').css('left', '');
                });
            };

            function moveRight() {
                // $slider.preventDefault();
                $('#slider ul').animate({
                    left: -slideWidth
                }, 200, function () {
                    $('#slider ul li:first-child').appendTo('#slider ul');
                    $('#slider ul').css('left', '');
                });
            };

            $('a.control_prev').click(function () {
                moveLeft();
                return false;
            });

            $('a.control_next').click(function () {
                moveRight();
                return false;
            });

        });
    </script>
</body>

</html>
