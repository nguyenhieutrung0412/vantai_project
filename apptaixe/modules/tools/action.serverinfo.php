<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
ob_start();
phpinfo();
$html = ob_get_contents();
ob_end_clean();
$tpl->setfile(array(
	'body'=>'tools.serverinfo.tpl',
));
preg_match('/<body[^>]*>(.*).<\/body>/is',$html,$data);
$request['phpinfo'] = str_replace('class="h"','',$data[1]);
$tpl->assign($request);

?>