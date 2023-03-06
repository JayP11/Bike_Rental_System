<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
    <style>
*{
    margin: 0;
    padding: 0;

}
body{
    background-image: url("../images/regs.jpg");
    
    
    background-size: cover;
    background-position: center;
    /* margin-top: 0px; */
    
}
.main{
    width: 400px;
    margin: 100px auto 0px auto;
    margin-top: 30px;
}
.btnn{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    margin-left: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.btnn:hover{
    background: #fff;
    color:#ff7200;
}

.btnn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

h2{
    text-align: center;
    padding: 20px;
    font-family: sans-serif;

}
.register{
    background-color: rgba(0,0,0,0.6);
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 2px 2px 15px rgba(0,0,0,0.3);
    color: #fff;
    margin: auto;

}

form#register{
    margin: 40px;
    margin-top: 10px;

}

label{
    font-family: sans-serif;
    font-size: 18px;
    font-style: italic;
}

input#name{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}


#back{
    width: 100px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 10px;
    margin-left: 20px;
    font-size: 18px;
   

}


#back a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

#fam{
    color: #ff7200;
    font-family: 'Times New Roman';
    font-size: 50px;
    padding-left: 20px;
    margin-top:-10px;
    text-align: center;
    letter-spacing: 2px;
    display: inline;
    margin-left: 250px;
}

.reg{
    width: 100%;
}

<?php
                require_once('connection.php');


                // Other code 
                // // Connect to the database
                // $conn = mysqli_connect("localhost", "root", "", "zoom");

                // // Check for connection errors
                // if (!$conn) {
                //     die("Connection failed: " . mysqli_connect_error());
                // }

                // // Retrieve all the data from the table
                // $sql = "SELECT * FROM bikes";
                // $result = mysqli_query($conn, $sql);

                // // Check if any rows were returned
                // if (mysqli_num_rows($result) > 0) {
                //     // Loop through each row and display the data
                //     while ($row = mysqli_fetch_assoc($result)) {
                //         echo "ID: " . $row["BIKE_ID"] . " - Name: " . $row["BIKE_NAME"] . " - Fuel: " . $row["FUEL_TYPE"] ."- Capacity: " . $row["CAPACITY"] . " - Price: " . $row["PRICE"] . "<br>";
                //     }
                // } else {
                //     echo "No data found in the table.";
                // }

                // // Close the database connection
                // mysqli_close($conn);



                $bikeid=$_GET['id'];

                $sql = "SELECT * FROM `bikes` WHERE BIKE_ID = $bikeid ";
                $result = mysqli_query($con,$sql);
                $arrdata =mysqli_fetch_array($result);

                if(isset($_POST['update']))
                {
                    //$id=$_POST['BIKE_ID'];

                    $BIKE_NAME=$_POST['BIKE_NAME'];
                    $FUEL_TYPE=$_POST['FUEL_TYPE'];
                    $CAPACITY=$_POST['CAPACITY'];
                    $PRICE=$_POST['PRICE'];
                    $BIKE_IMG=$_POST['BIKE_IMG'];


                    echo $query="update bikes set BIKE_NAME='$BIKE_NAME', FUEL_TYPE='$FUEL_TYPE' , CAPACITY='$CAPACITY', PRICE='$PRICE',BIKE_IMG='$BIKE_IMG' where BIKE_ID='$bikeid' ";
                
                    $res = mysqli_query($con,$query);
                }
                
                ?>

</style>
</head>
    <body>
        <button id="back"><a href="adminvehicle.php">HOME</a></button> 
        
        <div class="main">
            
            <div class="register">
                <h2>Update Details Of New bike</h2>
                <form id="register" method="POST" enctype="multipart/form-data" action="">    

                
                    <label>BIKE Name : </label>
                    <br>
                    <input type ="text" name="bikename" value="<?php echo $arrdata['BIKE_NAME'];?>"
                    id="name" placeholder="Enter bike Name">
                    <br><br>

                    <label>Model : </label>
                    <br>
                    <input type ="text" name="ftype" value="<?php echo $arrdata['FUEL_TYPE'];?>"
                    id="name" placeholder="Enter Fuel Type">
                    <br><br>

                    <label>Capacity : </label>
                    <br>
                    <input type="number" name="capacity" min="1" value="<?php echo $arrdata['CAPACITY'];?>"
                    id="name" placeholder="Enter Capacity Of Bike">
                    <br><br>
                    
                    <label>Price : </label>
                    <br>
                    <input type="number" name="price" min="1" value="<?php echo $arrdata['PRICE'];?>"
                    id="name" placeholder="Enter Price Of Bike for One Day(in rupees)">
                    <br><br>

                    <label>BIKE Image : </label>
                    <br>
                    <input type="file" name="image" value="<?php echo $arrdata['BIKE_IMG'];?>">
                    <br><br>
                    
                    <input type="submit" class="btnn"  value="Update Bike" name="update">
                </input>
                </form>
            </div> 
        </div.main>
    </body>
</html>
