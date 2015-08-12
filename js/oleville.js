// JavaScript Document

(function ($) {
$('.collapse').click(function(event) {
	event.preventDefault();
	$('.display-content').hide();
	$('#'+$(this).data("target")).show();
});

$('.inactive').click(function(event) {
	event.preventDefault();
});


$('.member-photo a, .scrollableArea a').click(function(event) {
	event.preventDefault();
	$('.member-viewer').hide();
	$('#'+$(this).data("target")).show();
	$("html, body").animate({ scrollTop: $(".breadcrumb").first().offset().top}, "slow");
});
})(jQuery);