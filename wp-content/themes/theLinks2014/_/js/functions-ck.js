// Browser detection for when you get desparate.
// http://rog.ie/post/9089341529/html5boilerplatejs
// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);
// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }
// remap jQuery to $
(function(e){e(document).ready(function(){Modernizr.svg||e('img[src*="svg"]').attr("src",function(){return e(this).attr("src").replace(".svg",".png")});e("#myCarousel").swiperight(function(){e(this).carousel("prev")});e("#myCarousel").swipeleft(function(){e(this).carousel("next")})})})(window.jQuery);