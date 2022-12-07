<?php

/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class ClassModel extends MasterModel
{
	function __construct()
	{
		parent::__construct();
	}
	function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	function update($table, $data, $cond)
	{
		return $this->db->update($table, $data, $cond);
	}
	function delete($table, $cond)
	{
		return $this->db->delete($table, $cond);
	}
	function updateActive($table, $value, $cond)
	{
		return $this->db->query("UPDATE `" . $table . "` SET `active` = " . $value . " WHERE " . $cond);
	}
	function id_encode($id)
	{
		$id_secutity_first = rand(1111111, 9999999);
		$id_secutity_last = rand(1111111, 9999999);
		$id_security = $id_secutity_first . $id . $id_secutity_last;
		return $id_security;
	}
	function id_decode($id_security)
	{
		$id = substr($id_security, 7, -7);
		return $id;
	}
	function join_table($table1, $table2, $table1ELM, $table2ELM, $cond)
	{
		return $this->db->query("SELECT * FROM " . $table1 . " LEFT JOIN " . $table2 . " ON " . $table1 . "." . $table1ELM . " = " . $table2 . "." . $table2ELM . " WHERE $cond");
	}
	function count($table, $cond)
	{
		$sql = $this->db->query('SELECT * FROM ' . $table . ' WHERE  ' . $cond . ' LIMIT 1');
		return $sql;
	}
	function DoiSoTien($str)
	{
		$str = str_replace(",", "", $str);
		$str = str_replace(".", "", $str);
		return $str;
	}
	//hàm chuyển đổi tiền sang chữ
	function jam_read_num_forvietnamese($num = false)
	{
		$str = '';
		$num  = trim($num);

		$arr = str_split($num);
		$count = count($arr);

		$f = number_format($num);
		//KHÔNG ĐỌC BẤT KÌ SỐ NÀO NHỎ DƯỚI 999 ngàn
		if ($count < 7) {
			$str = $num;
		} else {
			// từ 6 số trở lên là triệu, ta sẽ đọc nó !
			// "32,000,000,000"
			$r = explode(',', $f);
			switch (count($r)) {
				case 4:
					$str = $r[0] . ' tỉ';
					if ((int) $r[1]) {
						$str .= ' ' . $r[1] . ' Tr';
					}
					break;
				case 3:
					$str = $r[0] . ' Triệu';
					if ((int) $r[1]) {
						$str .= ' ' . $r[1] . 'K';
					}
					break;
			}
		}
		return ($str . ' đ');
	}
	function convert_number_to_words($number)
	{

		$hyphen      = ' ';
		$conjunction = ' ';
		$separator   = ' ';
		$negative    = 'âm ';
		$decimal     = ' phẩy ';
		$one		 = 'mốt';
		$ten         = 'lẻ';
		$dictionary  = array(
			0                   => 'Không',
			1                   => 'Một',
			2                   => 'Hai',
			3                   => 'Ba',
			4                   => 'Bốn',
			5                   => 'Năm',
			6                   => 'Sáu',
			7                   => 'Bảy',
			8                   => 'Tám',
			9                   => 'Chín',
			10                  => 'Mười',
			11                  => 'Mười một',
			12                  => 'Mười hai',
			13                  => 'Mười ba',
			14                  => 'Mười bốn',
			15                  => 'Mười lăm',
			16                  => 'Mười sáu',
			17                  => 'Mười bảy',
			18                  => 'Mười tám',
			19                  => 'Mười chín',
			20                  => 'Hai mươi',
			30                  => 'Ba mươi',
			40                  => 'Bốn mươi',
			50                  => 'Năm mươi',
			60                  => 'Sáu mươi',
			70                  => 'Bảy mươi',
			80                  => 'Tám mươi',
			90                  => 'Chín mươi',
			100                 => 'trăm',
			1000                => 'ngàn',
			1000000             => 'triệu',
			1000000000          => 'tỷ',
			1000000000000       => 'nghìn tỷ',
			1000000000000000    => 'ngàn triệu triệu',
			1000000000000000000 => 'tỷ tỷ'
		);

		if (!is_numeric($number)) {
			return false;
		}

		// if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
		// 	// overflow
		// 	trigger_error(
		// 	'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
		// 	E_USER_WARNING
		// 	);
		// 	return false;
		// }

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
					$string .= strtolower($hyphen . ($units == 1 ? $one : $dictionary[$units]));
				}
				break;
			case $number < 1000:
				$hundreds  = $number / 100;
				$remainder = $number % 100;
				$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
				if ($remainder) {
					$string .= strtolower($conjunction . ($remainder < 10 ? $ten . $hyphen : null) . $this->convert_number_to_words($remainder));
				}
				break;
			default:
				$baseUnit = pow(1000, floor(log($number, 1000)));
				$numBaseUnits = (int) ($number / $baseUnit);
				$remainder = $number - ($numBaseUnits * $baseUnit);
				$string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
				if ($remainder) {
					$string .= strtolower($remainder < 100 ? $conjunction : $separator);
					$string .= strtolower($this->convert_number_to_words($remainder));
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

		return utf8_decode($string);
	}
}
