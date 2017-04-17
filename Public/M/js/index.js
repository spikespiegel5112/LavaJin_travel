(function($) {
	$(function() {
		var index = {
			carousel: function() {
				new Swiper('.index_carousel_wrapper', {
						loop: true,
						pagination: '.swiper-pagination'
				})
			},
			main: function() {
				this.carousel();
			},
			init: function() {
				this.main();
			}
		}
		index.init();
	})
})(jQuery)