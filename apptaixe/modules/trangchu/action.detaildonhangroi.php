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
	'tpl_body'=>'detail_donhangroi.tpl',
	'tpl_footer'=>'tpl_footer.tpl',
));
if(isset($_GET['code']) && isset($_GET['type']))
{
    
    if($_GET['type'] == 'donhangroi')
    {
        $id_donhang = $_GET['code'];
        $donhangroi = $oContent->view_table('php_donhangroi','id_taixe = '.$_SESSION['id_taixe'] .' AND id ='.$id_donhang);
        $count =$donhangroi->num_rows();
        
        if($count > 0)
        {
            $rs = $donhangroi->fetch();

            //donhangcon
            $donhangroi_s = $oContent->view_table('php_donhangroi_s','id_donhangroi = '.$rs['id']);
            $stt =1;
              while($rs_donhangroi_s = $donhangroi_s->fetch()){
                $rs_donhangroi_s['stt'] = $stt;

                $rs_donhangroi_s['id_security'] = $oClass->id_encode($rs_donhangroi_s['id']);
                
                if($rs_donhangroi_s['tinhtrangdon'] == 0)
                {
                    $rs_donhangroi_s['tinhtrangdon_text']  = 'Chưa hoàn thành';
                }
                else{
                    $rs_donhangroi_s['tinhtrangdon_text']  = 'Đã hoàn thành';
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