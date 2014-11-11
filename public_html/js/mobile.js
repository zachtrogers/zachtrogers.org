$(document).ready(function() {
/*remove video for mobile*/
/*  var ua = navigator.userAgent;
    ua = (ua.match(/Android/i) || ua.match(/webOS/i) || ua.match(/iPhone/i) || ua.match(/iPad/i) || ua.match(/iPod/i) || ua.match(/BlackBerry/i) || ua.match(/Windows Phone/i));
  if(ua){
    $('video').remove();
  };
*/
/*mobile menue*/
  mainMenu.init();
});

/*mobile menu*/
var mainMenu = {
  isShown : false,
  showMenu : function () {
    mainMenu.$mainMenu.css('display', 'block');
    mainMenu.isShown = true;
  },

  hideMenu : function () {
    mainMenu.$mainMenu.css('display', 'none');
    mainMenu.isShown = false;
  },

  init : function () {

    this.$menuButton = $('.mobileNav');
    this.$mainMenu = $('#navBarEntireMobile');
    this.$exit = $('.pageWrap');

    mainMenu.$menuButton.bind('click', function(e){
      e.stopPropagation();
      if (mainMenu.isShown) {
        mainMenu.hideMenu();
      } else {
        mainMenu.showMenu();
      }
    });
    mainMenu.$mainMenu.bind('click', function(e) {
        e.stopPropagation();
        mainMenu.hideMenu();
    });
    mainMenu.$exit.bind("click", function(){
      mainMenu.hideMenu();
    });
  },
}

