$(document).ready(function(){	
	$('a.mb').divbox({path: '../plugins/divbox/players/'});
	$('.error,.breadcrumb_cat').each(function(){
		if($(this).html() != '') $(this).show();						  
	});
	$('input.box_delete_file').each(function(){
		 if($(this).val() != '') $(this).parent().show();
	});
	
	$('a').each(function(){
		var idx = this.href.indexOf('?');
		this.href += idx>-1?'&token='+token:'?token='+token;
	});
})


function checkAll(selects,obj,input_name){
	var st = obj.checked;
	if(input_name == '') input_name = 'pro';
	$(selects+ ' input[name="'+input_name+'\\[\\]"]').each(function(){
		this.checked = st;
	});
}

// function deleteConfirm 
function deleteConfirm(o,msg){
	if(window.confirm(msg?msg:'Do you really want to delete the selected row(s) ?')){
		if(access_delete) location.href=o.href+'&c=1';
		else{alert('You have no access to do this action.');return false;}
	}
	return false;
}


function add_gallery(selector,is_gallery_name,is_gallery_icon){
	var len = $(selector+ ' input[type="file"]').length+1;	
	$(selector).append('<div class="gallery-inputFile">'+
					'<p class="hide '+(is_gallery_name?'show':'')+'"><label>Title</label> <input name="name_gallery'+len+'" type="text" value="" title="" /></p>'+
					'<p class="hide '+(is_gallery_icon?'show':'')+'"><label>Upload Icon</label> <input type="file" name="icon_gallery'+len+'" size="25" /></p>'+
					'<p><label>Upload Image</label> <input type="file" name="image_gallery'+len+'" size="25" /></p>'+
				'</div>');
}

function  deleteGallery(selects,type){
	if(window.confirm('Are you really  want to delete selected image(s)?')){
		if(access_delete){
			$(selects+' input[name="del_gallery\\[\\]"]').each(function(){
				var id = this.value;
				if(this.checked) $.post('?mod=gallery&act=delete&p=content&c=1&echo=1&type='+type+'&id='+id,{},function(data){
					if(data=='1') $(selects+ ' #'+id).remove();
				});
			});
		}else{
			alert('You have no access to do this action');	
		}
	}
}



function checkSubmitAction(doc){
	if(doc.content_action.value==''){ alert('Please chose the action!');doc.content_action.focus();return false;}
	if(doc.content_action.value == 'delete'){
		if(window.confirm('Are you sure you want to delete  selected items ?')){
			if(access_delete) return true;
			alert('You have no access to do this action');
			return false;
		}
		return false;
	}
	overlay();
	return true;
}
function stripUnicode(str){
	if(!str) return '';
	var unicode_arr = [];
	unicode_arr['a'] = ['á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'];
	unicode_arr['A'] = ['Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'];
	unicode_arr['d'] = ['đ'];
	unicode_arr['D'] = ['Đ'];
	unicode_arr['e'] = ['é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'];
	unicode_arr['E'] = ['É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'];
	unicode_arr['i'] = ['í','ì','ỉ','ĩ','ị'];
	unicode_arr['I'] = ['Í','Ì','Ỉ','Ĩ','Ị'];
	unicode_arr['o'] = ['ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'];
	unicode_arr['0'] = ['Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'];
	unicode_arr['u'] = ['ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'];
	unicode_arr['U'] = ['Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'];
	unicode_arr['y'] = ['ý','ỳ','ỷ','ỹ','ỵ'];
	unicode_arr['Y'] = ['Ý','Ỳ','Ỷ','Ỹ','Ỵ'];
	
	for(var chr in unicode_arr){
		var regexp = new RegExp(unicode_arr[chr].join('|'),'ig');
		str = str.replace(regexp,chr)
	}
	return str;
}
function str2sef(str,sel){
	str = stripUnicode(str);
	str = str.toLowerCase();
	str = str.replace(/\-/ig,' ');
	str = str.replace(/^\s+|\s+$/g,"");
	str = str.replace(/\s+/ig,'-');
	$(sel).val(str);	
}


