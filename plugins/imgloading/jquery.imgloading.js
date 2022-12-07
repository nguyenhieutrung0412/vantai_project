// JavaScript Document

//c = config
//s = setting
(function($){
	$.fn.imgloading = function(s){
		var c = {
			bg: 'plugins/imgloading/comment.png',
			tag: 'img'
		}
		if(s) $.extend(c,s);
		$(this).find(c.tag).wrap('<div class="imgloading_wrap"></div>');
		$('.imgloading_wrap').find('img').hide().parent().attr({'style':'background: #eee url('+c.bg+')'}).find('img').show();
		
	}		  
})(jQuery)