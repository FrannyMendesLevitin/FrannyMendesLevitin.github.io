
	function cellClick (){
		var canvasCell=document.getElementsByClassName("canvas-cell");
		
		for (var i=0;i<canvasCell.length;i++) {
			var this-canvasCell =canvasCell[i];
			var source =this-canvasCell.getAttribute('href');

			if(this-canvasCell.getAttribute('class') == 'uploaded') {
				this-canvasCell.onclick = function() {





	}


	var canvasCell=document.getElementsByClassName("canvas-cell");
	for (var i=0;i<canvasCell.length;i++){
		canvasCell[i].addEventListener("click",function(event){
			
		
		console.log(this.dataset.row, this.dataset.col);

	var upload=canvasCell[i].childNode;
	

	// var upload=document.getElementsByClassName("canvas-cell");

	var z=(16*(this.dataset.row)) + this.dataset.col;
	if (hasClass(elem, " uploaded")) {

		upload.setAttribute ('src', 'uploads/canvas_'+z);

	}
	event.stopPropagation();

	// ...........
	//ADD CLASS of UPLOADED TO IMAGES if uploads are successful 
	//funnction addClass (elem, className) {

	var canvasCell=document.getElementsByClassName("canvas-cell");
	var canvasCell-submit=
	var submit=document.getElementById ("submit");
	function addClassOnSubmit () {

	for (var i=0;i<canvasCell.length;i++){

		canvasCell[i].addEventListener("click",function(event){

		var z=(16*(this.dataset.row)) + this.dataset.col;


		<script type="text/javascript">


//display uploaded image or show form 
	var canvasCell=document.getElementsByClassName("canvas-cell");
	
	for (var i=0;i<canvasCell.length;i++){
		//var thisCanvasCell = canvasCell[i];
		canvasCell[i].addEventListener("click",function(event){
			event.stopPropagation();
			
			// $('#submitForm').show();

			console.log(this.dataset.row, this.dataset.col);

			document.getElementById("clickedCell").innerHTML = "Please provide all content you would like to display in association with canvas cell" + this.dataset.row + "," + this.dataset.col);
		};
	}

	var upload=canvasCell[i].childNode;
	

	var upload=document.getElementsByClassName("canvas-cell");

	var z=(16*(this.dataset.row)) + this.dataset.col;
	if (hasClass(elem, " uploaded")) {

		upload.setAttribute ('src', 'uploads/canvas_'+z);

			document.getElementById
			checks if canvas cell i has class "uploaded"
			if ($(canvasCell[i]).classList.contains('uploaded'))) {
				$(this).attr('src', uploads/canvas_02.jpg );
			}
			else {
				$('submitForm').show();
			}
		
//Tell users which cell they are submitting content to
			console.log(this.dataset.row, this.dataset.col);
			document.getElementById("clickedCell").innerHTML = "Please provide all content you would like to display in association with canvas cell " + this.dataset.row +"," + this.dataset.col);

			$('#x').val(this.dataset.row);
			$('#y').val(this.dataset.col);

		}, true);
	}

