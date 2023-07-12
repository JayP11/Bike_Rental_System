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
</style>
<body>

<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoom";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get form data
	$bike_id = $_POST['BIKE_ID'];
	$bike_name = $_POST['bike_name'];
	$fuel_type = $_POST['fuel_type'];
	$capacity = $_POST['capacity'];
	$price = $_POST['price'];

	// Prepare update statement
	$sql = "UPDATE bikes SET BIKE_NAME=?, FUEL_TYPE=?, CAPACITY=?, PRICE=? WHERE BIKE_ID=?";

	// Prepare statement
	$stmt = mysqli_prepare($conn, $sql);

	// Bind parameters to statement
	mysqli_stmt_bind_param($stmt, "ssdii", $bike_name, $fuel_type, $capacity, $price, $bike_id);

	// Execute statement
	if (mysqli_stmt_execute($stmt)) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}

	// Close statement
	mysqli_stmt_close($stmt);
}

// Get bike_id from URL parameter
$bike_id = $_GET['BIKE_ID'];

// Get record from database
$sql = "SELECT * FROM bikes WHERE BIKE_ID=$bike_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Display record in form
?>
<button id="back"><a href="adminvehicle.php">HOME</a></button> 
        
        <div class="main">
            
            <div class="register">
                <h2>Update Details Of New bike</h2>
                <form id="register" method="POST" enctype="multipart/form-data" action="">    

                
                    <label>BIKE Name : </label>
                    <br>
                    <input type ="text" name="bike_name" value="<?php echo $row['BIKE_NAME'];?>"
                    id="name" placeholder="Enter bike Name">
                    <br><br>

                    <label>Model : </label>
                    <br>
                    <input type ="text" name="fuel_type" value="<?php echo $row['FUEL_TYPE'];?>"
                    id="name" placeholder="Enter Fuel Type">
                    <br><br>

                    <label>Capacity : </label>
                    <br>
                    <input type="number" name="capacity" min="1" value="<?php echo $row['CAPACITY'];?>"
                    id="name" placeholder="Enter Capacity Of Bike">
                    <br><br>
                    
                    <label>Price : </label>
                    <br>
                    <input type="number" name="price" min="1" value="<?php echo $row['PRICE'];?>"
                    id="name" placeholder="Enter Price Of Bike for One Day(in rupees)">
                    <br><br>

                    <input type="hidden" name="BIKE_ID" value="<?php echo $row['BIKE_ID']; ?>">

                    <label>BIKE Image : </label>
                    <br>
                    <input type="file" name="image" value="<?php echo $row['BIKE_IMG'];?>">
                    <br><br>
                    
                    <input type="submit" class="btnn"  value="Update Bike" name="update">
                </input>
                </form>
            </div> 
        </div.main>
	<!-- <form method="POST">
		<label for="bike_name">Bike Name:</label>
		<input type="text" name="bike_name" value="<php echo $row['BIKE_NAME']; ?>"><br>

		<label for="fuel_type">Fuel Type:</label>
		<input type="text" name="fuel_type" value="<php echo $row['FUEL_TYPE']; ?>"><br>

		<label for="capacity">Capacity:</label>
		<input type="number" name="capacity" value="<php echo $row['CAPACITY']; ?>"><br>

		<label for="price">Price:</label>
		<input type="number" name="price" value="<php echo $row['PRICE']; ?>"><br>

		<input type="hidden" name="BIKE_ID" value="<php echo $row['BIKE_ID']; ?>">

		<input type="submit" value="Update Record">
	</form> -->

<?php
// Close database connection
mysqli_close($conn);
?>
</body>
</html>