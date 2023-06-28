<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class ClassModel extends MasterModel{
	function __construct(){
		parent::__construct();
	}
	function insert($table,$data){
		return $this->db->insert($table,$data);
	}
	function update($table,$data,$cond){
		return $this->db->update($table,$data,$cond);
	}
	function delete($table,$cond){
		return $this->db->delete($table,$cond);
	}
	function updateActive($table,$value,$cond){
		return $this->db->query("UPDATE `".$table."` SET `active` = ".$value." WHERE ".$cond);
	}
	function id_encode($id){
		$id_secutity_first = rand(1111111,9999999);
		$id_secutity_last = rand(1111111,9999999);
		$id_security =$id_secutity_first . $id .$id_secutity_last;
		return $id_security;
	}
	function id_decode($id_security){
		 $id = substr($id_security,7,-7);
		 return $id;
	}

	//hàm đếm tổng số ngày trong tháng trừ ngày CN
	function count_days($year, $month, $ignore) {
		$count = 0;
		$counter = mktime(0, 0, 0, $month, 1, $year);
		while (date("n", $counter) == $month) {
			if (in_array(date("w", $counter), $ignore) == false) {
				$count++;
			}
			$counter = strtotime("+1 day", $counter);
		}
		return $count;
	}
	function DoiSoTien($str)
	{
		$str = str_replace(",", "", $str);
		$str = str_replace(".", "", $str);
		return $str;
	}
	function getExtension($str){
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		$ext = substr($str,$i+1,$l);
		$ext = strtolower($ext);
		return $ext;
	}
	function upload_images($type, $lastid, $chatluonghinh = 75)
	{
		//upload nhieu hinh anh vao thu muc
		$arr_img_type = ["jpg", "jpeg", "png"];

		$count_img = count(array_filter($_FILES['img_file']['name']));
		if ($count_img > 0) {
			foreach ($_FILES['img_file']['name'] as $name => $value) {
				$name_img = stripslashes($_FILES['img_file']['name'][$name]);
				$source_img = $_FILES['img_file']['tmp_name'][$name];
				$size = filesize($_FILES['img_file']['tmp_name'][$name]);

				$name_src = time() . '_' . $lastid . '_' . str2url($name_img);
				// $icon[] = "('php_vandon','".$lastid."','".$name_src."')";

				$path_img = "data/upload/images/" . $name_src;

				if ($size > 1024000) { //10MB
					die(json_encode(array(
						'status' => 2,
						'msg' => '(2) Hình ảnh phải nhỏ hơn 10MB (<10MB)'
					)));
				}

				$extension = getExtension($name_img);
				$extension = strtolower($extension);

				if (!in_array($extension, $arr_img_type)) {
					die(json_encode(array(
						'status' => 3,
						'msg' => '(3) Hình ảnh phải là định dạng: .jpg, .jpeg, .png'
					)));
				}

				if ($extension == "jpg" || $extension == "jpeg") {
					$src = imagecreatefromjpeg($source_img);
				}
				if ($extension == "png") {
					$src = imagecreatefrompng($source_img);
				}

				list($width, $height) = getimagesize($source_img);

				$newwidth = $width;
				if ($width > 1024) {
					$newwidth = 1024;
				}
				$newheight = ($height / $width) * $newwidth;
				$tmp = imagecreatetruecolor($newwidth, $newheight);

				imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

				$filename = $path_img;
				@chmod($filename, 0777);
				imagejpeg($tmp, $filename, $chatluonghinh);

				imagedestroy($src);
				imagedestroy($tmp);
				$this->db->query("INSERT INTO php_images(`type`,`type_id`,`file_name`,`file_type`) VALUES ('" . $type . "','" . $lastid . "','" . $name_src . "','" . $extension . "')");
			}
			// $icon_arr = implode(",",$icon);

		}
	}
	function convert_number_to_words($number) {
		$hyphen      = ' ';
		$conjunction = '  ';
		$separator   = ' ';
		$negative    = 'âm ';
		$decimal     = ' phẩy ';
		$dictionary  = array(
		0                   => 'không',
		1                   => 'một',
		2                   => 'hai',
		3                   => 'ba',
		4                   => 'bốn',
		5                   => 'năm',
		6                   => 'sáu',
		7                   => 'bảy',
		8                   => 'tám',
		9                   => 'chín',
		10                  => 'mười',
		11                  => 'mười một',
		12                  => 'mười hai',
		13                  => 'mười ba',
		14                  => 'mười bốn',
		15                  => 'mười năm',
		16                  => 'mười sáu',
		17                  => 'mười bảy',
		18                  => 'mười tám',
		19                  => 'mười chín',
		20                  => 'hai mươi',
		30                  => 'ba mươi',
		40                  => 'bốn mươi',
		50                  => 'năm mươi',
		60                  => 'sáu mươi',
		70                  => 'bảy mươi',
		80                  => 'tám mươi',
		90                  => 'chín mươi',
		100                 => 'trăm',
		1000                => 'nghìn',
		1000000             => 'triệu',
		1000000000          => 'tỷ',
		1000000000000       => 'nghìn tỷ',
		1000000000000000    => 'nghìn triệu triệu',
		1000000000000000000 => 'tỷ tỷ'
		);
	if (!is_numeric($number)) {
		return false;
	}
	if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
		// overflow
		trigger_error(
		'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
		E_USER_WARNING
		);
		return false;
	}
	if ($number < 0) {
		return $negative . $this->convert_number_to_words(abs($number));
	}
	$string = $fraction = null;
		if (strpos($number, '.') !== false) {
		list($number, $fraction) = explode('.', $number);
	}
	switch (true) {
	case $number < 21:
		$string = $dictionary[$number];
	break;
	case $number < 100:
		$tens   = ((int) ($number / 10)) * 10;
		$units  = $number % 10;
		$string = $dictionary[$tens];
		if ($units) {
			$string .= $hyphen . $dictionary[$units];
		}
	break;
	case $number < 1000:
		$hundreds  = $number / 100;
		$remainder = $number % 100;
		$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
		if ($remainder) {
			$string .= $conjunction . $this->convert_number_to_words($remainder);
		}
	break;
	default:
		$baseUnit = pow(1000, floor(log($number, 1000)));
		$numBaseUnits = (int) ($number / $baseUnit);
		$remainder = $number % $baseUnit;
		$string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
		if ($remainder) {
			$string .= $remainder < 100 ? $conjunction : $separator;
			$string .= $this->convert_number_to_words($remainder);
		}
		break;
	}
	if (null !== $fraction && is_numeric($fraction)) {
		$string .= $decimal;
		$words = array();
		foreach (str_split((string) $fraction) as $number) {
			$words[] = $dictionary[$number];
		}
		$string .= implode(' ', $words);
	}
		return $string;
}
	
}