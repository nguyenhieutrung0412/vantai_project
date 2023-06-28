<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);



if($_SESSION['ga']['token']){
	$ga = new gapi($_SESSION['ga']['ga_emai'],$_SESSION['ga']['ga_pasw']);
	$ga->requestAccountData();
	foreach($ga->getResults() as $result)
	{
	  echo $result . ' (' . $result->getProfileId() . ")<br />";
	}
}else{
	echo '0';
}
exit();

?>
