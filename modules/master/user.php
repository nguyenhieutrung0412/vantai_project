<?php

defined('_ROOT') or die(__FILE__);

session_start();
$ktmaster = $oContent->view_table("php_cauhinh");
$master = $ktmaster->fetch();

$domain = $master['domain'];

$chatluonganh = $master['chatluong_hinhupload'];



if(!isset($_SESSION['user_id']) && !isset($_SESSION['position'])){
	//  header("Location: ".$domain."login");
	//  exit;
}else{
	//Xử lý thông tin
	$master['user_name'] = $_SESSION['name'];

}

if($system->params[0] == '')
{
	$master['login'] = 'style="width:100%;"';
}

$tpl->merge($master,'master');
$arr = array(0,1);
if(in_array($_SESSION['chucvu_id'],$arr)){
	$tpl->box('boxadmin');
}
$arr2 = array(0);
if(in_array($_SESSION['chucvu_id'],$arr2)){
	$tpl->box('boxadmin-phanquyen');
}
$arr3 = array(0,1,2);
if(in_array($_SESSION['chucvu_id'],$arr)){
	$tpl->box('boxadmin-gd-ktt');
}
//Đẩy thông báo cho người dùng chưa xem
if(isset($_SESSION['user_id'])){
	$notification = $oContent->view_table("php_notification","FIND_IN_SET(".$_SESSION['user_id'].",`user_id`) ORDER BY id DESC");
	$total['num'] = $notification->num_rows();
	if($total['num'] == 0)
	{
		$total['delete'] = ' remove';
	}
	$tpl->merge($total,'total');
	while($rs = $notification->fetch()){
		$rs['p'] = substr($rs['content'],0,50);
		$tpl->assign($rs,'notification');
	}
}


//Xử lý hiện thị từ năm bắt đầu và tới năm hiện tại

for($i = $master['nam_hoatdong']; $i <= date("Y");$i++)
{
	$str_list_select .= '
	<option value="'.$i.'">Năm '.$i.'</option>
	';
}
$str_arr['list_select'] = $str_list_select;
$tpl->merge($str_arr,'list_select');

	



//Xử lý admin quyền truy cập
$arr = array(0);
if(in_array($_SESSION['chucvu_id'],$arr)){
	$tpl->box('admin');
}


//xử lý menu động cho trang web
  $count  = count($MenuName);
 
 
