<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

$cfg = array();
//$cfg['template'] = 'basic';
include _ROOT.'libraries/php4/common.php';
include _ROOT.'libraries/common/functions.php';
include _ROOT.'libraries/common/breadcrumb.php';
include _ROOT.'libraries/common/image.php';
include _ROOT.'libraries/common/page.php';

include _ROOT.'libraries/common/Mobile_Detect.php';

include _ROOT.'libraries/smtp_gmail/class.phpmailer.php';
include _ROOT.'libraries/smtp_gmail/class.smtp.php';
include _ROOT.'libraries/smtp_gmail/mail.php';
include _ROOT.'libraries/phpexcel/PHPExcel.php';
include _ROOT.'libraries/calender_php/calender.php';
include 'menu.php';