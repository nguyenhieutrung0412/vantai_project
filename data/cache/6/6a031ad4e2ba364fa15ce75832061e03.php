<?php
defined('_ROOT') or die('Not Allowed');
$sql = "SELECT c.`module`,ln.* FROM php_module c,php_module_ln ln WHERE c.id = ln.id AND c.active = 1";
$num = "0";
$data = 'a:0:{}';
?>