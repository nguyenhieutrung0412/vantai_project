<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
if(!isset($_SESSION['user_id']) && !isset($_SESSION['name_taixe']) && $_SESSION['active'] == 0){
	header("Location: ".$domain);
	exit;
}
$tpl->setfile(array(
	'tpl_meta'=>'tpl_meta.tpl',
	'tpl_header'=>'tpl_header.tpl',
	'tpl_body'=>'detail_donhang.tpl',
	'tpl_footer'=>'tpl_footer.tpl',
));
if(isset($_GET['code']) && isset($_GET['type']))
{
    if($_GET['type'] == 'donhangtrongoi')
    {
        $id_donhang = $_GET['code'];
        $donhangtrongoi = $oContent->view_table('php_donhangtrongoi','id_taixe = '.$_SESSION['id_taixe'] .' AND id ='.$id_donhang);
        $count =$donhangtrongoi->num_rows();
        
        if($count > 0)
        {
            $rs = $donhangtrongoi->fetch();
         
            if($rs['hinhthucthanhtoan'] == 'thanhtoantienmat')
            {
                $rs['hinhthucthanhtoan'] = 'Thanh toán bằng tiền mặt';
            }
            elseif($rs['hinhthucthanhtoan'] == 'thanhtoancongno'){
                $rs['hinhthucthanhtoan'] = 'Đã thanh toán bằng công nợ';
            }

            //kh
            $khachhang = $oContent->view_table('php_khachhang','id = '.$rs['id_khachhang']);
            $rs_kh = $khachhang->fetch();
            $tpl->merge($rs_kh,'khachhang');
            //end kh
            
            //đội xe
            $doixe = $oContent->view_table('php_doixe','id = '.$rs['id_doixe']);
            $rs_doixe = $doixe->fetch();
            $tpl->merge($rs_doixe,'xe');
            //end đội xe
            
            //kh
            $nhansu = $oContent->view_table('php_nhansu','id = '.$rs['id_nhansu']);
            $rs_nhansu = $nhansu->fetch();
            $tpl->merge($rs_nhansu,'nhansu');
            //end kh
             //mat hang
             $mathang = $oContent->view_table('php_mathang_donhang','id_donhang = '.$rs['id']);
             while($rs_mathang = $mathang->fetch()){
                $tpl->assign($rs_mathang,'mathang');
             };
             $rs['phivanchuyen'] = number_format($rs['phivanchuyen'], 0, ',', '.') . "VND";

            
             //end mat hang

            
            $tpl->merge($rs,'donhangtrongoi');
            
        }
    }
    
}
else{
    header("Location: ".$domain);
	exit;
}


$meta = array();
$meta['title'] = $html['mtitle'];
$meta['keyword'] = $html['mkey'];
$meta['desc'] = $html['mdesc'];
$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');

$tpl->merge($html,'detail');