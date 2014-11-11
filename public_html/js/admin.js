//title to url conversion

var stop = '';

function urlStop(){
	stop = 'stop';
	var url = document.getElementById('url').value;
	var urlFormatted = url.replace(/[^a-zA-Z -]+/g, '').replace(/ /g,"-").toLowerCase();
	document.getElementById('url').value = urlFormatted;
}

function url() {
	if(stop != "stop"){
		var title = document.getElementById('title').value;
	  var titleUrl = title.replace(/[^a-zA-Z -]+/g, '').replace(/ /g,"-").toLowerCase();
	  document.getElementById('url').value = titleUrl;
	}
};