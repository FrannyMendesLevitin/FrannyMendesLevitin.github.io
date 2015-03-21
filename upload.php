<html>
<body>
	
	<div>
		<a href="http://localhost:8888/aaff-alienObjects/#">Go Back</a></div>
</body>
</html>
<?php
	

$servername = "dwnurjpk8269k9my.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "ky87ckk4qfzptwx6";
$password = "1b1a1nydwk07a643";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE aaffAlienObjects";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

$dbname = "aaffAlienObjects";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE `uploads` ( `id` int(6) NOT NULL AUTO_INCREMENT, `x` int(6) NOT NULL, `y` int(6) NOT NULL, `file` blob NOT NULL, `email` varchar(50) DEFAULT NULL, `artist_name` varchar(50) DEFAULT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

if (mysqli_query($conn, $sql)) {
    echo "Table uploads created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


$conn->close();
?>

<pre>

<?php

if(isset($_FILES['file'])) {
	$file= $_FILES['file'];
	print_r($file);
	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
}

$file_bytes = file_get_contents($_FILES['file']['tmp_name']);
?>

<img src="data:image/png;base64,<?php echo base64_encode($file_bytes) ?>" />

<?php

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO uploads (x, y, file,  email, artist_name)
VALUES (
	'".$_POST['x']."', 
	'".$_POST['y']."', 
	'".base64_encode($file_bytes)."', 
	'".$_POST['email']."', 
	'".$_POST['artist_name']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);

// system "chmod 755 Uploads/*";

$x = $_POST["x"];
$y = $_POST["y"];

$z = (16*$x) + $y;

$file = $_FILES["file"];
if (@is_uploaded_file($_FILES["file"]["tmp_name"])) {
copy($_FILES["file"]["tmp_name"], "Uploads/canvas_$z.jpg");

} 

?>




