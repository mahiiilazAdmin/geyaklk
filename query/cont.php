<?php

//Get all the info inserted by the user in the contact.php
$fname= $_POST["cname"];
$mail= $_POST["cmail"];
$contact= $_POST["ccont"];
$mesg= $_POST["cmesg"];
echo var_dump($fname);
//disable direct access to this page unless user clicks the submit from the contact.php page.
if(isset($_POST['submit']))
{
    //establishing database connection
    require_once("../db/db.php");

//    Removing special characters and unnecessary spaces for security purposes
    $fname = stripslashes($fname);
    $fname = mysqli_real_escape_string($con, $fname);

    $mail = stripslashes($mail);
    $mail = mysqli_real_escape_string($con, $mail);

    $contact = stripslashes($contact);
    $contact = mysqli_real_escape_string($con, $contact);

    $mesg = stripslashes($mesg);
    $mesg = mysqli_real_escape_string($con, $mesg);

    $query="INSERT INTO `t_subscribe` (co_fname, co_email, co_number, co_msg) VALUES ('$fname', '$mail', '$contact', '$mesg')";
    $result=mysqli_query($con, $query);

    if($result>0){
        echo "<script type='text/javascript'>alert('You have successfully sent your message, We will contact you back through email. Thank you!');</script>";

        sleep (5);
    }else{

        echo '<script type="text/javascript">alert("System Error!! Please Try again later!");
				window.history.go(-1);</script>';

        echo "Error: ".$query."<br>";
//
        echo mysqli_error($con);
//
        sleep (5);

    }


//    			redirection the signedup users to Login page
    header("Location: ../index.php");

}else{
    header("Location: ../contact.php");
}
?>
