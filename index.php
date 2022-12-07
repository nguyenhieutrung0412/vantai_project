<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

set_time_limit(0);
ini_set('memory_limit', '2000M');//thiết lập bộ nhớ cho trình up/tải file lớn từ server
ini_set('max_input_vars',300001);

define('EXT','.html');
define('_ROOT',rtrim(dirname(__FILE__),'/').'/');
define('_APP',_ROOT);
define('_CORE',_ROOT);
date_default_timezone_set('Asia/Ho_Chi_Minh');
include _CORE.'bootstrap.php';
// Controller($rewrite, $htaccess, $multi_lang, $sef)
$controller = new Controller(true,true,false,false);
$controller->model = new Model;
$controller->model->setCache(_CACHE);
$controller->model->db->query("SET NAMES 'UTF8'");
$controller->load_ext();
$controller->load();