<html>
<body>
	
	<div>
		<a href="http://localhost:8888/aaff-alienObjects/#">Go Back</a></div>
</body>
</html>


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




