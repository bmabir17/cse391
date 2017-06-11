<html>
<head>
    <title>Mechanic Appointment</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery.js"></script>
</head>
<body>
<div class="container">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <?php
        include_once 'db.php';

        echo '<pre>';
        //var_dump($_POST);
        //var_dump($_FILES);
        //connect to the database

        //check connection
        if (!$con) {
            echo "Failed to connect to Mysqli:" . mysqli_connect_error();
        }else {

            if (isset($_POST['regButton'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $phoneNo = $_POST['phoneNo'];
                $engineNo = $_POST['engineNo'];
                $licenseNo = $_POST['licenseNo'];
                $email = $_POST['email'];
                $appointmentDate = $_POST['appointmentDate'];
                $mechId = (int)$_POST['mechanicSelect'];
                //echo "form data obtained";
                //echo $name;
                //echo $address;
                //echo $phoneNo;
                //echo $mechId;
                if ($_POST['regButton']=="update"){ // update existing appointment
                    // TO update we are deleting all the old entries
                    $getCusId=mysqli_query($con,"SELECT `cusId` FROM `customer` WHERE `phone`=$phoneNo");
                    if($getCusId) {
                        while ($res = mysqli_fetch_array($getCusId)) {
                            //echo $res['cusId'];
                            $cusId=$res['cusId'];
                        }
                    }
                    echo "Updating Appointment Data";
                    $deleteCustomerSql=mysqli_query($con,"DELETE FROM `customer` WHERE `customer`.`phone` = $phoneNo");
                    echo $deleteCustomerSql;
                    $deleteCustomerSql=mysqli_query($con,"DELETE FROM `appointment` WHERE `appointment`.`cusId` =$cusId ");
                    echo $deleteCustomerSql;
                    $deleteCustomerSql=mysqli_query($con,"DELETE FROM `car` WHERE `car`.`cusId` =$cusId");
                    echo $deleteCustomerSql;
                }
                //Add new appointment
                if (empty($name) OR empty($phoneNo) OR empty($address) OR empty($engineNo) OR empty($licenseNo) OR empty($appointmentDate) OR empty($mechId)) {
                    echo "Unable to fetch form data";
                } else {
                    $insertCustomer_sql = "INSERT INTO `customer` (`name`, `address`, `phone`,`email`) VALUES ('$name', '$address', '$phoneNo', '$email')";

                    //echo $insertCustomer_sql;
                    $res = mysqli_query($con, $insertCustomer_sql);
                    if ($res) {
                        //echo "customer creation is successful";
                        //$cusId=mysqli_query($con,"SELECT cusId FROM customer WHERE phone=$phoneNo");
                        $cusId = mysqli_insert_id($con);
                        //mysqli_free_result($res);
                        //echo  $cusId;
                        $insertCar_sql = "INSERT INTO car (engineNo, licenseNo, cusId) VALUES ('$engineNo', '$licenseNo', '$cusId')";
                        $res = mysqli_query($con, $insertCar_sql);
                        if ($res) {
                            //echo "car creation is successful";
                            $carId = mysqli_insert_id($con);
                            //mysqli_free_result($res);
                            //echo  $carId;
                            $insertAppoint_sql = "INSERT INTO appointment (mechId, carId, cusId, date) VALUES ('$mechId', '$carId', '$cusId', '$appointmentDate')";
                            $res = mysqli_query($con, $insertAppoint_sql);
                            if ($res) {
                                echo "<h3>From Submitted Successfully</h3>";

                            } else {
                                mysqli_query($con, "DELETE FROM `car` WHERE `carId`=$cusId");
                                mysqli_query($con, "DELETE FROM `customer` WHERE `cusId`=$cusId");
                                echo "<h3>Appointment not saved</h3>";
                            }
                        } else {
                            echo "<h3>Unable to create car database</h3>";
                            mysqli_query($con, "DELETE FROM `customer` WHERE `cusId`=$cusId");
                        }
                    } else {
                        echo "<h3>Unable to create customer database</h3>";
                    }


                }
            }
        }

        ?>
        <p>You will be redirected in <span id="counter">10</span> second(s).</p>
        <script type="text/javascript">
            function countdown() {
                var i = document.getElementById('counter');
                if (parseInt(i.innerHTML)<=0) {
                    location.href = 'index.php';
                }
                i.innerHTML = parseInt(i.innerHTML)-1;
            }
            setInterval(function(){ countdown(); },1000);
        </script>
    </div>
</div>
</body>
</html>


