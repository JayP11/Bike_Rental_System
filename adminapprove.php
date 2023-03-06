<?php

require_once('connection.php');
$bookid=$_GET['id'];
$sql="SELECT *from booking where BOOK_Id=$bookid";
$result=mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($result);
$bike_id=$res['BIKE_ID'];
$sql2="SELECT *from bikes where BIKE_ID=$bike_id";
$bikeres=mysqli_query($con,$sql2);
$bikeresult = mysqli_fetch_assoc($bikeres);
$email=$res['EMAIL'];
$bikename=$bikeresult['BIKE_NAME'];
if($bikeresult['AVAILABLE']=='Y')
{
if($res['BOOK_STATUS']=='APPROVED' || $res['BOOK_STATUS']=='RETURNED')
{
    echo '<script>alert("ALREADY APPROVED")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';
}
else{
    $query="UPDATE booking set  BOOK_STATUS='APPROVED' where BOOK_ID=$bookid";
    $queryy=mysqli_query($con,$query);
    $sql2="UPDATE bikes set AVAILABLE='N' where BIKE_ID=$res[BIKE_ID]";
    $query2=mysqli_query($con,$sql2);
    
    echo '<script>alert("APPROVED SUCCESSFULLY")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';
}  
}
else{
    echo '<script>alert("BIKE IS NOT AVAILABLE")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';
}
?>