function showLangTab(ln,o){
	$('div.language_tab a').removeClass('active');
	$(o).addClass('active');
	$('table.table-Form1 tbody.tab_language').addClass('hide');
	$('table.table-Form1 tbody#tab_'+ln).removeClass('hide');
}

function overlay(){
	var pH = window.innerHeight+window.scrollMaxY || document.body.scrollHeight || document.body.offsetHeight;
	$('.cms_overlay').css({height: pH}).show();
}

function missing_field(name){
	alert('Field: "'+name+'" is missing, please contact webadmin to fix it');	
}

function save_status_menu(menuid,val){
	$.post('?mod=user&act=menu',{'menuid': menuid,'status': (val == 'none'?1:0)},function(data){});
}

function addOptions(typeid,js_string,obj){
	var label = window.prompt('Name');
	if(label){
		$(obj).html('Waiting...');
		$.post('?mod=options&act=update',{'savequick': true, 'typeid': typeid, 'lang': lang, 'name': label},function(data){
			var value = parseInt(data);
			if(value > 0){
				js_string = js_string.replace('%value',value);
				js_string = js_string.replace('%label',label);
				$('#opt'+typeid).append(js_string);
			}else{
				alert(data);
			}
			$(obj).html('New');
		});
	}
	
	return false;
}

function resize_toggle_advance(o){
	$(o).parent().find('table').toggle();
	return false;
}

//----- Check new chat
function chat_Active0(id){
	$.ajax({
		type: "POST",
		url: "?mod=chat&act=hot",
		data: "id="+id,
		cache: false,
		dataType: "html",
		success: function(html){
			if(html==1){
				window.location.reload();
			}
			if(html==0){
				alert('Có lỗi xảy ra, vui lòng thực hiện lại!');
			}
		}
	});
	return false;
}

function chat_Active1(id){
	$.ajax({
		type: "POST",
		url: "?mod=chat&act=hot_not",
		data: "id="+id,
		cache: false,
		dataType: "html",
		success: function(html){
			if(html==1){
				window.location.reload();
			}
			if(html==0){
				alert('Có lỗi xảy ra, vui lòng thực hiện lại!');
			}
		}
	});
	return false;
}

/*Modules booking khách hàng*/
function showBooking(module,action,code){
	$.ajax({
        type: "POST",
        //url: "?mod=booking&act=show",
				url: "?mod="+module+"&act="+action,
        data: "code=" + code,
        cache: false,
        dataType: "json",
				beforeSend: function(){
					$("body").append('<div class="fscreen"><div class="process"><p class="p1">Vui lòng đợi...</p><div class="loading"></div></div></div>');
				},
        success: function(rs) {
						//console.log(rs);
            $('.fscreen').remove();
						$("body").append(rs['str']);
						
						$('.close').click(function(e) {
              $('.full_frm,.fscreen').remove();
            });
        }
    });
    return false;
}

//hàm xuất playlist mp3
function getPlayList(code){
	$.ajax({
		type: 'POST',
		url: "?mod=booking&act=xuatmp3",
		data: 'code='+code+'&action=getPlayList',
		cache:false,
		dataType:"html",
		beforeSend: function(){
			$('#code_'+code).removeAttr('onClick');
			$("body").append('<div class="fscreen"><div class="process"><p class="p1">Đang xuất File, Vui lòng đợi...</p><div class="loading"></div></div></div>');
		},
		success: function(html){
			//console.log(html);
			$('.fscreen').remove();
			$("body").append('<div class="fscreen"><div class="process process2"><div class="success-checkmark"><div class="check-icon"><span class="icon-line line-tip"></span><span class="icon-line line-long"></span><div class="icon-circle"></div><div class="icon-fix"></div></div></div><p class="p1 green">Chúc mừng, xuất File thành công!</p><p>Album bạn xuất đã được lưu vào thư mục.</p><span class="close_loading">Đóng lại</span></div></div>');
			
			$('.close_loading').click(function(){
					$('.fscreen').remove();
				});
		}
	});
	
	return false;
	
}

