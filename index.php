<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/assets/bootloader.php');
if(!logged_in()){
	$auth=new auth();
	$key=$auth->set_token();
	include_once($_SERVER['DOCUMENT_ROOT'].'/modules_looks/login_page.php');
}
else{
	// ob_start();
	header("Location:http://www.stillintouch.com/wait");
}
?>