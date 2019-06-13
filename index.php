<?php
session_start();
//$user="";
$usr_check="";
$usrrole_check="";

//retrive the saved session

if(isset($_SESSION['ses_usr']) AND isset($_SESSION['ses_role'])){
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
    <link rel="stylesheet" href="css/index.css">

    <style>
        .c1{
            color: red !important;
            font-weight: 900;
            /*background-color: red;*/
            /*font-size: 200px;*/
        }
        .c2{
            color: grey !important;
            font-weight: 900;
        }
        .c4{
            color: blue;
            font-weight: 900;

        }
    </style>
<?php
    //    Call connection
//    include("session.php");
    include("db/db.php");

//    check the session
   print_r($_SESSION);

//    Login & Sign up initialization




//    Queries to get Property card Details
//    -------------------------------------------------------------------------------------------------
    //    Queries to get data from database

    $qPro="SELECT * FROM t_property WHERE p_approval<>0 AND p_promo <> 1 ORDER BY RAND() LIMIT 3";
    $propR= mysqli_query($con, $qPro);
    //    $qimg="SELECT * FROM t_image";
//    $qcity="SELECT c_name FROM t_city";


    //    $imgR= mysqli_query($con, $qimg);
//    $cityR= mysqli_query($con, $qcity);



?>

    <style>
        .close{
            padding-right: 10px;
        }
    </style>

</head>

<body onload="runsch()">
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
                            <li class="active">
                                <a href="index.php">Home
                                    <span class="sr-only">(current)</span>
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
        </div>

        <!-- Search bar -->
        <div class="col-md-12">
            <div class="searchbox">
                <section class="search-sec">
                    <div class="container-fluid">
                        <div method="post" novalidate="novalidate">
                            <div class="row">
                                <div>
                                    <div>

                                        <div class="col-md-2 col-sm-12 p-0 mo-inpu-space">
                                            <input type="text" id="schtitle" class="form-control search-slt"
                                                placeholder="Search by Title">
                                        </div>

                                        <div class="col-md-2 col-sm-12 p-0 mo-inpu-space">
                                            <select class="form-control search-slt" id="schloca" onchange="runsch()">
                                                <option disabled selected value>- Location -</option>
                                                <?php
                                                $sql = "select * from `t_city`";
                                                $res = mysqli_query($con, $sql);
                                                if(mysqli_num_rows($res) > 0) {
                                                    while($row = mysqli_fetch_object($res)) {
                                                        echo "<option value='".$row->c_id."'>".$row->c_name."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-2 col-sm-12 p-0 mo-inpu-space">
                                            <select class="form-control search-slt" id="schprop" onchange="runsch()">
                                                <option disabled selected value> - Property Type - </option>
                                                <option>Annex</option>
                                                <option>Room</option>
                                                <option>Boarding</option>
                                                <option>Whole House</option>
                                                <option>Section of House</option>
                                                <option>Apartment</option>
                                            </select>
                                        </div>

                                        <div class="col-md-2 col-sm-12 p-0 mo-inpu-space">
                                            <select class="form-control search-slt" id="schprot"  onchange="runsch()">
                                                <option disabled selected value>- Property for -</option>
                                                <option>Sale</option>
                                                <option>Rent</option>
                                                <option>Lease</option>
                                            </select>
                                        </div>
                                        <div class=" col-md-2 col-sm-12 p-0 mo-inpu-space">
                                            <button id="schbtn" onclick="runsch();" class="btn btn-danger wrn-btn">Search</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- End of Search Bar -->
        </div>


        <!--        Search Result and Property card info retrival from AJAX Script-->
        <script>
            var xhttp="";

            function ajaxS(){
                //Create the Ajax
                if (window.XMLHttpRequest){
                    xhttp= new XMLHttpRequest();
                }else{
                    xhttp= new ActiveXObject("Microsoft.XMLHTTP")
                }
            }
            function runsch() {
                console.log("HERE WE ARE");
                var schtit= document.getElementById('schtitle').value;
                var schloca= document.getElementById('schloca').value;
                var schprop= document.getElementById('schprop').value;
                var schprot= document.getElementById('schprot').value;

                console.log(schloca);

                ajaxS();                

                //    Check if Response ready
                xhttp.onreadystatechange=function(){
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txthit").innerHTML = this.responseText;
                    }
                }

                if(schtit !== "" || schloca !=="" || schprop !=="" || schprot !==""){
                    // xhttp.open("GET", "query/schindex.php?q=" + schtit, true);
                    xhttp.open("GET", "query/schindex.php?title=" + schtit +'&location='+schloca +'&property='+schprop+'&protype='+schprot, true);
                    xhttp.send();
                }else{
                    xhttp.open("GET", "query/schindex.php", true);
                    xhttp.send();
                }

            }
        </script>
        <!--        Search Result AJAX Script END-->




        <!-- Property Views  -->
        <div class="container-fluid">
            <div class="col-md-12 marg-topbot">

                <!-- Breadcrumbs -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="margin-bottom: 10px;">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Library</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Property</li>
                    </ol>
                </nav>
                <!-- End of Breadcrumbs -->

                <!-- Trigger/Open The Modal -->
                <button id="trigFil" class="btn triggerBut des-hide">Filter Search</button>

                <!-- Filter panel -->
                <div class="col-md-3 col-sm-6 mo-nolpad">

                    <!-- -----------     Mobile view  ------------------------------------------- -->
                    <!-- Trigger the modal with a button -->
                    <div class="des-hide">

                        <!-- Trigger/Open The Modal -->
                        <!-- <button id="trigFil" class="btn triggerBut">Open Modal</button> -->

                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <!-- Form begins here -->
                                <form action="/action_page.php" class="form-container">
                                    <h3 class="filter-head">Filter</h3>
                                        <hr class="head-filt" />

                                        <div>
                                            <div class="panel-body filter-pad">
                                                <div class="col-md-2 col-sm-12 p-0 mo-inpu-space">
                                                    <select class="form-control search-slt"
                                                        id="exampleFormControlSelect1">
                                                        <option disabled selected value>Price</option>
                                                        <option>Colombo</option>
                                                        <option>Kandy</option>
                                                        <option>Matara</option>
                                                        <option>anything</option>
                                                        <option>Example one</option>
                                                        <option>Example one</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2 col-sm-12 p-0 mo-inpu-space">
                                                    <select class="form-control search-slt"
                                                        id="exampleFormControlSelect1">
                                                        <option disabled selected value> - Bedrooms - </option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2 col-sm-12 p-0 mo-inpu-space">
                                                    <select class="form-control search-slt"
                                                        id="exampleFormControlSelect1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                    </select>
                                                </div>
                                                <div class=" col-md-2 col-sm-12 p-0 mo-inpu-space">
                                                    <button type="button"
                                                        class="btn btn-primary wrn-btn">Filter
                                                    </button>
                                                    <button type="button" class="btn btn-cancel wrn-btn"
                                                        onclick="closeForm()">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                                <!-- Form Ends here -->
                            </div>
                        </div>

                    </div>

                    <!-- -------------------     Desktop View ----------------------------------- -->
                    <div id="accordion" class="panel panel-primary behclick-panel  bshadow mob-hide">

                        <div class="panel-heading">
                            <h3 class="panel-title">Filter Search</h3>
                        </div>

                        <div class="panel-body">


                            <div class="panel-heading ">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse0">
                                        <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Price
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse0" class="panel-collapse collapse">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                                <input type="text" class="panel-txtbox" placeholder="min"><span class="fil-tag"> .LKR</span>  - 
                                                <input type="text" class="panel-txtbox" placeholder="max"><span class="fil-tag"> .LKR</span>
                                                <button type="button" class="btn btn-primary btn-filbar">
                                                    Filter
                                                </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="panel-heading ">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1">
                                        <i class="indicator fa fa-caret-down" aria-hidden="true"></i> 
                                        Capacity
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value=""> citroen
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value=""> benz
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value=""> bmw
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse3">
                                        <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Color</a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value=""> red
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value=""> blue
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value=""> green
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse2">
                                        <i class="indicator fa fa-caret-right" aria-hidden="true"></i> Collapsible list
                                        group</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value=""> 7
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value=""> 8
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value=""> 9
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            
                        </div>
                    </div>
                </div>
                <!-- End of filter bar -->

                <!-- Property Cards -->
                <div class="col-md-6 col-xs-12" style="padding-left:0px; padding-right:0px;">


                    <?php
                    // Getting the property details from the Property Table

//                    var_dump($propR);
//                  Check if there's any results availble
                    if ($propR !== FALSE) {
//                        Display if there's any Info Retrived
//                        printf("YES");

                        if (mysqli_num_rows($propR) > 0) {
                            while ($qrow = mysqli_fetch_assoc($propR)) {
                                $ppid = $qrow['p_id'];
                                $pptitle = $qrow['p_title'];
                                $pptype = $qrow['p_type'];
                                $ppcityid = $qrow['p_cid'];
                                 $ppprice = $qrow['p_price'];
//              echo $ppid. ' '. $pptitle.' '. $pptype . " ".$ppcityid;


                                // Getting details from the City table
                                $queCity = "SELECT * FROM t_city WHERE c_id= $ppcityid";
                                $sqCity=mysqli_query($con, $queCity);

                                if (mysqli_num_rows($sqCity) > 0) {
                                    while ($qCit = mysqli_fetch_assoc($sqCity)) {
                                        $ccid = $qCit['c_id'];
                                        $ccname = $qCit['c_name'];
//                    echo $ccid. ' '. $ccname;
                                    }
                                }

                                // Getting details from the Features table
                                $quefea = "SELECT f_bedrooms, f_bathrooms FROM t_feature WHERE f_pid= $ppid";
//            echo var_dump($qfea);
                                $sqfea=mysqli_query($con, $quefea);

                                if (mysqli_num_rows($sqfea) > 0) {
                                    while ($qfea = mysqli_fetch_assoc($sqfea)) {
                                        $ffbed = $qfea['f_bedrooms'];
                                        $ffbat = $qfea['f_bathrooms'];
//                    echo $ffbed. ' '. $ffbat;
                                    }
                                }

                                // Getting details from the Photo table
                                $quePi = "SELECT * FROM t_photo WHERE pi_pid= $ppid"; //AND pi_parentid=0;
//            echo var_dump($qfea);
                                $sqPi=mysqli_query($con, $quePi);

                                if (mysqli_num_rows($sqPi) > 0) {
                                    while ($qPi = mysqli_fetch_assoc($sqPi)) {
                                        $piurl = $qPi['pi_url'];
                                        $pialt = $qPi['pi_alt'];
                                    }
                                }


// Search result
                                // <!-- Promo Card 01 begins -->
                                echo '<div>
                                        <div class=" d-none bshadow nopad" style="padding-bottom: 5px;margin-bottom: 10px;">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-head">
                                                    <a class="card-title" href="view.php?pid='.$ppid.'">
                                                        '. $pptitle .'  |<span class="right" style="font-size: 15px; padding: 5px;"> '. $ccname .' </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body mob-pad-set">
                                                <div class="col-md-3 col-xs-3 img-col">
                                                    <img src="images/user_uploads/property/'. $piurl .'" alt="'. $pialt .'" class="prop-img bshadow">
                                                </div>
                                                <div class="col-md-7 col-xs-9 mob-fon-con">
                                                    <p class="card-text cardcol-1">
                                                        <span class="c4">Property Type: </span> '. $pptype .'
                                                    </p>
                                                    <p class="card-text cardcol-2">
                                                        <span class="fa fa-bed c2"></span> '. $ffbed .'
                                                        &nbsp; &nbsp;
                                                        <span class="fa fa-bath c2"></span> '. $ffbat .'
                                                    </p>
                                                    <p class="card-text cardcol-3">
                                                        <span class="c1">Price: </span> '. $ppprice .' .LKR
                                                        <br />
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="right card-footer">
                                            <div class="promo">
                                                Promoted<i class="fas fa-star" style="font-weight: 5;"></i>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            ';
                                // <!-- #card 1 ends -->

                            }
                        }else{
//                            echo " PROMO-DISPLAY-ERROR";
                        }
                    }else{
//                        printf("!NO PROMO!");
                    }

                        ?>





                    <!-- Divider of Promo ads -->
                    <hr style="margin-top: 3px; margin-bottom: 5px;">
                    <!-- Divider of Promo ads end -->


                    <!--        The display of the search result and normal results-->
                    <div id="txthit"></div>



                </div>
                <!-- Property Cards ENDs -->
                <!-- End of Property Cards -->

                <div class="des-hide clearfix "></div>
                <!-- Clear fix Content  -->

                <!-- Banner -->
                <div class="col-md-3 col-sm-12 mo-no-pad des-rpad norpad ho-ban">
                    <div class="test">
                        <h1 class="right">Banners</h1>
                    </div>
                </div>
                <!-- End of Banner -->


            </div>
            <!-- End of Secondary section -->
        </div>


        <!-- <div class="col-md-3" style="background-color: #55595C; height: 300px;">

        </div>
         -->

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

    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("trigFil");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal 
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function closeForm() {
            modal.style.display = "none";
        }
        // =======================================================================================================================
    </script>

</body>

</html>
