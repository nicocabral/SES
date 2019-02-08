(function($){
	
	$.fn.buttonLoader = function(state){
		return this.each(function(){
			var loadingText = $(this).attr('data-loading-text') ? $(this).attr('data-loading-text') : "<i class='fas fa-circle-notch fa-spin'></i> loading...";
				if(state == "loading") {
					$(this).data("original-text",$(this).html());
					$(this).html(loadingText).attr('disabled','disabled');
				}
				if(state == "reset"){
					$(this).html($(this).data('original-text')).removeAttr('disabled');
				}
				
		});
	}
}(jQuery));

