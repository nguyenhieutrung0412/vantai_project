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
if ($_GET['code'] == '' && $_GET['sdt_search'] == '' && $_GET['thang'] == 0 && $_GET['nam'] == 0) {
	//Phân trang
	$don_hang = $oContent->view_table('php_donhangtrongoi');
	//lấy tổng số phần tử tin 
	$total = $don_hang->num_rows();

	$limit = 20;
	$start = $limit * intval($_GET['page']);
	$url = $system->root_dir . 'donhang';
	$dp = new paging($url, $total, $limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage' => $dp->simple(10)));

	$don_hang = $oContent->view_pagination('php_donhangtrongoi', "1 GROUP BY id DESC", $start, $limit);
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
			$rs['edit_delete'] = ' ';
		} else if ($rs['active'] == 1) {
			$rs['active'] = ' class="active-account"';
			$rs['edit_delete'] = ' remove';
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
			$rs['text_tinhtrangtaixe'] = '<i class="fa-solid fa-plus add"></i>';
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
			$rs['text_tinhtrangdoixe'] = '<i class="fa-solid fa-plus add"></i>';
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
		
			$rs['text_tinhtrangphuxe'] = '<i class="fa-solid fa-plus add"></i>';
			$rs['btn_phuxe'] = 'order_phuxe_popup';
			$rs['btn_remove_info_phuxe'] = ' remove';
		} else if ($rs['id_nhansu'] != 0) {
			$nhansu = $model->db->query("SELECT * FROM php_nhansu WHERE id = ". $rs['id_nhansu'] );
			$rs_nhansu = $nhansu->fetch();
			$rs['text_tinhtrangphuxe'] = $rs_nhansu['name'];
			$rs['btn_phuxe'] = 'info_phuxe_popup';
			$rs['btn_remove_order_phuxe'] = ' remove';
		}
	

		//đổi trọng lượng đơn hàng từ kg sang tấn
		$rs['trongluong_donhang_tan'] = $rs['trongluong_hanghoa'] / 1000;
		//xử lý phí phát sinh của đơn hàng
		$tien_phiphatsinh = 0;
		$phiphatsinh = $model->db->query("SELECT * FROM php_phiphatsinh WHERE id_donhang=" . $rs['id'] . " ");
		while($rs_phiphatsinh = $phiphatsinh->fetch())
		{
			$tien_phiphatsinh += $rs_phiphatsinh['sotien']; 
		}
		$rs['tien_phiphatsinh'] = $tien_phiphatsinh;
		//xử lý các bảng kết nối
		//lấy thông tin khách hàng
		$kh = $model->db->query("SELECT * FROM php_khachhang WHERE id=" . $rs['id_khachhang'] . " LIMIT 1");
		$rs_kh = $kh->fetch();
		$rs['name_kh'] =  $rs_kh['name_kh'];
		$rs['sdt_kh']  = $rs_kh['phone_kh'];

		// format tien te
		$rs['format_luong'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "";
		$rs['don_gia'] = number_format($rs['don_gia'], 0, ',', '.') . "";
		$rs['tien_phiphatsinh'] = number_format($rs['tien_phiphatsinh'], 0, ',', '.') . "";
		$rs['trongluong_hanghoa'] = number_format($rs['trongluong_hanghoa'], 0, ',', '.') . "";
		//rút ngắn ký tự địa chỉ 
		//$rs['diachi_nhanhang'] = $oClass->truncateString($rs['diachi_nhanhang'],20);


		$tpl->assign($rs, 'detail');
		$stt++;
	}
} else {
	if (isset($_GET['code'])) {
		$id = $_GET['code'];
		$id_where = ' AND id IN (' . $id.')';
	}
	if (isset($_GET['sdt_search'])) {
		$sdt = ' AND (phone_nguoinhan =' . $_GET['sdt_search'] .' OR sdt_nguoigui =' . $_GET['sdt_search'].')';
	}
	if (isset($_GET['thang'])) {
		$thang_where = ' AND thang =' . $_GET['thang'];
	}
	if (isset($_GET['nam'])) {
		$nam_where = ' AND nam =' . $_GET['nam'];
	}

	
	//Phân trang
	$don_hang = $oContent->view_table("php_donhangtrongoi","active < 5" . $id_where .$sdt . $thang_where . $nam_where);
	//$don_hang =  $model->db->query("SELECT * FROM php_donhangtrongoi WHERE active < 5" . $id_where .$sdt . $thang_where . $nam_where);
	//lấy tổng số phần tử tin 
	$total = $don_hang->num_rows();

	$limit = 20;
	$start = $limit * intval($_GET['page']);
	$url = $system->root_dir . 'donhang';
	$dp = new paging($url, $total, $limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage' => $dp->simple(10)));

	$don_hang = $oContent->view_pagination('php_donhangtrongoi', "active < 5" . $id_where .$sdt . $thang_where . $nam_where . " GROUP BY id DESC", $start, $limit);
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
			$rs['edit_delete'] = ' ';
		} else if ($rs['active'] == 1) {
			$rs['active'] = ' class="active-account"';
			$rs['edit_delete'] = ' remove';
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
			$rs['text_tinhtrangtaixe'] = '<i class="fa-solid fa-plus add"></i>';
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
			$rs['text_tinhtrangdoixe'] = '<i class="fa-solid fa-plus add"></i>';
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
		
			$rs['text_tinhtrangphuxe'] = '<i class="fa-solid fa-plus"></i>';
			$rs['btn_phuxe'] = 'order_phuxe_popup';
			$rs['btn_remove_info_phuxe'] = ' remove';
		} else if ($rs['id_nhansu'] != 0) {
			$nhansu = $model->db->query("SELECT * FROM php_nhansu WHERE id = ". $rs['id_nhansu'] );
			$rs_nhansu = $nhansu->fetch();
			$rs['text_tinhtrangphuxe'] = $rs_nhansu['name'];
			$rs['btn_phuxe'] = 'info_phuxe_popup';
			$rs['btn_remove_order_phuxe'] = ' remove';
		}
			//đổi trọng lượng đơn hàng từ kg sang tấn
			$rs['trongluong_donhang_tan'] = $rs['trongluong_hanghoa'] / 1000;
		//xử lý các bảng kết nối
		//lấy thông tin khách hàng
		$kh = $model->db->query("SELECT * FROM php_khachhang WHERE id=" . $rs['id_khachhang'] . " LIMIT 1");
		$rs_kh = $kh->fetch();
		$rs['name_kh'] =  $rs_kh['name_kh'];
		$rs['sdt_kh']  = $rs_kh['phone_kh'];

		// format tien te
		$rs['format_luong'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "";
		$rs['don_gia'] = number_format($rs['don_gia'], 0, ',', '.') . "";
		$rs['tien_phiphatsinh'] = number_format($rs['tien_phiphatsinh'], 0, ',', '.') . "";
		$rs['trongluong_hanghoa'] = number_format($rs['trongluong_hanghoa'], 0, ',', '.') . "";


		$tpl->assign($rs, 'detail');
		$stt++;
	}
}


$meta = array();
$meta['title'] = 'Quản lí đơn hàng';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta, 'meta');
