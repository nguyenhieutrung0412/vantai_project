<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

// if(!isset($_SESSION['user_id']) && !isset($_SESSION['position'])){
// 	header("Location: ".$domain."login");
// 	exit;
// }
  if(isset($_REQUEST['code'])){
	$tpl->setfile(array(
	
		'body'=>'notification_info.tpl',
	
	));
    
    $id_decode = $oClass->id_decode($_REQUEST['code']);
   
	$notification = $oContent->view_table('php_notification','id = '.$id_decode .' LIMIT 1');
   
    $rs = $notification->fetch();
    
     
     //lấy danh sách file nếu có
	$kt_file = $oContent->view_table("php_file","type = 'php_notification' AND type_id = '".$rs['id']."'");
	$total_file= $kt_file->num_rows();
	
	$arr_file = array(
	'pdf'=>'<i class="fa fa-file-pdf-o"></i> ',
	'doc'=>'<i class="fa fa-file-word-o"></i> ',
	'docx'=>'<i class="fa fa-file-word-o"></i> ',
	'xls'=>'<i class="fa fa-file-excel-o"></i> ',
	'xlsx'=>'<i class="fa fa-file-excel-o"></i> '
	);
	
	while($ds_file = $kt_file->fetch()){
		$code_file = $oClass->id_encode($ds_file['id']);
		
		$file_list .= '<p id="pics_'.$code_file.'" style="padding:3px 0;clear:both;width:100%;float:left"><a class="color-1" href="data/upload/files/'.$ds_file['file_name'].'" target="_blank">'.$arr_file[$ds_file['file_type']].' '.$ds_file['file_name'].'</a>
		</p>';
	}
	if($total_file>0){
		$list_file = '<tr><td colspan="2" >'.$file_list.'</td></tr>';
	}
    $rs['file'] = $list_file;

	$tpl->merge($rs,'notification');
 }
 else{
	$tpl->setfile(array(
		
		'body'=>'notification.tpl',
	
	));
    $notification = $oContent->view_table('php_notification','1 ORDER BY id DESC');
    while($ds_notification = $notification->fetch()){
        $user_id= explode(",",$ds_notification['user_id']);
        if(in_array($_SESSION['user_id'],$user_id))
        {
            $ds_notification['id_security'] = $oClass->id_encode($ds_notification['id']); 
            $ds_notification['chua_doc'] = ' chua_doc';
			// $ds_notification['p'] = substr($ds_notification['content'],0,50);
            unset($user_id);
            $tpl->assign($ds_notification,'ds_notification');
        }
        else{
            $ds_notification['id_security'] = $oClass->id_encode($ds_notification['id']); 
			//$ds_notification['p'] = substr($ds_notification['content'],0,50);
            unset($user_id);
            $tpl->assign($ds_notification,'ds_notification');
        }
    }
 }

$meta = array();
$meta['title'] = 'Thông báo';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');

