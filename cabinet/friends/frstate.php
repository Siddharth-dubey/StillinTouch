<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/assets/bootloader.php');
if (logged_in()) {
	$c=file_get_contents('php://input');
	$p=json_decode($c,true);
	$o=new login();
	$send=$o->sanitize($_SESSION['user_global_id']);
	$rec=$o->sanitize($p["rec"]);
	$query="SELECT `sender`,`state` FROM `friendlist` WHERE (`sender`='$send' AND `reciever`='$rec') OR (`sender`='$rec' AND `reciever`='$send')";
	$result=$o->query_justreturn($query);
	if(mysqli_num_rows($result)!=0){
		$resar=mysqli_fetch_array($result);
		if($resar["sender"]==$send){
			$op="user";
		}
		elseif ($resar["sender"]==$rec) {
			$op="rec";
		}
		else{
			kill(0);
		}
		switch ($resar["state"]) {
			case 10:							//10-already friend //20-sent //30-reject	
				echo reply(10,$op);
				break;
			case 20:
				echo reply(20,$op);
				break;
			case 30:
				echo reply(30,$op);
				break;
			default:
				echo kill(0);
				break;
		}
	}
	elseif (mysqli_num_rows($result)==0) {
		echo add();
	}
	else{
		echo kill(0);
	}
		
	

}
else{
	//universal msg
	 echo "ad";
}


function reply($s,$eff){
	if ($eff=="user") {
		switch ($s) {
			case 10:
				$msg["msg"]="ok";			//already friend so its ok
				break;
			case 20:
				$msg["msg"]="senca";		//sent and cancel option
				break;
			case 30:
				$msg["msg"]="senca";		//rejected but consoliation that it has been sent and not accepted yet!.
				break;
			default:
				echo kill(0);
				break;
		}
	} 
	elseif ($eff=="rec") {
		switch ($s) {
			case 10:
				$msg["msg"]="ok";
				break;
			case 20:		
				$msg["msg"]="accrej";				//accept it or reject it
				break;
			case 30:
				$msg["msg"]="rejaccep";				//rejected but you have a option to accept it.
				break;
			default:
				echo kill(0);
				break;
		}
	}
	else {
		echo kill(0);
	}
	return json_encode($msg);
	
}

function add(){
	$msg["msg"]="add";
	return json_encode($msg);
}


function kill($x){
	$msg["msg"]="kill";
	return json_encode($msg);

}


?>