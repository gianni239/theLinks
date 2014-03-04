var t;
var slideDelay = 7000;
var holderHeight;
var thumbHeight = 48;
var animating = false;

$(document).ready(function(){
	jQuery.preLoadImages(
		"http://www.site.com.au/images/hp-1.png",
		"http://www.site.com.au/images/hp-2.png",
		"http://www.site.com.au/images/hp-3.png",
		"http://www.site.com.au/images/hp-4.png",
		"http://www.site.com.au/images/hp-5.png",
		"http://www.site.com.au/images/hp-6.png"
	);
	
	$(".gallery-viewfinder LI:first-child").addClass('current');
	$(".gallery-viewfinder LI:first-child").addClass('first');
	$(".gallery-viewfinder LI:nth-child(2)").addClass('next');
	
	$(".hide-interface").click(function(){
		$('.panel-fade').fadeOut(600);
		$('.gallery-show').fadeIn(600);
		hideAddressbar('body');
	});
	
	$(".show-interface").click(function(){
		$('.panel-fade').fadeIn(600);
		$('.gallery-show').fadeOut(600);
		hideAddressbar('body');
	});
	
	$(".next-img").click(function(){
		autoRotate();
	});
	
	$(".prev-img").click(function(){
		if ( !animating ) {
			if ( $( ".gallery-viewfinder LI.current" ).hasClass( "first" ) ){		
				clearTimeout(t);
				rotateNow(".last");
				$( ".gallery-viewfinder LI.first" ).prev().addClass( "next" );
			} else { 
				clearTimeout(t);
				$( ".gallery-viewfinder LI.previous" ).removeClass( "previous" );
				$( ".gallery-viewfinder LI.current" ).prev().addClass( "previous" );
				rotateNow(".previous");
			}
		}
	});
	
	var tid = setInterval(resizeBKG, 400);
	function resizeBKG() {
	  viewfinderResize();
		imgResize();
		viewfinderResize();
		imgResize();
		centerGallery();
	}
			
	//Initialise the viewfinder size
	initViewfinder();
	viewfinderResize();
	//Initialise Resize Rotator Images
	//Needs to run twice
	imgResize();
	imgResize();
	//Initialise Image Centering
	var s=setTimeout("centerGallery();", 1);
	//Gallery Thumbs controls
	//Click on a thumb to see it
	$(".gallery-thumbs LI").click(function(){
		var thisSlide = "#"+($(this).attr("class"))
		rotateNow(thisSlide);
	});
	$(".scroll-right").click(function(){scrollRight();});
	$(".scroll-left").click(function(){scrollLeft();});
	//Homepage controls
	//Click on a box to see the image associated with it
	$(".hp-controls LI").click(function(){
		var thisSlide = "#"+($(this).attr("class"))
		rotateNow(thisSlide);
	});
	//Pause when Hovering over
	/*$(".gallery-viewfinder").hover(function(){
		clearTimeout(t);
	},function(){
		autoRotate();
	});*/
	$(".scroll-left").addClass("inactive");
});

function initViewfinder(){
	$(".gallery-viewfinder").each(function(){
		$(this).children("UL").children("LI:first").addClass("first");
		$(this).children("UL").children("LI:last").addClass("last");
		var countSlides = $(this).children("UL").children("LI").length
		var i = 1
		$(this).children("UL").children("LI").each(function(){
			var slideID = "slide"+i
			$(this).attr("id", slideID);
			var newGalleryThumb = '<li class="'+slideID+'"><img src="'+$(this).children("IMG").attr('src')+'" height="40"/></li>'
			$(".gallery-thumbs UL").append(newGalleryThumb);
			var newHpThumb = '<li class="'+slideID+'">'+slideID+'</li>'
			$("UL.hp-controls").append(newHpThumb);
			i++;
		});
		$(".slide1").addClass("selected");
	});
	var countThumbs = $(".gallery-thumbs .mask UL LI").length
	holderHeight = countThumbs*thumbHeight
	$(".gallery-thumbs .mask UL").width(holderHeight);
	var dontRotate = false
	if ($(".gallery-viewfinder").hasClass("dont-rotate")){dontRotate = true}
	if (dontRotate == false){t = setTimeout("autoRotate();",slideDelay);}
}

