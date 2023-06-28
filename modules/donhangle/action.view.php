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
	'tpl_body' => 'donhangroi.tpl',
	'tpl_footer' => 'tpl_footer.tpl',

));
if ($_GET['code'] == '' && $_GET['thang'] == 0 && $_GET['nam'] == 0) {

	if(isset($_GET['from'])  && isset($_GET['to']) ){
		//xử lý lấy tháng năm của ngày đổ dầu
		$thoigian_tu = explode("/",$_GET['from']);
		if(strlen($thoigian_tu[1]) == 1)
		{
			$thoigian_tu[1] = '0'.$thoigian_tu[1];
		}
		//xử lý lưu dữ liệu theo giờ quốc tế
				$gio_quocte_tu = $thoigian_tu[2].'-'.$thoigian_tu[1].'-'.$thoigian_tu[0];
		//end 
		//xử lý lấy tháng năm của ngày đổ dầu
		$thoigian_den = explode("/",$_GET['to']);
		if(strlen($thoigian_den[1]) == 1)
		{
			$thoigian_den[1] = '0'.$thoigian_den[1];
		}
		//xử lý lưu dữ liệu theo giờ quốc tế
				$gio_quocte_den = $thoigian_den[2].'-'.$thoigian_den[1].'-'.$thoigian_den[0];
		//end 
		//xử lý điều kiện từ ngày đến ngày
		$where_from_to = " AND time_donhang BETWEEN '".$gio_quocte_tu."' AND '".$gio_quocte_den."'";
		//end
	}
	if(isset($_GET['taixe']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_taixe =" AND id_taixe IN (".$_GET['taixe'].")";
	}
	if(isset($_GET['xe']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_xe =" AND id_doixe IN (".$_GET['xe'].")";
	}
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

	$don_hang = $oContent->view_pagination('php_donhangroi', "active < 10 ".$where_from_to.$where_id_taixe.$where_id_xe." AND 1 GROUP BY id DESC ", $start, $limit);
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
		//Xử lý hình thức thanh toán
		if ($rs['hinhthucthanhtoan'] == 'thanhtoantienmat') {
			$rs['hinhthucthanhtoan_text'] = 'Tiền mặt';
		} else if ($rs['hinhthucthanhtoan'] == 'thanhtoancongno') {
			$rs['hinhthucthanhtoan_text'] = 'Công nợ khách hàng';
		}
		
		
		//tính số lượng đơn hàng con
		$don_hang_con = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi = " . $rs['id']);

		//lấy tổng số phần tử tin 
		$rs['tong_donhangcon'] = $don_hang_con->num_rows();
		$rs['tong_trongluong'] = 0;
		while($rs_donhangcon = $don_hang_con->fetch())
		{
			//Cộng tổng số trọng lượng đơn hàng
			$rs['tong_trongluong'] += $rs_donhangcon['trongluong_hanghoa'];
		}
		$don_hang_con_da_giao = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi = ". $rs['id'] ." AND tinhtrangdon = 1");
		$rs['tongdon_dagiao'] = $don_hang_con_da_giao->num_rows();
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
	

		// format tien te
		$rs['tong_phivanchuyen'] = number_format($rs['tong_phivanchuyen'], 0, ',', '.') . "";
		//rút ngắn ký tự địa chỉ 
		//$rs['diachi_nhanhang'] = $oCLass->truncateString($rs['diachi_nhanhang'],20);

		$tpl->assign($rs, 'detail');
		$stt++;
	}
} else {
	if(isset($_GET['from'])  && isset($_GET['to']) ){
		//xử lý lấy tháng năm của ngày đổ dầu
		$thoigian_tu = explode("/",$_GET['from']);
		if(strlen($thoigian_tu[1]) == 1)
		{
			$thoigian_tu[1] = '0'.$thoigian_tu[1];
		}
		//xử lý lưu dữ liệu theo giờ quốc tế
				$gio_quocte_tu = $thoigian_tu[2].'-'.$thoigian_tu[1].'-'.$thoigian_tu[0];
		//end 
		//xử lý lấy tháng năm của ngày đổ dầu
		$thoigian_den = explode("/",$_GET['to']);
		if(strlen($thoigian_den[1]) == 1)
		{
			$thoigian_den[1] = '0'.$thoigian_den[1];
		}
		//xử lý lưu dữ liệu theo giờ quốc tế
				$gio_quocte_den = $thoigian_den[2].'-'.$thoigian_den[1].'-'.$thoigian_den[0];
		//end 
		//xử lý điều kiện từ ngày đến ngày
		$where_from_to = " AND time_donhang BETWEEN '".$gio_quocte_tu."' AND '".$gio_quocte_den."'";
		//end
	}
	if(isset($_GET['taixe']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_taixe =" AND id_taixe IN (".$_GET['taixe'].")";
	}
	if(isset($_GET['xe']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_xe =" AND id_doixe IN (".$_GET['xe'].")";
	}
	if (isset($_GET['code'])) {
		$id = $oClass->id_decode($_GET['code']);
		$id_where = ' AND id =' . $id;
	}
	if (isset($_GET['thang'])) {
		$thang_where = ' AND thang =' . $_GET['thang'];
	}
	if (isset($_GET['nam'])) {
		$nam_where = ' AND nam =' . $_GET['nam'];
	}
	//Phân trang
	$don_hang =  $model->db->query("SELECT * FROM php_donhangroi WHERE active < 5" . $id_where . $thang_where . $nam_where);
	//lấy tổng số phần tử tin 
	$total = $don_hang->num_rows();

	$limit = 20;
	$start = $limit * intval($_GET['page']);
	$url = $system->root_dir . 'donhangroi';
	$dp = new paging($url, $total, $limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage' => $dp->simple(10)));

	$don_hang = $oContent->view_pagination('php_donhangroi', "active < 5" . $id_where . $thang_where . $nam_where .$where_from_to.$where_id_taixe.$where_id_xe. " GROUP BY id DESC", $start, $limit);
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
		//Xử lý hình thức thanh toán
		if ($rs['hinhthucthanhtoan'] == 'thanhtoantienmat') {
			$rs['hinhthucthanhtoan_text'] = 'Tiền mặt';
		} else if ($rs['hinhthucthanhtoan'] == 'thanhtoancongno') {
			$rs['hinhthucthanhtoan_text'] = 'Công nợ khách hàng';
		}
		//tính số lượng đơn hàng con
		$don_hang_con = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi = " . $rs['id']);

		//lấy tổng số phần tử tin 
		$rs['tong_donhangcon'] = $don_hang_con->num_rows();

		$don_hang_con_da_giao = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi = ". $rs['id'] ." AND tinhtrangdon = 1");
		$rs['tongdon_dagiao'] = $don_hang_con_da_giao->num_rows();
		
		//Xử lý
		if ($rs['id_taixe'] == 0) {
			$rs['text_tinhtrangtaixe'] = '<i class="fa-solid fa-plus add" ></i>';
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
	

		// format tien te
		$rs['tong_phivanchuyen'] = number_format($rs['tong_phivanchuyen'], 0, ',', '.') . "";


		$tpl->assign($rs, 'detail');
		$stt++;
	}
}


$meta = array();
$meta['title'] = 'Quản lí đơn hàng';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta, 'meta');
