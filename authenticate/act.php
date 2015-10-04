<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/assets/bootloader.php');
	ob_start();
	if(isset($_SESSION['tourist'])){
		header('Location:http://www.stillintouch.com');
	}
	if(isset($_GET['mnk']) && isset($_GET['rsr']) && isset($_GET['mode']) && $_GET['mnk']!="" && $_GET['rsr']!="" && $_GET['mode']!="" && $_GET['mode']=="activate"){
		$to=$_GET['mnk'];
		$rs=$_GET['rsr'];
		$m=$_GET['mode'];
		$link=new login();
		$token=$link->sanitize($to);
		$rescrc=$link->sanitize($rs);
		$mode=$link->sanitize($m);
		$qury="SELECT * FROM `mail_act` WHERE `token`='$token'";
		$rep=$link->query_return($qury);
		if($rep==""){
			$msg=Invalid_Email_link;
		}
		else{
			$usrnm=$rep['username'];
			$tkn=$rep['token'];
			$rsrc=$rep['resource'];
			if($token==$tkn && $rsrc==$rescrc){
				$new_query="UPDATE `everybody` SET `act_state`='30' WHERE `username`='$usrnm'";
				$run=$link->query_noreturn($new_query);
				if($run){
					$msg=Valid_Email_link;
					}
				else{
					$msg=Query_incomplete;
				}
			}
			else{
				$msg=Invalid_Email_link;
			}
		}
	}
	else{
		$msg=Invalid_Email_link;
	}

	//echo $msg;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="/scripts/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
 	window.addEventListener("load",function(e){
 		//alert("awd");
 		$('.extra_msg_banner').animate({top:0},1000);
 		$('.bnr_btn').on('click',function(e){
 			$('.extra_msg_banner').animate({top:-175},500);
 			window.location.replace("http://www.stillintouch.com");
 		});
 		$("#api_login").on('click',function() {
 			$("#api_login").val("wait....");
 			$('.api_error').html("");
			var a=$("#api_eml").val();
			var b=$("#api_pass").val();
			var c={};
			var t=$("#token").val();
			var reg="/[^a-z0-9@.-_]/gi";
			c["auth"]=a.replace(reg,"");
			c["access"]=b.replace(reg,"");
			c["ticket"]=t.replace(reg,"");
			var i=JSON.stringify(c);
			$.ajax({
				url: '/login/',
				type: 'POST',
				dataType: 'JSON',
				data:i,
				success:function(response){
					console.log(response);
					var op=response;
					console.log(op["msg"]);
					$("#api_login").val("Login");
					switch (op["msg"]){
						case "go":window.location.replace('/');
								break;
						case "ko":$('.api_error').html("Either email or password is incorrect");
								break;
						default://find some way to refresh the page..
							break;
					}
				}
			});			
		});
 	});
</script>
<style type="text/css">
.extra_msg_banner{
	position: absolute;
	z-index: 200;
	top: -100px;
	width: 100%;
	box-shadow:0 10px 10px #813FA0;
	height:65px;
	background: #fff; 
}
.extra_msg{
	position: relative;
	margin: 0;
	float: left;
	color: #635555;
	font-family: sans-serif;
	font-size: 15px;
	line-height: 55px;
}
.msg_btwn{
	position: relative;
	margin: 5px auto;
	width: 425px;
	height: 55px;
}
.banner_btn{
	position: relative;
	float: right;
	margin: 0 15px;
}
.banner_btn a{
	line-height: 55px;
	padding: 5px 10px;
	color: #fff;
	font-family: sans-serif;
	background: #F00B0B;
	text-decoration: none;
}
.lgn_wrp{
	position: relative;
	width: 80%;
	max-width: 600px;
	margin: 100px auto;
	border: 2px dashed #ddd;
	height: 275px;
}
body{
	margin:0;
	padding: 0;

}
.clearfix{
	clear: both;
}
</style>
<style type="text/css">
	.login_text{
	position: relative;
	width: 60px;
	color: #7E5C5C;
	font-family: sans-serif;
	margin: 10px auto;
	font-size: 18px;
	}
	.inp_api{
		position: relative;
		width: 90%;
		margin: 20px auto;
		height: 40px;
	}
	.inline{
		display: inline-block;
	}
	.api_inp_txt{
		position: relative;
		width: 30%;
		color: #665A5A;
		text-align: center;
		line-height: 40px;
		margin: 0 0px 0 10px;
		font-family: sans-serif;
	}
	.api_inp_field{
		position: relative;
		width: 60%;	
	}
	.api_inp_field input[type="email"]{
		width: 100%;
		height: 24px;	
	}
	.api_inp_field input[type="password"]{
		width: 100%;
		height: 24px;	
	}
	.api_btn{
		position: relative;
		width: 100px;
		height: 40px;
		margin: 0 auto;
	}
	.api_btn input[type="submit"]{
		width: 100%;
		height: 100%;
		border: none;
		font-family: sans-serif;
		color: #fff;
		background: #4D3639;
	}
	.api_error{
		position: relative;
		margin: 0 auto;
		color: #f00;
		width: 300px;
		font-size: 14px;
		font-family: sans-serif;
		text-align: center;
	}
</style>
<script type="text/javascript">
		
</script>
</head>
<body>
	<div class="extra_msg_banner">
		<div class="msg_btwn">
			<div class="extra_msg"><?php  echo $msg; ?></div>
			<div class="banner_btn"><a href="javascript:void(0)" class="bnr_btn">Okay</a></div>
			<div class="clearfix"></div>
		</div>
	</div>
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/modules_looks/extra_top.php');	?>
	<div class="lgn_wrp">
	<?php /*include_once($_SERVER['DOCUMENT_ROOT'].'/modules_looks/login_api.php');*/?>
	</div>
	<?php //include_once($_SERVER['DOCUMENT_ROOT'].'/modules/extra_footer.php');?>
</body>
</html>