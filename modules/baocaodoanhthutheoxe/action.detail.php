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
	'tpl_body'=>'detail_baocao_chitiet.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

if(isset($_GET['table']))
{
	//Xử lý tên bảng
	if($_GET['table'] == 'phieuchi')
	{
		$name_table = 'php_phieuchi';
		$id = $oClass->id_decode($_GET['code']) ;
		$id_where = 'AND loai_chi ='.$id;
		$name = $oContent->view_table('php_loaichi','id ='.$id);
		$rsname = $name->fetch();
		$thang= $_GET['thang'];
		$nam= $_GET['nam'];

		//html
		$str ='
			<thead>
				<tr  class="title-table">
					<th>Mã phiếu chi</th>
					<th>Tên loại chi</th>
					<th>Tên người nhận</th>
					<th>Địa chỉ người nhận</th>     
					<th>Số điện thoại người nhận</th>
					<th>Ngày giờ tạo phiếu</th>
					<th>Số tiền được chi</th>
					<th>Nội dung để chi</th>
					<th>Tên người tạo</th>
				
					
				</tr>
			</thead>
			<tbody>
		';
		
	}
	else if($_GET['table'] == 'phieuthu')
	{
		$name_table = 'php_phieuthu';
		$id = $oClass->id_decode($_GET['code']) ;
		$id_where = 'AND loai_thu ='.$id;
		$name = $oContent->view_table('php_loaithu','id ='.$id);
		$rsname = $name->fetch();
		$thang= $_GET['thang'];
		$nam= $_GET['nam'];

		//html
		$str ='
			<thead>
				<tr  class="title-table">
					<th>Mã phiếu thu</th>
					<th>Tên loại thu</th>
					<th>Tên người thu</th>
					<th>Địa chỉ người thu</th>     
					<th>Số điện thoại người thu</th>
					<th>Ngày giờ tạo phiếu</th>
					<th>Số tiền thu</th>
					<th>Nội dung để thu</th>
					<th>Tên người tạo</th>
				
					
				</tr>
			</thead>
			<tbody>
		';
	}
	else if($_GET['table'] == 'luongnhansu')
	{
		$name_table = 'php_luongnhansu';
		$id_where = '';
	
		$thang= $_GET['thang'];
		$nam= $_GET['nam'];

		//html
		$str ='
			<thead>
				<tr  class="title-table">
					<th>Mã</th>
					<th>Tên nhân sự</th>
					<th>Ngày công</th>
					<th>Lương thỏa thuận</th>
					<th>Tiền bảo hiểm</th>
					<th>Phụ cấp</th>     
					<th>Thưởng nóng</th>
					<th>Tăng ca</th>
					<th>Nghỉ không phép</th>
					<th>Tổng lương đã ứng</th>
					<th>Tổng lương</th>
					<th>Tên kế toán</th>
					
					
				</tr>
			</thead>
			<tbody>
		';
	}
	else if($_GET['table'] == 'luongtaixe')
	{
		$name_table = 'php_luongtaixe';
		$id_where = '';
	
		$thang= $_GET['thang'];
		$nam= $_GET['nam'];

		//html
		$str ='
			<thead>
				<tr  class="title-table">
					<th>Mã </th>
					<th>Tên tài xế</th>
					<th>Ngày công</th>
				
					<th>Lương thỏa thuận</th>
					<th>Tiền hoa hồng</th>
					<th>Tiền bảo hiểm</th>
					<th>Phụ cấp</th>     
					<th>Thưởng nóng</th>
				
					<th>Nghỉ không phép</th>
					<th>Tổng lương đã ứng</th>
					
					<th>Tổng lương</th>
					<th>Tên kế toán</th>
					
					
				</tr>
			</thead>
			<tbody>
		';
	}
	$where = 'active = 1  '.$id_where .' AND thang = '.$thang.' AND nam='.$nam;
	$baocao = $oContent->view_table($name_table,$where);

	$tong = 0;
	while($rs_baocao = $baocao->fetch()){
			
		

		if($name_table == 'php_phieuchi')
		{
			$str .= ' <tr>
			<td>'.$rs_baocao['id'].'</td>
			<td>'.$rsname['loai_chi'].'</td>
			<td>'.$rs_baocao['name_nguoinhan'].'</td>
			<td>'.$rs_baocao['diachi_nguoinhan'].'</td>
			<td>'.$rs_baocao['phone_nguoinhan'].'</td>
			<td>'.$rs_baocao['ngaytao_phieuchi'].'</td>
			<td>'.$oClass->format_tiente($rs_baocao['sotien_chi']).'</td>
			<td>'.$rs_baocao['noidung_chi'].'</td>
			<td>'.$rs_baocao['tennguoitao_chi'].'</td>

		</tr>';
		$tong += $rs_baocao['sotien_chi'];
		}
		else if($name_table == 'php_phieuthu')
		{
			
			$str .= ' <tr>
			<td>'.$rs_baocao['id'].'</td>
			<td>'.$rsname['loaithu'].'</td>
			<td>'.$rs_baocao['name_nguoithu'].'</td>
			<td>'.$rs_baocao['diachi_nguoithu'].'</td>
			<td>'.$rs_baocao['phone_nguoithu'].'</td>
			<td>'.$rs_baocao['ngaytao_phieuthu'].'</td>
			<td>'.$oClass->format_tiente($rs_baocao['sotien_thu']).'</td>
			<td>'.$rs_baocao['noidung_thu'].'</td>
			<td>'.$rs_baocao['tennguoitao_thu'].'</td>

		</tr>';
		$tong += $rs_baocao['sotien_thu'];
		}
		else if($name_table == 'php_luongnhansu')
		{
			

			if($name_table == 'php_luongnhansu'){
				$name = $model->db->query("SELECT * FROM php_nhansu where id = ".$rs_baocao['user_id']);
				
				while($rsname = $name->fetch()){

				
			$str .= ' <tr>
			<td>'.$rs_baocao['id'].'</td>
			<td>'.$rsname['name'].'</td>
			<td>'.$rs_baocao['ngay_cong'].'</td>
			<td>'.$oClass->format_tiente($rs_baocao['luong_thoa_thuan']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['tien_bao_hiem']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['phu_cap']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['thuong_nong']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['tang_ca']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['tong_so_ngay_nghi_khong_phep']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['tong_ungluong']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['tong_luong']).'</td>
			<td>'.$rs_baocao['nguoi_tao'].'</td>
			
			
		</tr>';
		$tong += $rs_baocao['tong_luong'];
			}
		}
	}
	else if($name_table == 'php_luongtaixe')
		{
			

			if($name_table == 'php_luongtaixe'){
				$name = $model->db->query("SELECT * FROM php_taixe where id = ".$rs_baocao['user_id']);
				
				while($rsname = $name->fetch()){

				
			$str .= ' <tr>
			<td>'.$rs_baocao['id'].'</td>
			<td>'.$rsname['name_taix'].'</td>
			<td>'.$rs_baocao['ngay_cong'].'</td>
			<td>'.$oClass->format_tiente($rs_baocao['luong_thoa_thuan']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['tien_hoahong']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['tien_bao_hiem']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['phu_cap']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['thuong_nong']).'</td>
			
			<td>'.$oClass->format_tiente($rs_baocao['tong_so_ngay_nghi_khong_phep']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['tong_ungluong']).'</td>
			<td>'.$oClass->format_tiente($rs_baocao['tong_luong']).'</td>
			<td>'.$rs_baocao['nguoi_tao'].'</td>
			
			
		</tr>';
		$tong += $rs_baocao['tong_luong'];
			}
		}
	}


		
	}
	
	$str .= '
		<td class="color-0" colspan="9">Tổng: '.$oClass->format_tiente($tong).' </td>
		</tbody>
		';
	$str_arr['str_html'] = $str;
	$tpl->merge($str_arr,'str');

	$meta = array();
	$meta['title'] = 'Báo cáo doanh thu';
	
	$meta['icon'] = 'data/upload/cover.jpg';
	$tpl->merge($meta,'meta');
	
}
else{
	//Lỗi không có table để tra cứu 
	header("Location: ".$domain."baocaodoanhthunam");
	exit;
}
	