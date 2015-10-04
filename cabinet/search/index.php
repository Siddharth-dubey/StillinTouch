<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/assets/bootloader.php');
	$c=file_get_contents('php://input');
	$o=json_decode($c,true);
	$s=new auth();
	$q=$s->sanitize($o['val']);
	$query="SELECT `profile_pic`,`name`,`user_global_id` FROM `seafile` WHERE `name` LIKE '%$q%' LIMIT 0,15";
	$res=$s->query_justreturn($query);
	$oo=array();
	if(mysqli_num_rows($res)>0){
		while ($pop=$res->fetch_assoc()) {
			$oo[]=$pop;

		}
		$jsn=json_encode($oo);
	echo $jsn;
	}
	else{
		 echo '[]';
	}
	$res->free();
	
	
?>