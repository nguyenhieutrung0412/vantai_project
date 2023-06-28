<?php defined('_ROOT') or die('Not Allowed');
$merge_block = 7;
$_tpl = '﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--
	Website generated by CMS v02
	URL: http://demo.phpbasic.com
	Email: w2ajax@gmail.com
-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" type="text/css" href="../template/Default/style/font-awesome-animation.min.css" media="all"/>
<link rel="stylesheet" href="template/css/font-awesome.css" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="template/css/main.css" />
<link rel="stylesheet" type="text/css" href="../template/Default/style/all.css" />
<link rel="icon" href="../favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../template/Default/style/colorbox.css" media="all"/>
<link rel="stylesheet" type="text/css" href="../template/Default/style/1.12.1_themes_smoothness_jquery-ui.css" />

<title>CMS - '.(isset($this->_data["."][0]['web_client'])?$this->_data["."][0]['web_client']:'').'</title>       
<script>var token  = \''.(isset($this->_data["."][0]['token'])?$this->_data["."][0]['token']:'').'\';</script>
<!--<script type="text/javascript" src="../plugins/jquery-1.11.1.min.js"></script>-->
<script type="text/javascript" src="../plugins/jquery-1.3.2.min.js"></script>

<script type="text/javascript" src="../template/Default/js/jquery.form.min.js"></script>
<script type="text/javascript" src="../template/Default/js/jquery-3.6.0.min.js"></script>


<script>var plugins_dir = \'../\';var root_dir = \''.(isset($this->_data["."][0]['root_dir'])?$this->_data["."][0]['root_dir']:'').'\'; var lang = \''.(isset($this->merge['system']['lang'])?$this->merge['system']['lang']:'').'\';</script>
<script type="text/javascript" src="../plugins/tableorder/jquery.tableorder.js"></script>
<script type="text/javascript" src="template/js/common.js"></script>
<script type="text/javascript" src="template/js/main.js"></script>
<script type="text/javascript" src="template/js/module.configure.js"></script>

<script type="text/javascript" src="../plugins/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src="template/js/editor.js"></script>

<script type="text/javascript" src="../plugins/ckeditor/ckeditor.js"></script>
 <script type="text/javascript" src="../template/Default/js/2.3.1_picturefill.min.js"></script>
<script type="text/javascript" src="../plugins/divbox/divbox.js"></script>
<script type="text/javascript" src="../template/Default/js/1.12.1_jquery-ui.min.js"></script>
<script type="text/javascript" src="../template/Default/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="../template/Default/js/jquery-ui.multidatespicker.js"></script>
 
<link rel="stylesheet" href="../plugins/divbox/css/frontend.css" type="text/css" media="screen" />
<script type="text/javascript">
// var access_new = \''.(isset($this->merge['access']['new'])?$this->merge['access']['new']:'').'\';
// var access_edit = \''.(isset($this->merge['access']['edit'])?$this->merge['access']['edit']:'').'\';
// var access_delete = \''.(isset($this->merge['access']['delete'])?$this->merge['access']['delete']:'').'\';
</script>
<script type="text/javascript" src="../plugins/validate/validate.js"></script>
<link rel="stylesheet" href="../plugins/validate/css/validate.css" type="text/css" media="screen" />

