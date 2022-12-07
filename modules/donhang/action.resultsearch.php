<?php

defined('_ROOT') or die(__FILE__);
if (!isset($_SESSION['user_id']) && !isset($_SESSION['position'])) {
	header("Location: " . $domain . "login");
	exit;
}
$tpl->setfile(array(
	'tpl_meta' => 'tpl_meta.tpl',
	'tpl_header' => 'tpl_header.tpl',
	'tpl_navbar' => 'tpl_navbar.tpl',
	'tpl_body' => 'donhang.tpl',
	'tpl_footer' => 'tpl_footer.tpl',

));




$meta = array();
$meta['title'] = 'Quản lí đơn hàng';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta, 'meta');
