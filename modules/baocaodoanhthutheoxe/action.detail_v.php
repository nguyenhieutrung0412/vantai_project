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
					<td style="width: 50%;"><a href="'.$domain.'baocaodoanhthunam/detail/?table=phieuchi&code='.$oClass->id_encode($rs_loaichi['id']).'&thang='.$_GET['thang'].'&nam='.$_GET['nam'].'">'.$rs_loaichi['loai_chi'].'</a></td>
				';
				
				//$phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam'] );
				$tongtien_phieuchi = 0;	
				$tongtienchicuanam = 0;
				
				
				$str_loaichi .= '
					<td>'.$count_chi.'</td>
				';
				while($rs_phieuchi = $phieuchi->fetch()){
					
					$tongtien_phieuchi += $rs_phieuchi['sotien_chi'];
					
				}
				$tongtienchicuanam += $tongtien_phieuchi;
				// format tien te
				$tongtien_phieuchi = number_format($tongtien_phieuchi, 0, ',', '.') . "";
				$str_loaichi .= '<td>'.$tongtien_phieuchi.'</td></tr>';
			}
		}
		// end xử lý các loại chi theo tháng
		//xử lý theo dõi dầu theo tháng

	
			$theodoidau = $oContent->view_table('php_theodoidau','thang = '.$_GET['thang'].' AND nam='.$_GET['nam']);
			//$theodoidau = $model->db->query('SELECT * FROM php_theodoidau WHERE  thang = '.$_GET['thang'].' AND nam='.$_GET['nam']);
			$count_theodoidau = $theodoidau->num_rows();
			if($count_theodoidau != 0)
			{
				$str_theodoidau .= '<tr>
					<td style="width: 50%;"><a href="'.$domain.'theodoidau/?thang='.$_GET['thang'].'&nam='.$_GET['nam'].'">Chi phí đổ dầu</a></td>
				';
				
				
				$tongtien_theodoidau = 0;	
				
				$tongtientheodoidaucuanam = 0;
				
				$str_theodoidau .= '
					<td>'.$count_theodoidau.'</td>
				';
				while($rs_theodoidau = $theodoidau->fetch()){
					
					$tongtien_theodoidau += $rs_theodoidau['tong_tien'];
					
				}
				$tongtientheodoidaucuanam += $tongtien_theodoidau;
				// format tien te
				$tongtien_theodoidau = number_format($tongtien_theodoidau, 0, ',', '.') . "";
				$str_theodoidau .= '<td>'.$tongtien_theodoidau.'</td></tr>';
			
			}
		// end xử lý theodoidau theo tháng
		//xử lý theo dõi sửa chữa theo tháng

	
		$theodoisuachua = $oContent->view_table('php_theodoisuachua','thang = '.$_GET['thang'].' AND nam='.$_GET['nam']);
		//$theodoidau = $model->db->query('SELECT * FROM php_theodoidau WHERE  thang = '.$_GET['thang'].' AND nam='.$_GET['nam']);
		$count_theodoisuachua = $theodoisuachua->num_rows();
		if($count_theodoisuachua != 0)
		{
			$str_theodoisuachua .= '<tr>
				<td style="width: 50%;"><a href="'.$domain.'theodoisuachua/?thang='.$_GET['thang'].'&nam='.$_GET['nam'].'">Chi phí sửa chữa</a></td>
			';
			
			
			$tongtien_theodoisuachua = 0;	
			
			$tongtientheodoisuachuacuanam = 0;
			
			$str_theodoisuachua .= '
				<td>'.$count_theodoisuachua.'</td>
			';
			while($rs_theodoisuachua = $theodoisuachua->fetch()){
				
				$tongtien_theodoisuachua += $rs_theodoisuachua['tong_tien'];
				
			}
			$tongtientheodoisuachuacuanam += $tongtien_theodoisuachua;
			// format tien te
			$tongtien_theodoisuachua = number_format($tongtien_theodoisuachua, 0, ',', '.') . "";
			$str_theodoisuachua .= '<td>'.$tongtien_theodoisuachua.'</td></tr>';
		
		}
	// end xử lý theo dõi sửa chữa theo tháng
			
		//xử lý các loại thu theo tháng


		$baocao_loaithu = $oContent->view_table('php_loaithu','baocao = 1 AND active = 1');
		while($rs_loaithu = $baocao_loaithu->fetch()){
			$phieuthu = $model->db->query('SELECT * FROM php_phieuthu WHERE loai_thu = '.$rs_loaithu['id'].' AND active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam']);
			//$phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam'] );
			$count_thu = $phieuthu->num_rows();
			if($count_thu != 0)
			{
				$str_loaithu .= '<tr>
				<td style="width: 50%;"><a href="'.$domain.'baocaodoanhthunam/detail/?table=phieuthu&code='.$oClass->id_encode($rs_loaithu['id']).'&thang='.$_GET['thang'].'&nam='.$_GET['nam'].'">'.$rs_loaithu['loaithu'].'</a></td>
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
				$tongtien_phieuthu = number_format($tongtien_phieuthu, 0, ',', '.') . "";
				$str_loaithu .= '<td>'.$tongtien_phieuthu.'</td></tr>';
			}
			
		}
		// end xử lý các loại thu theo tháng
		
		//xử lý các lương nhân sự  theo tháng

			$luongnhansu = $model->db->query('SELECT * FROM php_luongnhansu WHERE active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam'] );
			//$phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam'] );
				$count_luongnhansu = $luongnhansu->num_rows();
		if($count_luongnhansu > 0)
		{
			$str_luongnhansu .= '<tr>
			<td style="width: 62.25%;"><a href="'.$domain.'baocaodoanhthunam/detail/?table=luongnhansu&thang='.$_GET['thang'].'&nam='.$_GET['nam'].'">Lương nhân sự</a></td>
		';

		while($rs_luongnhansu = $luongnhansu->fetch()){
			
			$tongtien_luongnhansu += $rs_luongnhansu['tong_luong'];
			
		}
		
		
		$loi_nhuan = $tongtienthucuanam - $tong_phi_hoat_dong;
		// format tien te
		// $tongtien_luongnhansu = number_format($tongtien_luongnhansu, 0, ',', '.') . "VND";
		// $str_luongnhansu .= '<td colspan="2" > '.$tongtien_luongnhansu.'</td></tr>';
	// endxử lý các lương nhân sự  theo tháng

		}
				

			

			//xử lý các lương taixe  theo tháng

			$luongtaixe = $model->db->query('SELECT * FROM php_luongtaixe WHERE active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam'] );
			//$phieuchi = $oContent->view_table('php_phieuchi','loai_chi = '.$rs_loaichi['id'].' AND active = 1 AND thang = '.$_GET['thang'].' AND nam='.$_GET['nam'] );
			$count_luongtaixe = $luongtaixe->num_rows();
			if($count_luongtaixe > 0)
			{
		
				$str_luongtaixe .= '<tr>
					<td style="width: 62.25%;"><a href="'.$domain.'baocaodoanhthunam/detail/?table=luongtaixe&thang='.$_GET['thang'].'&nam='.$_GET['nam'].'">Lương tài xế</a></td>
				';

				while($rs_luongtaixe = $luongtaixe->fetch()){
					
					$tongtien_luongtaixe += $rs_luongtaixe['tong_luong'];
					
				}
					
			}
				$tong_phi_hoat_dong = $tongtienchicuanam + $tongtientheodoidaucuanam + $tongtien_luongnhansu + $tongtien_luongtaixe + $tongtientheodoisuachuacuanam ;
				$loi_nhuan = $tongtienthucuanam - $tong_phi_hoat_dong;
			// format tien te
			$tongtien_luongnhansu = number_format($tongtien_luongnhansu, 0, ',', '.') . "";
			$tongtien_luongtaixe = number_format($tongtien_luongtaixe, 0, ',', '.') . "";
			if($count_luongnhansu > 0 )
			{
				$str_luongnhansu .= '<td> '.$tongtien_luongnhansu.'</td></tr>';
				
			}
			if($count_luongtaixe > 0 )
			{
				$str_luongtaixe .= '<td > '.$tongtien_luongtaixe.'</td></tr>';
			}

			// endxử lý các lương nhân sự  theo tháng
		// format tien te
		$rs['tong_luong_cua_nam'] = number_format($tongtienluongcuanam, 0, ',', '.') . "";
		$rs['tong_tien_thu_cua_nam'] = number_format($tongtienthucuanam, 0, ',', '.') . "";
		$rs['tong_tien_chi_cua_nam'] = number_format($tongtienchicuanam, 0, ',', '.') . "";
		$rs['tong_phi_hoat_dong'] = number_format($tong_phi_hoat_dong, 0, ',', '.') . "";
		$rs['loi_nhuan'] = number_format($loi_nhuan, 0, ',', '.') . "";
		$rs['phieuchi_list'] =$str_loaichi;
		$rs['theodoidau_list'] =$str_theodoidau;
		$rs['theodoisuachua_list'] =$str_theodoisuachua;
		$rs['phieuthu_list'] =$str_loaithu;
		$rs['luongnhansu_list'] =$str_luongnhansu;
		$rs['luongtaixe_list'] =$str_luongtaixe;

		$rs['thang'] = $_GET['thang'];
		$rs['nam'] = $_GET['nam'];
		$tpl->merge($rs,'detail');
		$tpl->merge($rs,'detail');
	}

	
$meta = array();
$meta['title'] = 'Báo cáo doanh thu';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');






