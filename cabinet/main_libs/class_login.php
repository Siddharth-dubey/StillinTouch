<?php
class login{

	private $connector;

	public function __construct(){
		$this->connector=new mysqli(HOST_NAME,R_DB_USERNAME,R_DB_PASSWORD,DB_DATABASE);
	}
	
	public function __destruct(){
		$this->connector->close();
	}
	
	
	public function sanitize($val){
		$cleaned=str_replace(";","",htmlentities($val, ENT_QUOTES));
		$shine=$this->connector->real_escape_string($cleaned);
		return $shine;
	}
	public function query_noreturn($q){
		$qury=$q;
		if($this->connector->query($q)){
			return true;
		}
		else{
			return false;
		}
	}
	public function query_return($q){
		$qury=$q;
		if($this->connector->query($q)){
			$res=$this->connector->query($q);
			$fnl_res=mysqli_fetch_array($res);
			return $fnl_res;
		}
		else{
			return false;
		}
	}

	public function query_justreturn($q){
		$qury=$q;
		$res=$this->connector->query($q);
		return $res;
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
}
?>