<?php defined('_ROOT') or die('Not Allowed');
$merge_block = 6;
$_tpl = '﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--
	Website generated by CMS v02
	URL: http://demo.phpbasic.com
	Email: w2ajax@gmail.com
-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" type="text/css" href="../template/Default/style/font-awesome-animation.min.css" media="all"/>
<link rel="stylesheet" href="template/css/font-awesome.css" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="template/css/main.css" />
<link rel="stylesheet" type="text/css" href="../template/Default/style/all.css" />
<link rel="icon" href="../favicon.ico" type="image/x-icon" />
<title>CMS - '.(isset($this->_data["."][0]['web_client'])?$this->_data["."][0]['web_client']:'').'</title>       
<script>var token  = \''.(isset($this->_data["."][0]['token'])?$this->_data["."][0]['token']:'').'\';</script>
<!--<script type="text/javascript" src="../plugins/jquery-1.11.1.min.js"></script>-->
<script type="text/javascript" src="../plugins/jquery-1.3.2.min.js"></script>

<script type="text/javascript" src="../template/Default/js/jquery.form.min.js"></script>



<script>var plugins_dir = \'../\';var root_dir = \''.(isset($this->_data["."][0]['root_dir'])?$this->_data["."][0]['root_dir']:'').'\'; var lang = \''.(isset($this->merge['system']['lang'])?$this->merge['system']['lang']:'').'\';</script>
<script type="text/javascript" src="../plugins/tableorder/jquery.tableorder.js"></script>
<script type="text/javascript" src="template/js/common.js"></script>
<script type="text/javascript" src="template/js/main.js"></script>
<script type="text/javascript" src="template/js/module.configure.js"></script>

<script type="text/javascript" src="../plugins/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src="template/js/editor.js"></script>

<script type="text/javascript" src="../plugins/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="../plugins/divbox/divbox.js"></script>
<link rel="stylesheet" href="../plugins/divbox/css/frontend.css" type="text/css" media="screen" />
<script type="text/javascript">
// var access_new = \''.(isset($this->merge['access']['new'])?$this->merge['access']['new']:'').'\';
// var access_edit = \''.(isset($this->merge['access']['edit'])?$this->merge['access']['edit']:'').'\';
// var access_delete = \''.(isset($this->merge['access']['delete'])?$this->merge['access']['delete']:'').'\';
</script>
<script type="text/javascript" src="../plugins/validate/validate.js"></script>
<link rel="stylesheet" href="../plugins/validate/css/validate.css" type="text/css" media="screen" />

