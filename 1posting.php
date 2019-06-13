<?php
session_start();

// Getting user data from Session
if(isset($_SESSION['ses_usr']) AND isset($_SESSION['ses_usr'])){
    $user= $_SESSION['ses_usr'];


if (isset($_POST['submit'])) {

// print($user).'- User <br>';

// Getting the data from user input
// $ptitle= $_POST['ptitle'];
// print($ptitle).'- Title <br>';

// $ptype= $_POST['ptype'];
// print($ptype).'- Prop Type <br>';

// $ploc= $_POST['ploc'];
// print($ploc).'- Prop Loc <br>';

// $pcity= $_POST['pcity'];
// print($pcity).'- Prop City <br>';

// $phtype= $_POST['phtype'];
// print($phtype).'- Prop Hire Type <br>';

// $pcap= $_POST['pcapacity'];
// print($pcap).'- Prop Capacity <br>';

// $prule= $_POST['prule'];
// print($prule).'- Prop Rules<br>';

// $bedr= $_POST['bedroom'];
// print($bedr).'- Prop Bedroom <br>';

// $bathr= $_POST['bathroom'];
// print($bathr).'- Prop Bathroom <br>';

// $pnote= $_POST['pnote'];
// print($pnote).'- Prop Note<br>';

// $pimg= $_FILES['pimg'];
// print($pimg).'- Prop Images<br>';

// ------------------------------------------------------------------------------------------------------------------------
echo "<br>------------------------------------------------------------------------------------------------------------------------<br>";


$img = $_FILES['file'];
$date=date('H:I:S');
echo $date. "<br>";

    $j = 0;     // Variable for indexing uploaded image.

    $target_path = "../images/user_uploads/property/";     // Declaring Path for uploaded images.

    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {

        // Loop to get individual element from the array
        $validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
        $ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
        $file_extension = end($ext); // Store extensions in the variable.

        $imgName= date("h-i-s-A")."-". rand(0,5);
        echo $imgName;
        // $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
        $target_path = $target_path . $imgName . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
        $j = $j + 1;      // Increment the number of uploaded images according to the files in array.


        if (($_FILES["file"]["size"][$i] < 900000)     // Approx. 100kb files can be uploaded.
        && in_array($file_extension, $validextensions)) {

            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                    // If file moved to uploads folder.
                    echo "<br/>". $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                    echo $target_path;
            } else {     //  If File Was Not Moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {     //   If File Size And File Type Was Incorrect.
        echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
}
// btnSubmit Fails
}
// Session Fails
?>