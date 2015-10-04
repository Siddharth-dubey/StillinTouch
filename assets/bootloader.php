<?php
session_name('visit_en_data');
ob_start();
session_start();
include_once(dirname(__FILE__).'/gestalt.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/cabinet/fucker/fucku.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/cabinet/messages/errors.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/cabinet/messages/success.php');
spl_autoload_register('auto_class_loader');
function auto_class_loader($class_nme){

	$path=$_SERVER['DOCUMENT_ROOT'].'/cabinet/main_libs/';
	 include_once($path.'class_'.$class_nme.'.php');
}
function logged_in(){
	if(isset($_SESSION['tourist']) && isset($_SESSION['user_global_id'])){
		return true;
	}
	else{
		return false;
	}
}
?>