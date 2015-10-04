<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/assets/bootloader.php');
$contain=file_get_contents('php://input');
$rec=json_decode($contain,true);
//echo json_encode($rec);
$k=new auth();
if(logged_in()){ //remember to remove this ! after login script done
	//echo json_encode($rec);
	$user=$_SESSION['tourist'];
	$user_id=$_SESSION['user_global_id'];
	$ques=$k->sanitize($rec["ques"]);
	$ans=$k->sanitize($rec["ans"]);	
	$sex=$k->sanitize($rec["sex"]);
	$date=$k->sanitize($rec["date"]);
	$month=$k->sanitize($rec["month"]);
	$year=$k->sanitize($rec["year"]);	
	$nation=$k->sanitize($rec["cntry"]);
	$token=$k->sanitize($rec["o"]);
	$dob=$date.$month.$year;
	if($k->check_token($token)){
			if(($ques>"0" && $ques<="6") && ($sex=="m" || $sex=="f") && ($date>"0" && $date<="31") && ($month>"0" && $month<="12") && ($year>="1900" && $year<="2014") && ($year>"1997")){
				$query="INSERT INTO possibility(`tourist`,`user_global_id`,`question`,`answer`,`sex`,`dob`,`country`)"."values('$user','$user_id','$ques','$ans','$sex','$dob','$nation')";
				if($k->query_noreturn($query)){
					//echo "success";
					$st="50";
					$query2="UPDATE `everybody` SET `act_state`='$st' Where `username`='$user'";
					if($k->query_noreturn($query2)){echo kill(1);$k->unset_token($token);}else{echo kill(0);}
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
		echo kill(0);
	}
}
else{
	echo kill(0);
}

function kill($val){
	switch ($val) {
		case 0:
			$msg["msg"]="fail";
			break;
		case 1:
			$msg["msg"]="success";
			break;
		default:
			$msg["msg"]="fail";
			break;
	}
	return json_encode($msg);
}
?>