$(window).bind("resize", function(){
	viewfinderResize();
	imgResize();
	viewfinderResize();
	imgResize();
	centerGallery();
});

function imgResize(){
	var thisImg = ".gallery-viewfinder .current IMG"
	var allImgs = ".gallery-viewfinder IMG"
	var windowWidth = $(window).width()
	var windowHeight = window.innerHeight;
	var imgWidth = $(thisImg).width()
	var imgHeight = $(thisImg).height()
	var ratio = imgWidth / imgHeight;
	if ((imgWidth >= windowWidth) && (imgHeight <= windowHeight)){
		$(allImgs).css("height", windowHeight);
		$(allImgs).css("width", (windowHeight * ratio));
	}else if ((imgWidth >= windowWidth) && (imgHeight >= windowHeight)){
		$(allImgs).css("width", windowWidth);
		$(allImgs).css("height", (windowWidth / ratio));
	}else if ((imgWidth <= windowWidth) && (imgHeight >= windowHeight)){
		$(allImgs).css("width", windowWidth);
		$(allImgs).css("height", (windowWidth / ratio));
	}else if ((imgWidth <= windowWidth) && (imgHeight <= windowHeight)){
		$(allImgs).css("width", windowWidth);
		$(allImgs).css("height", (windowWidth / ratio));
	}
}

function viewfinderResize(){
	var windowWidth = $(window).width();
	var windowHeight = window.innerHeight;
	$(".gallery-viewfinder").width(windowWidth);
	$(".gallery-viewfinder").height(windowHeight);
}

function centerGallery() {
	var vDisplacement = (($(".gallery-viewfinder").height())-($(".gallery-viewfinder LI").height()))/2
	var hDisplacement = (($(".gallery-viewfinder").width())-($(".gallery-viewfinder LI").width()))/2
	$(".gallery-viewfinder UL").css("top", vDisplacement);
	$(".gallery-viewfinder UL").css("left", hDisplacement);
}

function autoRotate(){
	clearTimeout(t);
	var currSlide = ".current"
	var nextSlide
	if ($(currSlide).hasClass("last")){
		var nextSlide ="#slide1"
	}else{
		var nextSlide = $(currSlide).next();
	}
	
	if ($(".gallery-viewfinder LI").length > 1){
		controlHighlight(nextSlide);
		animating = true;
		$(currSlide).fadeOut(1000, function(){
			animating = false;
			$(currSlide).removeClass("current");
			$(nextSlide).addClass("current");
			$(nextSlide).removeClass("next");
			if ($(nextSlide).hasClass("last")){
				$("#slide1").addClass("next");
			}else{
				$(nextSlide).next().addClass("next");
			}
			$(this).show();
			t = setTimeout("autoRotate();",slideDelay);
		});
	
	}
	
}

function rotateNow(nextSlide){
	clearTimeout(t);
	var currSlide = ".current"
	$(".next").removeClass("next");
	$(nextSlide).addClass("next");
	controlHighlight(nextSlide);
	animating = true;
	$(currSlide).fadeOut(500, function(){
		animating = false;
		$(currSlide).show().removeClass("current");
		$(nextSlide).addClass("current");
		$(nextSlide).removeClass("next");
		
		if ($(nextSlide).hasClass("last")){
			$("#slide1").addClass("next");
		}else{
			$(nextSlide).next().addClass("next");
		}
		$(this).show();
		t = setTimeout("autoRotate();",slideDelay);
	});
}

function controlHighlight(nextSlide){
	$(".hp-controls .selected").removeClass("selected");
	$(".gallery-thumbs .selected").removeClass("selected");
	var controlHighlightID = "LI."+$(nextSlide).attr("id")
	$(controlHighlightID).addClass("selected");
}