function updateBooking(code){
	var $data = $('form[name="frmBooking"').serialize();
	$.ajax({
		type: 'POST',
		url: "?mod=booking&act=update",
		data: $data+'&code='+code+'&action=updateBooking',
		cache:false,
		dataType:"html",
		beforeSend: function(){
			$("body").append('<div class="fscreen"><div class="process"><p class="p1">Vui lòng đợi...</p><div class="loading"></div></div></div>');
		},
		success: function(html){
			//console.log(html);
			$('.fscreen').remove();
			$("body").append('<div class="fscreen"><div class="process process2"><div class="success-checkmark"><div class="check-icon"><span class="icon-line line-tip"></span><span class="icon-line line-long"></span><div class="icon-circle"></div><div class="icon-fix"></div></div></div><p class="p1 green">Chúc mừng, cập nhật thành công!</p><p>Thông tin booking đã được cập nhật thành công.</p><span class="close_loading">Đóng lại</span></div></div>');
			
			$('.close_loading').click(function(){
					$('.fscreen').remove();
				});
		}
	});
	
	return false;
}

function showSendEmailForm(code){
	$.ajax({
        type: "POST",
        url: "?mod=booking&act=sendmailform",
        data: "code=" + code,
        cache: false,
        dataType: "json",
				beforeSend: function(){
					$("body").append('<div class="fscreen"><div class="process"><p class="p1">Vui lòng đợi...</p><div class="loading"></div></div></div>');
				},
        success: function(rs) {
						//console.log(rs);
            $('.fscreen').remove();
						$("body").append(rs['str']);
						
						$('.close').click(function(e) {
              $('.full_frm,.fscreen').remove();
            });
        }
    });
    return false;
	
}

function sendEmailToCustomer(code){
		var $data = $('form[name="frmBooking"').serialize();
		$.ajax({
			type: 'POST',
			url: "?mod=booking&act=send",
			data: $data+'&code='+code+'&action=sendEmailToCustomer',
			cache:false,
			dataType:"html",
			beforeSend: function(){
				$("body").append('<div class="fscreen"><div class="process"><p class="p1">Vui lòng đợi...</p><div class="loading"></div></div></div>');
			},
			success: function(html){
				console.log(html);
				$('.fscreen').remove();
				$("body").append('<div class="fscreen"><div class="process process2"><div class="success-checkmark"><div class="check-icon"><span class="icon-line line-tip"></span><span class="icon-line line-long"></span><div class="icon-circle"></div><div class="icon-fix"></div></div></div><p class="p1 green">Chúc mừng, gửi Email thành công!</p><p>Thông tin download nhạc đã được gửi khách hàng thành công.</p><span class="close_loading">Đóng lại</span></div></div>');
				
				$('.close_loading').click(function(){
						$('.fscreen').remove();
					});
			}
		});
	return false;
}


function frmForm(module,action,code){
	$.ajax({
		type:"POST",
		url: "?mod="+module+"&act="+action,
		data:"code="+code,
		cache:false,
		dataType:"json",
		beforeSend: function(){
			$("body").append('<div class="fscreen"><div class="process"><p class="p1">Vui lòng đợi...</p><div class="loading"></div></div></div>');
		},
		success:function(rs){
			//console.log(rs);
			if(rs['status']==1){
				$('.fscreen').remove();
				$('body').prepend(rs['str']);
				$(".close_pop,.close_btn").click(function(){
					$('.popup,.screen').fadeOut().remove();
				});
			}
		}
	});
return false;
}

