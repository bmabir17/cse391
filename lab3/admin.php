<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>

</head>

<body>
<?php require '../include/library.php'; ?>
<?php require '../include/navBar.php'; ?>
<div class="container">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <?php
        /**
         * Created by PhpStorm.
         * User: bmabi
         * Date: 6/7/2017
         * Time: 2:40 AM
         */
        include_once 'db.php';

        echo "<h3 style='text-align: center;'>Client Appoint Schedule List</h3>";

        //$con = mysqli_connect("localhost","abir","assassin32","mechanic_appointment");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to Mysqli:" . mysqli_connect_error();
        }else {
            $getMechSql="SELECT * FROM `appointment` RIGHT JOIN `customer` ON (`customer`.`cusId` = appointment.`cusId`) LEFT JOIN `mechanic` on (`appointment`.`mechId`=`mechanic`.`mechId`) LEFT JOIN `car` on (`appointment`.`cusId`=`car`.`cusId`) ORDER BY `appointment`.`date`";
            $getMechSqlQuery=mysqli_query($con,$getMechSql);
            $list='<table  class="table table-striped table-hover "> <tr><th>Client Name</th><th>Phone No</th><th>Car Registration no</th><th>Appointment date</th><th>Mechanic Name</th></tr>';
            if(mysqli_num_rows($getMechSqlQuery)){
                while ($res=mysqli_fetch_array($getMechSqlQuery)){
                    $list.='<tr class="selected" ><td>'.$res['name'].'</td><td >'.$res['phone'].'</td><td>'.$res['licenseNo'].'</td><td>'.$res['date'].'</td><td>'.$res['mechName'].'</td></tr>';
                }
                $list.='<table>';
                echo $list;
            }

        }
        ?>

    </div>
    <div class="col-md-2">
        <button class="btn btn-danger" onclick="editButton()">Edit Appointment</button>
    </div>
</div>

</body>
<script >
    var cells=document.getElementsByClassName('selected'); //Using Phone no to identify which customer is choosen, as it is unique
    for(var i =0; i<=cells.length; i++){
        if(cells[i] !=undefined){
            cells[i].addEventListener('click',editAppSelect);
        }

    }
    var selectedPhone;
    function editAppSelect( ) {
        //alert("this is selected");
        rowVar=this.innerText;
        var preActive=document.getElementsByTagName('tr');
        for(var i =0; i<=preActive.length; i++){
            if(preActive[i] !=undefined) {
                preActive[i].classList.remove("active");
            }
        }
        this.classList.add("active");
        //alert(rowVar);
        console.log(rowVar);
        rowVarSplit=rowVar.split('	');
        console.log(rowVarSplit[1]);
        selectedPhone=rowVarSplit[1];
        //alert(cusId);
    }
    function editButton() {


        /*
         //ajax to call php file where the appointment can be edited
         $.ajax({
         type: "POST",
         url: "editAppointment.php",
         data: {phone: selectedPhone},
         success : function(msg){
         alert(msg);
         }
         });
         */
        if(selectedPhone!= undefined && selectedPhone != null){
            //alert(selectedPhone);
            alert("You are editing an appointment");
            window.location= 'index.php?phoneId='+selectedPhone;

        }

    }
</script>

</html>