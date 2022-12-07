//
//	jQuery Slug Generation Plugin by Perry Trinier (perrytrinier@gmail.com)
//  Licensed under the GPL: http://www.gnu.org/copyleft/gpl.html

jQuery.fn.slug = function(options) {
	var settings = {
		slug: 'name_seo_vn', // Class used for slug destination input and span. The span is created on $(document).ready() 
		hide: true	 // Boolean - By default the slug input field is hidden, set to false to show the input field and hide the span. 
	};
	
	if(options) {
		jQuery.extend(settings, options);
	}
	
	$this = jQuery(this);

	jQuery(document).ready( function() {
		if (settings.hide) {
			//jQuery('input.' + settings.slug).after("<span class="+settings.slug+"></span>");
			jQuery('input.' + settings.slug).show();
		}
	});
	
	makeSlug = function(str) {
			var strURL = '.html';
			var str = $this.val();
			str = str.toLowerCase();
			str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
			str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
			str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
			str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
			str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
			str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
			str= str.replace(/đ/g,"d");  
			str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|\$|\||\`|\[|\]|\{|\}|_/g,"-");
			
			str= str.replace(/-+-/g,"-");
			str= str.replace(/^\-+|\-+$/g,"");
			
			jQuery('input.' + settings.slug).val(str.toLowerCase());
			jQuery('span.' + settings.slug).text(str.toLowerCase());

		}
		
	jQuery(this).keyup(makeSlug);
	return $this;
};
