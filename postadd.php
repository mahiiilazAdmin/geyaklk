<?php
    session_start();

if(isset($_SESSION['ses_usr']) AND isset($_SESSION['ses_usr'])){
    $usr_check=$_SESSION['ses_usr'];
    $usrrole_check=$_SESSION['ses_role'];
    $logout="Logout";
    $logurl="query/logout.php";

    // if($usr_check!=" ")
}else{
    header("Location: login.php");
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
    <link rel="stylesheet" href="css/posted.css">

    <style>
            .text-right {
                text-align: right;
                float: right;
            }
    
            .text-left {
                text-align: left;
                float: left;
            }
    
            .btn-sub {
                width: 100%;
                font-weight: 600;
            }
    
            .btn-sub:hover {
                width: 100%;
                background-color: #B14A1A;
                color:black;
            }
    
            .option_ls {
                width: 100%;
                height: 100%;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                color: black;
                border-radius: 4px;
                font-size: 16px;
                background-position: 10px 10px;
                background-repeat: no-repeat;
                padding: 1px 0px 1px 12px;
            }
            #map {
                height: 100%;
            }
            .gelato {
            background-color: rgb(255, 255, 255);
            margin-bottom: 20px;
        }

            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                padding-top: 60px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5px auto; /* 15% from the top and centered */
                border: 1px solid #888;
                width: 80%; /* Could be more or less, depending on screen size */
            }

            /* The Close Button */
            .close {
                /* Position it in the top right corner outside of the modal */
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            /* Close button on hover */
            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {-webkit-transform: scale(0)}
                to {-webkit-transform: scale(1)}
            }

            @keyframes animatezoom {
                from {transform: scale(0)}
                to {transform: scale(1)}
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
                            <li class="active">
                                <a href="postadd.php">Post Your Ads </a>
                                <span class="sr-only">(current)</span>
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
                            <li>
                                <a href='login.php'>
                                    Login
                                </a>
                            </li>
                            <li> <a href='signup.php'>
                                    Sign up
                                </a>
                            </li>
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
                            List your Property
                        </li>
                    </ol>
                </nav>
                <!-- End of Breadcrumbs -->
            </div>
            <!-- End of Secondary section -->

            <div class="container">
                    <!-- <div class="jumbotron gelato">
                        <h1>
                            <b>Post your add here</b> for free!</h1>
                        <p>Let the whole Island know.</p>
                    </div> -->
            </div>
                <div class="container">
                    <div class="panel panel-body bshadow">
                        <form name="poster" id="poster" class="form-horizontal" action="query/posted.php" method="post" enctype="multipart/form-data" style="padding-top:5px;">

                            <div class="col-md-6">
                                <!-- property title -->
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="ptitle">Property Title:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ptitle" placeholder="Property Title" name="ptitle" required="required">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="ptype">Property Type:</label>
                                    <div class="col-sm-10">
                                        <select class="option_ls" name="ptype" required="required">
                                            <!-- <optgroup label="Picnic"> -->
                                            <option disabled selected value> -- Property Type -- </option>
                                            <option>Annex</option>
                                            <option>Room</option>
                                            <option>Boarding</option>
                                            <option>House</option>
                                            <option>Apartment</option>
                                            <!-- </optgroup> -->
                                        </select>
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="ploc">Property Address:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="autocomplete" name="ploc" placeholder="Enter your address" required="required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pcity">City:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control search-slt" id="pcity" name="pcity">
                                            <option disabled selected value>- Location -</option>
                                            <?php
                                            require_once('db/db.php');
                                            $sql = "select * from `t_city`";
                                            $res = mysqli_query($con, $sql);
                                            if(mysqli_num_rows($res) > 0) {
                                                while($row = mysqli_fetch_object($res)) {
                                                    echo "<option value='".$row->c_id."'>".$row->c_name."</option>";
                                                }
                                            }else{
                                                echo mysqli_error($res);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="phtype">Hire Type</label>
                                    <div class="col-sm-10">
                                        <select class="option_ls" name="phtype" required="required">
                                            <!-- <optgroup label="Picnic"> -->
                                            <option disabled selected value> -- Hire Type -- </option>
                                            <option>Lease</option>
                                            <option>Rent</option>
                                            <option>Sale</option>
                                            <!-- </optgroup> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pcapacity">Property Capacity</label>
                                    <div class="col-sm-10">
                                        <select class="option_ls" name="pcapacity" required="required">
                                            <!-- <optgroup label="Picnic"> -->
                                            <option disabled selected value> -- Select -- </option>
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
                                            <!-- </optgroup> -->
                                        </select>
                                    </div>
                                </div>

<!--                                <div class="form-group">-->
<!--                                    <label class="control-label col-sm-2" for="prule">Property Rules</label>-->
<!--                                    <div class="col-sm-10">-->
<!--                                        <textarea type="text" class="form-control" id="prule" placeholder="House Rules" name="prule" rows="5"></textarea>-->
<!--                                    </div>-->
<!--                                </div>-->

                            </div>
                            <!-- div ends -->

                            <!-- NEw Div -->

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="bedroom">Bedrooms</label>
                                    <div class="col-sm-10">
                                        <select class="option_ls" name="bedroom" required="required">
                                            <!-- <optgroup label="Picnic"> -->
                                            <option disabled selected value> -- Select -- </option>
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
                                            <!-- </optgroup> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="bathroom">Bathrooms</label>
                                    <div class="col-sm-10">
                                        <select class="option_ls" name="bathroom" required="required">
                                            <!-- <optgroup label="Picnic"> -->
                                            <option disabled selected value> -- Select -- </option>
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
                                            <!-- </optgroup> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pnote">Property Summary</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="pnote" placeholder="Other facilities and everything that makes your property special."
                                        name="pnote" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="ploc">Property Price:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="autocomplete" name="pprice" placeholder="Enter Numbers only" required="required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="cphoto">Cover Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="file[]" id="pimg" class="btn btn-sub focus" required="required" accept=".jpg, .jpeg, .png" multiple="multiple" >
                                    </div>
                                </div>
                            </div>
                            <!-- div ends -->
                            <!-- Button Begins -->
                            <div class="col-md-12">
                                <button type="button" class="btn btn-sub focus" onclick="document.getElementById('id01').style.display='block'" >Submit</button>
<!--                                <button style="display: none" id="submit" class="btn btn-sub focus" type="submit">Submit</button>-->
                            </div>
                        </form>

                        <!-- The Modal -->
                        <div id="id01" class="modal">
                            <span onclick="document.getElementById('id01').style.display='none'"
                            class="close" title="Close Modal">&times;</span>

                            <!-- Modal Content -->
                            <form class="modal-content animate">
                                <div class="modal-header">
<!--                                    <img src="images/c.jpg" alt="Avatar" class="avatar">-->
                                    <h4>Do you like to reach out for more potential Travelers? Try Promoting.</h4>
                                </div>

                                <div class="body">
                                    <div class="row bmain">
                                        <a id="oneWe" class="col-md-3 modal-content modC">
                                            <p>One Week Promo</p>
                                        </a>
                                        <a id="twoWe" class="col-md-3 modal-content modC">
                                            <p>Two Week Promo</p>
                                        </a>
                                        <a id="noPromo" class="col-md-3 modal-content modC">
                                            <p>Continue without Promo</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="modal-footer" style="background-color:#f1f1f1">
                                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
<!--                                    <span class="psw">Forgot <a href="#">password?</a></span>-->
                                </div>
                            </form>
                        </div>
                    </div>
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
    <script src="js/bootbox.all.js"></script>

<script>
    $( "#noPromo" ).on( "click", function() {
        alert( "Process without Promo!?" );
        $( "#poster" ).submit();
        // document.getElementById('#poster').Submit();
    });

    $( "#oneWe" ).on( "click", function() {
        alert( "Process with One Week Promo!?" );
        window.location = 'https://payhere.lk/pay/o2ab5c903';
        // document.getElementById('#poster').Submit();
    });

    $( "#twoWe" ).on( "click", function() {
        alert( "Process with One Week Promo!?" );
        window.location = 'https://payhere.lk/pay/o5db2f995';
        // document.getElementById('#poster').Submit();
    });
    // $( "#foo" ).trigger( "click" );
    // function norm(){
    //     document.getElementById("poster").submit();
    // }
</script>
</body>

</html>
