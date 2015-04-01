/**
 * Created by sebo on 04.03.15.
 */
(function($) {
	if ( $("#tx-ecom-product-tools-carousel").length ) {
		var owl = $("#tx-ecom-product-tools-carousel");
		owl.owlCarousel({
			items: 4,
			itemsDesktop : [1199,4],
			itemsDesktopSmall : [980,2],
			itemsTablet: [768,3],
			itemsTabletSmall: false,
			itemsMobile : [479,1],
			navigation: true
		});

		checkMarkupWidth(owl);
/*
		$('#approval-list .next').click(function(){
			owl.trigger('owl.next');
		});
		$('#approval-list .prev').click(function(){
			owl.trigger('owl.prev');
		});
*/

		window.onresize = function() {
			checkMarkupWidth(owl);
		};

		$('.item', owl).click(function() {
			var rel = '#' + $(this).attr('rel');
			$('html, body').animate({
				scrollTop: $(rel).offset().top - 100
			}, 500);
		});
	}
})(jQuery);


function checkMarkupWidth(owl) {
	var outerWrapW = $("#approval-list .approval-wrap").outerWidth();
	var itemsW = 0;
	owl.find(".item").each(function() {
		itemsW = itemsW + $(this).outerWidth();
	});
	if( outerWrapW <= itemsW - 2 ) {
		owl.removeClass("fit");
	} else {
		owl.addClass("fit");
	}
}