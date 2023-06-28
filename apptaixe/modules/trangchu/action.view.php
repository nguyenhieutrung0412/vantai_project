<?php

// defined('_ROOT') or die(__FILE__);
// if(!isset($_SESSION['id_taixe']) && !isset($_SESSION['name_taixe']) && $_SESSION['active'] == 0){
// 	header("Location: ".$domain);
// 	exit;
// }
// $tpl->setfile(array(
// 	'tpl_meta'=>'tpl_meta.tpl',
// 	'tpl_header'=>'tpl_header.tpl',
// 	'tpl_body'=>'trangchu.tpl',
// 	'tpl_footer'=>'tpl_footer.tpl',
// ));

// // //lấy đơn hàng trọn gói mà tài xế chưa nhận lệnh 
// // $donhangtrongoi = $oContent->view_table('php_donhangtrongoi','id_taixe = '.$_SESSION['id_taixe'] .' AND nhan_lenh = 0');
// // $count =$donhangtrongoi->num_rows();

// // if($count > 0)
// // {
// // 	while($rs = $donhangtrongoi->fetch())
// // 	{
// // 			//kh
// // 			$khachhang = $model->db->query('SELECT * FROM php_khachhang WHERE id = '.$rs['id_khachhang']);
// // 			$rs_kh = $khachhang->fetch();
// // 			$tpl->merge($rs_kh,'khachhang');
// // 			//end kh
// // 			//Xử lý hình thức thanh toán
// // 			if ($rs['hinhthucthanhtoan'] == 'thanhtoantienmat') {
// // 				$rs['hinhthucthanhtoan'] = 'Tiền mặt';
// // 			} else if ($rs['hinhthucthanhtoan'] == 'thanhtoancongno') {
// // 				$rs['hinhthucthanhtoan'] = 'Công nợ khách hàng';
// // 			}
// // 			$rs['phivanchuyen'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "";
// // 			$tpl->assign($rs,'donhangtrongoi');

// // 	}
// // }
// // //lấy đơn hàng rời mà tài xế chưa nhận lệnh
// // $donhangroi = $oContent->view_table('php_donhangroi','id_taixe = '.$_SESSION['id_taixe']  .' AND nhan_lenh = 0');
// // $count_donhangroi =$donhangroi->num_rows();

// // if($count_donhangroi > 0)
// // {
// // 	while($rs_donhangroi = $donhangroi->fetch())
// // 	{
			
// // 		$donhangroi_s = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi =".$rs_donhangroi['id']);
// // 		$rs_donhangroi['soluong_donhangcon'] = $donhangroi_s->num_rows();
// // 		$rs_donhangroi['tong_phivanchuyen'] = number_format($rs_donhangroi['tong_phivanchuyen'], 0, ',', '.') . "";
// // 			$tpl->assign($rs_donhangroi,'donhangroi');
// // 	}
// // }


// $meta = array();
// $meta['title'] = $html['mtitle'];
// $meta['keyword'] = $html['mkey'];
// $meta['desc'] = $html['mdesc'];
// $meta['icon'] = 'data/upload/cover.jpg';
// $tpl->merge($meta,'meta');

// $tpl->merge($html,'detail');