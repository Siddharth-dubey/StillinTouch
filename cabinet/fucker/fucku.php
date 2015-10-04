<?php
function strgen($len){
$char="qwertyuioplkjhgfdsazxcvbnm12ABGHTYAPWMLOP3@4567890";
$chararr=str_split($char);
$ans="";
for($i=0;$i<$len;++$i){
	$rand=array_rand($chararr);
	$ans.=$chararr[$rand];
}
return $ans;
}
function small_f($x){
	$hr=strgen($x);
	$str=hash('sha1',$hr);
	$str2=hash('sha1','email');
	$fnl=$str.$str2;
	return $fnl;
}
function fucker($pass,$randstr){
$string1=hash('sha256',$randstr);
$string2=hash('sha256',$string1);
$pass1=hash('sha256',$pass);
$pass2=hash('sha256',$pass1);
$res=crypt($pass2,'$5$rounds=500000$'.$string2.'$');
return $res;
}
?>
