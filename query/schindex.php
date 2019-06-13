<!-- prevent direct access -->
<?php
// DB Connection
require_once('../db/db.php');


$queProperty ="";
//echo'WORKS';

if(isset($_GET["title"]) OR isset($_GET["location"]) OR isset($_GET["property"]) OR isset($_GET["protype"])) {
//    empty query vars
    $bytitle=" ";
    $byprop=" ";
    $byhtype=" ";
    $byloca=" ";
    $byloc=" ";

//    Getting the Requested Searches into vars
    $schstr = ($_GET["title"]);
    $srloc= ($_GET["location"]);
    $srpro= ($_GET["property"]);
    $srprot= ($_GET["protype"]);


    echo $srloc. $srpro. $srprot. $schstr;

    if($schstr<>"" OR $srloc<>"" OR $srpro<>"" OR $srprot<>""){
        echo "Entered Special zone";

        if($schstr<>""){
            $bytitle=" AND t_property.p_title LIKE '%".$schstr."%'";
        }

        if($srloc<>""){
            $byloca=", t_city";
            $byloc=" AND t_property.p_cid = ".$srloc." AND t_city.c_id=".$srloc;
        }

        if($srpro<>""){
            $byprop=" AND p_type LIKE '%".$srpro."%'";
        }
        if($srprot<>""){
            $byhtype=" AND p_hiretype LIKE '%".$srprot."%'";
        }

        $queProperty = "SELECT * FROM t_property".$byloca." WHERE p_approval <>0".$byloc .$bytitle . $byprop. $byhtype."ORDER BY p_addedon DESC ";

    }
    // Queries
//    $queProperty = "SELECT * FROM t_property WHERE p_title LIKE "%$schstr%" OR p_address LIKE "%$schstr%" OR p_type LIKE "%$srpro%" OR p_hiretype LIKE "%$srprot%" ORDER BY p_addedon DESC ";
//    $queProperty = "SELECT * FROM t_property WHERE p_title LIKE %" .html_escape($schstr)."% OR p_address LIKE %".$schstr."% OR p_type LIKE %".$srpro."% OR p_hiretype LIKE %".$srprot."% ORDER BY p_addedon DESC ";


}else{
    $queProperty="SELECT p_id, p_title, p_type, p_cid, p_price FROM t_property WHERE p_approval <>0";

}

    // Connections
    $sqRe = mysqli_query($con, $queProperty);

    var_dump($sqRe);
    var_dump($queProperty);

    // Getting the property details from the Property Table
    if (mysqli_num_rows($sqRe) > 0) {
        while ($qrow = mysqli_fetch_assoc($sqRe)) {
            $ppid = $qrow['p_id'];
            $pptitle = $qrow['p_title'];
            $pptype = $qrow['p_type'];
             $ppcityid = $qrow['p_cid'];
             $ppprice = $qrow['p_price'];
            $proid = $qrow['p_id'];
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

            $pialt=" ";
            // Getting details from the Photo table
            $quePi = "SELECT * FROM t_photo WHERE pi_pid= $ppid"; //AND pi_parentid=0;
//            echo var_dump($qfea);
            $sqPi=mysqli_query($con, $quePi);

            if (mysqli_num_rows($sqPi) > 0) {
                while ($qPi = mysqli_fetch_assoc($sqPi)) {
                    $piurl = $qPi['pi_url'];
                    if($qPi['pi_alt'] !=""){
                        $pialt = $qPi['pi_alt'];
                    }

//                    echo $ffbed. ' '. $ffbat;
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
                                    '. $pptitle .' |<span class="right" style="font-size: 15px; padding: 5px;"> '. $ccname .' </span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mob-pad-set">
                            <div class="col-md-3 col-xs-3 img-col">
                                <img src="images/user_uploads/property/'. $piurl .'" alt="'. $pialt .'" class="prop-img bshadow">
                            </div>
                            <div class="col-md-7 col-xs-9 mob-fon-con">
                                <p class="card-text cardcol-1">
                                    <span class="fonbold">Property Type: </span> '. $pptype .'
                                </p>
                                <p class="card-text cardcol-2">
                                    <span class="fonbold">Bedroom: </span> '. $ffbed .'
                                    <span class="fonbold"> Bath: </span> '. $ffbat .'
                                </p>
                                <p class="card-text cardcol-3">
                                    <span class="fonbold">Price: </span> '. $ppprice .'
                                    <br />
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            ';
            // <!-- #card 1 ends -->

        }
    }else{
        echo " Search is EMPTY";
    }


?>
