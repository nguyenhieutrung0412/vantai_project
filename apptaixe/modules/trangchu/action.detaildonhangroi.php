<?php

defined('_ROOT') or die(__FILE__);
if(!isset($_SESSION['admin_login']['id']) && !isset($_SESSION['admin_login']['name_taixe']) && $_SESSION['admin_login']['active'] == 0){
	header("Location: ".$domain);
	exit;
}
$tpl->setfile(array(
	//'tpl_meta'=>'tpl_meta.tpl',
	//'tpl_header'=>'tpl_header.tpl',
	'body'=>'detail_donhangroi.tpl',
	//'tpl_footer'=>'tpl_footer.tpl',
));
if(isset($_GET['code']) && isset($_GET['type']))
{
    
    if($_GET['type'] == 'donhangroi')
    {
        $module ="'ajaxdonhangroi'";
        $action = "'xacnhannhanhang'";
        $id_donhang = $_GET['code'];
        $donhangroi = $oContent->view_table('php_donhangroi','id_taixe = '.$_SESSION['admin_login']['id'] .' AND id ='.$id_donhang);
        $count =$donhangroi->num_rows();
       
        if($count > 0)
        {
            $rs = $donhangroi->fetch();
            if ($rs['tinhtrangdon'] == 1) {


                $rs['check-1'] = ' line1-check';
            } else if ($rs['tinhtrangdon'] == 2) {
                $rs['check-1'] = ' line1-check';
                $rs['check-2'] = ' line2-check';
            } 
            $rs['id_security'] = $oClass->id_encode($rs['id']);
            //donhangcon
            $donhangroi_s = $oContent->view_table('php_donhangroi_s','id_donhangroi = '.$rs['id']);
            $stt =1;
              while($rs_donhangroi_s = $donhangroi_s->fetch()){
                $rs_donhangroi_s['stt'] = $stt;

                $rs_donhangroi_s['id_security'] = $oClass->id_encode($rs_donhangroi_s['id']);
                
                if($rs_donhangroi_s['tinhtrangdon'] == 0)
                {
                    $rs_donhangroi_s['tinhtrangdon_text']  = 'Chưa hoàn thành';
                    $rs_donhangroi_s['color'] = 'color-0';
                }
                else{
                    $rs_donhangroi_s['tinhtrangdon_text']  = 'Đã hoàn thành';
                    $rs_donhangroi_s['color'] = 'color-2';
                }
                if($rs_donhangroi_s['lay_hang'] == 0)
                {
                    $rs_donhangroi_s['layhang_text']  = '<a style="color:red;" onclick="return _xacNhanDaNhanHang('.$module.','.$action.','.$rs_donhangroi_s['id'].')" title="xác nhận đã lấy hàng" href="javascript:void(0)"> Chưa lấy hàng</a>';
                    $rs_donhangroi_s['color_layhang'] = 'color-0';
                }
                else{
                    $rs_donhangroi_s['layhang_text']  = 'Đã lấy hàng  <i class="fa-solid fa-circle-check"></i>';
                    $rs_donhangroi_s['color_layhang'] = 'color-2';
                }

                    //mat hang
             
            //end mathangcon 


                 $tpl->assign($rs_donhangroi_s,'donhangroi_s');
                 $stt++;
              };
            //end donhangcon

             //kh
          
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
             
            $rs['tong_phivanchuyen'] = number_format($rs['tong_phivanchuyen'], 0, ',', '.') . "VND";
            $tpl->merge($rs,'donhangroi');
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