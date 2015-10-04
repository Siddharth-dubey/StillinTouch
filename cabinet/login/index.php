<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/assets/bootloader.php');
$v=file_get_contents('php://input');
$get=json_decode($v,true);
//sleep(2);
$o=new auth();
$k=new login();
$user=$get["auth"];
$password=$get["access"];
$token=$get["ticket"];
$user_clean=$k->sanitize($user);
$pass_clean=$k->sanitize($password);
$token_clean=$k->sanitize($token);
if($user_clean!="" && $pass_clean!="" && $token_clean!=""){
	if($k->check_token($token_clean)){
		$check_user="SELECT `unique_pass`,`username`,`user_global_id`,`full_name`,`act_state` FROM `everybody` WHERE `email`='$user_clean'";
		$result=$k->query_return($check_user);
		if($result!=""){
			$get_nuke="SELECT `smile` FROM `jokers` WHERE `email`='$user_clean'";
			$nuke_resp=$k->query_return($get_nuke);
			if($nuke_resp!=""){
				$user_info=fucker($pass_clean,$nuke_resp["smile"]);
				$esp_pass=str_replace("/","",$user_info);
				if($esp_pass==$result["unique_pass"]){
					$idd=$result["username"];
					$pic_query="SELECT `pic_id` FROM `profile_pic` WHERE `username`='$idd'";
					$out_pic=$k->query_return($pic_query);
						if($out_pic!=""){
							$o->unset_token($token);
							echo go($result["username"],$result["user_global_id"],$result["full_name"],$out_pic["pic_id"],$result["act_state"]);
						}
					}
					else{
						echo kill(0);
					}
				}
				else{
					echo kill(0);
				}
			}
			else{
				echo kill(3);
			}
		}
		else{
			echo kill(3);
		}
	}
	else{
		echo kill(1);
	}
// }
// else{
// 	echo kill(2);
// }


function go($session,$id,$name,$picid,$state){
	$err["msg"]="go";
	$_SESSION['tourist']=$session;
	$_SESSION['tourist_name']=$name;
	$_SESSION['user_global_id']=$id;
	$_SESSION['user_pic']=$picid;
	$_SESSION['state']=$state;
	return json_encode($err);
}
function kill($d){
	switch ($d) {
		case 0:$err["msg"]="err";
				break;
		case 1:$err["msg"]="ndo";
				break;
		case 2:$err["msg"]="emp";
				break;	
		case 3:$err["msg"]="ko";
				break;
		case 4:$err["msg"]="lo";
				break;	
		default:$err["msg"]="noo";
				break;
	}
	//$_SESSION["counter"]++;
	return json_encode($err);
}
?>
