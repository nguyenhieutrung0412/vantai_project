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
	'tpl_body' => 'donhangroi_detail.tpl',
	'tpl_footer' => 'tpl_footer.tpl',

));

if (isset($_GET['code'])&& $_GET['thang'] != 0 && $_GET['nam'] != 0) {
	$id  = $oClass->id_decode($_GET['code']);

	//Phân trang
	$don_hang = $oContent->view_table('php_donhangroi');
	//lấy tổng số phần tử tin 
	$total = $don_hang->num_rows();

	$limit = 20;
	$start = $limit * intval($_GET['page']);
	$url = $system->root_dir . 'congnohangroi/donhangroi';
	$dp = new paging($url, $total, $limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage' => $dp->simple(10)));

	$don_hang = $oContent->view_pagination('php_donhangroi', "thang = " . $_GET['thang'] . " AND nam = ".$_GET['nam']."  GROUP BY id DESC", $start, $limit);
	$stt = 1;
	while ($rs = $don_hang->fetch()) {

		//$rs['id_security'] = $oClass->id_encode($rs['id']);
		//truy vấn các đơn hàng con 
		$don_hang_roi_s =  $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi = ".$rs['id']." AND id_khachhang = ".$id." AND phuongthucthanhtoan = 'thanhtoancongno' " );
		$count_donhangroi_s = $don_hang_roi_s->num_rows();
		if($count_donhangroi_s > 0)
		{
			while($rs_donhangroi_s =  $don_hang_roi_s->fetch())
			{
				$rs_donhangroi_s['id_security'] = $oClass->id_encode($rs['id']);

				//xu lý active
				if ($rs_donhangroi_s['sanluong'] == 0) {
					$rs_donhangroi_s['active_sanluong'] = ' class="active-account-die"';
				} else if ($rs_donhangroi_s['sanluong'] == 1) {
					$rs_donhangroi_s['active_sanluong'] = ' class="active-account"';
				}

				if ($rs_donhangroi_s['tinhtrangdon'] == 0) {
					$rs_donhangroi_s['active'] = ' class="active-account-die"';
					$rs_donhangroi_s['edit_delete'] = ' ';
				} else if ($rs_donhangroi_s['tinhtrangdon'] == 1) {
					$rs_donhangroi_s['active'] = ' class="active-account"';
					$rs_donhangroi_s['edit_delete'] = ' remove';
				}

				$rs_donhangroi_s['stt'] = $stt;
				//xu lý tình trạng đơn 

				
				//Xử lý hình thức thanh toán
				if ($rs_donhangroi_s['hinhthucthanhtoan'] == 'thanhtoantienmat') {
					$rs_donhangroi_s['hinhthucthanhtoan_text'] = 'Tiền mặt';
				} else if ($rs_donhangroi_s['hinhthucthanhtoan'] == 'thanhtoancongno') {
					$rs_donhangroi_s['hinhthucthanhtoan_text'] = 'Công nợ khách hàng';
				}
				// xử lý các bảng kết nối
				// lấy thông tin khách hàng
				$kh = $model->db->query("SELECT * FROM php_khachhang WHERE id=" . $rs_donhangroi_s['id_khachhang'] . " LIMIT 1");
				$rs_kh = $kh->fetch();
				$rs_donhangroi_s['name_kh'] =  $rs_kh['name_kh'];
				$rs_donhangroi_s['sdt_kh']  = $rs_kh['phone_kh'];

				// format tien te
				$rs_donhangroi_s['format_luong'] = number_format($rs_donhangroi_s['phivanchuyen'], 0, ',', '.') . "";


				$tpl->assign($rs_donhangroi_s, 'detail');
				$stt++;
				$rs_detail_v['id'] = ' Khách hàng '.$rs_donhangroi_s['name_kh'];

				$tpl->merge($rs_detail_v, 'detail_v');
			}
			
		}
		
		


	
	}


} else {
	header("Location: " . $domain . "congnohangroi");
	exit;
}







$meta = array();
$meta['title'] = 'Chi tiết đơn hàng rời';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta, 'meta');
