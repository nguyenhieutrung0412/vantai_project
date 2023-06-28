<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
 
defined('_ROOT') or die(__FILE__);
if($access!='ALL') $hook->redirect('./');

$tpl->reset();
$tpl->setfile(array(
	'body'=>'inhoadon.tpl',
	
));
		$a = $oClass->gethtml(3);
		$tpl->merge($a,'lh');
	
		$id = $_GET['id'];
		$con = 'hd.hienthi =1 AND hd.manguoidung=mb.id AND hd.mahoadon ='.$id;
		$content = $oClass->getmember($con);
		$content = $hook->format($content);
		$tpl->merge($content,'member');
		
		$temp =0;
		$temp = "hienthi =1 AND mahoadon =".$id;
		$content = $oClass->getnguoinhan($temp);
		$content = $hook->format($content);
		$temp =$content['tienvanchuyen'];
		$content['del'] = '';
			if($content['matinhtrang'] != 2)
				$content['del'] = 'disabled="disabled"';
		$tpl->merge($content,'nguoinhan');
		
		$temp2 = "hd.mahoadon=ct.mahoadon AND hd.hienthi =1  AND hd.mahoadon ='".$id."'";
		$result = $oClass->getchitiet($temp2);
		$tong = 0;
		$i = 1;
		$tien =0;
		while($rs = $result->fetch()){
			$rs = $hook->format($rs);
			$tong += ($rs['soluong']*$rs['giaban']);
			$rs['thanhtien'] = number_format(($rs['soluong']*$rs['giaban']),0);
			$rs['giaban'] = number_format($rs['giaban'],0);
			$tien = number_format($rs['tienvanchuyen'],0);
			$rs['i']=$i++;
			$tpl->assign($rs,'donhang2');
		}
		$tpl->assign($tien,'vanchuyen');
		$tpl->assign(number_format($tong,0),'tong');
		$tpl->assign(number_format(($tong + $temp),0),'tongcong');
	
?>
