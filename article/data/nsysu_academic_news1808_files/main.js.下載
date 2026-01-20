if ($('.slider').bxSlider){
	$('.slider').bxSlider({
	    adaptiveHeight: true,
	    nextText:'<i class="fa fa-angle-right"></i>',
	    prevText:'<i class="fa fa-angle-left"></i>',
	});
}

if ($('.carousel').length){
	$('.carousel').bxSlider({
		pager:false,
		minSlides: 1,
		moveSlides:1,
		maxSlides: 4,
		slideWidth: 263,
		slideMargin: 30,
		nextText:'<i class="fa fa-angle-right"></i>',
	    prevText:'<i class="fa fa-angle-left"></i>',
	});
}

var nav = $('.site-header');
    
$(window).scroll(function () {
    if ($(this).scrollTop() > 60) {
        nav.addClass("fixed-top");
    } else {
        nav.removeClass("fixed-top");
    }
});

if ($('.masonry-view').length){
var $container = $('.masonry-view')
	$container.imagesLoaded( function() {
		$container.masonry({
		  itemSelector: '.masonry-item'
		});
	});
}