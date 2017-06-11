<?php
include_once 'db.php';
/**
 * Created by PhpStorm.
 * User: bmabi
 * Date: 6/9/2017
 * Time: 11:46 PM
 */

if(!empty($_GET)){ //If there is a GET data available, it means the form is used to edit old appointments
    $phoneId=$_GET['phoneId'];
    $submit="update";
    //echo $phoneId;
    $getAppintmentSql="SELECT  `mechanic`.`mechName`, `date`,`customer`.`name`, `car`.`engineNo`,`car`.`licenseNo`,`customer`.`address`,`customer`.`email` FROM `appointment` JOIN `customer` ON (`appointment`.`cusID`=`customer`.`cusId`) JOIN `car` ON (`appointment`.`carId`=`car`.`carId`) JOIN `mechanic` ON (`appointment`.`mechId`=`mechanic`.`mechId`) WHERE `appointment`.`cusID`=(SELECT `customer`.`cusId` FROM `customer` WHERE `phone`='$phoneId')";
    //echo $getAppintmentSql;
    $getAppintmentSqlQuery=mysqli_query($con,$getAppintmentSql); //get the results for selected old appointment info to be updated
    //echo $getAppintmentSqlQuery;
    if($getAppintmentSqlQuery){
        while( $res=mysqli_fetch_array($getAppintmentSqlQuery)){ //Show the info's in the form list
            $customerName= $res['name'];
            $mechanicName= $res['mechName'];
            $date=$res['date'];
            $engineNo=$res['engineNo'];
            $licenseNo=$res['licenseNo'];
            $address=$res['address'];
            $email=$res['email'];
        }
    }

    //echo $customerName.$mechanicName.$date.$engineNo.$licenseNo.$address.$email.$phoneId;
}
?>


<?php
    require '../include/header.php';
    require '../include/navBar.php' ;
?>
<div class="container">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <img src="logo.png" height="15%" width="70%" style="text-align: center;margin-left: 16%">
        <h3 id="appointmentHeader">Please Fill up to get an appointment for servicing</h3>
        <form action="registrationSave.php" method="post" enctype="multipart/form-data"> <!-- action="#" Means data of the form is submitted on the same page -->
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?php echo isset($customerName) ? $customerName:'';?>" required> <!-- if this form is used to edit or add new appointment info -->
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                <input type="text" class="form-control" name="engineNo" placeholder="Your Car Engine Number" value="<?php echo isset($engineNo) ? $engineNo:'';?>" required> <!-- if this form is used to edit or add new appointment info -->
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
                <input type="text" class="form-control" name="licenseNo" placeholder="Your Car License or Registration Number" value="<?php echo isset($licenseNo) ? $licenseNo:'';?>" required> <!-- if this form is used to edit or add new appointment info -->
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone No." value="<?php echo isset($phoneId) ? $phoneId:'';?>" required> <!-- if this form is used to edit or add new appointment info -->
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($email) ? $email:'';?>"> <!-- if this form is used to edit or add new appointment info -->
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" class="form-control" name="address" placeholder="Your Home Address" value="<?php echo isset($address) ? $address:'';?>" required> <!-- if this form is used to edit or add new appointment info -->
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="date" id="dateSelector" onchange="myJsFunction()" class="form-control" name="appointmentDate" placeholder="Select the date of your Appointment" value="<?php echo isset($date) ? $date:'';?>" required> <!-- if this form is used to edit or add new appointment info -->
            </div>
            <div class="form-group" id="mechView">
                <script>
                    // Opera 8.0+
                    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
                    // Firefox 1.0+
                    var isFirefox = typeof InstallTrigger !== 'undefined';
                    // Safari 3.0+ "[object HTMLElementConstructor]"
                    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
                    // Internet Explorer 6-11
                    var isIE = /*@cc_on!@*/false || !!document.documentMode;
                    // Edge 20+
                    var isEdge = !isIE && !!window.StyleMedia;
                    // Chrome 1+
                    var isChrome = !!window.chrome && !!window.chrome.webstore;
                    if(isFirefox){
                        $(function(){
                            // Find any date inputs and override their functionality
                            $('input[type="date"]').datepicker();
                        });
                    }
                    dateFlag=document.getElementById('dateSelector').value;
                    phoneFlag=document.getElementById('phoneNo');
                    headerChange=document.getElementById('appointmentHeader');
                    if(dateFlag==''){   //for new appointments
                        //alert("no value");
                        phoneFlag.disabled=false;  //For new appointments, input of phone no is enabled
                    }else{  //To edit old appointments
                        myJsFunction();
                        headerChange.innerHTML="Changing the current appointment information"
                        phoneFlag.disabled=true; //For editing the appointments, input of phone no is disabled as it will be used as a unique value to identify the user.
                    }
                    function myJsFunction() { //Function is used to get the list of available mechanics for appointment
                        //alert("this is date");
                        dateVar=document.getElementById("dateSelector").value;
                        mechVar=document.getElementById("mechView");
                        //alert(dateVar);
                        $.post("getMechanic.php", {dateValue: dateVar}, function(returned_data){
                            mechVar.innerHTML=returned_data; //or do whatever you like with the variable
                        });
                    }
                </script>
            </div>
            <button type="submit" class="btn btn-default" onclick="phoneFlag.disabled=false;" value="<?php echo isset($submit) ? $submit:'regSubmit';?>" name="regButton">Submit</button> <!-- To submit the info's as a new appointment info or update existing appointment -->
            <a href="admin.php" class="btn btn-primary" role="button" style="margin-left: 60%;">Admin Panel login</a>

        </form>
    </div>
    <div class="col-md-3">


    </div>
</div>
</body>
</html>
