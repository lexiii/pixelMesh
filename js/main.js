(function ($) {
  $('.spinner .btn:first-of-type').on('click', function(event) {
 event.preventDefault();
 //   $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
    return 0;
  });
  $('.spinner .btn:last-of-type').on('click', function(event) {
 event.preventDefault();
//    $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
    return 0;
  });
})(jQuery);
$(document).ready(function(){
	if(window.location.hash=="#dim"){
		$('body').animate({backgroundColor:"#191919"});
		$('.dimMe').html("Turn them back on!")
	}
$('.lightswitch').click(function(){dim()});


    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
function dim(){
	if(window.location.hash!="#dim"){
		$('body').animate({backgroundColor:"#191919"});
		window.location.hash="dim";
		$('.dimMe').html("Turn them back on!")
	}else{
		$('body').animate({backgroundColor:"#fff"});
		window.location.hash=" ";
		$('.dimMe').html("Dim the lights!")
	}
}
