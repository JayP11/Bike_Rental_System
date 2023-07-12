<?php
if(isset($_POST['addbike']) ){
    require_once('connection.php');
   echo "<prev>";
   print_r($_FILES['image']);
   echo "</prev>";
   $img_name= $_FILES['image']['name'];
   $tmp_name= $_FILES['image']['tmp_name'];
   $error= $_FILES['image']['error'];
    if($error === 0){
        $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc= strtolower($img_ex);

        $allowed_exs = array("jpg","jpeg","png","webp","svg");
        if(in_array($img_ex_lc,$allowed_exs)){
            $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path='images/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);

                $bikename=mysqli_real_escape_string($con,$_POST['bikename']);

                $ftype=mysqli_real_escape_string($con,$_POST['ftype']);
                $capacity=mysqli_real_escape_string($con,$_POST['capacity']);
                $price=mysqli_real_escape_string($con,$_POST['price']);
                $available="Y";
                $query="INSERT INTO bikes(BIKE_NAME,FUEL_TYPE,CAPACITY,PRICE,BIKE_IMG,AVAILABLE) values('$bikename','$ftype',$capacity,$price,'$new_img_name','$available')";
                $res=mysqli_query($con,$query);
                if($res){
                    echo '<script>alert("New Bike Added Successfully!!")</script>';
                    echo '<script> window.location.href = "adminvehicle.php";</script>';                }

        }else{
            echo '<script>alert("Cant upload this type of image")</script>';
            echo '<script> window.location.href = "adminaddbike.php";</script>';   
        }
    }
    else{
        $em="unknown error occured";
        header("Location: adminaddbike.php?error=$em");
    }
}
else{
    echo "false";
}
?>