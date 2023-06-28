<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
$cfg['template'] = 'Default';
$cfg['root_admin'] = true;
$cfg['client'] = 'LogisViet';
$cfg['sef'] = true;

// config includes files for application
include _ROOT.'libraries/php4/common.php';
include _ROOT.'libraries/common/functions.php';
include _ROOT.'libraries/common/breadcrumb.php';
include _ROOT.'libraries/common/image.php';
include _ROOT.'libraries/common/page.php';

$i = -1;


$i++;
$MenuName[$i] = array('name'=>'Home','link'=>'/');
$MenuLink[$i][] = array('name'=>'Dịch vụ','link'=>'?mod=user&act=logout');

$i++;
$MenuName[$i] = array('name'=>'Sản phẩm','link'=>'');
$MenuLink[$i][] = array('name'=>'Sản phẩm','link'=>'?mod=content&type=13');

$i++;
$MenuName[$i] = array('name'=>'Site Content','link'=>'');
$MenuLink[$i][] = array('name'=>'Master Page','link'=>'?mod=html&act=update&id=1');

$i++;
$MenuName[$i] = array('name'=>'Administrators','link'=>'');
$MenuLink[$i][] = array('name'=>'Admin Users','link'=>'?mod=user','class'=>'users');
$MenuLink[$i][] = array('name'=>'Configure','link'=>'?mod=configure','class'=>'configure');