function scrollRight(){
	$(".scroll-left").removeClass("inactive");
	var currPos = parseFloat($(".gallery-thumbs UL").css("top"));
	var newPos = currPos - 48
	var maxPos = (holderHeight-(thumbHeight*3))*-1
	if (newPos<=maxPos){
		newPos=maxPos
		$(".scroll-right").addClass("inactive");
	}
	$(".gallery-thumbs UL").animate({"top":newPos}, "fast");
}

function scrollLeft(){
	$(".scroll-right").removeClass("inactive");
	var currPos = parseFloat($(".gallery-thumbs UL").css("top"));
	var newPos = currPos + 48
	var maxPos = 0
	if (newPos>=maxPos){
		newPos=maxPos
		$(".scroll-left").addClass("inactive");
	}
	$(".gallery-thumbs UL").animate({"top":newPos}, "fast");
}

(function($) {
  var cache = [];
  // Arguments are image paths relative to the current page.
  $.preLoadImages = function() {
    var args_len = arguments.length;
    for (var i = args_len; i--;) {
      var cacheImage = document.createElement('img');
      cacheImage.src = arguments[i];
      cache.push(cacheImage);
    }
  }
})(jQuery)


/*
The following mobile address bar hiding function seems to work well on ios but is varied on android.
At this stage seems to work better with address bar hiding.
*/


/**
 * Hide the addressbar on ios & android devices
 * https://gist.github.com/yckart/5609969
 *
 * Based on the work from Nate Smith
 * @see https://gist.github.com/nateps/1172490
 *
 * Copyright (c) 2013 Yannick Albert (http://yckart.com)
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php).
 * 2013/07/10
 */
 
;(function(window) {
 
    window.hideAddressbar = function (elem) {
    
        elem = typeof elem === 'string' ? document.querySelector(elem) : elem;
    
        var ua = navigator.userAgent,
            iphone = ~ua.indexOf('iPhone') || ~ua.indexOf('iPod'),
            ipad = ~ua.indexOf('iPad'),
            ios = iphone || ipad,
            android = ~ua.indexOf('Android'),
            // Detect if this is running as a fullscreen app from the homescreen
            fullscreen = window.navigator.standalone,
            lastWidth = 0;
    
        // We don't go further if we are
        // not on an ios or android device
        // or the passed element was not found
        if (!(ios || android) || !elem) return;
    
        if (android) {
    
            // Android's browser adds the scroll position to the innerHeight, just to
            // make this really fucking difficult. Thus, once we are scrolled, the
            // page height value needs to be corrected in case the page is loaded
            // when already scrolled down. The pageYOffset is of no use, since it always
            // returns 0 while the address bar is displayed.
            window.addEventListener('scroll', function () {
                elem.style.height = window.innerHeight + 'px';
            }, false);
    
        }
    
        var setupScroll = function () {
    
            var height = 0;
    
            // Start out by adding the height of the location bar to the width, so that
            // we can scroll past it
            if (ios) {
    
                // iOS reliably returns the innerWindow size for documentElement.clientHeight
                // but window.innerHeight is sometimes the wrong value after rotating
                // the orientation
                height = document.documentElement.clientHeight;
    
                // Only add extra padding to the height on iphone / ipod, since the ipad
                // browser doesn't scroll off the location bar.
                if (iphone && !fullscreen) height += 60;
    
            } else if (android) {
    
                // The stock Android browser has a location bar height of 56 pixels, but
                // this very likely could be broken in other Android browsers.
                height = window.innerHeight + 56;
    
            }
    
            elem.style.height = height + 'px';
    
            // Scroll after a timeout, since iOS will scroll to the top of the page
            // after it fires the onload event
            setTimeout(scrollTo, 0, 0, 1);
    
        };
    
        (function resize() {
            var pageWidth = elem.offsetWidth;
    
            // Android doesn't support orientation change, so check for when the width
            // changes to figure out when the orientation changes
            if (lastWidth === pageWidth) return;
            lastWidth = pageWidth;
    
            setupScroll();
    
            window.addEventListener('resize', resize, false);
        }());
    
    };
 
}(this));