<script type="text/javascript" src="../plugins/dateinput/dateinput.js"></script>
<!--<script type="text/javascript" src="../plugins/jquery.slug.js"></script>-->
<script type="text/javascript">
$(document).ready(function(){
	$.each($(\'form input[type=text]\'),function(i,val){
		var id = $(val).attr(\'name\');	
		id = id.replace("[","_");
		id = id.replace("]","");
		if($(val).attr(\'id\') == "" || $(val).attr(\'id\')  == undefined){
			$(val).attr(\'id\',id);
			$(val).addClass(id);
		}
	});
	//$("#name_vn").slug();
	
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$(".mtitle_vn").attr(\'maxlength\',\'60\');
	$(".mdesc_vn").attr(\'maxlength\',\'300\');
	$(\'.view_vn\').css({backgroundColor:"#fcebac"});
	$(\'.name_seo_vn\').css({backgroundColor:"#dadada"});	
});
</script>


<script type="text/javascript" src="template/skins/default/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="template/skins/default/css/style.css" />
<!--[if IE]>
<style type="text/css">
tr.show{ display: block; }
</style>
<![endif]--> 

</head>
<body>
	
<div class="wrapper">
	<div class="container">
		<div class="hd">
			<ul class="hd-r">
			<li class="li"><a  class="hd-profile" href="javascript:void(0)"><i class="fa-solid fa-user"></i></a>
				 		<ul class=" profile">
                            <li> 
								<div class="logo_profile">T</div>
								<div class="info_profile">
									<strong>'.(isset($this->merge['login_user']['name_taixe'])?$this->merge['login_user']['name_taixe']:'').'</strong>
									<p>Tài xế xe: '.(isset($this->merge['login_user']['biensoxe'])?$this->merge['login_user']['biensoxe']:'').'</p>
								</div>
							</li>
							
                            <li class="br-fix2" style="clear:both"> 
								<div class="logout"><a href="?mod=user&act=logout" style="cursor: pointer;">Đăng xuất</a>
								</div>
								<div class="change_pass"><a href="?mod=user&act=reset" class="hd-resetPass">Đổi mật khẩu?</a></div>
							
							</li>
                        </ul>
				
				</li>
				<li class="li"><a  class="hd-" href="?mod=luongtaixe&act=v&code='.(isset($this->merge['login_user']['id_security'])?$this->merge['login_user']['id_security']:'').'">Lương</a> </li>
				<li class="li"><a href="?mod=lenhhoanthanh&act=view">Lệnh</a> </li>
				<li class="li"><a  ><i class="fa-solid fa-bell br-white"></i></a> </li>
				
			</ul>
			<a class="hd-logo" href="./"><img src="template/skins/default/images/logo1.jpg" alt="logo" ></a>
		</div>
		
		<div class="ct">
			
			
			<div class="main">
				<div class="mainInner">
							
					
<div class="nv-list">
<h2>Danh sách lệnh chưa nhận</h2>
<ul class="list">
    ';if(isset($this->_data['trongoi.'])){for($i=0;$i< count($this->_data['trongoi.']);$i++){$_tpl .= '
    <li>
       
            <a href="javascript:void(0)" class="select">
                <div class="icon-new">New</div>
                <div class="stt">Mã đơn: <span style="color:red">'.(isset($this->_data["trongoi."][$i]["id"])?$this->_data["trongoi."][$i]["id"]:'').'</span> - Ngày vận chuyển:  '.(isset($this->_data["trongoi."][$i]["thoigian_nhanhang"])?$this->_data["trongoi."][$i]["thoigian_nhanhang"]:'').'</div>
                <div class="address">Đ/c lấy hàng: '.(isset($this->_data["trongoi."][$i]["diachi_nhanhang"])?$this->_data["trongoi."][$i]["diachi_nhanhang"]:'').'</div>
                <div class="address">Lương chuyến: <span style="color:red">'.(isset($this->_data["trongoi."][$i]["luong_chuyen"])?$this->_data["trongoi."][$i]["luong_chuyen"]:'').'</span></div>
                <div class="phivanchuyen">Loại đơn hàng: Trọn gói</div>
            </a>

        <ul class="detail">
            <li>
                <div class="content">
                    <h3>Khách hàng</h3>
                    <p><i class="fa-solid fa-building"></i> : '.(isset($this->_data["khachhang."][$i]["ten_congty"])?$this->_data["khachhang."][$i]["ten_congty"]:'').'</p>
                    <p><i class="fa-solid fa-location-dot"></i> : '.(isset($this->_data["khachhang."][$i]["address_kh"])?$this->_data["khachhang."][$i]["address_kh"]:'').'</p>
                    <p><i class="fa-solid fa-qrcode"></i> MST: '.(isset($this->_data["khachhang."][$i]["masothue"])?$this->_data["khachhang."][$i]["masothue"]:'').'</p>
                    <p><i class="fa-solid fa-phone"></i> : '.(isset($this->_data["khachhang."][$i]["phone_kh"])?$this->_data["khachhang."][$i]["phone_kh"]:'').'</p>
                    <p><i class="fa-solid fa-user"></i> Số liên hệ khi đến(nếu có): '.(isset($this->_data["trongoi."][$i]["phone_nguoinhan"])?$this->_data["trongoi."][$i]["phone_nguoinhan"]:'').'</p>

                    <h3>Vận chuyển</h3>
                    <strong>Mã lệnh:</strong> <span style="color:red">'.(isset($this->_data["trongoi."][$i]["id"])?$this->_data["trongoi."][$i]["id"]:'').'</span><br>
                    <strong>Loại hàng:</strong> <span>56'.(isset($this->_data["trongoi."][$i]["loaihang"])?$this->_data["trongoi."][$i]["loaihang"]:'').'56</span><br>
                    <strong>Trọng lượng hàng:</strong> <span>'.(isset($this->_data["trongoi."][$i]["trongluong_hanghoa"])?$this->_data["trongoi."][$i]["trongluong_hanghoa"]:'').'</span><br>
                    <strong>Số lượng hàng:</strong> <span>'.(isset($this->_data["trongoi."][$i]["soluong_hanghoa"])?$this->_data["trongoi."][$i]["soluong_hanghoa"]:'').'</span><br>
                    <strong>Phí vận chuyển:</strong> <span style="color:red">'.(isset($this->_data["trongoi."][$i]["phivanchuyen"])?$this->_data["trongoi."][$i]["phivanchuyen"]:'').'</span><br>
                    <strong>Hình thức thanh toán:</strong> <span>'.(isset($this->_data["trongoi."][$i]["hinhthucthanhtoan_text"])?$this->_data["trongoi."][$i]["hinhthucthanhtoan_text"]:'').'</span><br>
                    <strong>Lương chuyến:</strong> <span style="color:red">'.(isset($this->_data["trongoi."][$i]["luong_chuyen"])?$this->_data["trongoi."][$i]["luong_chuyen"]:'').'</span><br>
                    
                    <h3>Nhiệm vụ</h3>
                    <strong>Xe thực hiện:</strong> <span>'.(isset($this->_data["trongoi."][$i]["biensoxe"])?$this->_data["trongoi."][$i]["biensoxe"]:'').'</span><br>
                    <strong>Lơ xe:</strong> <span>'.(isset($this->_data["trongoi."][$i]["ten_phuxe"])?$this->_data["trongoi."][$i]["ten_phuxe"]:'').' ('.(isset($this->_data["trongoi."][$i]["sdt_phuxe"])?$this->_data["trongoi."][$i]["sdt_phuxe"]:'').')</span><br>
                    <strong>Lấy hàng:</strong> <span>'.(isset($this->_data["trongoi."][$i]["diachi_nhanhang"])?$this->_data["trongoi."][$i]["diachi_nhanhang"]:'').'</span><br>
                
                    <strong>Giao hàng:</strong> <span>'.(isset($this->_data["trongoi."][$i]["diachi_giaohang"])?$this->_data["trongoi."][$i]["diachi_giaohang"]:'').'</span><br>
                </div>
                 <a class="btn-nhanlenh" href="javascript:void(0)" onclick="return nhan_lenh(\'ajax\',\'nhanlenh\','.(isset($this->_data["trongoi."][$i]["id"])?$this->_data["trongoi."][$i]["id"]:'').',\'donhangtrongoi\')"><i class="fa-solid fa-plus fa-beat-fade"></i> Nhận lệnh</a>
                <a class="btn-hide" href="javascript:void(0)"><i class="fa-solid fa-arrow-up"></i> Thu gọn</a>
            </li>
        </ul>
        
        
    </li>
     ';}}$_tpl .= '
     ';if(isset($this->_data['roi.'])){for($i=0;$i< count($this->_data['roi.']);$i++){$_tpl .= '
    <li>
        <a href="javascript:void(0)" class="select">
            <div class="icon-new">New</div>
            <div class="stt">Mã đơn: <span style="color:red">'.(isset($this->_data["roi."][$i]["id"])?$this->_data["roi."][$i]["id"]:'').'</span> - Ngày vận chuyển:  '.(isset($this->_data["donhangroi."][$i]["thoigian_giaohang"])?$this->_data["donhangroi."][$i]["thoigian_giaohang"]:'').'</div>
            <div class="address">Tuyến: '.(isset($this->_data["tuyen_roi."][$i]["ten_tuyen"])?$this->_data["tuyen_roi."][$i]["ten_tuyen"]:'').'</div>
            <div class="address">Lương chuyến: <span style="color:red">'.(isset($this->_data["roi."][$i]["luong_chuyen"])?$this->_data["roi."][$i]["luong_chuyen"]:'').'</span></div>
            <div class="phivanchuyen">Loại đơn hàng: rời</div>
        </a>
        <ul class="detail">
            <li>
                <div class="content">
                    
                    <h3>Vận chuyển</h3>
                    <strong>Mã lệnh:</strong> <span style="color:red">'.(isset($this->_data["roi."][$i]["id"])?$this->_data["roi."][$i]["id"]:'').'</span><br>
                   
                    <strong>Tổng trọng lượng chuyến:</strong> <span>'.(isset($this->_data["roi."][$i]["tong_trongluong"])?$this->_data["roi."][$i]["tong_trongluong"]:'').' kg</span><br>
                    <strong>Tổng số khối chuyến:</strong> <span>'.(isset($this->_data["roi."][$i]["tong_khoi"])?$this->_data["roi."][$i]["tong_khoi"]:'').'</span><br>
                    <strong>Tổng phí vận chuyển:</strong> <span style="color:red">'.(isset($this->_data["roi."][$i]["tong_phivanchuyen"])?$this->_data["roi."][$i]["tong_phivanchuyen"]:'').'</span><br>
                   
                    <strong>Lương chuyến:</strong> <span style="color:red">'.(isset($this->_data["roi."][$i]["luong_chuyen"])?$this->_data["roi."][$i]["luong_chuyen"]:'').'</span><br>
                    
                    <h3>Nhiệm vụ</h3>
                        <strong>Xe thực hiện:</strong> <span>'.(isset($this->_data["roi."][$i]["biensoxe"])?$this->_data["roi."][$i]["biensoxe"]:'').'</span><br>
                        <strong>Lơ xe:</strong> <span>'.(isset($this->_data["roi."][$i]["ten_phuxe"])?$this->_data["roi."][$i]["ten_phuxe"]:'').' '.(isset($this->_data["roi."][$i]["sdt_phuxe"])?$this->_data["roi."][$i]["sdt_phuxe"]:'').'</span><br>
                        <strong>Tổng số đơn thực hiện:</strong> <span style="color:red;">'.(isset($this->_data["roi."][$i]["soluong_donhangcon"])?$this->_data["roi."][$i]["soluong_donhangcon"]:'').'</span><br>
                    
                      
                    </div>
                <a class="btn-nhanlenh" href="javascript:void(0)" onclick="return nhan_lenh(\'ajax\',\'nhanlenh\','.(isset($this->_data["roi."][$i]["id"])?$this->_data["roi."][$i]["id"]:'').',\'donhangroi\')"><i class="fa-solid fa-plus fa-beat-fade"></i> Nhận lệnh</a>
                <a class="btn-hide" href="javascript:void(0)"><i class="fa-solid fa-arrow-up"></i> Thu gọn</a>
            </li>
        </ul>
    </li>
     ';}}$_tpl .= '
    
    
</ul>
</div>
<div class="nv-list-nhan">
<h2>Lệnh đang thực hiện</h2>
<p>Hiện có: <span style="color:red">'.(isset($this->merge['count_nhanlenh']['nhan_lenh'])?$this->merge['count_nhanlenh']['nhan_lenh']:'').'</span> lệnh</p>
<ul class="list">
    ';if(isset($this->_data['trongoi_nhanlenh.'])){for($i=0;$i< count($this->_data['trongoi_nhanlenh.']);$i++){$_tpl .= '
    <li>
        <a href="?mod=trangchu&act=detaildonhang&code='.(isset($this->_data["trongoi_nhanlenh."][$i]["id"])?$this->_data["trongoi_nhanlenh."][$i]["id"]:'').'&type=donhangtrongoi">
           
            <div class="stt">Mã đơn: <span style="color:red">'.(isset($this->_data["trongoi_nhanlenh."][$i]["id"])?$this->_data["trongoi_nhanlenh."][$i]["id"]:'').'</span> - Ngày vận chuyển:  '.(isset($this->_data["trongoi_nhanlenh."][$i]["thoigian_nhanhang"])?$this->_data["trongoi_nhanlenh."][$i]["thoigian_nhanhang"]:'').'</div>
            <div class="address">Lương chuyến: '.(isset($this->_data["trongoi_nhanlenh."][$i]["luong_chuyen"])?$this->_data["trongoi_nhanlenh."][$i]["luong_chuyen"]:'').'</div>
            <div class="address">Đ/c nhận: '.(isset($this->_data["trongoi_nhanlenh."][$i]["diachi_nhanhang"])?$this->_data["trongoi_nhanlenh."][$i]["diachi_nhanhang"]:'').'</div>
            <div class="address">Đ/c giao: '.(isset($this->_data["trongoi_nhanlenh."][$i]["diachi_giaohang"])?$this->_data["trongoi_nhanlenh."][$i]["diachi_giaohang"]:'').'</div>
            <div class="address">Nhận lệnh lúc: '.(isset($this->_data["trongoi_nhanlenh."][$i]["thoigian_nhanlenh"])?$this->_data["trongoi_nhanlenh."][$i]["thoigian_nhanlenh"]:'').'</div>
            <div class="address">Tình trạng: <span style="color:red">Chưa hoàn tất <i class="fa-solid fa-plus fa-spinner fa-spin-pulse"></i></span></div>
            <div class="address">Loại đơn hàng: trọn gói</div>
              <div class="btn-detail"><i class="fa-sharp fa-solid fa-circle-info"></i> Chi tiết</div>
        </a>
      
    </li>
    ';}}$_tpl .= '
    ';if(isset($this->_data['roi_nhanlenh.'])){for($i=0;$i< count($this->_data['roi_nhanlenh.']);$i++){$_tpl .= '
    <li>
        <a href="?mod=trangchu&act=detaildonhangroi&code='.(isset($this->_data["roi_nhanlenh."][$i]["id"])?$this->_data["roi_nhanlenh."][$i]["id"]:'').'&type=donhangroi">
           
            <div class="stt">Mã đơn: <span style="color:red">'.(isset($this->_data["roi_nhanlenh."][$i]["id"])?$this->_data["roi_nhanlenh."][$i]["id"]:'').'</span> - Ngày vận chuyển:  '.(isset($this->_data["roi_nhanlenh."][$i]["thoigiao_nhanhang"])?$this->_data["roi_nhanlenh."][$i]["thoigiao_nhanhang"]:'').'</div>
            <div class="address">Lương chuyến: '.(isset($this->_data["roi_nhanlenh."][$i]["luong_chuyen"])?$this->_data["roi_nhanlenh."][$i]["luong_chuyen"]:'').'</div>
            <div class="address">Tuyến: '.(isset($this->_data["roi_nhanlenh."][$i]["ten_tuyen"])?$this->_data["roi_nhanlenh."][$i]["ten_tuyen"]:'').'</div>
            
            <div class="address">Nhận lệnh lúc: '.(isset($this->_data["roi_nhanlenh."][$i]["thoigian_nhanlenh"])?$this->_data["roi_nhanlenh."][$i]["thoigian_nhanlenh"]:'').'</div>
            <div class="address">Tình trạng: <span style="color:red">Chưa hoàn tất <i class="fa-solid fa-plus fa-spinner fa-spin-pulse"></i></span></div>
            <div class="address">Loại đơn hàng: rời</div>
                    <div class="btn-detail" ><i class="fa-sharp fa-solid fa-circle-info"></i> Chi tiết</div>
        </a>

    </li>
    ';}}$_tpl .= '
</ul>


</div>


				</div>			
			</div>
		</div>
		
		<div class="ft">
			<ul>
				<li><a href="/apptaixe/"><i class="fa-solid fa-house"></i><br>Home</a></li>
				<li><a href="javascript:void(0)" onclick="window.location.reload(true);"><i class="fa-solid fa-arrows-rotate fa-spin"></i><br>Làm mới</a></li>
				<li><a><i class="fa-sharp fa-solid fa-magnifying-glass"></i><br>Tra cứu</a></li>
				<li class="fix"><a  href="?mod=notification&act=view"><i class="fa-solid fa-bell"></i><br>Thông báo</a></li>
			</ul>
		</div>
	</div>
</div>

<table width="5" height="100%" cellpadding="0" cellspacing="0" border="0" class="btn_expandMenu"><tr><td>&nbsp;</td></tr></table>


<div class="cms_overlay"></div>
<div class="div-beforeSuccess">
    <div class="div-beforeSuccess_popup">
        <img src="template/images/loading.gif" alt="loading">
        <h4>Đang xử lý!!!</h4>
    </div> 
</div>
<div class="div-Success ">
    <div class="div-Success_popup">
        <img src="template/images/icon-success.png" alt="success">
        <h4>Thành công!!!</h4>
    </div> 
</div>
<div class="div-fail">
    <div class="div-fail_popup">
        <img src="template/images/error1.png" alt="error1">
        <h4>Xảy ra lỗi !!!</h4>
    </div> 
</div>

<noscript>
	<style type="text/css">
		.wrapper{ display: none; }
	</style>
	<div class="noscript">JavaScript must be enabled in order for you to use '.(isset($this->_data["."][0]['web_client'])?$this->_data["."][0]['web_client']:'').' CMS. Please enable JavaScript by changing your browser options, then press <strong>F5</strong> to load page</div>
</noscript>


</body>
</html>'; ?>