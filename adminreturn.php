<?php

require_once('connection.php');
$bikeid=$_GET['id'];
$book_id=$_GET['bookid'];
$sql2="SELECT *from booking where BOOK_Id=$book_id";
$result2=mysqli_query($con,$sql2);
$res2 = mysqli_fetch_assoc($result2);
$sql="SELECT *from bikes where BIKE_ID=$bikeid";
$result=mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($result);

if($res['AVAILABLE']=='Y')
{
    echo '<script>alert("ALREADY BIKE IS RETURNED")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';
}
else{
    
    $sql4="UPDATE bikes set AVAILABLE='Y' where BIKE_ID=$res[BIKE_ID]";
    $query2=mysqli_query($con,$sql4);
    $sql5="UPDATE booking set BOOK_STATUS='RETURNED' where BOOK_ID=$res2[BOOK_ID]";
    $query=mysqli_query($con,$sql5);
    echo '<script>alert("BIKE RETURNED SUCCESSFULLY")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';
}  



?>