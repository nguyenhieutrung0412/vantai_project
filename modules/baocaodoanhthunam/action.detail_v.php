<?php

defined('_ROOT') or die(__FILE__);
if(!isset($_SESSION['user_id']) && !isset($_SESSION['position'])){
	header("Location: ".$domain."login");
	exit;
}
$tpl->setfile(array(
	'tpl_meta'=>'tpl_meta.tpl',
	'tpl_header'=>'tpl_header.tpl',
	'tpl_navbar'=>'tpl_navbar.tpl',
	'tpl_body'=>'baocaodoanhthunam_detail.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));


	if(!isset($_GET['thang']) || !isset($_GET['nam']))
	{
		header("Location: ".$domain."baocaodoanhthunam/");
		exit;
	}
	else{
		
		//xử lý các loại chi theo tháng

		$baocao_loaichi = $oContent->view_table('php_loaichi','baocao = 1 AND active = 1');
		while($rs_loaichi = $baocao_loaichi->fetch()){
			$phieuchi = $model->db->query('SELECT * FROM php_phieuchi WHERE loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam']);
			$count_chi = $phieuchi->num_rows();
			if($count_chi != 0)
			{
				$str_loaichi .= '<tr>
					<td><a href="'.$domain.'baocaodoanhthunam/detail/?table=phieuchi&code='.$oClass->id_encode($rs_loaichi['id']).'&thang='.$_GET['thang'].'&nam='.$_GET['nam'].'">'.$rs_loaichi['loai_chi'].'</a></td>
				';
				
				//$phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam'] );
				$tongtien_phieuchi = 0;	
				
				
				
				$str_loaichi .= '
					<td>'.$count_chi.'</td>
				';
				while($rs_phieuchi = $phieuchi->fetch()){
					
					$tongtien_phieuchi += $rs_phieuchi['sotien_chi'];
					
				}
				$tongtienchicuanam += $tongtien_phieuchi;
				// format tien te
				$tongtien_phieuchi = number_format($tongtien_phieuchi, 0, ',', '.') . "VND";
				$str_loaichi .= '<td>'.$tongtien_phieuchi.'</td></tr>';
			}
		}
		// end xử lý các loại chi theo tháng
			
		//xử lý các loại thu theo tháng


		$baocao_loaithu = $oContent->view_table('php_loaithu','baocao = 1 AND active = 1');
		while($rs_loaithu = $baocao_loaithu->fetch()){
			$phieuthu = $model->db->query('SELECT * FROM php_phieuthu WHERE loai_thu = '.$rs_loaithu['id'].' AND active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam']);
			//$phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam'] );
			$count_thu = $phieuthu->num_rows();
			if($count_thu != 0)
			{
				$str_loaithu .= '<tr>
				<td><a href="'.$domain.'baocaodoanhthunam/detail/?table=phieuthu&code='.$oClass->id_encode($rs_loaithu['id']).'&thang='.$_GET['thang'].'&nam='.$_GET['nam'].'">'.$rs_loaithu['loaithu'].'</a></td>
				';
				
				$tongtien_phieuthu = 0;	
				
				
				
				$str_loaithu .= '
					<td>'.$count_thu.'</td>
				';
				while($rs_phieuthu = $phieuthu->fetch()){
					
					$tongtien_phieuthu += $rs_phieuthu['sotien_thu'];
					
				}
				$tongtienthucuanam += $tongtien_phieuthu;
				// format tien te
				$tongtien_phieuthu = number_format($tongtien_phieuthu, 0, ',', '.') . "VND";
				$str_loaithu .= '<td>'.$tongtien_phieuthu.'</td></tr>';
			}
			
		}
		// end xử lý các loại thu theo tháng
		
		//xử lý các lương nhân sự  theo tháng

			$luongnhansu = $model->db->query('SELECT * FROM php_luongnhansu WHERE active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam'] );
			//$phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam'] );
				
		
				$str_luongnhansu .= '<tr>
					<td><a href="'.$domain.'baocaodoanhthunam/detail/?table=luongnhansu&thang='.$_GET['thang'].'&nam='.$_GET['nam'].'">Lương nhân sự</a></td>
				';

				while($rs_luongnhansu = $luongnhansu->fetch()){
					
					$tongtien_luongnhansu += $rs_luongnhansu['tong_luong'];
					
				}
				
				$tong_phi_hoat_dong = $tongtienchicuanam + $tongtien_luongnhansu;
				$loi_nhuan = $tongtienthucuanam - $tong_phi_hoat_dong;
				// format tien te
				$tongtien_luongnhansu = number_format($tongtien_luongnhansu, 0, ',', '.') . "VND";
				$str_luongnhansu .= '<td colspan="2" > '.$tongtien_luongnhansu.'</td></tr>';
			// endxử lý các lương nhân sự  theo tháng
			
		// format tien te
		$rs['tong_luong_cua_nam'] = number_format($tongtienluongcuanam, 0, ',', '.') . "VND";
		$rs['tong_tien_thu_cua_nam'] = number_format($tongtienthucuanam, 0, ',', '.') . "VND";
		$rs['tong_tien_chi_cua_nam'] = number_format($tongtienchicuanam, 0, ',', '.') . "VND";
		$rs['tong_phi_hoat_dong'] = number_format($tong_phi_hoat_dong, 0, ',', '.') . "VND";
		$rs['loi_nhuan'] = number_format($loi_nhuan, 0, ',', '.') . "VND";
		$rs['phieuchi_list'] =$str_loaichi;
		$rs['phieuthu_list'] =$str_loaithu;
		$rs['luongnhansu_list'] =$str_luongnhansu;

		$rs['thang'] = $_GET['thang'];
		$rs['nam'] = $_GET['nam'];
		$tpl->merge($rs,'detail');
		$tpl->merge($rs,'detail');
	}

	
$meta = array();
$meta['title'] = 'Báo cáo doanh thu';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');






