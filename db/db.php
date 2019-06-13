<?php
/**
 * Created by PhpStorm.
 * User: Latheesh Mahendran
 * Date: 23/06/2018
 * Time: 06:12 AM
 */

//variables being created
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "geyaklk";


//connection established
$con= new mysqli($servername, $username, $password, $dbname);

//check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
    echo "<script>console.log('Connected successfully!');</script>";

//    Google API KEY from HIvix project
    // $apiKey="AIzaSyCfk-4A7YDQ5baAFfNZkUdRobxoRk2f8Kw";
}
?>