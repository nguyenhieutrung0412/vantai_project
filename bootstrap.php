<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
require _ROOT.'config.inc.php';
require _APP.'defined.php';

// require framework
require _CORE.'core/caobox/framework.php';
require _CORE.'core/caobox/hooks.php';
require _CORE.'core/caobox/driver/'.$cfg['driver'].'.php';
require _CORE.'core/caobox/db.php';
require _CORE.'core/caobox/template.php';

//require MVC
require _CORE.'core/controller.php';
require _CORE.'core/model.php';
require _CORE.'core/modelcontroller.php';
require _CORE.'core/view.php';
?>