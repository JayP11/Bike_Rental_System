<?php
    require_once('connection.php');
    $bikeid=$_GET['id'];
    $sql="DELETE from bikes where BIKE_ID=$bikeid";
    $result=mysqli_query($con,$sql);

    echo '<script>alert("BIKE DELETED SUCCESFULLY")</script>';
    echo '<script> window.location.href = "adminvehicle.php";</script>';
?>
