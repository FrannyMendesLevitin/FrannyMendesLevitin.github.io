
<html>
<head>
<title>canvas</title>
<link rel="stylesheet" type="text/css" href="myStyle.css">
<style type="text/css"></style>
</head>
<body>
<!-- Save for Web Slices (canvas.jpg) -->

<span><h1>Alien Objects</h1></span>

<span id="aboutText" style="text-align:left; display: none; max-width:690px; margin:1em 1em; font-size:16px;">Alien Objects is an artwork celebrating open referencing of information. <br>Statement from the artist: Impulses in my own life, and data I acquire in physical and digital space become the evidence of my stories and the props for my performances. I invite you to join by submitting content or email me with feedback or questions at fmendeslevitin[at]gmail.com<br>Programming this site was supported by JP Obey & John Corser.</span>
<span id="about" style="text-align: left;"><a href="#">About</span>


<div id="canvas-wrapper">
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

	$num_columns = 16;
	$num_rows = 8;
	$img_number = 1;

	for ($row = 0; $row < $num_rows; $row++) {
		echo "<div class='canvas-row'>";	

		for ($col = 0; $col < $num_columns; $col++) {

			$upload_class = "";
			$new_src = "";
			$img_path = "images/canvas_" . $img_number . ".jpg";

			// Check the database for an entry for this cell
			$sql = "SELECT file from uploads where x=".$row." and y=".$col;

			// Create database connection
			if ($conn->query($sql) == TRUE) {
				$result = $conn->query($sql);
				$result = ($result->fetch_row()[0]);
				if($result) {
					$upload_class = "upload";
					$new_src = $result;
				}
			}

			echo "<div class='canvas-cell " . $upload_class . "' data-row=" . $row . " data-col=" . $col . " data-newsrc='" . $new_src . "' data-originalsrc='" . $img_path . "'>";

			echo "<img src='" . $img_path . "' width=72 height=72>";

			echo "</div> <!--/canvas-cell -->";

			$img_number++;
		}

    	echo "</div> <!--/canvas-row -->";
	}

	$conn->close();
?>
</div>




<form id="submitForm" enctype="multipart/form-data" action="upload.php" method="post">
	<div id="clickedCell"></div><br><br>
	
	<input id="myFile" type="file" name="file"><br><br>
	Artist Name:<input type="text" name="artistName"><br><br>
	email:<input type="email" name="email"><br><br>
	<input type="submit" value="Upload">
	<input type="text" id="x" name="x"><br><br>
	<input type="text" id="y" name="y"><br><br>
</form>




<div id="footer">
	<div id="footerRight"><span style="position:relative; float:right; right:1em; padding-bottom:2em;"> ©2015 Frances Mendes Levitin</span></div>
		
</div>


<div class="result"></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">
	var canvasCell = document.getElementsByClassName("canvas-cell");

	function cellClickHandler(event) {

		event.stopPropagation();
		
		$('#submitForm').show();


		//Downloads image from server
		$.get( "download.php?x=" + this.dataset.row + "&y=" + this.dataset.col, function( data ) {
		  $( ".result" ).html( data );

		});
		
		console.log(this.dataset.row, this.dataset.col);
		document.getElementById("clickedCell").innerHTML = "Please provide all content you would like to display in association with canvas cell " + this.dataset.row +"," + this.dataset.col;

		$('#x').val(this.dataset.row);
		$('#y').val(this.dataset.col);
	}

	for (var i=0;i<canvasCell.length;i++){
		canvasCell[i].addEventListener("click", cellClickHandler, true);
	}

	var aboutText = document.getElementById('aboutText');
	var aboutLink = document.getElementById('about');
	aboutLink = aboutLink.getElementsByTagName('a')[0];
	aboutLink.addEventListener('click', showHide, true);
	function showHide (event) {
		event.preventDefault();
		event.stopPropagation();
		if(aboutText.style.display=="none"){
			aboutText.style.display="inline-block";
		} else {
			aboutText.style.display="none";
		}
	};


	var uploads = document.getElementsByClassName("upload");

	// Event handler for showing new images
	for(var i=0; i < uploads.length; i++) {
	   var cell = uploads[i];
	   var img = cell.getElementsByTagName("img")[0];
	   var newsrc = "data:image/png;base64," + cell.dataset.newsrc;

	   img.addEventListener("mouseenter", function(event) {
	   	  event.stopPropagation();
	      this.src = newsrc;
	   }, true);

	   img.addEventListener("mouseout", function(event) {
	   	  event.stopPropagation();
	      this.src = cell.dataset.originalsrc;
	   }, true);
	}

</script>
</body>
</html>