<?php
/**
 * Copyright (c) 2018.
 * Created by: Latheesh Mahendran
 * Email: latheeshmahendran@gmail.com
 * Contact Id: @mahiiilaz
 */



//Est connection to database
session_start();
require_once("../db/db.php");

//allow only if the user clicks the login button from the login page
if(isset($_POST['login']))
{
//    get all the parameters passed into vars
$usr= $_POST['email'];
$pwd= $_POST['pass'];
//    echo $pwd. " ".$usr;

//    Security purpose to avoid system compromise
    $usr = stripslashes($usr);
    $pwd = stripslashes($pwd);

    //    Login Verification
    If($usr != " " || $pwd !=" "){

    //    Run a query to get all the users name for verification
        $sql="SELECT * FROM t_user WHERE u_email= '$usr' AND u_pass='$pwd'";
        $res=mysqli_query($con, $sql);

        if(mysqli_num_rows($res)>0){
            $usq=mysqli_fetch_assoc($res);
            $uRole=$usq['u_role'];
            $SESuid=$usq['u_id'];
            echo $uRole;
    //        while ($rows=mysqli_fetch_assoc($res)){
    //            if($rows>0){
    //                $uid=$rows['u_id'];
            if($uRole=="Admin"){
                $_SESSION['ses_usr']=$usr; // Initializing Session
                $_SESSION['ses_role']=$uRole; // Initializing Session
                $_SESSION['ses_uid']= $SESuid; // Initializing Session
                header("location: profile/index.php"); // Redirecting To Other Page
            }else{
                $_SESSION['ses_usr']=$usr; // Initializing Session
                $_SESSION['ses_role']=$uRole; // Initializing Session
                $_SESSION['ses_uid']= $SESuid; // Initializing Session
                header("location: ../index.php"); // Redirecting To Other Page
            }
        }else{
            echo "<script type='text/javascript'>alert('Username or Password is incorrect!!'); window.history.go(-1);</script>";
        }

    }else{
        echo "<script type='text/javascript'>alert('Username and Password is Required!!'); window.history.go(-1);</script>";
    }

}else{
    header("Location: login.php");
}
