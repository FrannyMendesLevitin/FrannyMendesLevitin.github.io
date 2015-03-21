
<html>
<head>
<title>canvas</title>
<link rel="stylesheet" type="text/css" href="myStyle.css">
<style type="text/css">

</style>
</head>
<body>
<!-- Save for Web Slices (canvas.jpg) -->
<div id="header">
<span><h1>Alien Objects</h1><h3>in beta</h3></span>

<span id="aboutText" style="text-align:left; display: none; max-width:690px; margin:1em 1em; font-size:16px;">Alien Objects is an artwork celebrating open referencing of information. <br>Statement from the artist: Impulses in my own life, and data I acquire in physical and digital space become the evidence of my stories and the props for my performances. I invite you to join by submitting content or email me with feedback or questions at fmendeslevitin[at]gmail.com<br>Programming this site was supported by JP Obey & John Corser.</span>
<span id="about" style="text-align: left;"><a href="#">About</span>
</div>

<div id="canvas-wrapper">
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

			echo "<div class='canvas-cell " . $upload_class . "' data-row=" . $row . " data-col=" . $col . ">";

			// Add the uploaded image at the bottom of the stack if it exists
			if($new_src) {
				echo "<img src='data:image/png;base64," . $new_src .  "' class='upload' />";
			}

			// Add in the default image on top
			echo "<img src='" . $img_path . "' class='default' />";

			echo "</div> <!--/canvas-cell -->";

			$img_number++;
		}

    	echo "</div> <!--/canvas-row -->";
	}

	$conn->close();
?>
</div>




<form id="submitForm" class="hidden" enctype="multipart/form-data" action="upload.php" method="post">
	<div id="clickedCell"></div><br><br>
	
	<input id="myFile" type="file" name="file"><br><br>
	Artist Name:<input type="text" name="artistName"><br><br>
	email:<input type="email" name="email"><br><br>
	<input type="submit" value="Upload">
	<input type="text" id="x" name="x"><br><br>
	<input type="text" id="y" name="y"><br><br>
</form>




<div id="footer">
	<div id="footerRight"><span style="position:relative; float:right; right:1em; padding-bottom:2em;">&copy;2015 Frances Mendes Levitin</span></div>
		
</div>


<div class="result"></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">
	var submitForm = document.getElementById("submitForm");

	function cellClickHandler(event) {

		event.stopPropagation();
		
		//Downloads image from server
		//$.get( "download.php?x=" + this.dataset.row + "&y=" + this.dataset.col, function( data ) {
		//  $( ".result" ).html( data );

		//});
		
		console.log(this.dataset.row, this.dataset.col);
		document.getElementById("clickedCell").innerHTML = "Please provide all content you would like to display in association with canvas cell " + this.dataset.row +"," + this.dataset.col;

		$('#x').val(this.dataset.row);
		$('#y').val(this.dataset.col);

		if (this.className.indexOf("upload") === -1) {

			// If no upload, show submit form
			submitForm.className = "";

		} else {

			submitForm.className = "hidden";

			var def = this.getElementsByClassName('default')[0];
			var idx = def.className.indexOf("hidden");

			if ( idx === -1) {

				// If upload, hide default
				def.className += " hidden";

			} else {

				// If default is hidden, then show the default
				def.className = def.className.replace("hidden", "");
			}
			
			

		}		
	}
	
	// Attach click handler to each cell
	var canvasCells = document.getElementsByClassName("canvas-cell");
	for (var i=0;i<canvasCells.length;i++) {
		// Get the cell
		var cell = canvasCells[i];

		// Add the click handler
		cell.addEventListener("click", cellClickHandler, true);
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

//Add event listener to the click event 

</script>
</body>
</html>