<?php defined('_ROOT') or die('Not Allowed');
$merge_block = 3;
$_tpl = '﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--
	Website generated by CMS v02
	URL: http://demo.phpbasic.com
	Email: w2ajax@gmail.com
-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../template/Default/style/font-awesome.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="../template/Default/style/font-awesome-animation.min.css" media="all"/>

<link rel="stylesheet" type="text/css" href="template/css/common.css" />
<link rel="icon" href="../favicon.ico" type="image/x-icon" />
<title>CMS - '.(isset($this->_data["."][0]['web_client'])?$this->_data["."][0]['web_client']:'').'</title>       
<script>var token  = \''.(isset($this->_data["."][0]['token'])?$this->_data["."][0]['token']:'').'\';</script>
<!--<script type="text/javascript" src="../plugins/jquery-1.11.1.min.js"></script>-->
<script type="text/javascript" src="../plugins/jquery-1.3.2.min.js"></script>

<script type="text/javascript" src="../template/Default/js/jquery.form.min.js"></script>



<script>var plugins_dir = \'../\';var root_dir = \''.(isset($this->_data["."][0]['root_dir'])?$this->_data["."][0]['root_dir']:'').'\'; var lang = \''.(isset($this->_data["system."][$i]["lang"])?$this->_data["system."][$i]["lang"]:'').'\';</script>
<script type="text/javascript" src="../plugins/tableorder/jquery.tableorder.js"></script>
<script type="text/javascript" src="template/js/common.js"></script>
<script type="text/javascript" src="template/js/module.configure.js"></script>

<script type="text/javascript" src="../plugins/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src="template/js/editor.js"></script>

<script type="text/javascript" src="../plugins/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="../plugins/divbox/divbox.js"></script>
<link rel="stylesheet" href="../plugins/divbox/css/frontend.css" type="text/css" media="screen" />
<script type="text/javascript">
var access_new = \''.(isset($this->_data["access."][$i]["new"])?$this->_data["access."][$i]["new"]:'').'\';
var access_edit = \''.(isset($this->_data["access."][$i]["edit"])?$this->_data["access."][$i]["edit"]:'').'\';
var access_delete = \''.(isset($this->_data["access."][$i]["delete"])?$this->_data["access."][$i]["delete"]:'').'\';
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
			<p class="hd-r">
				Welcome <span class="hd-username">'.(isset($this->merge['login_user']['name_taixe'])?$this->merge['login_user']['name_taixe']:'').'</span>, 
				<a href="?mod=user&act=update" class="hd-profile">'.(isset($this->_data["lang."][$i]["update_profile"])?$this->_data["lang."][$i]["update_profile"]:'').'</a> or 
				<a href="?mod=user&act=reset" class="hd-resetPass">'.(isset($this->_data["lang."][$i]["reset_password"])?$this->_data["lang."][$i]["reset_password"]:'').'</a> <span class="hd-divider">|</span> 
				<a href="?mod=user&act=logout" class="hd-logout">'.(isset($this->_data["lang."][$i]["logout"])?$this->_data["lang."][$i]["logout"]:'').'</a>
			</p>
			<a class="hd-logo" href="./">'.(isset($this->_data["."][0]['web_client'])?$this->_data["."][0]['web_client']:'').'</a>
		</div>
		
		<div class="ct">
			<div class="side">
				<!--<p class="menu-des">Menu</p>
				<p class="menu-desSub">
					Manage the site by this menu.<br />
					Click to collapse the menu.
				</p>-->
				';if(isset($this->_data['leftmenu.'])){for($i=0;$i< count($this->_data['leftmenu.']);$i++){$_tpl .= '
				<div class="menu '.(isset($this->_data["leftmenu."][$i]["cls_cms"])?$this->_data["leftmenu."][$i]["cls_cms"]:'').'">
					<h2 id="'.(isset($this->_data["leftmenu."][$i]["id"])?$this->_data["leftmenu."][$i]["id"]:'').'menu">'.(isset($this->_data["leftmenu."][$i]["name"])?$this->_data["leftmenu."][$i]["name"]:'').'</h2>
					'.(isset($this->_data["leftmenu."][$i]["links"])?$this->_data["leftmenu."][$i]["links"]:'').'
				</div>
				';}}$_tpl .= '
			</div>
			
			<div class="main">
				<div class="mainInner">
					<div class="breadcrumb">'.(isset($this->_data["."][0]['breadcrumb'])?$this->_data["."][0]['breadcrumb']:'').'</div>
					<div class="module_description">'.(isset($this->_data["."][0]['module_description'])?$this->_data["."][0]['module_description']:'').'</div>				
					<div class="table_list toolbar"><a href="'.(isset($this->_data["."][0]['http_referer'])?$this->_data["."][0]['http_referer']:'').'">&lt; '.(isset($this->_data["lang."][$i]["back"])?$this->_data["lang."][$i]["back"]:'').'</a></div>