function insert(module,action,formName,code){
	var form_data = $('form[name="'+formName+'"]').serialize();
	$.ajax({
		type:"POST",
		url: "?mod="+module+"&act="+action,
		data:form_data,
		cache:false,
		dataType:"json",
		beforeSend: function(){
			$("body").append('<div class="fscreen" style="z-index:999"><div class="process"><p class="p1">Vui lòng đợi...</p><div class="loading"></div></div></div>');
		},
		success:function(rs){
			//console.log(rs);
			if(rs['status']==1){
				$('#catid_'+code).html(rs['icon']);
				$('.popup,.screen,.fscreen').remove();
			}
			$(".close_pop,.close_btn").click(function(){
				$('.popup,.screen').fadeOut().remove();
			});
		}
	});
	return false;
}

function insertMP3(module,formName){
	var data = document.getElementById(formName);
	var file_data = document.getElementById('mp3_file').files;	
	var form_data = new FormData(data);
	form_data.append("file",file_data);
	
	$.ajax({
		type:"POST",
		//url: "?mod="+module+"&act="+action,
		url: "?mod="+module,
		//url: "../demo/",
		data:form_data,
		cache:false,
		dataType:"html",
		processData: false,
		contentType: false,
		beforeSend: function(){
			$("body").append('<div class="fscreen" style="z-index:999"><div class="process"><p class="p1">Vui lòng đợi...</p><div class="loading"></div></div></div>');
		},
		success:function(rs){
			console.log(rs);
		}
	});
	return false;
}

//----- Check new comments
function ct_Active0(id){
	$.ajax({
		type: "POST",
		url: "?mod=faq&act=hot",
		data: "id="+id,
		cache: false,
		dataType: "html",
		success: function(html){
			if(html==1){
				window.location.reload();
			}
			if(html==0){
				alert('Có lỗi xảy ra, vui lòng thực hiện lại!');
			}
		}
	});
	return false;
}

function ct_Active1(id){
	$.ajax({
		type: "POST",
		url: "?mod=faq&act=hot_not",
		data: "id="+id,
		cache: false,
		dataType: "html",
		success: function(html){
			if(html==1){
				window.location.reload();
			}
			if(html==0){
				alert('Có lỗi xảy ra, vui lòng thực hiện lại!');
			}
		}
	});
	return false;
}

//----- Check new contact
function cta_Active0(id){
	$.ajax({
		type: "POST",
		url: "?mod=contact&act=hot",
		data: "id="+id,
		cache: false,
		dataType: "html",
		success: function(html){
			if(html==1){
				window.location.reload();
			}
			if(html==0){
				alert('Có lỗi xảy ra, vui lòng thực hiện lại!');
			}
		}
	});
	return false;
}

function cta_Active1(id){
	$.ajax({
		type: "POST",
		url: "?mod=contact&act=hot_not",
		data: "id="+id,
		cache: false,
		dataType: "html",
		success: function(html){
			if(html==1){
				window.location.reload();
			}
			if(html==0){
				alert('Có lỗi xảy ra, vui lòng thực hiện lại!');
			}
		}
	});
	return false;
}

//modules active chung tất cả các modules cần thiết
function active(module,action,code,flag){
		$.ajax({
			type: "POST",
			url: "?mod="+module+"&act="+action,
			data: "code="+code+"&flag="+flag,
			cache: false,
			dataType: "json",
			success: function(rs){
				//console.log(rs);
				if(rs['status']==1){
					location.reload();
				}
				if(rs['status']==0 || rs['status']==2){
					alert(rs['str']);
					location.reload();
				}
			}
		});
	return false;
}

//modules delete chung tất cả các modules cần thiết
function Delete(module,action,code,flag){
	var conf = window.confirm('Bạn có chắc xóa mẫu tin này không?');
	if(conf==false){
		return false;
	}else{
		$.ajax({
			type: "POST",
			url: "?mod="+module+"&act="+action,
			data: "code="+code+"&flag="+flag,
			cache: false,
			dataType: "json",
			success: function(rs){
				//console.log(rs);
				if(rs['status']==1){
					$('#del'+code).remove();
				}
				if(rs['status']==0 || rs['status']==2){
					alert(rs['str']);
					location.reload();
				}
			}
		});
	}
	return false;
}