<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $count_insert = count($_REQUEST['data']);

    if ($count_insert > 0) {
        for($i = 1;$i <= $count_insert;$i++)
        {
            $id_donhang = $_REQUEST['id_donhang'];
			$id_phi = $_REQUEST['data'][$i]['idphi'];
            $ten_phi = $_REQUEST['data'][$i]['tenphi'];
            $sotien = $oClass->DoiSoTien( $_REQUEST['data'][$i]['sotien']);
            $so_hoadon =  $_REQUEST['data'][$i]['so_hoadon'];
            $ngay_hoadon = $_REQUEST['data'][$i]['ngay_hoadon'];
            $thukhach =  $_REQUEST['data'][$i]['thukhach'];
            $ghichu = $_REQUEST['data'][$i]['ghichu'];
            //echo "INSERT INTO php_mathang_donhang  (`id_donhang`, `ten`, `dvt`, `soluong`, `ghichu`) VALUES ('".$id_donhang."','".$name."','".$dvt."','".$soluong."','".$ghichu."')"."<br>";
            $model->db->query("INSERT INTO php_phiphatsinh  (`id_donhang`,`id_loaichi`, `ten_phi`,`sotien`, `so_hoadon`,`ngay_hoadon`,`thukhach`, `ghichu`) VALUES ('" . $id_donhang . "','" . $id_phi . "','" . $ten_phi . "','" . $sotien .  "','" . $so_hoadon .  "','" . $ngay_hoadon .  "','" . $thukhach .  "','" . $ghichu . "')");
            $lastid = $model->db->last_insetid("php_phiphatsinh");
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
                        $model->db->query("INSERT INTO php_images(`type`,`type_id`,`file_name`,`file_type`) VALUES ('php_phiphatsinh','".$lastid."','".$img_src."','".$extension."')");
					}
					$ext_file = array('pdf'); 
					//nếu pdf thì upload file					
					if(in_array($extension,$ext_file)){
						$list['file'] = $img_src;
						move_uploaded_file($tmpFilePath, "data/upload/files/".$img_src);
                        $model->db->query("INSERT php_file (`type`,`type_id`,`file_name`,`file_type`) VALUES ('php_phiphatsinh','$lastid','$img_src','$extension')");
					}
					
					
					
				}
				//END.Upload hình
               


        }

       
    }
    $count_update = count($_REQUEST['id']);
    if ($count_update > 0) {
       
        for($j = 0 ; $j < $count_update;$j++)
        {   
           
             $id = $_REQUEST['id'][$j];
            $id_phi = $_REQUEST['idphi'][$j];
            $ten_phi = $_REQUEST['tenphi'][$j];
            $sotien = $oClass->DoiSoTien( $_REQUEST['sotien'][$j]);
            $so_hoadon =  $_REQUEST['so_hoadon'][$j];
            $ngay_hoadon =  $_REQUEST['ngay_hoadon'][$j];
            $thukhach =  $_REQUEST['thukhach'][$j];
            $ghichu = $_REQUEST['ghichu'][$j];
            //echo "UPDATE `php_mathang_donhang` SET `ten`='".$name."',`dvt`='".$dvt."',`soluong`='".$soluong."',`ghichu`='".$ghichu."' WHERE id ='".$id."'<br>";
            $model->db->query("UPDATE `php_phiphatsinh` SET `id_loaichi`='" . $id_phi . "', `ten_phi`='" . $ten_phi . "',`sotien`='" . $sotien . "',`so_hoadon`='" . $so_hoadon . "',`ngay_hoadon`='" . $ngay_hoadon . "',`thukhach`='" . $thukhach . "',`ghichu`='" . $ghichu . "' WHERE id ='" . $id . "'");
            
             //lấy thông tin file upload
				 $img_post = $_FILES['img_file2']['name'][$id];
                 $arr_img_type = ["jpg","jpeg","png"];
				if($img_post != ''){
                   
					$name_img = $_FILES['img_file2']['name'][$id];
					 $source_img = $_FILES['img_file2']['tmp_name'][$id];
					$size_img = filesize($_FILES['img_file2']['tmp_name'][$id]);
					$img_src = time().'_'.$id.'_'.str2url($name_img);
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
                        $model->db->query("INSERT INTO php_images(`type`,`type_id`,`file_name`,`file_type`) VALUES ('php_phiphatsinh','".$id."','".$img_src."','".$extension."')");
					}
					$ext_file = array('pdf'); 
					//nếu pdf thì upload file					
					if(in_array($extension,$ext_file)){
						$list['file'] = $img_src;
						move_uploaded_file($tmpFilePath, "data/upload/files/".$img_src);
                        $model->db->query("INSERT php_file (`type`,`type_id`,`file_name`,`file_type`) VALUES ('php_phiphatsinh','$id','$img_src','$extension')");
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
