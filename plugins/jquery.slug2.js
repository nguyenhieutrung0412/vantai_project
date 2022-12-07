//
//	jQuery Slug Generation Plugin by Perry Trinier (perrytrinier@gmail.com)
//  Licensed under the GPL: http://www.gnu.org/copyleft/gpl.html

jQuery.fn.att = function(options) {
	var settings = {
		att: 'mtitle_vn', // Class used for slug destination input and span. The span is created on $(document).ready() 
		hide: true	 // Boolean - By default the slug input field is hidden, set to false to show the input field and hide the span. 
	};
	
	if(options) {
		jQuery.extend(settings, options);
	}
	
	$this = jQuery(this);

	jQuery(document).ready( function() {
		if (settings.hide) {
			jQuery('input.' + settings.att).after("<span class="+settings.att+"></span>");
			jQuery('input.' + settings.att).hide();
		}
	});
	
	makeSlug = function() {
			/*var slugcontent = $this.val();
			var slugcontent_hyphens = slugcontent.replace(/\s/g,'-');
			var finishedslug = slugcontent_hyphens.replace(/[^a-zA-Z0-9\-]/g,'');
			jQuery('input.' + settings.att).val(finishedslug.toLowerCase());
			jQuery('span.' + settings.att).text(finishedslug.toLowerCase());*/
			
			var slugcontent = $this.val();
			var slugcontent_hyphens = slugcontent.replace();
			var finishedslug = slugcontent_hyphens.replace();
			jQuery('input.' + settings.att).val(finishedslug);
			jQuery('span.' + settings.att).text(finishedslug);
			
		}
		
	jQuery(this).keyup(makeSlug);
		
	return $this;
};
