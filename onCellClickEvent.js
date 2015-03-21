function myfunction() {
  // var paras = document.getElementsByTagName('p');
  // var spans = document.getElementsByTagName('span');
	var canvasCell=document.getElementsByClassName("canvas-cell");
	var upload=canvasCell[i].childNode;
  	for( var i = 0; i < canvasCell.length; i++ ) {
  		canvasCell[i].originalindex = i;
  		canvasCell[i].relatedimg = img[i];
    	canvasCell[i].onclick = function (e) {

        var upload=canvasCell[i].childNode;

    		var a = this.originalindex, b = this.relatedimg;
    		var upload=canvasCell[i].childNode;
    		var z=(16*(this.dataset.row)) + this.dataset.col;
    		if (hasClass(elem, " uploaded")) {

				upload.setAttribute ('src', 'uploads/canvas_'+z);

			}
			

    		
    	};
    }
}

    	console.log(this.dataset.row, this.dataset.col);
    

function() {}