<div class="form"><form action="" method="post" enctype="multipart/form-data" name="form1" id="fpermission">
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_list table-Form1" id="table-list">
<!--     <tr>
      <td colspan="2"><h2>Data permission </h2></td>
      </tr>
    
     <tr>
      <td><input name="all_content" type="radio" id="permission_data[]" value="0" '.(isset($this->merge['all_content']['0_checked'])?$this->merge['all_content']['0_checked']:'').' /></td>
      <td>Just content of this user </td>
    </tr>
     <tr>
       <td><input name="all_content" type="radio" id="radio" value="1" '.(isset($this->merge['all_content']['1_checked'])?$this->merge['all_content']['1_checked']:'').' /></td>
       <td>All content </td>
     </tr>
-->   <tr>
      <td colspan="2"><h2>'.(isset($this->_data["lang."][$i]["permission_action"])?$this->_data["lang."][$i]["permission_action"]:'').'</h2></td>
      </tr>
    <tr>
      <td><input name="action[new]" type="checkbox" id="action[]" '.(isset($this->merge['action']['new'])?$this->merge['action']['new']:'').' value="checked" /></td>
      <td>'.(isset($this->_data["lang."][$i]["new"])?$this->_data["lang."][$i]["new"]:'').'</td>
    </tr>
    <tr>
      <td><input name="action[edit]" type="checkbox" id="action[]" '.(isset($this->merge['action']['edit'])?$this->merge['action']['edit']:'').' value="checked" /></td>
      <td>'.(isset($this->_data["lang."][$i]["edit"])?$this->_data["lang."][$i]["edit"]:'').'</td>
    </tr>
    <tr>
      <td><input name="action[delete]" type="checkbox" id="action[]" '.(isset($this->merge['action']['delete'])?$this->merge['action']['delete']:'').' value="checked" /></td>
      <td>'.(isset($this->_data["lang."][$i]["delete"])?$this->_data["lang."][$i]["delete"]:'').'</td>
    </tr>
    <tr>
      <td><input name="checkbox" type="checkbox" disabled="disabled" value="checkbox" checked="checked" /></td>
      <td>'.(isset($this->_data["lang."][$i]["view"])?$this->_data["lang."][$i]["view"]:'').'</td>
    </tr>
    <tr>
      <td colspan="2"><h2>'.(isset($this->_data["lang."][$i]["permission_module"])?$this->_data["lang."][$i]["permission_module"]:'').'</h2></td>
      </tr>
  ';if(isset($this->_data['permission.'])){for($i=0;$i< count($this->_data['permission.']);$i++){$_tpl .= '
    <tr>
      <td width="2%"><input type="checkbox" '.(isset($this->_data["permission."][$i]["checked"])?$this->_data["permission."][$i]["checked"]:'').' name="act['.(isset($this->_data["permission."][$i]["index"])?$this->_data["permission."][$i]["index"]:'').'][check]" value="true" onclick="checkAll(\'#table-list\',this,\'act['.(isset($this->_data["permission."][$i]["index"])?$this->_data["permission."][$i]["index"]:'').']\');"></td>
      <td width="98%">&nbsp;'.(isset($this->_data["permission."][$i]["section"])?$this->_data["permission."][$i]["section"]:'').'</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>'.(isset($this->_data["permission."][$i]["actions"])?$this->_data["permission."][$i]["actions"]:'').'</td>
    </tr>
  ';}}$_tpl .= '	
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <div class="table_list" align="right">
    <input type="submit" class="btn" name="Submit" value="'.(isset($this->_data["lang."][$i]["save"])?$this->_data["lang."][$i]["save"]:'').'"> 
    <input type="button" class="btn btn_cancel" value="'.(isset($this->_data["lang."][$i]["cancel"])?$this->_data["lang."][$i]["cancel"]:'').'" onclick="location.href=\''.(isset($this->_data["."][0]['http_referer'])?$this->_data["."][0]['http_referer']:'').'\';">
  </div>
</form></div>

<script type="text/javascript">
var opt = {
		required: [],
		lang: \'vn\'
	};
	$(\'form#fpermission\').validate(opt);
</script>

				</div>			
			</div>
		</div>
		
		<div class="ft">
			&copy; Copyright '.(isset($this->_data["."][0]['system_year'])?$this->_data["."][0]['system_year']:'').' '.(isset($this->_data["."][0]['web_client'])?$this->_data["."][0]['web_client']:'').'.
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