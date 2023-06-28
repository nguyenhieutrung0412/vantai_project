<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

if($_POST){
	unset($_POST['Submit']);
	$arr = array(
		'permission'=>serialize($_POST),
	);
	
	//print_r($arr);die;
	
	$oClass->update($request['id'],$arr);
	$oMaster->user_log('Set permission for userId: '.$request['id']);
	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	unset($result['act'],$result['id'],$result['c']);
	$hook->redirect('?'.http_build_query($result));
}


$tpl->setfile(array('body'=>'detail_donhang.tpl'));

$result = $oClass->get($request['id']);
$user = $result->fetch();
if($user['permission'] == 'ALL') $acl = 'ALL';
else $acl = unserialize($user['permission']);
array_pop($MenuName);
//print_r($MenuName);

for($i=0;$i<count($MenuName);$i++){
	$actions = '';
	foreach($MenuLink[$i] as $j=>$arr)  $actions .= ' <input class="no_width" type="checkbox" name="act['.$i.'][]" value="true"'.($acl=='ALL' || $acl['act'][$i][$j]?'checked':'').'> '.$arr['name'].'<br />';
	
	
	$tpl->assign(array(
		'index'=>$i,
		'checked'=>$acl=='ALL' || $acl['act'][$i]['check']?'checked':'',
		'section'=>$MenuName[$i]['name'],
		'actions'=>$actions,
	),'permission');
}

//kiểm tra checked action phân quyền
$action = array();
$all_content = array();
$all_content[intval($acl['all_content']).'_checked'] = 'checked';
if($acl == 'ALL'){
	$action['action']['new'] = $action['action']['edit'] = $action['action']['deleted'] = 'checked';
}

if($acl['action']['new'] == 'checked'){
	$action['action']['new'] = 'checked';
}
if($acl['action']['edit'] == 'checked'){
	$action['action']['edit'] = 'checked';
}
if($acl['action']['delete'] == 'checked'){
	$action['action']['delete'] = 'checked';
}

$breadcrumb->assign('','Permission');
$request['breadcrumb'] = $breadcrumb->parse();

$tpl->assign($request);


$tpl->merge($action['action'],'action');
$tpl->merge($all_content,'all_content');

?>