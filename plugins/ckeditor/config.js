/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 * Cấu hình: https://ckeditor.com/latest/samples/toolbarconfigurator/index.html#basic
 * https://docs-old.ckeditor.com/CKFinder_2.x/Developers_Guide
 */
CKEDITOR.editorConfig = function( config ) {
		config.language = 'vi';
		config.skin = 'moono-lisa';
		config.height = ''; 
		config.autoParagraph = false;
		config.disallowedContent = 'img{width,height}';
		config.extraPlugins = 'btgrid,link,uploadfile,widget,dialog,list,liststyle,spacingsliders,div,wordcount,wenzgmap,tableresize,filebrowser,filetools,popup,image,image2,imagebrowser,imageresponsive,imagerotate,pastefromword,imagebrowser,imagepaste,quicktable,lineheight,youtube,emoji,brclear,wsc,balloonpanel,a11ychecker,autocomplete,textmatch,ajax,panelbutton,button,xml,autogrow,sourcedialog,html5video,html5audio,lineutils,embed,embedbase,notificationaggregator,notification,embedsemantic,mentions,ckawesome,clipboard,pastetools,pastefromgdocs,balloontoolbar,imagebase,autolink,wysiwygarea,docprops';
		config.removePlugins = 'sourcearea';
		config.embed_provider = '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}';
		config.emoji_minChars = 0; 
		config.wordcount = {
			showParagraphs: true,
			showWordCount: true,
			showCharCount: true,
			countSpacesAsChars: false,
			countHTML: false,
			maxWordCount: -1,
			maxCharCount: -1
		};
		config.height = 300;
		config.autoGrow_minHeight = 300;
		config.autoGrow_maxHeight = 500;
		config.autoGrow_bottomSpace = 20;
		config.line_height="1.0;1.1;1.2;1.3;1.4;1.5;1.5;1.6;1.7;1.8;1.9;2.0;3.0;4.0;5.0" ;
		config.fontSize_sizes = '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;17/17px;18/18px;19/19px;20/20px;22/22px;24/24px;26/26px;28/28px;36/36px;48/48px;72/72px';
		config.keystrokes = [
		
			[ CKEDITOR.CTRL + CKEDITOR.SHIFT + 76, 'link' ],
			[ CKEDITOR.CTRL  + 83, 'save' ]
	
		];
    config.toolbar = 'Full';
		config.toolbar_Full =
		[	//Source -> Sourcedialog
			{ name: 'document', items : ['Maximize','-','Sourcedialog','ckawesome','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
			{ name: 'links', items : ['Link','Unlink','Anchor','-','EmojiPanel','Smiley','Image','Html5video','Html5audio','Embed','Flash','Iframe','Youtube','wenzgmap','Table']},
			{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
			{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt','A11ychecker'] },
			{ name: 'forms', items : ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton','HiddenField' ] },
			{ name: 'paragraph', items : [ 'list','NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
			'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', 'ShowBlocks','-','BidiLtr','BidiRtl','brclear'] },
			{ name: 'insert', items : ['Ho	rizontalRule','SpecialChar','PageBreak']},
			{ name: 'styles', items : [ 'TextColor','BGColor', 'Styles','Format','Font','FontSize','lineheight'] },
			{ name: 'basicstyles', items : [ 'spacingsliders','Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
			{ name: 'Bootstrap', items : [ 'btgrid' ] }
		];
		config.toolbar_Basic =
		[
			['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About']
		];
		
		config.entities = false;
		config.allowedContent = true;
		config.removeFormatAttributes = '';
		config.defaultSortBy = 'date';
		
		var baseUrl = '../plugins/ckeditor/';
	config.filebrowserBrowseUrl = baseUrl+'ckfinder/ckfinder3mn3acdee1c3cf25707d80906fd86fb1d43v1508b23b2012m087v.php';
	config.filebrowserImageBrowseUrl = '../data/ckfinder/ckfinder3mn3acdee1c3cf25707d80906fd86fb1d43v1508b23b2012m087v.php?type=Media';
	config.filebrowserFlashBrowseUrl = baseUrl+'ckfinder/ckfinder3mn3acdee1c3cf25707d80906fd86fb1d43v1508b23b2012m087v.php?type=Flash';
	
	config.filebrowserImageUploadUrl = baseUrl+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Media';
	config.filebrowserUploadUrl = baseUrl+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserFlashUploadUrl = baseUrl+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
		
		
		
		/*var baseUrl = 'http://localhost/dulichnangmoi/data/';
		config.filebrowserBrowseUrl = baseUrl+'filemanager/dialog.php?type=2&editor=ckeditor&fldr=upload';
		config.filebrowserUploadUrl = baseUrl+'filemanager/dialog.php?type=2&editor=ckeditor&fldr=upload';
		config.filebrowserImageBrowseUrl = baseUrl+'filemanager/dialog.php?type=1&editor=ckeditor&fldr=upload';*/
};