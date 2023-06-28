<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
if(!isset($_SESSION['user_id']) && !isset($_SESSION['position']) && $_SESSION['active'] == 0){
	header("Location: ".$domain."login");
	exit;
}

$tpl->setfile(array(
	'tpl_meta'=>'tpl_meta.tpl',
	'tpl_header'=>'tpl_header.tpl',
	'tpl_navbar'=>'tpl_navbar.tpl',
	'tpl_body'=>'baocaodoanhthutheoxe.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

$arr = array(0,1);
if(in_array($_SESSION['chucvu_id'],$arr)){
	$tpl->box('boxadmin');
}




//xử lý hiển thị 12 tháng trong năm 
if(isset($_GET['nam'])|| isset($_GET['thang']) || isset($_GET['xe']))
{

	if(isset($_GET['xe']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_xe =" AND id IN (".$_GET['xe'].")";
	}

	
	
	
	
	
	
		//xử lý xe theo
		$tong_donhangtrongoi = 0;
		$tong_donhangroi = 0;
		$tong_phinhienlieu = 0;
		$tong_phisuachua = 0;
		$tong_sanluongtrongnam = 0;
		$tong_loinhuan = 0;
		$xe = $oContent->view_table('php_doixe','active = 1'.$where_id_xe);
		while($rs_xe = $xe->fetch()){
			$rs_xe['id_security'] = $oClass->id_encode($rs_xe['id']);
		
			//xử lý số lượng đơn hàng rời và trọn gói
			$count_donhangtrongoi = 0;
			$count_donhangroi = 0;
			$total_phinhienlieu = 0;
			$total_phisuachua = 0;
			$total_sanluong = 0;
			$loinhuan = 0;
		
			// $phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$i.' AND nam='.$_GET['nam'] );
			if($_GET['thang'] == '' || $_GET['nam'] == '')
			{
				 $str_arr['thang'] = date('m');
				 $str_arr['nam'] = date('Y');
			}
			else{
				$str_arr['thang'] = $_GET['thang'];
				$str_arr['nam'] = $_GET['nam'];
			}
			$donhangtrongoi = $model->db->query('SELECT * FROM php_donhangtrongoi WHERE id_doixe = '.$rs_xe['id'].' AND active = 1 AND thang = '.$str_arr['thang'].' AND nam='.$str_arr['nam']  );
				

				
			
		
			while($rs_donhangtrongoi = $donhangtrongoi->fetch()){
				
				 $count_donhangtrongoi++;
				$total_sanluong += $rs_donhangtrongoi['phivanchuyen'];
				$tong_donhangtrongoi++;
			}

			$donhangroi = $model->db->query('SELECT * FROM php_donhangroi WHERE id_doixe = '.$rs_xe['id'].' AND active = 1 AND thang = '.$str_arr['thang'].' AND nam='.$str_arr['nam']  );
		
			while($rs_donhangroi = $donhangroi->fetch()){
				
				$count_donhangroi++;
				$total_sanluong += $rs_donhangroi['phivanchuyen'];
				$tong_donhangroi++;
				
			}
			$loinhuan = $total_sanluong;
			$phinhienlieu = $model->db->query('SELECT * FROM php_theodoidau WHERE id_doixe = '.$rs_xe['id'].' AND thang = '.$str_arr['thang'].' AND nam='.$str_arr['nam']  );
		
			while($rs_phinhienlieu = $phinhienlieu->fetch()){
				
				$total_phinhienlieu += $rs_phinhienlieu['tong_tien'];
			
				
				
			}
			$tong_phinhienlieu += $total_phinhienlieu;
			$loinhuan -= $total_phinhienlieu; 
			$phisuachua = $model->db->query('SELECT * FROM php_theodoisuachua WHERE id_doixe = '.$rs_xe['id'].' AND thang = '.$str_arr['thang'].' AND nam='.$str_arr['nam']  );	
		
			while($rs_phisuachua = $phisuachua->fetch()){
				
				$total_phisuachua += $rs_phisuachua['tong_tien'];
				
			
			}
			$tong_phisuachua += $total_phisuachua;
			$loinhuan -= $total_phisuachua; 
			$tong_loinhuan += $loinhuan;
			$tong_sanluongtrongnam += $total_sanluong;

			$total_phinhienlieu = number_format($total_phinhienlieu, 0, ',', '.') ;
			$total_sanluong = number_format($total_sanluong, 0, ',', '.') ;
			$total_phisuachua = number_format($total_phisuachua, 0, ',', '.') ;
			$loinhuan = number_format($loinhuan, 0, ',', '.') ;
			$rs_xe['count_donhangtrongoi'] = $count_donhangtrongoi;
			$rs_xe['count_donhangroi'] = $count_donhangroi;
			$rs_xe['total_phinhienlieu'] = $total_phinhienlieu;
			$rs_xe['total_phisuachua'] = $total_phisuachua;
			$rs_xe['total_sanluong'] = $total_sanluong;
			$rs_xe['loinhuan'] = $loinhuan;
			$tpl->assign($rs_xe,'detail');
	
		}
}
else{
	
	$str = '';
	
	
		//xử lý xe theo
		$tong_donhangtrongoi = 0;
		$tong_donhangroi = 0;
		$tong_phinhienlieu = 0;
		$tong_phisuachua = 0;
		$tong_sanluongtrongnam = 0;
		$tong_loinhuan = 0;
		$xe = $oContent->view_table('php_doixe','active = 1');
		while($rs_xe = $xe->fetch()){
			$rs_xe['id_security'] = $oClass->id_encode($rs_xe['id']);
			//xử lý số lượng đơn hàng rời và trọn gói
			$count_donhangtrongoi = 0;
			$count_donhangroi = 0;
			$total_phinhienlieu = 0;
			$total_phisuachua = 0;
			$total_sanluong = 0;
			$loinhuan = 0;
		
			// $phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$i.' AND nam='.$_GET['nam'] );
			$donhangtrongoi = $model->db->query('SELECT * FROM php_donhangtrongoi WHERE id_doixe = '.$rs_xe['id'].' AND active = 1 AND thang = '.date('m').' AND nam='.date('Y')  );
		
			while($rs_donhangtrongoi = $donhangtrongoi->fetch()){
				
				 $count_donhangtrongoi++;
				$total_sanluong += $rs_donhangtrongoi['phivanchuyen'];
				$tong_donhangtrongoi++;
			}

			$donhangroi = $model->db->query('SELECT * FROM php_donhangroi WHERE id_doixe = '.$rs_xe['id'].' AND active = 1 AND thang = '.date('m').' AND nam='.date('Y')  );
		
			while($rs_donhangroi = $donhangroi->fetch()){
				
				$count_donhangroi++;
				$total_sanluong += $rs_donhangroi['phivanchuyen'];
				$tong_donhangroi++;
				
			}
			$loinhuan = $total_sanluong;
			$phinhienlieu = $model->db->query('SELECT * FROM php_theodoidau WHERE id_doixe = '.$rs_xe['id'].'  AND thang = '.date('m').' AND nam='.date('Y')  );
		
			while($rs_phinhienlieu = $phinhienlieu->fetch()){
				
				$total_phinhienlieu += $rs_phinhienlieu['tong_tien'];
			
				
			}
			$loinhuan -= $total_phinhienlieu; 

			$tong_phinhienlieu += $total_phinhienlieu;
			$phisuachua = $model->db->query('SELECT * FROM php_theodoisuachua WHERE id_doixe = '.$rs_xe['id'].'  AND thang = '.date('m').' AND nam='.date('Y')  );
		
			while($rs_phisuachua = $phisuachua->fetch()){
				
				$total_phisuachua += $rs_phisuachua['tong_tien'];
		
			}
			$loinhuan -= $total_phisuachua; 
			$tong_phisuachua += $total_phisuachua;
			$tong_loinhuan += $loinhuan;
			$tong_sanluongtrongnam += $total_sanluong;

			$total_phinhienlieu = number_format($total_phinhienlieu, 0, ',', '.') ;
			$total_sanluong = number_format($total_sanluong, 0, ',', '.') ;
			$total_phisuachua = number_format($total_phisuachua, 0, ',', '.') ;
			$loinhuan = number_format($loinhuan, 0, ',', '.') ;
			$rs_xe['count_donhangtrongoi'] = $count_donhangtrongoi;
			$rs_xe['count_donhangroi'] = $count_donhangroi;
			$rs_xe['total_phinhienlieu'] = $total_phinhienlieu;
			$rs_xe['total_phisuachua'] = $total_phisuachua;
			$rs_xe['total_sanluong'] = $total_sanluong;
			$rs_xe['loinhuan'] = $loinhuan;
			$tpl->assign($rs_xe,'detail');
			$str_arr['thang'] = date('m');
			$str_arr['nam'] = date('Y');

		}	


	
}
	// format tien te
	$str_arr['tong_donhangtrongoi'] = $tong_donhangtrongoi;
	$str_arr['tong_donhangroi'] = $tong_donhangroi;
	$str_arr['tong_phinhienlieu'] = number_format($tong_phinhienlieu, 0, ',', '.');
	$str_arr['tong_phisuachua'] = number_format($tong_phisuachua, 0, ',', '.');
	$str_arr['tong_sanluongtrongnam'] = number_format($tong_sanluongtrongnam, 0, ',', '.');
	$str_arr['tong_loinhuan'] = number_format($tong_loinhuan, 0, ',', '.');



$tpl->merge($str_arr,'str');

$meta = array();
$meta['title'] = 'Báo cáo doanh thu';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');