for($i = 0; $i < $count; $i++ ){
	//echo $i;
	if($_SESSION['chucvu_id'] == 0){
		 $k = count($MenuName[$i]);
		
	$str_menu1 .= '
	<li class="nav-item ">
	<a class=" drop-after">
	'.$MenuName[$i]['icon'].'
		<span>'.$MenuName[$i]['name'].'</span>
		</a>
		<span class="drop-menu">
		<i class="fa fa-chevron-down"></i>
		</span>
		<ul class="drop-down-item">';
		for($j=0; $j < $k ;$j++){
			if(is_array($MenuName[$i][$j])){
				
				if($_SESSION['chucvu_id'] == 0){
					$link[] = $MenuName[$i][$j]['link'];
					$str_menu1 .= '<li>  <a class="item" href="'.$MenuName[$i][$j]['link'].'">'.$MenuName[$i][$j]['name'].'</a></li>';
				}
				else{
					$quyen = $model->db->query("SELECT * FROM php_quyen WHERE  id_phongban = ".$_SESSION['chucvu_id']);
					while( $rs_quyen = $quyen->fetch()){
						if($rs_quyen['ten_quyen'] == $MenuName[$i][$j]['name'] && $rs_quyen['active'] == 1){
							//lấy dữ liệu active của từng phòng ban
							$link[] = $MenuName[$i][$j]['link'];
							//lấy dữ liệu thêm xóa sửa của từng phòng ban
							$link2[] = array(
								'name' =>$MenuName[$i][$j]['name'],
								'link' =>$MenuName[$i][$j]['link'],
								'id_phongban' =>  $_SESSION['chucvu_id'],
								'them'=>$rs_quyen['them'],
								'xoa'=>$rs_quyen['xoa'],
								'sua'=>$rs_quyen['sua'],
							);
					
							$str_menu1 .= '<li>  <a class="item" href="'.$MenuName[$i][$j]['link'].'">'.$MenuName[$i][$j]['name'].'</a></li>';
						}
					}
				}	
			}	
		}
		$str_menu1 .= '</ul></li>';
	}
	else{
		// $menu = $model->db->query("SELECT php_quyen_menucha.* FROM php_quyen 
		// LEFT JOIN php_menu_phanquyen ON php_quyen.id_menu_quyen = php_menu_phanquyen.id 
		// LEFT JOIN php_menu ON php_menu_phanquyen.id_menu_cha = php_menu.id 
		// LEFT JOIN php_quyen_menucha ON php_quyen_menucha.id_menu_cha = php_menu.id 
		// WHERE php_quyen.id_phongban = ".$_SESSION['chucvu_id']);
		$menu = $model->db->query("SELECT * FROM php_quyen_menucha 
		
		WHERE id_phongban = ".$_SESSION['chucvu_id']);
		//echo $count =$menu->num_rows();
		while($menu2 = $menu->fetch()){
			//echo $menu2['ten'];
			
			if($menu2['ten'] == $MenuName[$i]['name'] && $menu2['active'] == 1){
				
				//echo $MenuName[5]['name'];
				$k = count($MenuName[$i]);
				$str_menu1 .= '
				<li class="nav-item ">
				<a class=" drop-after">
				'.$MenuName[$i]['icon'].'
					<span>'.$MenuName[$i]['name'].'</span>
				</a>
					<span class="drop-menu">
					<i class="fa fa-chevron-down"></i>
					</span>
					<ul class="drop-down-item">';
					for($j=0; $j < $k ;$j++){

						if(is_array($MenuName[$i][$j])){
							if($_SESSION['chucvu_id'] == 0){
								$link[] = $MenuName[$i][$j]['link'];
								$str_menu1 .= '<li>  <a class="item" href="'.$MenuName[$i][$j]['link'].'">'.$MenuName[$i][$j]['name'].'</a></li>';
							}
							else{
								$quyen = $model->db->query("SELECT * FROM php_quyen WHERE  id_phongban = ".$_SESSION['chucvu_id']);
								while( $rs_quyen = $quyen->fetch()){
									if($rs_quyen['ten_quyen'] == $MenuName[$i][$j]['name'] && $rs_quyen['active'] == 1){
										//lấy dữ liệu active của từng phòng ban
										$link[] = $MenuName[$i][$j]['link'];
										//lấy dữ liệu thêm xóa sửa của từng phòng ban
										$link2[] = array(
											'name' =>$MenuName[$i][$j]['name'],
											'link' =>$MenuName[$i][$j]['link'],
											'id_phongban' =>  $_SESSION['chucvu_id'],
											'them'=>$rs_quyen['them'],
											'xoa'=>$rs_quyen['xoa'],
											'sua'=>$rs_quyen['sua'],
										);		
										$str_menu1 .= '<li>  <a class="item" href="'.$MenuName[$i][$j]['link'].'">'.$MenuName[$i][$j]['name'].'</a></li>';
									}
								}
							}
						}	
					}
					$str_menu1 .= '</ul></li>';
			}
		}
	
	}
 };
$link[] = ''; 
$link[] = 'trangchu'; 
$link[] = 'menuadmin'; 

$link[] = 'notification'; 
$link[] = 'ajax'; 
$link[] = 'donhangle'; 
$link[] = 'profile';
$link[] = 'lichxe';
$link[] = 'hotro';
$link[] = 'cauhinh';   
$tpl->assign($str_menu1,'menu');


for($i = 0; $i < count($link2);$i++){

	if($link2[$i]['link'] == $system->params[0]){
		
		$xuly= array();
		if($link2[$i]['them'] == 0){
			$xuly['them'] = ' remove'; 
		}
		else{
			$xuly['them'] = ' '; 
		}
		if($link2[$i]['xoa'] == 0){
			$xuly['xoa'] = ' remove'; 
		}
		else{
			$xuly['xoa'] = ' '; 
		}
		if($link2[$i]['sua'] == 0){
			$xuly['sua'] = ' remove'; 
		}
		else{
			$xuly['sua'] = ' '; 
		}
		$tpl->merge($xuly,'xuly');
		break;
		
	
	}
}

// xử lý truy cập không được phép 
 if(!in_array($system->params[0],$link)){
	die(header("Location: ".$domain));
}

 

 




