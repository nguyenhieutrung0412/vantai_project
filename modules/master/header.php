<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

$oMaster = new MasterModel;
$configure_mod = $oMaster->configure_mod();
$cfg = $configure_mod['cfg'];

$cache_dao = _CACHE.'dao.php';

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
			${'o'.$class} = new $class_dao($configure_mod);
			if($cfg['cache_query']=='yes') ${'o'.$class}->setCache(_CACHE);
			$file_str .= '$o'.$class.' = new '.$class_dao."(\$configure_mod);\n";
			if($cfg['cache_query']=='yes') $file_str .= '$o'.$class.'->setCache(_CACHE);'."\n";
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
if(!$cfg['template'] || !file_exists('template/'.$cfg['template'].'/master.tpl')) $cfg['template'] = 'Default';
$tpl = new View('template/'.$cfg['template'],$languages); 
$tpl->folder = 'img|format|media|css|images|flash|js|upload';
//$tpl->gzip = $cfg['gzip'];
$tpl->gzip = true;
if($cfg['cache_tpl']=='yes') $tpl->cache = _CACHE;

//Load main template
$tpl->setfile(array(
	'main'=>'master.tpl',
	));



$tpl->assign(array(
	'root_dir'=>$system->root_dir,
	'_UPLOAD'=>_UPLOAD,
	'online'=>rand(1,50),
));

//print_r($system->modules['url'][$system->module]);

//print_r($_SERVER);
$p_modul = isset($system->modules[$system->lang]['module'])?$system->modules[$system->lang]['module']:'';
$p_modul_url = isset($system->modules['url'][$system->module])?$system->modules['url'][$system->module]:'';
$p_modul_data = isset($system->modules['data'][$system->module][$system->lang])?$system->modules['data'][$system->module][$system->lang]:'';
$p_modul_name = isset($system->modules[$system->lang]['name'])?$system->modules[$system->lang]['name']:'';

/*kiểm tra nếu module là home thì đổi url là trang chủ không có /vi
- Xử lý nếu ngôn ngữ nào được chọn mặc đình thì sẽ là url trang chủ không có item phí sau dấu '/'
*/
//if($system->module == 'home'){
	$lang = new modelController;
	$langDefult = $lang->langSetDefault('ln')['ln'];
	
	//nếu ngôn ngũ mặc định là vi thì set url là trang chủ không /vi
	if($p_modul['home'] == $langDefult)$p_modul['home']='';
	
	//set null đối với ln mặc
	foreach($system->modules['url'][$system->module] as $key=>$val){
		$val = explode('/',$val);
		$data_switch[$key] = str_replace($langDefult,'',$val[0]);
		
	}
	$system->modules['url'][$system->module] = $data_switch;
//}
//nếu module = home thì set module ln = null

//print_r($p_modul);
//print_r($system->modules['main']['lien-he']['module_name']);

$tpl->merge((array)$system,'system');
$tpl->merge($system->modules['url'][$system->module],'switch_url');



$tpl->merge($p_modul_data,'pages');
$tpl->merge($p_modul,'module');
$tpl->merge($p_modul_name,'module_name');
$tpl->merge($cfg,'cfg');
$tpl->merge($languages,'lang');
//print_r($languages);
?>

