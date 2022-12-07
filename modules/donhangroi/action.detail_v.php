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

if (isset($_GET['code'])) {
	$id  = $oClass->id_decode($_GET['code']);

	//Phân trang
	$don_hang = $oContent->view_table('php_donhangroi_s', 'id_donhangroi = ' . $id);
	//lấy tổng số phần tử tin 
	$total = $don_hang->num_rows();

	$limit = 20;
	$start = $limit * intval($_GET['page']);
	$url = $system->root_dir . 'donhangroi';
	$dp = new paging($url, $total, $limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage' => $dp->simple(10)));

	$don_hang = $oContent->view_pagination('php_donhangroi_s', "id_donhangroi = " . $id . "  GROUP BY id DESC", $start, $limit);
	$stt = 1;
	while ($rs = $don_hang->fetch()) {

		$rs['id_security'] = $oClass->id_encode($rs['id']);

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

		// if($rs['tinhtrangdon'] == 1){


		//     $rs['check-1'] = ' line1-check';
		// }
		// else if($rs['tinhtrangdon'] == 2){
		//     $rs['check-1'] = ' line1-check';
		//     $rs['check-2'] = ' line2-check';
		// }
		// else if($rs['tinhtrangdon'] == 3){
		//     $rs['check-1'] = ' line1-check';
		//     $rs['check-2'] = ' line2-check';
		//     $rs['check-3'] = ' line3-check';
		// }

		// else if($rs['tinhtrangdon'] == 4){
		//     $rs['check-1'] = ' line1-check';
		//     $rs['check-2'] = ' line2-check';
		//     $rs['check-3'] = ' line3-check';
		//     $rs['check-4'] = ' line4-check';
		// }
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
			$rs['text_tinhtrangtaixe'] = 'Thông tin';
			$rs['btn_taixe'] = 'info_taixe_popup';
			$rs['btn_remove_order_taixe'] = ' remove';
		}
		//xu ly điều lệnh hoặc thông tin đội xe phụ trách đơn
		if ($rs['id_doixe'] == 0) {
			$rs['text_tinhtrangdoixe'] = 'Điều lệnh';
			$rs['btn_doixe'] = 'order_doixe_popup';
			$rs['btn_remove_info_doixe'] = ' remove';
		} else if ($rs['id_doixe'] != 0) {
			$rs['text_tinhtrangdoixe'] = 'Thông tin';
			$rs['btn_doixe'] = 'info_doixe_popup';
			$rs['btn_remove_order_doixe'] = ' remove';
		}
		//xu ly điều lệnh hoặc thông tin phụ xe phụ trách đơn
		if ($rs['id_nhansu'] == 0) {
			$rs['text_tinhtrangphuxe'] = 'Điều lệnh';
			$rs['btn_phuxe'] = 'order_phuxe_popup';
			$rs['btn_remove_info_phuxe'] = ' remove';
		} else if ($rs['id_nhansu'] != 0) {
			$rs['text_tinhtrangphuxe'] = 'Thông tin';
			$rs['btn_phuxe'] = 'info_phuxe_popup';
			$rs['btn_remove_order_phuxe'] = ' remove';
		}
		// xử lý các bảng kết nối
		// lấy thông tin khách hàng
		$kh = $model->db->query("SELECT * FROM php_khachhang WHERE id=" . $rs['id_khachhang'] . " LIMIT 1");
		$rs_kh = $kh->fetch();
		$rs['name_kh'] =  $rs_kh['name_kh'];
		$rs['sdt_kh']  = $rs_kh['phone_kh'];

		// format tien te
		$rs['format_luong'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "VND";


		$tpl->assign($rs, 'detail');
		$stt++;
	}

	$rs_detail_v['id'] = $id;

	$tpl->merge($rs_detail_v, 'detail_v');
} else {
	header("Location: " . $domain . "donhangroi");
	exit;
}







$meta = array();
$meta['title'] = 'Chi tiết đơn hàng rời';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta, 'meta');
