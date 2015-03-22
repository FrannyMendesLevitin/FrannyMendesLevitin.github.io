<?php


$servername = "dwnurjpk8269k9my.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "ky87ckk4qfzptwx6";
$password = "1b1a1nydwk07a643";
$dbname = "aaffAlienObjects";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "SELECT artist_name, email from uploads where x=".$_GET['x']." and y=".$_GET['y'];
if ($conn->query($sql) == TRUE) {
	$result = $conn->query($sql);
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();



$row = $result->fetch_row();
echo $row[0] . ' - ' . $row[1];


?>





