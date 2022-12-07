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
	'tpl_body'=>'baocaodoanhthunam.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

$arr = array(0,1);
if(in_array($_SESSION['chucvu_id'],$arr)){
	$tpl->box('boxadmin');
}




//xử lý hiển thị 12 tháng trong năm 
if(isset($_GET['nam']))
{
	$str = '';
	
	
	
	for($i = 1; $i <= 12;$i++)
	{
		//xử lý các loại chi theo tháng
	
		$baocao_loaichi = $oContent->view_table('php_loaichi','baocao = 1 AND active = 1');
		while($rs_loaichi = $baocao_loaichi->fetch()){
		$phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$i.' AND nam='.$_GET['nam'] );
		$tongtien_phieuchi = 0;	
		while($rs_phieuchi = $phieuchi->fetch()){
				$tongtien_phieuchi += $rs_phieuchi['sotien_chi'];
				
			}
		}
		$tongtienchicuanam += $tongtien_phieuchi;
		// format tien te
		$tongtien_phieuchi = number_format($tongtien_phieuchi, 0, ',', '.') . "VND";
		//xử lý các loại thu theo tháng
		$tongtien_phieuthu = 0;
		$baocao_loaithu = $oContent->view_table('php_loaithu','baocao = 1 AND active = 1');
	
		while($rs_loaithu = $baocao_loaithu->fetch()){
		$phieuthu = $oContent->view_table('php_phieuthu','loai_thu = '.$rs_loaithu['id'].' AND active = 1 AND thang = '.$i.' AND nam='.$_GET['nam'] );
			while($rs_phieuthu = $phieuthu->fetch()){
				$tongtien_phieuthu += $rs_phieuthu['sotien_thu'];
				
			}
		}
		$tongtienthucuanam += $tongtien_phieuthu;
		// format tien te
		$tongtien_phieuthu = number_format($tongtien_phieuthu, 0, ',', '.') . "VND";
		//xử lý các lương nhân sự  theo tháng
		$tongtien_luongnhansu = 0;
		
		$luongnhansu = $oContent->view_table('php_luongnhansu',' active = 1 AND thang = '.$i.' AND nam='.$_GET['nam'] );
			while($rs_luongnhansu = $luongnhansu->fetch()){
				$tongtien_luongnhansu += $rs_luongnhansu['tong_luong'];
				
			}
			
			//tính tổng lương cộng dồn các tháng theo năm
			$tongtienluongcuanam += $tongtien_luongnhansu;
			// format tien te
			$tongtien_luongnhansu = number_format($tongtien_luongnhansu, 0, ',', '.') . "VND";
		
		$str .= '<tr>
		<td> <i class="fa-regular fa-folder-open"></i><a class="color-1" href="'.$domain.'baocaodoanhthunam/detail_v/?thang='.$i.'&nam='.$_GET['nam'].'"> Tháng '.$i.' - '.$_GET['nam'].'</a></td>
		<td>'.$tongtien_phieuchi.'</td>
		
		<td >
		'.$tongtien_phieuthu.'
		</td>
		<td >
		'.$tongtien_luongnhansu.'
		</td>
	
	</tr>';
	}	
	// format tien te
	$str_arr['tong_luong_cua_nam'] = number_format($tongtienluongcuanam, 0, ',', '.') . "VND";
	$str_arr['tong_tien_thu_cua_nam'] = number_format($tongtienthucuanam, 0, ',', '.') . "VND";
	$str_arr['tong_tien_chi_cua_nam'] = number_format($tongtienchicuanam, 0, ',', '.') . "VND";
	$str_arr['nam'] = $_GET['nam'];
}
else{
	
	$str = '';
	
	for($i = 1; $i <= 12;$i++)
	{
		//xử lý các loại chi theo tháng
		$tongtien_phieuchi = 0;	
		$tongtien_phieuthu = 0;
		$tongtien_luongnhansu = 0;
		$baocao_loaichi = $oContent->view_table('php_loaichi','baocao = 1 AND active = 1');
		while($rs_loaichi = $baocao_loaichi->fetch()){
			$phieuchi = $model->db->query('SELECT * FROM php_phieuchi WHERE loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$i.' AND nam='.date("Y") );
			//$phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$i.' AND nam='.date("Y") );
			
			while($rs_phieuchi = $phieuchi->fetch()){
					$tongtien_phieuchi += $rs_phieuchi['sotien_chi'];
					
					
			}
		}
		$tongtienchicuanam += $tongtien_phieuchi;
			// format tien te
		$tongtien_phieuchi = number_format($tongtien_phieuchi, 0, ',', '.') . "VND";
		// end xử lý các loại chi theo tháng
		//xử lý các loại thu theo tháng
		
		$baocao_loaithu = $oContent->view_table('php_loaithu','baocao = 1 AND active = 1');
	
		while($rs_loaithu = $baocao_loaithu->fetch()){
			$phieuthu = $model->db->query('SELECT * FROM php_phieuthu WHERE loai_thu = '.$rs_loaithu['id'].' AND active = 1 AND thang = '.$i.' AND nam='.date("Y"));
			//$phieuthu = $oContent->view_table('php_phieuthu','loai_thu = '.$rs_loaithu['id'].' AND active = 1 AND thang = '.$i.' AND nam='.date("Y") );
			while($rs_phieuthu = $phieuthu->fetch()){
				$tongtien_phieuthu += $rs_phieuthu['sotien_thu'];	
			}
		}
		$tongtienthucuanam += $tongtien_phieuthu;
		// format tien te
		$tongtien_phieuthu = number_format($tongtien_phieuthu, 0, ',', '.') . "VND";
		// end xử lý các loại thu theo tháng
		//xử lý các lương nhân sự  theo tháng
		
		
		$luongnhansu = $oContent->view_table('php_luongnhansu',' active = 1 AND thang = '.$i.' AND nam='.date("Y") );
			while($rs_luongnhansu = $luongnhansu->fetch()){
				$tongtien_luongnhansu += $rs_luongnhansu['tong_luong'];
				
			}
			$tongtienluongcuanam += $tongtien_luongnhansu;
			// format tien te
			$tongtien_luongnhansu = number_format($tongtien_luongnhansu, 0, ',', '.') . "VND";
			//tính tổng lương cộng dồn các tháng theo năm
			
		// end xử lý các lương nhân sự  theo tháng
		$str .= '<tr>
			<td ><i class="fa-regular fa-folder-open"></i><a class="color-1" href="'.$domain.'baocaodoanhthunam/detail_v/?thang='.$i.'&nam='.date("Y").'"> Tháng '.$i.' - '.date("Y").'</a></td>
			<td>'.$tongtien_phieuchi.'</td>
			
			<td >
			'.$tongtien_phieuthu.'
			</td>
			<td >
			'.$tongtien_luongnhansu.'
			</td>
			
			</tr>';
	}	
	// format tien te
	$str_arr['tong_luong_cua_nam'] = number_format($tongtienluongcuanam, 0, ',', '.') . "VND";
	$str_arr['tong_tien_thu_cua_nam'] = number_format($tongtienthucuanam, 0, ',', '.') . "VND";
	$str_arr['tong_tien_chi_cua_nam'] = number_format($tongtienchicuanam, 0, ',', '.') . "VND";
	$str_arr['nam'] = date("Y");
	
}

$str_arr['thangnam'] = $str;
$tpl->merge($str_arr,'str');

$meta = array();
$meta['title'] = 'Báo cáo doanh thu';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');










