<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $count_insert = count($_REQUEST['data']);

    if ($count_insert > 0) {
        for($i = 1;$i <= $count_insert;$i++)
        {
            //xử lý lấy tháng năm của ngày đổ dầu
            $thoigian = explode("/",$_REQUEST['data'][$i]['ngay_do']);
			if($thoigian[1] > 0 && $thoigian[1] < 10)
			{
			   $thoigian[1] = '0'.$thoigian[1];
			}
			//xử lý lưu dữ liệu theo giờ quốc tế
			$gio_quocte = $thoigian[2].'-'.$thoigian[1].'-'.$thoigian[0];
			//end 
			//xử lý mức độ tiêu hao nhiên liệu
			$xe = $model->db->query("Select * FROM php_theodoidau WHERE id_doixe = ".$_REQUEST['data'][$i]['id_xe'] ." ORDER BY id DESC LIMIT 1");
			$xe_rs = $xe->fetch();
			$so_km_chay_duoc_lucdo = str_replace(".","",$_REQUEST['data'][$i]['km_luc_do']) - str_replace(".","",$xe_rs['km_luc_do']);
			$muc_do_tieu_hao = $so_km_chay_duoc_lucdo / $_REQUEST['data'][$i]['so_lit'];


            //end 
            $id_taixe = $_REQUEST['data'][$i]['id_taixe'];
			$id_doixe = $_REQUEST['data'][$i]['id_xe'];
            $ngay_do = $gio_quocte ." ".$_REQUEST['data'][$i]['gio_do'].":".$_REQUEST['data'][$i]['phut_do'];
            $km_luc_do =  $_REQUEST['data'][$i]['km_luc_do'];
            $so_lit =   $_REQUEST['data'][$i]['so_lit'];
            $dau_ngoai =   $_REQUEST['data'][$i]['dau_ngoai'];
            $msd_truockhido =   $_REQUEST['data'][$i]['msd_truockhido'];
            $msd_saukhido =   $_REQUEST['data'][$i]['msd_saukhido'];
            $don_gia = $oClass->DoiSoTien( $_REQUEST['data'][$i]['don_gia']);
            $tong_tien = $don_gia * $so_lit;
			$ngay = $thoigian[0];
            $thang = $thoigian[1];
            $nam = $thoigian[2];
          
            //echo "INSERT INTO php_mathang_donhang  (`id_donhang`, `ten`, `dvt`, `soluong`, `ghichu`) VALUES ('".$id_donhang."','".$name."','".$dvt."','".$soluong."','".$ghichu."')"."<br>";
            $model->db->query("INSERT INTO php_theodoidau  (`id_taixe`,`id_doixe`, `ngay_do`,`km_luc_do`, `so_lit`,`do_dau_ngoai`,`msd_truockhido`,`msd_saukhido`,`don_gia`,`tong_tien`,`muc_do_tieu_hao`,`ngay`,`thang`,`nam`) VALUES ('" . $id_taixe . "','" . $id_doixe . "','" . $ngay_do . "','" . $km_luc_do .  "','" . $so_lit . "','" . $dau_ngoai . "','" . $msd_truockhido . "','" . $msd_saukhido . "','" . $don_gia . "','" . $tong_tien . "','" . $muc_do_tieu_hao . "','" . $ngay . "','" . $thang . "','" . $nam . "')");
            $lastid = $model->db->last_insetid("php_theodoidau");
            //lấy thông tin file upload
				 $img_post = $_FILES['data']['name'][$i]['img_file'];
                 $arr_img_type = ["jpg","jpeg","png"];
				if($img_post != ''){
                   
					$name_img = $_FILES['data']['name'][$i]['img_file'];
					 $source_img = $_FILES['data']['tmp_name'][$i]['img_file'];
					$size_img = filesize($_FILES['data']['tmp_name'][$i]['img_file']);
					$img_src = time().'_'.$lastid.'_'.str2url($name_img);
					$list['icon'] = '';
					$list['file'] = '';
					
					//file
					  $tmpFilePath = $source_img; 
					
					
					$path_img = "data/upload/images/".$img_src;
					if($size_img > 1024000){//10MB
						die(json_encode(array(
							'status'=>2,
							'str'=>'(2) Hình ảnh phải nhỏ hơn 10MB (<10MB)'
						)));
					}
					
					$extension = getExtension($name_img);
					$extension = strtolower($extension);
                   
					
					//nếu là file hình thì upload hình
					if(in_array($extension,$arr_img_type)){
						/* die(json_encode(array(
							'status'=>4,
							'str'=>'(4) Hình ảnh phải là định dạng: .jpg, .jpeg, .png'
						))); */
						
						$list['icon'] = $img_src;
						
						if($extension=="jpg" || $extension=="jpeg"){
							$src = imagecreatefromjpeg($source_img);
						}
						if($extension=="png"){
							$src = imagecreatefrompng($source_img);
						}
						
						list($width,$height) = getimagesize($source_img);
						
						$newwidth = $width;
						if($width > 1024){
							$newwidth= 1024;
						}
						$newheight = ($height/$width)*$newwidth;
						$tmp = imagecreatetruecolor($newwidth,$newheight);
					
						imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
						
						$filename = $path_img;
						@chmod($filename,0644);
						imagejpeg($tmp,$filename,$chatluonganh);
						
						imagedestroy($src);
						imagedestroy($tmp);
                        $model->db->query("INSERT INTO php_images(`type`,`type_id`,`file_name`,`file_type`) VALUES ('php_theodoidau','".$lastid."','".$img_src."','".$extension."')");
					}
					$ext_file = array('pdf'); 
					//nếu pdf thì upload file					
					if(in_array($extension,$ext_file)){
						$list['file'] = $img_src;
						move_uploaded_file($tmpFilePath, "data/upload/files/".$img_src);
                        $model->db->query("INSERT php_file (`type`,`type_id`,`file_name`,`file_type`) VALUES ('php_theodoidau','$lastid','$img_src','$extension')");
					}
					
					
					
				}
				//END.Upload hình
               


        }

       
    }
   

   



    die(json_encode(
        array(

            'status' => 1,
            'str' => $str,
        )
    ));
}

exit;
