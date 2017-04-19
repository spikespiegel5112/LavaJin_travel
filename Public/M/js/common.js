(function($) {
	$(function() {
		var index = {
			rem: function() {
				$.remResizing({
					fontsize:20
				})
			},
			main: function() {
				var that=this;
				this.rem();
			},
			init: function() {
				this.main();
			}
		}
		index.init();
	})
})(jQuery)