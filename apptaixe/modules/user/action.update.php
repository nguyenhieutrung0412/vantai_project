<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

$userid = $_SESSION['admin_login']['id'];
if($access=='ALL' && $request['id']) $userid = $request['id'];

$error = NULL;
if($_POST){
	if($do=='new'){
		$result = $oClass->view("`username` = '".$_POST['username']."'");
		if($result->num_rows()) $error = '<strong>'.$_POST['username'].'</strong> already exists, please enter another username';
	}
	$data = array();
	$data['skin'] = $_POST['skin'];
	$data['icon'] = $_POST['icon'];
	
	$arr = array(
		'fullname'=>$_POST['fullname'],
		'username'=>$_POST['username'],
		'data'=>serialize($data),
	);
	
	if(!$error){
		if($do=='new' && $access == 'ALL'){
			$arr['permission'] = 'ALL';
			$arr['password'] = md5($_POST['password']);
			$lastid = $oClass->insert($arr);
			$oMaster->user_log('Added user: '.$_POST['fullname']);
		}else{
			$oClass->update($userid,$arr);
			$log_act = 'Update userId: '.$userid;
			if($userid == $_SESSION['admin_login']['id']){
				$_SESSION['admin_login']['fullname'] = $arr['fullname'];
				$log_act = 'Update profile';
			}
			$oMaster->user_log($log_act);
		}
		// refresh
		
		$query_string = $_SERVER['QUERY_STRING'];
		parse_str($query_string,$result);
		unset($result['mod'],$result['act'],$result['id'],$result['do']);
		if($do=='') $result['msg'] = 'Data has been updated. You must logout and login again to see what you updated!';
		$result['mod'] = $access=='ALL'?'user':'home';
		
		$hook->redirect('?'.http_build_query($result));
	}
}




if($do=='new'){
	$tpl->setfile(array(
		'body'=>'user.new.tpl',
	));
	$request['fullname'] = $_POST['fullname'];
	$request['username'] = $_POST['username'];
	$request['password'] = $_POST['password'];
	$request['confirm_password'] = $_POST['confirm_password'];
	$cat_ln = array();
	$breadcrumb->assign("","New");
	$u = array('setting'=>array());
}else{
	$tpl->setfile(array(
		'body'=>'user.update.tpl',
	));
	$cat = $oClass->get($userid);
	$u = $cat->fetch();
	$u['setting'] = $u['data']?unserialize($u['data']):array();
	$tpl->assign($u);
	$breadcrumb->assign("","Edit",$request['bread']);
	if($userid == $_SESSION['admin_login']['id']){
		$breadcrumb->reset();
		$breadcrumb->assign('','CMS');
		$breadcrumb->assign('','Profile');
	}
}
$dir = dir($tpl->tpl_dir."skins/");
while ($rs = $dir->read()) {
	if($rs != '.' && $rs != '..'){
		if(filetype($dir->path.$rs) == 'dir'){
			$arr = array();
			$arr['value'] = $rs;
			$arr['selected'] = $rs == $u['setting']['skin'] || $rs == $_POST['skin']?'selected':'';
			$arr['name'] = ucfirst($rs);
			$tpl->assign($arr,'skin');
		}
	}
}
$dir = dir($tpl->tpl_dir."images/");
while ($rs = $dir->read()) {
	if($rs != '.' && $rs != '..'){
		if(filetype($dir->path.$rs) == 'dir' && substr($rs,0,6) == 'icons_'){
			$arr = array();
			$arr['value'] = substr($rs,6);
			$arr['selected'] = substr($rs,6) == $u['setting']['icon'] || substr($rs,6) == $_POST['icon']?'selected':'';
			$arr['name'] = ucfirst(substr($rs,6));
			$tpl->assign($arr,'icon');
		}
	}
}
$request['breadcrumb'] = $breadcrumb->parse();
$request['error'] = $error;
//print_r($_POST);
//$request['fullname'] = $_POST['fullname'];
$tpl->assign($request);




?>