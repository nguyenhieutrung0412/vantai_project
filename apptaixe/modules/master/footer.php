<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);


$html = $tpl->display();
if(is_dir($tpl->tpl_dir.'images/icons_'.$login_user['setting']['icon']))
	$html = str_replace('images/icons_default/','images/icons_'.$login_user['setting']['icon'].'/',$html);
echo $html;
$tpl->cache();
?>