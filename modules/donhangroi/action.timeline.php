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
	'tpl_body' => 'timeline-donhangroi.tpl',
	'tpl_footer' => 'tpl_footer.tpl',

));
if (!isset($_GET['code'])) {

	//Phân trang
	$don_hang = $oContent->view_table('php_donhangroi');
	//lấy tổng số phần tử tin 
	$total = $don_hang->num_rows();

	$limit = 20;
	$start = $limit * intval($_GET['page']);
	$url = $system->root_dir . 'donhangroi';
	$dp = new paging($url, $total, $limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage' => $dp->simple(10)));

	$don_hang = $oContent->view_pagination('php_donhangroi', "1 GROUP BY id DESC", $start, $limit);

	while ($rs = $don_hang->fetch()) {

		$rs['id_security'] = $oClass->id_encode($rs['id']);

		//xu lý tình trạng đơn 

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




		//xử lý các bảng kết nối
		//lấy thông tin khách hàng


		//lấy thông tin tài xế
		$kh = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs['id_taixe'] . " LIMIT 1");
		$rs_kh = $kh->fetch();
		$rs['name_taixe'] =  $rs_kh['name_taixe'];
		//lấy thông tin đội xe
		$kh = $model->db->query("SELECT * FROM php_doixe WHERE id=" . $rs['id_doixe'] . " LIMIT 1");
		$rs_kh = $kh->fetch();
		$rs['biensoxe'] =  $rs_kh['biensoxe'];
		//lấy thông tin loại hàng
		$phuxe = $model->db->query("SELECT * FROM php_nhansu WHERE id=" . $rs['id_nhansu'] . " LIMIT 1");

		$rs_phuxe = $phuxe->fetch();
		$rs['name_phuxe'] =  $rs_phuxe['name'];
		// format tien te
		$rs['format_luong'] = number_format($rs['tong_phivanchuyen'], 0, ',', '.') . "VND";


		$tpl->assign($rs, 'detail');
	}
} else {

	$id = $oClass->id_decode($_GET['code']);

	//Phân trang
	$don_hang = $oContent->view_table('php_donhangtrongoi', "id = " . $id);
	//lấy tổng số phần tử tin 
	$total = $don_hang->num_rows();

	while ($rs = $don_hang->fetch()) {

		$rs['id_security'] = $oClass->id_encode($rs['id']);

		//xu lý tình trạng đơn 

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




		//xử lý các bảng kết nối
		//lấy thông tin khách hàng
		$kh = $model->db->query("SELECT * FROM php_khachhang WHERE id=" . $rs['id_khachhang'] . " LIMIT 1");
		$rs_kh = $kh->fetch();
		$rs['name_kh'] =  $rs_kh['name_kh'];

		//lấy thông tin tài xế
		$kh = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs['id_taixe'] . " LIMIT 1");
		$rs_kh = $kh->fetch();
		$rs['name_taixe'] =  $rs_kh['name_taixe'];
		//lấy thông tin đội xe
		$kh = $model->db->query("SELECT * FROM php_doixe WHERE id=" . $rs['id_doixe'] . " LIMIT 1");
		$rs_kh = $kh->fetch();
		$rs['biensoxe'] =  $rs_kh['biensoxe'];
		//lấy thông tin loại hàng
		$phuxe = $model->db->query("SELECT * FROM php_nhansu WHERE id=" . $rs['id_nhansu'] . " LIMIT 1");

		$rs_phuxe = $phuxe->fetch();
		$rs['name_phuxe'] =  $rs_phuxe['name'];
		// format tien te
		$rs['format_luong'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "VND";


		$tpl->assign($rs, 'detail');
	}
}
$meta = array();
$meta['title'] = 'Quản lí đơn hàng';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta, 'meta');
