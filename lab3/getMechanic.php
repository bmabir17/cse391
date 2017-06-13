<?php
/**
 * Created by PhpStorm.
 * User: bmabi
 * Date: 6/7/2017
 * Time: 2:40 AM
 */
    include_once 'db.php'; //get database connection link
    $dateValue=$_POST['dateValue']; //Use date to find the list of available mechanic
    echo "<label>Select Your Preffered Mechanic on</label>";
    echo $dateValue;

    //$con = mysqli_connect("localhost","abir","assassin32","mechanic_appointment");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to Mysqli:" . mysqli_connect_error();
    }else{
        //echo "connected to db";
        //$getMechSql="SELECT `mechName`,`mechId`  FROM `mechanic` WHERE 1";
        //$getMechSql="SELECT  `mechanic`.`mechName`,`mechanic`.`mechId`,COUNT(`mechanic`.`mechId`) as numOfAppointment FROM `mechanic` LEFT JOIN `appointment` ON (`mechanic`.`mechId` = `appointment`.`mechId`) GROUP BY `mechanic`.`mechId`";
        $getMechSql="SELECT `mechanic`.`mechName`,`mechanic`.`mechId`,`sub`.`date`,COUNT(`sub`.`date`) as `numOfAppointment` FROM `mechanic` LEFT JOIN (SELECT * FROM `appointment` WHERE `date`='$dateValue')sub ON (`mechanic`.`mechId` = sub.`mechId`) GROUP BY `mechanic`.`mechId`";
        $getMechSqlQuery=mysqli_query($con,$getMechSql);
        //echo $getMechSqlQuery;
        if( mysqli_num_rows($getMechSqlQuery)){ //check if there is result for the mysqli query
            $select= '<select class="form-control" name="mechanicSelect">'; //start making a selector
            //echo "in condition";
            while ($res=mysqli_fetch_array($getMechSqlQuery)){ //for every mechanic loop through the sql results
                if($res['numOfAppointment']<4){ //if a certain mechanic has jobs more than 4, he will not be shown in the available list
                    $select.='<option value="'.$res['mechId'].'">'.$res['mechName']." - has ".((int)$res['numOfAppointment'])." Jobs".'</option>';
                    //echo $res['mechName'];
                }
            }
            $select.='</select>'; //end of selector
            echo $select;
        }
    }


?>