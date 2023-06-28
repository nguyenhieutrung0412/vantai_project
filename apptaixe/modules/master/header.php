<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

$oMaster = new MasterModel;
$cache_dao = _CACHE.'dao_cms.php';

if(!file_exists($cache_dao)){
	$file_str = '<?php'."\n";
	$dir = dir(_APP."/dao/");
	while ($file = $dir->read()) {
	  if (substr($file, -4) == '.php') {
		$class = ucfirst(substr($file,0,-4));
		$class_dao = $class.'DAO';
		require _APP.'dao/'.$file;
		$file_str .= 'require _APP.\''."dao/".$file."';\n";
		if(class_exists($class_dao)){
			${'o'.$class} = new $class_dao;
			$file_str .= '$o'.$class.' = new '.$class_dao.";\n";
		}
	  }
	}
	$file_str .= '?>';
	$fp = @fopen($cache_dao,'w');
	if($fp){
		fwrite($fp,$file_str);
		fclose($fp);
	}
}else{
	include $cache_dao;
}

$request = $_GET;
$token = session_id();

$request['type'] = intval($request['type']);
$request['parentid'] = intval($request['parentid']);
if(!$_SESSION['cms_menu']) $_SESSION['cms_menu'] = '0.0';
if($_GET['menu']){
	$_SESSION['cms_menu'] = $request['menu'];
}
$menu = explode('.',$_SESSION['cms_menu']);

//unset($_SESSION);
if($GLOBALS['controller']->module=='user' && $GLOBALS['controller']->action=='login'){
	if(isset($_SESSION['admin_login'])) $hook->redirect('./?token='.$token);
}else{
	if(!isset($_SESSION['admin_login'])) $hook->redirect('./?mod=user&act=login&token='.$token);
}

$result = $oConfigure->view();
while($rs = $result->fetch()){
	$cfg[$rs['code']] = addslashes($rs['value']);
}

/* --------------------- LEFT MENU ----------------------------*/
$tpl = new View('template',$languages); 
$tpl->cache = _CACHE.'cms_';


$image_exts = array('.jpg','.jpeg','.gif','.png','.webp');
$login_user = $_SESSION['admin_login'];
$login_user['setting'] = $login_user['data']?unserialize($login_user['data']):array();
//$skin_dir = is_dir($tpl->tpl_dir.'skins/'.$login_user['setting']['skin'])?$tpl->tpl_dir.'skins/'.$login_user['setting']['skin']:$tpl->tpl_dir.'skins/default';
$skin_dir = is_dir($tpl->tpl_dir.'skins/'.$login_user['setting']['skin'])?$tpl->tpl_dir.'skins/default':$tpl->tpl_dir.'skins/default';
// print_r($_SESSION['admin_login']);

//Load main template
//if(!$skin_dir) $tpl->getWarning('The skin '.$login_user['skin'].' don\'t exists');
//if(!$login_user['setting']['skin'] || !$skin_dir) $login_user['setting']['skin'] = 'default';

$tpl->setfile(array(
	'main'=>'master.tpl',
),$skin_dir);

$tpl->setfile(array(
	'master_header'=>'master_header.tpl',
	'master_footer'=>'master_footer.tpl',
));
$tpl->assign(array(
	'module'=>$system->module,
	'action'=>$system->action,
	'language'=>$system->lang,
	'page'=>$system->page,
	'_UPLOAD'=>_UPLOAD,
	'web_client'=>$cfg['client'],
	'system_year'=>date('Y'),
	'token'=>$token,
));


if(isset($_SESSION['admin_login']))
{
//lấy biển số xe 
$xe = $oContent->view_table("php_doixe","id_taixe = ". $_SESSION['admin_login']['id'] ." LIMIT 1");
$rs_xe = $xe->fetch();
$login_user['biensoxe'] =  $rs_xe['biensoxe'];
$id_secutity_first = rand(1111111,9999999);
$id_secutity_last = rand(1111111,9999999);
$id_security =$id_secutity_first .$login_user['id'].$id_secutity_last;
$login_user['id_security'] =$id_security;
}
$tpl->merge($login_user,'login_user');
if($cfg['language_tab'] == 'tab'){
	$tpl->box('language_tab');
}

if($_SESSION['admin_login']['permission'] == 'ALL') $access = 'ALL';
else $access = unserialize($_SESSION['admin_login']['permission']);


$user_permission = $access['action']?$access['action']:array();
if($access == 'ALL'){
	$user_permission = array(
		'edit'=>1,
		'new'=>1,
		'delete'=>1,
	);
	
}

$ucp = array();
if(!$user_permission['new']) $ucp['new'] = '_d';
if(!$user_permission['edit']) $ucp['edit'] = '_d';
if(!$user_permission['delete']) $ucp['delete'] = '_d';

$tpl->merge($ucp,'ucp');
$tpl->merge($user_permission,'access');
//print_r($login_user['setting']['menu']);
if($access!='ALL') array_pop($MenuName);
$n = count($MenuName);
for($i=0;$i< $n;$i++) if($access=='ALL' || $access['act'][$i]){
	$links = '';
	$_cms_menu = explode('.',$_SESSION['cms_menu']);
	$class_hide = $login_user['setting']['menu'][$i]?'':'style="display: none;"';
	foreach($MenuLink[$i] as $j=>$arr) if($access=='ALL' || $access['act'][$i][$j]){
		//print_r($arr);
		$addL = true;
		if($arr['root_admin'] && !$cfg['root_admin']) $addL = false;
		if($addL) $links .= '<a href="'.$arr['link'].'&menu='.$i.'.'.$j.'" class="left_'.($arr['class']?$arr['class']:'normal').($_SESSION['cms_menu']==$i.'.'.$j?' active':'').'" '.$class_hide.'>'.$arr['name'].'</a>';
	}
	$tpl->assign(array(
		'name'=>$MenuName[$i]['name'],
		'id'=>$i,
		'links'=>$links,
		'firslink'=>$MenuLink[$i][0]['link'].'&menu='.$i.'.0',
		'active'=>$i == $_cms_menu[0]?'active':'',
		'cls_cms'=>$i >= $n-2 ?'menu_cms':'',
	),'leftmenu');
}

//Trong admin thì lấy mặc định lang = vn;
$system->lang = 'vn';

	
$tpl->merge($languages,'lang');
$tpl->merge($cfg,'cfg');
$tpl->merge((array)$system,'system');
?>