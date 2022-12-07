<?php
set_time_limit(0);
ini_set('memory_limit', '128M');
define('EXT','.html');
define('_ROOT',rtrim(dirname(__FILE__),'/').'/');
define('_APP',_ROOT);
define('_CORE',_ROOT);
date_default_timezone_set('Asia/Ho_Chi_Minh');
include _CORE.'bootstrap.php';

// Controller($rewrite, $htaccess, $multi_lang, $sef) 
$controller = new Controller(true,false,false,false);
$controller->model = new Model;
$controller->model->setCache(_CACHE);
$controller->model->db->query("SET NAMES 'UTF8'");
$controller->load_ext();
$controller->load();
?>