// sticky menu
/*
jQuery(document).ready(function() {
    if(window.matchMedia('(min-width: 768px)').matches) {
        jQuery(".sticky").sticky({topSpacing:0});
    }
});
*/

jQuery(".fancybox, .gallery a").fancybox({
	padding: 0,
	helpers:  {
        title : {
            type : 'inside'
        }
    }
});

//remove empty p tags
jQuery('p').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
});

//bootstrap for mobile
if(window.matchMedia("(min-width: 768px)").matches){
	jQuery(function() {
		jQuery('.navbar .dropdown').hover(function() {
			jQuery(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
			}, function() {
			jQuery(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
			});

		jQuery('.navbar .dropdown > a').click(function(){
			location.href = this.href;
		});
		jQuery('a.dropdown-toggle').removeAttr('data-toggle');
	});
}

//equal height columns
equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;

jQuery(container).each(function() {

   $el = jQuery(this);
   jQuery($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

jQuery(window).load(function() {
  equalheight('.equal .col');
});

jQuery(window).resize(function(){
  equalheight('.equal .col');
});