//google maps
function initialize() {
    var mapOptions = {
		center: { lat: 33.748874, lng: -84.387988},
		zoom: 8,
		styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}],
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById('map-canvas'),
    	mapOptions);
}
google.maps.event.addDomListener(window, 'load', initialize);

//day and night change
function dayNight() {
	var d = new Date();
	var t = d.getHours();
	if(t > 19 || t <7){
		$('.videoOverlay').addClass('overlayNight');
	}else{
		$('.videoOverlay').addClass('overlayDay')
	}
}
window.onload = dayNight;

//video stop on scroll
$(window).scroll(function() {
	vid = document.getElementById("backgroundVideo"); 
	if (scrollY >= $(window).height()){
		vid.pause();
	} else {
		vid.play();
	}
});

$(window).load(function() {
	$("#top").css("height", $(window).height()); 
});

$(window).scroll(function() {
	$("#top").css("height", $(window).height()); 
});

