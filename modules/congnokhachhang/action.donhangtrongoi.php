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
	'tpl_body' => 'donhang.tpl',
	'tpl_footer' => 'tpl_footer.tpl',

));
if ($_GET['code'] == '' && $_GET['thang'] == 0 && $_GET['nam'] == 0) {
	header("Location: ".$domain."congnokhachhang");
	exit;
} else {
	if (isset($_GET['code'])) {
		$id = $oClass->id_decode($_GET['code']);
		$id_where = ' AND id_khachhang =' . $id;
	}
	if (isset($_GET['thang'])) {
		$thang_where = ' AND thang =' . $_GET['thang'];
	}
	if (isset($_GET['nam'])) {
		$nam_where = ' AND nam =' . $_GET['nam'];
	}

	//Phân trang
	//Phân trang
	$don_hang =  $model->db->query("SELECT * FROM php_donhangtrongoi WHERE active < 5 AND hinhthucthanhtoan = 'thanhtoancongno' " . $id_where . $thang_where . $nam_where);
	//lấy tổng số phần tử tin 
	$total = $don_hang->num_rows();

	$limit = 20;
	$start = $limit * intval($_GET['page']);
	$url = $system->root_dir . 'congnokhachhang/donhangtrongoi';
	$dp = new paging($url, $total, $limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage' => $dp->simple(10)));

	$don_hang = $oContent->view_pagination('php_donhangtrongoi', "active < 5 AND hinhthucthanhtoan = 'thanhtoancongno'" . $id_where . $thang_where . $nam_where . " GROUP BY id DESC", $start, $limit);
	$stt = 1;
	while ($rs = $don_hang->fetch()) {

		$rs['id_security'] = $oClass->id_encode($rs['id']);
		$rs['stt'] = $stt;
		//xu lý active
		if ($rs['sanluong'] == 0) {
			$rs['active_sanluong'] = ' class="active-account-die"';
		} else if ($rs['sanluong'] == 1) {
			$rs['active_sanluong'] = ' class="active-account"';
		}

		if ($rs['active'] == 0) {
			$rs['active'] = ' class="active-account-die"';
		} else if ($rs['active'] == 1) {
			$rs['active'] = ' class="active-account"';
		}
		// //xử lý tình trạng đơn 

		if ($rs['tinhtrangdon'] == 1) {


			$rs['check-1'] = ' line1-check';
		} else if ($rs['tinhtrangdon'] == 2) {
			$rs['check-1'] = ' line1-check';
			$rs['check-2'] = ' line2-check';
		} else if ($rs['tinhtrangdon'] == 3) {
			$rs['check-1'] = ' line1-check';
			$rs['check-2'] = ' line2-check';
			$rs['check-3'] = ' line3-check';
		} else if ($rs['tinhtrangdon'] == 4) {
			$rs['check-1'] = ' line1-check';
			$rs['check-2'] = ' line2-check';
			$rs['check-3'] = ' line3-check';
			$rs['check-4'] = ' line4-check';
		}
		//Xử lý hình thức thanh toán
		if ($rs['hinhthucthanhtoan'] == 'thanhtoantienmat') {
			$rs['hinhthucthanhtoan_text'] = 'Tiền mặt';
		} else if ($rs['hinhthucthanhtoan'] == 'thanhtoancongno') {
			$rs['hinhthucthanhtoan_text'] = 'Công nợ khách hàng';
		}


		//Xử lý
		if ($rs['id_taixe'] == 0) {
			$rs['text_tinhtrangtaixe'] = 'Điều lệnh';
			$rs['btn_taixe'] = 'order_taixe_popup';
			$rs['btn_remove_info_taixe'] = ' remove';
		} else if ($rs['id_taixe'] != 0) {
			$taixe = $model->db->query("SELECT * FROM php_taixe WHERE id = ". $rs['id_taixe'] );
			$rs_taixe = $taixe->fetch();
			$rs['text_tinhtrangtaixe'] = $rs_taixe['name_taixe'];
			$rs['btn_taixe'] = 'info_taixe_popup';
			$rs['btn_remove_order_taixe'] = ' remove';
		}
		//xu ly điều lệnh hoặc thông tin đội xe phụ trách đơn
		if ($rs['id_doixe'] == 0) {
			$rs['text_tinhtrangdoixe'] = 'Điều lệnh';
			$rs['btn_doixe'] = 'order_doixe_popup';
			$rs['btn_remove_info_doixe'] = ' remove';
		} else if ($rs['id_doixe'] != 0) {
			$doixe = $model->db->query("SELECT * FROM php_doixe WHERE id = ". $rs['id_doixe'] );
			$rs_doixe = $doixe->fetch();
			$rs['text_tinhtrangdoixe'] = $rs_doixe['biensoxe'];
			$rs['btn_doixe'] = 'info_doixe_popup';
			$rs['btn_remove_order_doixe'] = ' remove';
		}
		//xu ly điều lệnh hoặc thông tin phụ xe phụ trách đơn
		if ($rs['id_nhansu'] == 0) {
		
			$rs['text_tinhtrangphuxe'] = 'Điều lệnh';
			$rs['btn_phuxe'] = 'order_phuxe_popup';
			$rs['btn_remove_info_phuxe'] = ' remove';
		} else if ($rs['id_nhansu'] != 0) {
			$nhansu = $model->db->query("SELECT * FROM php_nhansu WHERE id = ". $rs['id_nhansu'] );
			$rs_nhansu = $nhansu->fetch();
			$rs['text_tinhtrangphuxe'] = $rs_nhansu['name'];
			$rs['btn_phuxe'] = 'info_phuxe_popup';
			$rs['btn_remove_order_phuxe'] = ' remove';
		}
		//xử lý các bảng kết nối
		//lấy thông tin khách hàng
		$kh = $model->db->query("SELECT * FROM php_khachhang WHERE id=" . $rs['id_khachhang'] . " LIMIT 1");
		$rs_kh = $kh->fetch();
		$rs['name_kh'] =  $rs_kh['name_kh'];
		$rs['sdt_kh']  = $rs_kh['phone_kh'];

		// format tien te
		$rs['format_luong'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "";


		$tpl->assign($rs, 'detail');
		$stt++;
	}
}


$meta = array();
$meta['title'] = 'Quản lí đơn hàng';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta, 'meta');
