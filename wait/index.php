<!DOCTYPE html>
<html>
<head>
<meta HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-8">
<meta NAME="ROBOTS" CONTENT="ALL">
<meta name="robots" content="NOODP,NOYDIR"/>
<meta name="description" content="StillinTouch is a social network which helps you connect with people & brands around you in a completely new way">
<title>Just wait</title>
<meta NAME="KEYWORDS" CONTENT="stillintouch,st,stilintouch,social network,new social network,new social network 2014,connect,share photos,chat,still,intouch,st intouch,touch">
<meta property="og:title" content="StillinTouch | Connect with the people,brands and groups."/>
<meta property="og:type" content="website"/>
<meta property="og:image" content="http://www.stillintouch.com/css/images/fb.jpg"/>
<meta property="og:url" content="http://www.stillintouch.com"/>
<meta property="og:description" content="StillinTouch is a social network which helps you connect with people & brands around you in a completely new way."/>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon-precomposed" href="http://www.stillintouch.com/css/images/fnl_logo_small.jpg">
<meta name="msapplication-TileColor" content="#5522ec">
<meta name="msapplication-TileImage" content="http://www.stillintouch.com/css/images/fnl_logo.jpg ">
</head>
<style type="text/css">
	*{
		margin: 0;
		padding: 0
	}
	.wait{
		position: fixed;
		height: 100%;
		width: 100%;
		background: url('/css/images/showbiz/cmngsoon.jpg');
		background-size: cover;
	}
	.logout{
		position: absolute;
width: 200px;
height: 50px;
	}
	.logout a{

	color: #FFFFFF;
font-size: 25px;
font-family: sans-serif;
}
</style>
<body>
	<div class="wait"></div>
	<div class="logout">
		<?php
			if(isset($_SESSION['tourist'])){
				echo "<a href="."/logout.php".">Logout for now.</a>";
			}
		?>
	</div>
</body>
</html>