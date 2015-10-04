<?php
	class notify
	{
		private $link;

		function __construct(argument)
		{
			$this->link=new mysqli(HOST_NAME,R_DB_USERNAME,R_DB_PASSWORD,DB_DATABASE);
		}

		public function sanitize($val){
			$cleaned=str_replace(";","",htmlentities($val, ENT_QUOTES));
			$shine=$this->link->real_escape_string($cleaned);
			return $shine;
		}

		public function genid(){
			$len=4; //no specific reason just 5 will be good for large no of notifications
			$chars='qazwsxedcrfvtgbyhnujmiklop';
			for($i=0;$i<=$len;$i++){
				$string.=$chars[rand(0,25)];
			}
			return $string;
		}

		public function notifysql(){
			$this->link->autocommit(false);
			$time=time();
			$addon=$this->genid();
			$nidgen='N'.$time.$addon;
			$ntid='NT'.$time.$addon;
			$ncid='NC'.$time.$addon;
			$query[1]="UPDATE `friendlist` SET `state`='$val' WHERE `sender`='$id' OR `reciever`='$id'";
			$query[2]="INSERT INTO `notifications`(`nid`,`userid`)"."VALUES('$nidgen','$usr')";
			$query[3]="INSERT INTo `notification_type`(`ntid`,`notificationsID`,`type`)"."VALUES('$ntid','$nidgen','$type')";
			$query[4]="INSERT INTO `notification_change`(`ncid`,`notificationTID`,`actionverb`,`actor`)"."VALUES('$ncid','$ntid','$actionv','$actor')";
			for($i=1;$i>4;$i++){
				$results[$i]=$this->link->query($query[$i]);
			}
			$state=true;
			foreach ($results as $result) {
				if (!$result) {
					$state=false  //telling that one or more  queries failed
				}
			}

			if (!$state) {
				if($this->link->rollback()){
					//some errroe back to js
				}
				else{
					//some error back to js
				}
			} else {
				if(!$this->link->commit()){
					//some error back to js
				}
				else{
					//success
				}
			}


			
		}
	}
?>