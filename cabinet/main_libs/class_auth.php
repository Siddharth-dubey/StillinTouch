<?php
class auth{

	private $uplink;

	public function __construct(){
		$this->uplink=new mysqli(HOST_NAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	}
	
	public function __destruct(){
		
	}
    public function close_connection()
	{
		mysqli_close($this->uplink);
	}
	public function gen($len){
		$data="ASDFGHJKLQPOWERITYULZXCVMBNasdlkjfhgzmnxcbvqpwoeiuty_1597863420@";
		$rgen='';
		for($i=0;$i<=$len;$i++){
			$rgen.=$data[rand(0,strlen($data)-1)];
		}
		$generate=hash('sha256',$rgen);
		return $generate;
	}
	public function sanitize($val){
		$cleaned=str_replace(";","",htmlentities($val, ENT_QUOTES));
		$shine=$this->uplink->real_escape_string($cleaned);
		return $shine;
	}
	public function query_noreturn($q){
		$qury=$q;
		if($this->uplink->query($q)){
			return true;
		}
		else{
			return false;
		}
	}
	public function query_return($q){
		$qury=$q;
		if($this->uplink->query($q)){
			$res=$this->uplink->query($q);
			$fnl_res=mysqli_fetch_array($res);
			return $fnl_res;
		}
		else{
			return false;
		}
	}

	public function query_justreturn($q){
		$qury=$q;
		$res=$this->uplink->query($q);
		return $res;
	}

	// public function query_callback($q,$table,$selected,$selector,$field){
	// 	$qury=$q;
	// 	if($this->uplink->query($q)){
	// 		$call="SELECT `$selected` FROM `$table` WHERE `$selector`='$field'";
	// 		$res=$this->query_return($call);
	// 		return $res;
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }


	public function set_token(){
		$token=$this->gen(20);
		$f=time();
		$query="INSERT INTO token_auth(credit,token_tm)"."VALUES('$token','$f')";
		if(($this->query_noreturn($query))){
			return $token;
		}
		else{
			return false;
		} 	
	}
	
	public function unset_token($val){
		$tk=$this->sanitize($val);
		$query="DELETE FROM `token_auth` WHERE `credit`='$tk'";
		if(($this->query_noreturn($query))){
			return true;
		}
		else{
			return false;
		}
	}

	public function check_token($token){
			$tkn=$this->sanitize($token);
			$query="SELECT `credit`,`token_tm`FROM `token_auth` WHERE `credit`='$tkn'";
			$exam=$this->query_return($query);
			if($exam!=""){
				$o=time();
				$re=($o-$exam['token_tm'])/60;
				if($re>60){
					return false;
				}
				else{
					return true;
				}
			}
			else{
				return false;
			}
		}

	public function check_username($usr){
		$usrnm=$this->sanitize($usr);
		$query="SELECT `user_global_id` FROM `everybody` WHERE `usrname`='$usrnm'";
		$results=$this->query_return($query);
		if($results!=""){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function check_email($mail){
		$ml=$this->sanitize($mail);
		$query="SELECT `user_global_id` FROM `everybody` WHERE `email`='$ml'";
		$resultss=$this->query_return($query);
		if($resultss!=""){
			return true;
		}
		else{
			return false;
		}
	}
}
?>