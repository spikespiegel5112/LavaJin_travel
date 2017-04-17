(function($) {
	$(function() {
		var index = {
			rem: function() {
				$.remResizing({
					fontsize:20
				})
			},
			align: function(){
				$('.index_categorylist_wrapper li a img').align({
					container:'.index_categorylist_wrapper li a'
				})
				$('.index_productlist_wrapper li .thumbnail>img').align({
					container:'.index_productlist_wrapper li .thumbnail'
				})
			},
			main: function() {
				var that=this;
				this.rem();
				setTimeout(function(){
					that.align();
				},500)
				
			},
			init: function() {
				this.main();
			}
		}
		index.init();
	})
})(jQuery)