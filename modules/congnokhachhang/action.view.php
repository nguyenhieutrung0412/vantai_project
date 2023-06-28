<?php

defined('_ROOT') or die(__FILE__);
if (!isset($_SESSION['user_id']) && !isset($_SESSION['position'])) {
	header("Location: " . $domain . "login");
	exit;
}


if ($_SESSION['chucvu_id'] == 0 || $_SESSION['chucvu_id'] == 1 || $_SESSION['chucvu_id'] == 2) {


	$tpl->setfile(array(
		'tpl_meta' => 'tpl_meta.tpl',
		'tpl_header' => 'tpl_header.tpl',
		'tpl_navbar' => 'tpl_navbar.tpl',
		'tpl_body' => 'congnokhachhang.tpl',
		'tpl_footer' => 'tpl_footer.tpl',

	));

	if ($_GET['thang'] == 0 && $_GET['nam'] == 0) {

		//lấy tháng và năm mới nhất trong bảng lương
		$thang_nam = $model->db->query("SELECT thang,nam FROM php_congnokhachhang GROUP BY id DESC LIMIT 1 ");

		$thang_and_nam = $thang_nam->fetch();
		if ($thang_nam->num_rows() == 1) {



			//Phân trang
			$congno = $oContent->view_table('php_congnokhachhang', "thang=" . $thang_and_nam['thang'] . " AND nam=" . $thang_and_nam['nam'] . "  GROUP BY id DESC");
			//lấy tổng số phần tử tin 
			$total = $congno->num_rows();


			while ($rs = $congno->fetch()) {

				$rs['id_security'] = $oClass->id_encode($rs['id']);
				$rs['id_khachhang_security'] = $oClass->id_encode($rs['id_khachhang']);

				//xu lý active

				if ($rs['active'] == 0) {
					$rs['active'] = ' active-account-die';
					$rs['edit_delete'] = '';
				} else if ($rs['active'] == 1) {
					$rs['active'] = ' active-account';
					$rs['edit_delete'] = ' remove';
				}
				$rs2['tongcongno_thang'] += $rs['tong_thanhtoan'];
				//Xu lý hiển thị tên kh
				if ($rs['id_khachhang'] != 0) {
					$id_loaichi = $model->db->query("SELECT * FROM php_khachhang WHERE id =" . $rs['id_khachhang']);
					while ($rs_join = $id_loaichi->fetch()) {

						$rs['name_kh'] = $rs_join['name_kh'];
						$rs['cmnd'] = $rs_join['cmnd'];
						$rs['phone_kh'] = $rs_join['phone_kh'];
						$rs['address_kh'] = $rs_join['address_kh'];
						$rs['ten_congty'] = $rs_join['ten_congty'];
						$rs['masothue'] = $rs_join['masothue'];
					}
				}
				//xử lý số lần đã thanh toán công nợ trong một tháng
				$phieuthu_congno = $model->db->query("SELECT * FROM php_phieuthu WHERE id_congnohangtrongoi =" . $rs['id']." AND active_congnotrongoi = 1");
				$count_phieuthu = $phieuthu_congno->num_rows();
				if($count_phieuthu > 0)
				{
					$rs['so_lan_thanh_toan'] = '<a href="/congnokhachhang/phieuthu/?code='.$rs['id_security'].'"><span style="color:#39c449;display:block;">(Lần '.$count_phieuthu.')</span></a>';
				}

				//xử lý phí vat
				$rs['phivat'] = $rs['tong_tien'] * ($rs['vat'] / 100);
				//xử lý nợ tôn
				$rs['no_ton'] = $rs['tong_thanhtoan'] - $rs['sotien_thanhtoan']; 
				// format tien te
				$rs['tong_thanhtoan'] = number_format($rs['tong_thanhtoan'], 0, ',', '.') . "";
				$rs['phivat'] = number_format($rs['phivat'], 0, ',', '.') . "";
				$rs['no_ton'] = number_format($rs['no_ton'], 0, ',', '.') . "";
				$rs['sotien_thanhtoan'] = number_format($rs['sotien_thanhtoan'], 0, ',', '.') . "";
				$rs['tong_tien'] = number_format($rs['tong_tien'], 0, ',', '.') . "";
				$rs['so_tien'] = number_format($rs['so_tien'], 0, ',', '.') . "";
				$rs['tien_phatsinh'] = number_format($rs['tien_phatsinh'], 0, ',', '.') . "";



				$tpl->assign($rs, 'detail');
			}
			$tpl->merge($thang_and_nam, 'thang_nam');
			$rs2['tongcongno_thang'] = number_format($rs2['tongcongno_thang'], 0, ',', '.') . "";
			$tpl->merge($rs2, 'tong');
		}
	} else {


		$rs2['thang'] =  $_GET['thang'];
		$rs2['nam'] = $_GET['nam'];



		// if (isset($_GET['code'])) {
		// 	$id = $oClass->id_decode($_GET['code']);
		// 	$id_where = ' AND id =' . $id;
		// }
		if (isset($_GET['thang'])) {
			$thang_where = ' AND thang =' . $_GET['thang'];
		}
		if (isset($_GET['nam'])) {
			$nam_where = ' AND nam =' . $_GET['nam'];
		}



		//Phân trang
		$phieu_chi_search =  $model->db->query("SELECT * FROM php_congnokhachhang WHERE active < 5" . $id_where . $thang_where . $nam_where);
		//lấy tổng số phần tử tin 
		$total = $phieu_chi_search->num_rows();
		if ($total >= 1) {
			$limit = 10;
			$start = $limit * intval($_GET['page']);
			$url = $system->root_dir . 'congnokhachhang';
			$dp = new paging($url, $total, $limit);
			$dp->current = '<a class="active_page">%d</a>';
			$tpl->assign(array('divpage' => $dp->simple(10)));


			$phieu_chi_search = $oContent->view_pagination('php_congnokhachhang', "active < 5" . $id_where . $thang_where . $nam_where . "  ORDER BY id DESC", $start, $limit);


			while ($rs = $phieu_chi_search->fetch()) {

				$rs['id_security'] = $oClass->id_encode($rs['id']);
				$rs['id_khachhang_security'] = $oClass->id_encode($rs['id_khachhang']);
				//xu lý active

				if ($rs['active'] == 0) {
					$rs['active'] = ' active-account-die';
					$rs['edit_delete'] = '';
				} else if ($rs['active'] == 1) {
					$rs['active'] = ' active-account';
					$rs['edit_delete'] = ' remove';
				}

				$rs2['tongcongno_thang'] += $rs['tong_thanhtoan'];
				//Xu lý hiển thị tên kh
				if ($rs['id_khachhang'] != 0) {
					$id_loaichi = $model->db->query("SELECT * FROM php_khachhang WHERE id =" . $rs['id_khachhang']);
					while ($rs_join = $id_loaichi->fetch()) {

						$rs['name_kh'] = $rs_join['name_kh'];
						$rs['cmnd'] = $rs_join['cmnd'];
						$rs['phone_kh'] = $rs_join['phone_kh'];
						$rs['address_kh'] = $rs_join['address_kh'];
						$rs['ten_congty'] = $rs_join['ten_congty'];
						$rs['masothue'] = $rs_join['masothue'];
					}
				}
				//xử lý số lần đã thanh toán công nợ trong một tháng
				$phieuthu_congno = $model->db->query("SELECT * FROM php_phieuthu WHERE id_congnohangtrongoi =" . $rs['id'] ." AND active_congnotrongoi = 1");
				$count_phieuthu = $phieuthu_congno->num_rows();
				if($count_phieuthu > 0)
				{
					$rs['so_lan_thanh_toan'] = '<a href="/congnokhachhang/phieuthu/?code='.$rs['id_security'].'"><span style="color:#39c449;display:block;">(Lần '.$count_phieuthu.')</span></a>';
				}

					//xử lý phí vat
					$rs['phivat'] = $rs['tong_tien'] * ($rs['vat'] / 100);
					//xử lý nợ tôn
					$rs['no_ton'] = $rs['tong_thanhtoan'] - $rs['sotien_thanhtoan']; 
					// format tien te
					$rs['tong_thanhtoan'] = number_format($rs['tong_thanhtoan'], 0, ',', '.') . "";
					$rs['phivat'] = number_format($rs['phivat'], 0, ',', '.') . "";
					$rs['no_ton'] = number_format($rs['no_ton'], 0, ',', '.') . "";
					$rs['sotien_thanhtoan'] = number_format($rs['sotien_thanhtoan'], 0, ',', '.') . "";
					$rs['tong_tien'] = number_format($rs['tong_tien'], 0, ',', '.') . "";
					$rs['so_tien'] = number_format($rs['so_tien'], 0, ',', '.') . "";
					$rs['tien_phatsinh'] = number_format($rs['tien_phatsinh'], 0, ',', '.') . "";
	


				$tpl->assign($rs, 'detail');

				$tpl->merge($rs, 'thang_nam');
			}

			$rs2['tongcongno_thang'] = number_format($rs2['tongcongno_thang'], 0, ',', '.') . "VND";
			$tpl->merge($rs2, 'tong');
		} else {
		}
	}
	//danh sách loai chi 

	$meta = array();
	$meta['title'] = 'Công nợ khách hàng';

	$meta['icon'] = 'data/upload/cover.jpg';
	$tpl->merge($meta, 'meta');
} else {
	$id_security = $oClass->id_encode($_SESSION['user_id']);
	header("Location: " . $domain);
	exit;
}
