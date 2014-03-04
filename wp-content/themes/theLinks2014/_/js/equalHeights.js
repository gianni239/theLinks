/*================================================================*/
/*	REFRESH IF WINDOW IS UNDER OR OVER 747 PX WIDE (removed 20px for scroll bar, that's why)
/*================================================================*/
var ww = $(window).width();
var limit = 747; 

function refresh() {
   ww = $(window).width();
   var w =  ww<limit ? (location.reload(true)) :  ( ww>limit ? (location.reload(true)) : ww=limit );
}

var tOut;
$(window).resize(function() {
    var resW = $(window).width();
    clearTimeout(tOut);
    if ( (ww>limit && resW<limit) || (ww<limit && resW>limit) ) {        
        tOut = setTimeout(refresh, 100);
    }
}); 

/*================================================================*/
/*	TRIGGER EQUAL COLUMNS AT 767 px 
/*================================================================*/
$(window).load(function(){
if (document.documentElement.clientWidth > 767) { //if client width is greater than 767px load equal columns

(function($) {

    $.fn.eqHeights = function() {

        var el = $(this);
        if (el.length > 0 && !el.data('eqHeights')) {
            $(window).bind('resize.eqHeights', function() {
                el.eqHeights();
            });
            el.data('eqHeights', true);
        }
        return el.each(function() {
            var curHighest = 0;
            $(this).children().children().each(function() {
                var el = $(this),
                    elHeight = el.height('auto').height();
                if (elHeight > curHighest) {
                    curHighest = elHeight;
                }
            }).height(curHighest);
        });
    };

    $('#equalHeights,#equalHeightsA,#equalHeightsB,#equalHeightsC,#equalHeightsD').eqHeights(); /*one time per page unless you make another id to add here */
    //alert("Equal Height has run");

}(jQuery));
} // end if
}); // end windowload