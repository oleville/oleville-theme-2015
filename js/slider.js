(function ($) {
	 // Set general variables
    // ====================================================================
    var totalWidth = 0;
    var slideWidth = 0;
	var maxScrollPosition = 0;
	var current_slide = 0;
	
	function size() {
    // Total width is calculated by looping through each gallery item and
    // adding up each width and storing that in `totalWidth`
    $(".background").each(function(){
    	slideWidth = $(window).width();
    	$(this).width(slideWidth);
        totalWidth = totalWidth + $(window).width();
		$('.background-wrapper').css("left", current_slide*slideWidth*-1);
		//alert(current_slide*slideWidth);
    });

    // The maxScrollPosition is the furthest point the items should
    // ever scroll to. We always want the viewport to be full of images.
    maxScrollPosition = (totalWidth - slideWidth) * -1;
	//alert(maxScrollPosition);


    // Basic HTML manipulation
    // ====================================================================
    // Set the gallery width to the totalWidth. This allows all items to
    // be on one line.
    $(".background-wrapper").width(totalWidth);
	}
// Only run everything once the page has completely loaded
$(window).load(function(){

  
     var first = $('.background:first');
	first.clone(true).appendTo('.background-wrapper');
	
	
	size();

    var tid = setInterval(rotate, 9000);
	function rotate() {
		var wrapper = $('.background-wrapper');
		var currentLeft = wrapper.position().left;
	    wrapper.animate({
                    left : currentLeft - slideWidth,
        }, 1300, 'swing', function() { 
		current_slide++;
		if(wrapper.position().left <= maxScrollPosition) {
        	wrapper.css('left' ,0);
			current_slide = 0;
        }});
        

	}

});// JavaScript Document

$(window).resize(function(){
	totalWidth = 0;
	slideWidth = 0;
	size();
	
	
});
})(jQuery);