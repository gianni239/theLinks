function initViewfinder(){$(".gallery-viewfinder").each(function(){$(this).children("UL").children("LI:first").addClass("first");$(this).children("UL").children("LI:last").addClass("last");var e=$(this).children("UL").children("LI").length,t=1;$(this).children("UL").children("LI").each(function(){var e="slide"+t;$(this).attr("id",e);var n='<li class="'+e+'"><img src="'+$(this).children("IMG").attr("src")+'" height="40"/></li>';$(".gallery-thumbs UL").append(n);var r='<li class="'+e+'">'+e+"</li>";$("UL.hp-controls").append(r);t++});$(".slide1").addClass("selected")});var e=$(".gallery-thumbs .mask UL LI").length;holderHeight=e*thumbHeight;$(".gallery-thumbs .mask UL").width(holderHeight);var n=!1;$(".gallery-viewfinder").hasClass("dont-rotate")&&(n=!0);n==0&&(t=setTimeout("autoRotate();",slideDelay))}function imgResize(){var e=".gallery-viewfinder .current IMG",t=".gallery-viewfinder IMG",n=$(window).width(),r=window.innerHeight,i=$(e).width(),s=$(e).height(),o=i/s;if(i>=n&&s<=r){$(t).css("height",r);$(t).css("width",r*o)}else if(i>=n&&s>=r){$(t).css("width",n);$(t).css("height",n/o)}else if(i<=n&&s>=r){$(t).css("width",n);$(t).css("height",n/o)}else if(i<=n&&s<=r){$(t).css("width",n);$(t).css("height",n/o)}}function viewfinderResize(){var e=$(window).width(),t=window.innerHeight;$(".gallery-viewfinder").width(e);$(".gallery-viewfinder").height(t)}function centerGallery(){var e=($(".gallery-viewfinder").height()-$(".gallery-viewfinder LI").height())/2,t=($(".gallery-viewfinder").width()-$(".gallery-viewfinder LI").width())/2;$(".gallery-viewfinder UL").css("top",e);$(".gallery-viewfinder UL").css("left",t)}function autoRotate(){clearTimeout(t);var e=".current",n;if($(e).hasClass("last"))var n="#slide1";else var n=$(e).next();if($(".gallery-viewfinder LI").length>1){controlHighlight(n);animating=!0;$(e).fadeOut(1e3,function(){animating=!1;$(e).removeClass("current");$(n).addClass("current");$(n).removeClass("next");$(n).hasClass("last")?$("#slide1").addClass("next"):$(n).next().addClass("next");$(this).show();t=setTimeout("autoRotate();",slideDelay)})}}function rotateNow(e){clearTimeout(t);var n=".current";$(".next").removeClass("next");$(e).addClass("next");controlHighlight(e);animating=!0;$(n).fadeOut(500,function(){animating=!1;$(n).show().removeClass("current");$(e).addClass("current");$(e).removeClass("next");$(e).hasClass("last")?$("#slide1").addClass("next"):$(e).next().addClass("next");$(this).show();t=setTimeout("autoRotate();",slideDelay)})}function controlHighlight(e){$(".hp-controls .selected").removeClass("selected");$(".gallery-thumbs .selected").removeClass("selected");var t="LI."+$(e).attr("id");$(t).addClass("selected")}function scrollRight(){$(".scroll-left").removeClass("inactive");var e=parseFloat($(".gallery-thumbs UL").css("top")),t=e-48,n=(holderHeight-thumbHeight*3)*-1;if(t<=n){t=n;$(".scroll-right").addClass("inactive")}$(".gallery-thumbs UL").animate({top:t},"fast")}function scrollLeft(){$(".scroll-right").removeClass("inactive");var e=parseFloat($(".gallery-thumbs UL").css("top")),t=e+48,n=0;if(t>=n){t=n;$(".scroll-left").addClass("inactive")}$(".gallery-thumbs UL").animate({top:t},"fast")}var t,slideDelay=7e3,holderHeight,thumbHeight=48,animating=!1;$(document).ready(function(){function n(){viewfinderResize();imgResize();viewfinderResize();imgResize();centerGallery()}jQuery.preLoadImages("http://www.site.com.au/images/hp-1.png","http://www.site.com.au/images/hp-2.png","http://www.site.com.au/images/hp-3.png","http://www.site.com.au/images/hp-4.png","http://www.site.com.au/images/hp-5.png","http://www.site.com.au/images/hp-6.png");$(".gallery-viewfinder LI:first-child").addClass("current");$(".gallery-viewfinder LI:first-child").addClass("first");$(".gallery-viewfinder LI:nth-child(2)").addClass("next");$(".hide-interface").click(function(){$(".panel-fade").fadeOut(600);$(".gallery-show").fadeIn(600);hideAddressbar("body")});$(".show-interface").click(function(){$(".panel-fade").fadeIn(600);$(".gallery-show").fadeOut(600);hideAddressbar("body")});$(".next-img").click(function(){autoRotate()});$(".prev-img").click(function(){if(!animating)if($(".gallery-viewfinder LI.current").hasClass("first")){clearTimeout(t);rotateNow(".last");$(".gallery-viewfinder LI.first").prev().addClass("next")}else{clearTimeout(t);$(".gallery-viewfinder LI.previous").removeClass("previous");$(".gallery-viewfinder LI.current").prev().addClass("previous");rotateNow(".previous")}});var e=setInterval(n,400);initViewfinder();viewfinderResize();imgResize();imgResize();var r=setTimeout("centerGallery();",1);$(".gallery-thumbs LI").click(function(){var e="#"+$(this).attr("class");rotateNow(e)});$(".scroll-right").click(function(){scrollRight()});$(".scroll-left").click(function(){scrollLeft()});$(".hp-controls LI").click(function(){var e="#"+$(this).attr("class");rotateNow(e)});$(".scroll-left").addClass("inactive")});$(window).bind("resize",function(){viewfinderResize();imgResize();viewfinderResize();imgResize();centerGallery()});(function(e){var t=[];e.preLoadImages=function(){var e=arguments.length;for(var n=e;n--;){var r=document.createElement("img");r.src=arguments[n];t.push(r)}}})(jQuery);(function(e){e.hideAddressbar=function(t){t=typeof t=="string"?document.querySelector(t):t;var n=navigator.userAgent,r=~n.indexOf("iPhone")||~n.indexOf("iPod"),i=~n.indexOf("iPad"),s=r||i,o=~n.indexOf("Android"),u=e.navigator.standalone,a=0;if(!s&&!o||!t)return;o&&e.addEventListener("scroll",function(){t.style.height=e.innerHeight+"px"},!1);var f=function(){var n=0;if(s){n=document.documentElement.clientHeight;r&&!u&&(n+=60)}else o&&(n=e.innerHeight+56);t.style.height=n+"px";setTimeout(scrollTo,0,0,1)};(function l(){var n=t.offsetWidth;if(a===n)return;a=n;f();e.addEventListener("resize",l,!1)})()}})(this);