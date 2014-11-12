//title to url conversion
var stop = '';

function urlStop(){
	stop = 'stop';
	var url = document.getElementById('url').value;
	var urlFormatted = url.replace(/[^a-zA-Z -]+/g, '').replace(/ /g,"-").toLowerCase();
	document.getElementById('url').value = urlFormatted;
}

function urlStart(){
	if(stop != "stop"){
		var title = document.getElementById('title').value;
	  var titleUrl = title.replace(/[^a-zA-Z -]+/g, '').replace(/ /g,"-").toLowerCase();
	  document.getElementById('url').value = titleUrl;
	}
};

//image upload portfolio
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    jQuery('#imageUpload').attr('src', e.target.result);
    jQuery('#imageUpload').css({"display":"block"});
  }
    reader.readAsDataURL(input.files[0]);
  }
    jQuery('#imageCurrent').css({"display":"none"});
}