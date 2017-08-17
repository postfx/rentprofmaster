$(document).ready(function() {
	var   $range = $(".range")
	$(".range").ionRangeSlider({
		type: 'single',
		from: 0,
		to: 50
	});
});

function tabInit(){ 
  $('.tabs__content').not('.tabs__content_active').hide(); 
  $('.tabs-list__item button').click(function(){ 
    $('.tabs-list__item').not($(this).parent()).removeClass('tabs-list__item_active'); 
    $(this).parent().addClass('tabs-list__item_active'); 
    $('.tabs__content').not('#'+$(this).attr('data-content')).removeClass('tabs__content_active').hide(); 
    $('#'+$(this).attr('data-content')).addClass('tabs__content_active').fadeIn(); 
  }); 
}; 
tabInit();