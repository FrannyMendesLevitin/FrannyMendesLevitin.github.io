<?php
	

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "aaffAlienObjects";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "SELECT file from uploads where x=".$_GET['x']." and y=".$_GET['y'];
if ($conn->query($sql) == TRUE) {
	$result = $conn->query($sql);
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

$result = ($result->fetch_row()[0]);

echo '<img src="data:image/png;base64,'.$result.'" />'
?>





