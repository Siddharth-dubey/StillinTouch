<?php
session_name('visit_en_data');
session_start();
echo $_SESSION["tourist"];
echo $_SESSION["user_global_id"];

var_dump(logged_in());
function logged_in(){
	if(isset($_SESSION['tourist']) && isset($_SESSION['user_global_id'])){
		return true;
	}
	else{
		return false;
	}
}
?>