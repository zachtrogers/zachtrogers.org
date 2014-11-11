//google maps
function initialize() {
    var mapOptions = {
		center: { lat: 33.748874, lng: -84.387988},
		zoom: 8,
	    disableDefaultUI: true,
	    scrollwheel: false,
        draggable: false,
		styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}],
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById('map-canvas'),
    	mapOptions);
}
google.maps.event.addDomListener(window, 'load', initialize);

//video stop on scroll
$(window).scroll(function() {
	vid = document.getElementById("backgroundVideo"); 
	if(vid != null){
		vid = document.getElementById("backgroundVideo"); 
		if (scrollY >= $(window).height()){
			vid.pause();
		} else {
			vid.play();
		}
	}
});

//height of top fold
$(window).load(function() {
	$("#top").css("height", $(window).height()); 
});
$(window).resize(function() {
	$("#top").css("height", $(window).height()); 
});

$(window).scroll(function() {
//nav menu
	if (scrollY >= 100) {
		$("#navBarEntire").addClass('navBarSticky');
		$(".navBarStickyFade").fadeIn();
		$(".arrowDown").fadeOut('slow');
	} else {
		$("#navBarEntire").removeClass('navBarSticky');
		$(".navBarStickyFade").hide(0);
		$(".arrowDown").fadeIn("slow");
	}
});

$(window).scroll(function() {
//nav menu
	if (scrollY >= (0.20 * $(window).height())) {
		$("#slogan").fadeOut('slow');
		$('.name').css('position', 'fixed');
		$('.name').css('padding-top', '0');
		$('.name').css('left', '50%');
		var width = $('.name').width()/2;
		$('.name').css('margin-left', -width);

	} else {
		$("#slogan").fadeIn("slow");
		$('.name').css('position', 'relative');
		$('.name').css('padding-top', '10%');
	}
});

$(window).scroll(function() {
//nav menu
	if (scrollY <= $(window).height()) {
		var currentSize = $('.name').css('font-size').replace('px', '');
		var currentSizeNumber = Number(currentSize);
		var increaseBy = currentSizeNumber - (0.20 * $(window).height()/60);
		$('.name').css('font-size', increaseBy);
	}
});


//portfoilo slide
$(function(){
	$("#porfolioNext").click(function() {
		var divname = this.id;
        	$("#"+divname).slideToggle().siblings('.divs').hide("slow");
        });
})

//sunrise and set
function dayNight() {
	$.ajax({
		url : "http://api.wunderground.com/api/10ef650e2aef2d38/astronomy/q/autoip.json",
		dataType : "jsonp",
		success : function(parsed_json) {
			var current = Number(parsed_json['moon_phase']['current_time']['hour']);
			var sunrise = Number(parsed_json['moon_phase']['sunrise']['hour']);
			var sunset = Number(parsed_json['moon_phase']['sunset']['hour']);
			if(current >= sunrise+1 && current <= sunset-1){
				$('.videoOverlay').addClass('overlayDay');
			}else if(current <= sunrise-1 && current >= sunset+1){
				$('.videoOverlay').addClass('overlayNight')
			}else{
				$('.videoOverlay').addClass('overlayBetween')
			}
		}
	});
}

window.onload = dayNight;