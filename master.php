<?php
// Establish connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoom";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the database
$sql = "SELECT * FROM bikes";
$result = mysqli_query($conn, $sql);

// Display data in an HTML table
echo "<table>";
echo "<tr><th>Bike ID</th><th>Bike Name</th><th>Fuel Type</th><th>Capacity</th><th>Price</th><th>Bike Image</th><th>Available</th><th>Action</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['BIKE_ID']."</td>";
    echo "<td>".$row['BIKE_NAME']."</td>";
    echo "<td>".$row['FUEL_TYPE']."</td>";
    echo "<td>".$row['CAPACITY']."</td>";
    echo "<td>".$row['PRICE']."</td>";
    echo "<td>".$row['BIKE_IMG']."</td>";
    echo "<td>".$row['AVAILABLE']."</td>";
    echo "<td><a href='update.php?BIKE_ID=".$row['BIKE_ID']."'>Update</a> | <a href='delete.php?id=".$row['BIKE_ID']."'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";

// Close database connection
mysqli_close($conn);
?>
