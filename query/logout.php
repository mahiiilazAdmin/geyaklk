<?php
/**
 * Copyright (c) 2018.
 * Created by: Latheesh Mahendran
 * Email: latheeshmahendran@gmail.com
 * Contact Id: @mahiiilaz
 */

session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();
if(session_destroy()==""){
    header("Location: ../login.php");
}

?>