<script type="text/javascript" src="../plugins/dateinput/dateinput.js"></script>
<!--<script type="text/javascript" src="../plugins/jquery.slug.js"></script>-->
<script type="text/javascript">
$(document).ready(function(){
	$.each($(\'form input[type=text]\'),function(i,val){
		var id = $(val).attr(\'name\');	
		id = id.replace("[","_");
		id = id.replace("]","");
		if($(val).attr(\'id\') == "" || $(val).attr(\'id\')  == undefined){
			$(val).attr(\'id\',id);
			$(val).addClass(id);
		}
	});
	//$("#name_vn").slug();
	
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$(".mtitle_vn").attr(\'maxlength\',\'60\');
	$(".mdesc_vn").attr(\'maxlength\',\'300\');
	$(\'.view_vn\').css({backgroundColor:"#fcebac"});
	$(\'.name_seo_vn\').css({backgroundColor:"#dadada"});	
});
</script>


<script type="text/javascript" src="template/skins/default/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="template/skins/default/css/style.css" />
<!--[if IE]>
<style type="text/css">
tr.show{ display: block; }
</style>
<![endif]--> 

</head>
<body>
	
<div class="wrapper">
	<div class="container">
		<div class="hd">
			<ul class="hd-r">
			<li class="li"><a  class="hd-profile" href="javascript:void(0)"><i class="fa-solid fa-user"></i></a>
				 		<ul class=" profile">
                            <li> 
								<div class="logo_profile">T</div>
								<div class="info_profile">
									<strong>'.(isset($this->merge['login_user']['name_taixe'])?$this->merge['login_user']['name_taixe']:'').'</strong>
									<p>Tài xế xe: '.(isset($this->merge['login_user']['biensoxe'])?$this->merge['login_user']['biensoxe']:'').'</p>
								</div>
							</li>
							
                            <li class="br-fix2" style="clear:both"> 
								<div class="logout"><a href="?mod=user&act=logout" style="cursor: pointer;">Đăng xuất</a>
								</div>
								<div class="change_pass"><a href="?mod=user&act=reset">Đổi mật khẩu?</a></div>
							
							</li>
                        </ul>
				
				</li>
				<li class="li"><a href="?mod=user&act=update" class="hd-">Lương</a> </li>
				<li class="li"><a href="?mod=user&act=reset" class="hd-resetPass">Lệnh</a> </li>
				<li class="li"><a href="?mod=user&act=reset" class="hd-resetPass"><i class="fa-solid fa-bell br-white"></i></a> </li>
				
			</ul>
			<a class="hd-logo" href="./"><img src="template/skins/default/images/logo1.jpg" alt="logo" ></a>
		</div>
		
		<div class="ct">
			
			
			<div class="main">
				<div class="mainInner">
							
					<div class="top_callFunc">
	<a href="?mod=user" class="btn r">&lt; '.(isset($this->merge['lang']['back'])?$this->merge['lang']['back']:'').'</a>
</div>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="fuser">
<h3>'.(isset($this->merge['lang']['username'])?$this->merge['lang']['username']:'').': '.(isset($this->_data["."][0]['username'])?$this->_data["."][0]['username']:'').'</h3>
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table-Form1">
    <tr>
      <td class="textLabel">'.(isset($this->merge['lang']['name'])?$this->merge['lang']['name']:'').' <span class="red">*</span></td>
      <td><input name="fullname" type="text" id="title" value="'.(isset($this->_data["."][0]['fullname'])?$this->_data["."][0]['fullname']:'').'" title="Please enter your full name">&nbsp;</td>
    </tr>
    <tr>
      <td class="textLabel">'.(isset($this->merge['lang']['skin'])?$this->merge['lang']['skin']:'').'</td>
      <td><select name="skin" id="skin">
	  ';if(isset($this->_data['skin.'])){for($i=0;$i< count($this->_data['skin.']);$i++){$_tpl .= '
        <option value="'.(isset($this->_data["skin."][$i]["value"])?$this->_data["skin."][$i]["value"]:'').'" '.(isset($this->_data["skin."][$i]["selected"])?$this->_data["skin."][$i]["selected"]:'').'>'.(isset($this->_data["skin."][$i]["name"])?$this->_data["skin."][$i]["name"]:'').'</option>';}}$_tpl .= '
      </select>      </td>
    </tr>
	<tr>
	  <td class="textLabel">'.(isset($this->merge['lang']['icon'])?$this->merge['lang']['icon']:'').'</td>
	  <td><select name="icon" id="icon">
        ';if(isset($this->_data['icon.'])){for($i=0;$i< count($this->_data['icon.']);$i++){$_tpl .= '
        <option value="'.(isset($this->_data["icon."][$i]["value"])?$this->_data["icon."][$i]["value"]:'').'" '.(isset($this->_data["icon."][$i]["selected"])?$this->_data["icon."][$i]["selected"]:'').'>'.(isset($this->_data["icon."][$i]["name"])?$this->_data["icon."][$i]["name"]:'').'</option>
        ';}}$_tpl .= '
      </select></td>
    </tr>
	<tr>
      <td class="textLabel">&nbsp;</td>
      <td align="right"><br />
	  	<input type="submit" class="btn" name="Submit" value="'.(isset($this->merge['lang']['save'])?$this->merge['lang']['save']:'').'">
	  <input type="button" class="btn btn_cancel" value="'.(isset($this->merge['lang']['cancel'])?$this->merge['lang']['cancel']:'').'" onclick="location.href=\''.(isset($this->_data["."][0]['http_referer'])?$this->_data["."][0]['http_referer']:'').'\';">      </td>
    </tr>
  </table>
</form>
<script type="text/javascript">
var opt = {
		required: [\'fullname\'],
		lang: \'vn\'
	};
	$(\'form#fuser\').validate(opt);
</script>
				</div>			
			</div>
		</div>
		
		<div class="ft">
			<ul>
				<li><a href="/apptaixe/"><i class="fa-solid fa-house"></i><br>Home</a></li>
				<li><a href="/apptaixe/"><i class="fa-solid fa-arrows-rotate fa-spin"></i><br>Làm mới</a></li>
				<li><a><i class="fa-sharp fa-solid fa-magnifying-glass"></i><br>Tra cứu</a></li>
				<li class="fix"><a><i class="fa-solid fa-bell"></i><br>Thông báo</a></li>
			</ul>
		</div>
	</div>
</div>

<table width="5" height="100%" cellpadding="0" cellspacing="0" border="0" class="btn_expandMenu"><tr><td>&nbsp;</td></tr></table>


<div class="cms_overlay"></div>
<noscript>
	<style type="text/css">
		.wrapper{ display: none; }
	</style>
	<div class="noscript">JavaScript must be enabled in order for you to use '.(isset($this->_data["."][0]['web_client'])?$this->_data["."][0]['web_client']:'').' CMS. Please enable JavaScript by changing your browser options, then press <strong>F5</strong> to load page</div>
</noscript>


</body>
</html>'; ?>