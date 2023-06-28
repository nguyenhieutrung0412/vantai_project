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
	'tpl_body' => 'truckho_donhangnhan_detail.tpl',
	'tpl_footer' => 'tpl_footer.tpl',

));

if (isset($_GET['code'])) {
	$id  = $oClass->id_decode($_GET['code']);

	//Phân trang
	 $don_hang = $oContent->view_table('php_donhangroi_s', 'kho_nhanhang = ' . $id);
	//lấy tổng số phần tử tin 
	$total = $don_hang->num_rows();

	$limit = 20;
	$start = $limit * intval($_GET['page']);
	$url = $system->root_dir . 'donhangroi';
	$dp = new paging($url, $total, $limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage' => $dp->simple(10)));

	$don_hang = $oContent->view_pagination('php_donhangroi_s', "kho_nhanhang = " . $id . "  GROUP BY id DESC", $start, $limit);
	$stt = 1;
	while ($rs = $don_hang->fetch()) {

		$rs['id_security'] = $oClass->id_encode($rs['id']);
		$rs['text'] = 'Đến';
		//xu lý active
		if ($rs['sanluong'] == 0) {
			$rs['active_sanluong'] = ' class="active-account-die"';
		} else if ($rs['sanluong'] == 1) {
			$rs['active_sanluong'] = ' class="active-account"';
		}

		if ($rs['tinhtrangdon'] == 0) {
			$rs['active'] = ' class="active-account-die"';
			$rs['edit_delete'] = ' ';
		} else if ($rs['tinhtrangdon'] == 1) {
			$rs['active'] = ' class="active-account"';
			$rs['edit_delete'] = ' remove';
		}

		$rs['stt'] = $stt;
		//xu lý tình trạng đơn 

		
		//Xử lý hình thức thanh toán
		if ($rs['hinhthucthanhtoan'] == 'thanhtoantienmat') {
			$rs['hinhthucthanhtoan_text'] = 'Tiền mặt';
		} else if ($rs['hinhthucthanhtoan'] == 'thanhtoancongno') {
			$rs['hinhthucthanhtoan_text'] = 'Công nợ khách hàng';
		
		} else if ($rs['hinhthucthanhtoan'] == 'thanhtoanchuyenkhoan') {
			$rs['hinhthucthanhtoan_text'] = 'Chuyển khoản';
		}


			//xử lý đơn hàng đang vận chuyển đi 
		// if($rs['tinhtrang_khogui'] == 0)
		// {
		// 	$rs['tinhtrang_khogui'] = ' Đang vận chuyển';
		// }
		// else if($rs['tinhtrang_khogui'] == 1)
		// {
		// 	$rs['tinhtrang_khogui'] = ' Đã giao';
		// }
		
		//xử lý đơn hàng đang đến kho
			if($rs['tinhtrang_khonhan'] == 0)
		{
			$rs['tinhtrang_kho'] = 'Xác nhận nhận hàng';
			$rs['disalbed'] = '';
			$rs['link'] = "OrderConfirmation('khohang','uploaddonhangnhan',".$rs["id_security"].")";
		}
		else if($rs['tinhtrang_khonhan'] == 1)
		{
			$rs['tinhtrang_kho'] = ' Đã nhận';
			$rs['disalbed'] = 'disabled';
			$rs['link'] = "OrderInformation('khohang','thongtindonhangnhan',".$rs["id_security"].")";
			$rs['class_info'] = " info";
		}

		
		// xử lý các bảng kết nối
		// lấy thông tin khách hàng
		$kh = $model->db->query("SELECT * FROM php_khachhang WHERE id=" . $rs['id_khachhang'] . " LIMIT 1");
		$rs_kh = $kh->fetch();
		$rs['name_kh'] =  $rs_kh['name_kh'];
		$rs['sdt_kh']  = $rs_kh['phone_kh'];

		// format tien te
		$rs['format_luong'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "";


		$tpl->assign($rs, 'detail');
		$stt++;
	}

	$rs_detail_v['id'] = $id;
	$rs_detail_v['text'] = 'đến';
	$tpl->merge($rs_detail_v, 'detail_v');
} else {
	header("Location: " . $domain . "donhangroi");
	exit;
}







$meta = array();
$meta['title'] = 'Chi tiết đơn hàng rời';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta, 'meta');
