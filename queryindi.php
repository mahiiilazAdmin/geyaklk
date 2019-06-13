<?php
                        if (mysqli_num_rows($propR) > 0) {
                            while ($qrow = mysqli_fetch_assoc($propR)) {
                                $ppid = $qrow['p_id'];
                                $pptitle = $qrow['p_title'];
                                $pptype = $qrow['p_type'];
                                 $ppcityid = $qrow['p_cid'];
                                // $ppprice = $qrow['p_price'];
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
                    
                                // Getting details from the Photo table
                                $quePi = "SELECT * FROM t_photo WHERE pi_pid= $ppid"; //AND pi_parentid=0;
                    //            echo var_dump($qfea);
                                $sqPi=mysqli_query($con, $quePi);
                    
                                if (mysqli_num_rows($sqPi) > 0) {
                                    while ($qPi = mysqli_fetch_assoc($sqPi)) {
                                        $piurl = $qPi['pi_url'];
                    //                    echo $ffbed. ' '. $ffbat;
                                    }
                                }
                    
                    
                    // Search result
                                // <!-- Promo Card 01 begins -->
                            echo'<div id="propertyNorm" class=" d-none nopad bshadow" style="padding-bottom: 5px;margin-bottom: 10px;">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-head">
                                                <a class="card-title" href="#">
                                                    '. $pptitle .' + ['. $ccname .']
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body mob-pad-set">
                                            <div class="col-md-3 col-xs-3 img-col">
                                                <img src="images/user_uploads/p_images/a15536033.jpg" alt="HOUSE HEY" class="prop-img bshadow">
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
                                                    <span class="fonbold">Price: </span> -$ppprice
                                                    <br />
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