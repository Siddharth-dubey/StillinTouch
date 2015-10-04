<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/assets/bootloader.php');
if(logged_in()){
	ob_start();
	header("Location:http://www.stillintouch.com");
}
else{
$c=file_get_contents('php://input');
$o=json_decode($c,true);
$a1=$o['entry1'];//first name
$a2=$o['entry2'];//last name
$a3=$o['entry3'];//username
$a4=$o['entry4'];//email
$a5=$o['entry5'];//pass
$a6=$o['entry6'];//token
// $a7=$o['entry7'];//checkbox
$a7=$o['entry7'];//fake confirm email
if((isset($a7))  && ($a7!="")){
	echo kill(4);
}
elseif (isset($a1) && isset($a2) && isset($a3) && isset($a4) && isset($a5) && isset($a6)){
	$man=new auth();
	$tokn=$man->sanitize($a6);
	if($man->check_token($tokn)){
		$fnm=$man->sanitize($a1);
		$lnm=$man->sanitize($a2);
		$usr=$man->sanitize($a3);
		$em=$man->sanitize($a4);
		$pas=$man->sanitize($a5);
		if((!$man->check_username($usr)) && (!$man->check_email($em))){
			$pre_pass=strgen(60);
			$pre_qur="INSERT INTO jokers(`username`,`email`,`smile`)"."values('$usr','$em','$pre_pass')";
			if($man->query_noreturn($pre_qur)){
				$fnl_pass=fucker($pas,$pre_pass);
				$esp_pass=str_replace("/","",$fnl_pass);
				$tm=time();
				$fl_name=$fnm." ".$lnm;
				$query="INSERT INTO everybody(`fname`,`lname`,`full_name`,`username`,`email`,`unique_pass`,`signed_on`,`act_state`)"."values('$fnm','$lnm','$fl_name','$usr','$em','$esp_pass','$tm','10')";
				if($man->query_noreturn($query)){
						$pic_query="SELECT `user_global_id` FROM `everybody` WHERE `username`='$usr'";
						$pic_usr=$man->query_return($pic_query);
						$usr_id=$pic_usr["user_global_id"];
						$pic_insert="INSERT INTO seafile(`user_global_id`,`profile_pic`,`name`)"."values('$usr_id','default','$fl_name')";
						if($man->query_noreturn($pic_insert)){
							$ml=new mail();
							$rndm_str=strgen(45);
							$rndm_mn=small_f(44);
							$ml_query="INSERT INTO mail_act(`username`,`token`,`resource`,`time`)"."values('$usr','$rndm_mn','$rndm_str','$tm')";
							if($man->query_noreturn($ml_query)){
									if($ml->mailact($fnm,$rndm_mn,$rndm_str,$em)){
										if($man->unset_token($tokn)){
										echo good();
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
								echo  kill(0);
							}
						}
						else{
							kill(0);
						}
			}
				else{
					echo  kill(0);
				}
			}
			else{
				echo kill(0);
			}
		}
		else{
			if($man->check_username($usr)){
				echo kill(1);	
			}
			elseif($man->check_email($em)){
				echo kill(2);
			}
			else{
				echo kill(0);
			}
			
		}
	}
	else{
		echo kill(4);
	}
}
else{
	echo kill(3);
}
}

function good(){
	$err["msg"]="go";
	return json_encode($err);
}
function kill($d){
	switch ($d) {
		case 0:$err["msg"]="faotal";
				break;
		case 1:$err["msg"]="u_exists";
				break;			
		case 2:$err["msg"]="e_exists";
				break;
		case 3:$err["msg"]="empty";
				break;
		case 4:$err["msg"]="ngd";
				break;
		default:$err["msg"]="fatal";
				break;
	}
	//$_SESSION["counter"]++;
	return json_encode($err);
}
?>