<?php
session_start();

// Getting user data from Session
if(isset($_SESSION['ses_usr']) AND isset($_SESSION['ses_uid'])){
    $user= $_SESSION['ses_usr'];
    $uid= $_SESSION['ses_uid'];


    //establishing database connection
    require_once("../db/db.php");

print($user).'- User <br>';

// Getting the data from user input
$ptitle= $_POST['ptitle'];
print($ptitle).'- Title <br>';

$ptype= $_POST['ptype'];
print($ptype).'- Prop Type <br>';

$ploc= $_POST['ploc'];
print($ploc).'- Prop Loc <br>';

$pcity= $_POST['pcity'];
print($pcity).'- Prop City ID <br>';

$phtype= $_POST['phtype'];
print($phtype).'- Prop Hire Type <br>';

$pcap= $_POST['pcapacity'];
print($pcap).'- Prop Capacity <br>';

$bedr= $_POST['bedroom'];
print($bedr).'- Prop Bedroom <br>';

$bathr= $_POST['bathroom'];
print($bathr).'- Prop Bathroom <br>';

$pnote= $_POST['pnote'];
print($pnote).'- Prop Note<br>';

$pprice= $_POST['pprice'];
print($pprice).'- Prop price<br>';

$date=date('Y-m-d');

// ------------------------------------------------------------------------------------------------------------------------
    echo "<br>------------------------------------------------------------------------------------------------------------------------<br>";

//    Get the Last inserted Property ID
    $lastQ="SELECT p_id FROM t_property ORDER BY p_id DESC LIMIT 1";

    $lastR=mysqli_query($con, $lastQ);

    if(mysqli_num_rows($lastR)>0){
        $Qlst=mysqli_fetch_assoc($lastR);
        $lastpid=$Qlst['p_id'];
        echo $lastpid;
        $lastpid= $lastpid+1;
    }

var_dump($lastR);

// ------------------------------------------------------------------------------------------------------------------------
echo "<br>------------------------------------------------------------------------------------------------------------------------<br>";

// Query of Insert into table Property
$propQ= "INSERT INTO `geyaklk`.`t_property` 
(`p_id`,`p_type`, `p_address`, `p_title`, `p_hiretype`, `p_price`, `p_population`, `p_note`, `p_addedon`, `p_uid`, `p_cid`, `p_promo`) 
VALUES ($lastpid,'$ptype', '$ploc', '$ptitle', '$phtype', $pprice, $pcap, '$pnote', '$date', $uid, $pcity, 1);";

var_dump($propQ);

//Run Query
$result=mysqli_query($con, $propQ);

//    Getting the Results
    if($result>0){
        echo "Success";
        var_dump($result);

//        Enter information into the Features table
        $featQ="INSERT INTO `geyaklk`.`t_feature` (`f_bedrooms`, `f_bathrooms`, `f_pid`) VALUES ($bedr, $bathr, $lastpid);";

        $ftR=mysqli_query($con, $featQ);

//        Getting the Status of Feature
        if($ftR>0){
            echo "Success Feature";


//            Insert into Photos


            $img = $_FILES['file'];
            echo $date. "<br>";

            $j = 0;     // Variable for indexing uploaded image.

            $target_path = "../images/user_uploads/property/";     // Declaring Path for uploaded images.

            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {

                // Loop to get individual element from the array
                $validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
                $ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
                $file_extension = end($ext); // Store extensions in the variable.

                $imgName= $date."-". rand(0,50000);
                echo $imgName;

                // $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
                $j = $j + 1;      // Increment the number of uploaded images according to the files in array.


                if (($_FILES["file"]["size"][$i] < 900000)     // Approx. 100kb files can be uploaded.
                    && in_array($file_extension, $validextensions)) {

                    $path = $target_path . $imgName . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.

                    $dbPN= $imgName . "." . $ext[count($ext) - 1];  //for db

                    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $path)) {
                        // If file moved to uploads folder.
                        echo "<br/>". $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                        echo $target_path;

//                        INSERT QUERY FOR PICS
                        $picQ="INSERT INTO `t_photo` 
                        (`pi_url`, `pi_pid`, `pi_parentid`) VALUES 
                        ('$dbPN', $lastpid, $lastpid);";

                        $picR=mysqli_query($con, $picQ);

//                      Getting the Status of Feature
                        if($picR>0){
                            echo "Success Photo";
                        }


                    } else {     //  If File Was Not Moved.
                        echo $j. ').<span id="error">please try again!.</span><br/><br/>';
                    }

                } else {     //   If File Size And File Type Was Incorrect.
                    echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
                }
            }





        }else{
            echo "Failed Feature";
        }


    }else{

        echo '<script type="text/javascript">alert("System Error!! Please Try again later!");
//				window.history.go(-1);</script>';

//        echo "Error: ".mysqli_error()."<br>";
//
        echo mysqli_error($con);
//
//        sleep (5);

    }

//When post is success
    echo '<script type="text/javascript">alert("Posted Successfully!");
//				window.history.go(-1);</script>';
//header("Location: ../index.php");


echo "<br>------------------------------------------------------------------------------------------------------------------------<br>";
//
// btnSubmit Fails
}else{
    echo "Session Failed";
}
// Session Fails

?>
