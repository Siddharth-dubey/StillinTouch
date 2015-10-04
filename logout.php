<?php
	ob_start();
	session_name('visit_en_data');
	session_start();
	unset($_SESSION['tourist']);
	
	header("Location:http://www.stillintouch.com");

?>