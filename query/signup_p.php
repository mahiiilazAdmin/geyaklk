<?php
/**
 * Copyright (c) 2018.
 * Created by: Latheesh Mahendran
 * Email: latheeshmahendran@gmail.com
 * Contact Id: @mahiiilaz
 */

    $fname= $_POST["fname"];
    $lname= $_POST["lname"];
    $email= $_POST["email"];
    $pwd= $_POST["pass"];
    $cont= $_POST["cnum"];

    
    echo ($fname." ". $lname. " ". $email. " ". $pwd. " ".$cont);

if(isset($_POST['submit']))
{
    include("../db/db.php");
    echo $fname. $lname. $email. $pwd.$cont;
    // Checking for duplicate
    $chk="SELECT * FROM t_user WHERE u_email='$email' AND u_contact=$cont";
    // Executing the Above query
    $chR=mysqli_query($con, $chk);

    if($chR>0){
        $reg="INSERT INTO `t_user` (u_fname, u_lname, u_email, u_pass, u_contact) VALUES ('$fname', '$lname', '$email', '$pwd','$cont')";
        $result=mysqli_query($con, $reg);

        if($result>0){
            echo '<script type="text/javascript">
                alert("You have successfully sent your message, We will contact you back through email. Thank you!");
            </script>';
            // sleep (5);
            header("Location: ../login.php");
        }else{
            echo '<script type="text/javascript">
                    alert("Provided Contact Number or Email ID is already been registered. Try again with different informations.");
                    window.history.go(-1);
                </script>';
            echo "Error: ".$result."<br>";
            echo mysqli_error($con);
//        sleep (5);
        }
    }else{
        echo '<script type="text/javascript">alert("System Error!! Please Try again later!");
				window.history.go(-1);</script>';
        echo "Error: ".$chR."<br>";
        echo mysqli_error($con);
//        sleep (5);
    }




}else{
    header("Location: ../signup.php");
}