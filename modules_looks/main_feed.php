<!DOCTYPE html>
<html>
<head>
<meta HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-8">
<meta NAME="ROBOTS" CONTENT="ALL">
<meta name="robots" content="NOODP,NOYDIR"/>
<meta name="description" content="StillinTouch is a social network which helps you connect with people & brands around you in a completely new way">
<title>StillinTouch</title>
<meta name="KEYWORDS" content="stillintouch,st,stilintouch,social network,new social network,new social network 2014,connect,share photos,chat,still,intouch,st intouch,touch">
<meta property="og:title" content="StillinTouch | Connect with the people,brands and groups."/>
<meta property="og:type" content="website"/>
<meta property="og:image" content="http://www.stillintouch.com/css/images/fb.jpg"/>
<meta property="og:url" content="http://www.stillintouch.com"/>
<meta property="og:description" content="StillinTouch is a social network which helps you connect with people & brands around you in a completely new way."/>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon-precomposed" href="http://www.stillintouch.com/css/images/fnl_logo_small.jpg">
<meta name="msapplication-TileColor" content="#5522ec">
<meta name="msapplication-TileImage" content="http://www.stillintouch.com/css/images/fnl_logo.jpg ">
<link rel="stylesheet" type="text/css" href="/css/home.css">
</head>
<body>
	<div class="lg_out">
		<div class="lg_out_txt">Are you sure?</div>
	</div>
	<div class="overlay"></div>
	<?php

	include_once($_SERVER["DOCUMENT_ROOT"].'/modules_looks/home_top.php');
	include_once($_SERVER["DOCUMENT_ROOT"].'/modules_looks/home_side_left.php');

	?>

	<div class="share_btn" id="share_btn">Share something</div>
	<div class="share_box">
		<div class="share_box_in">
			<div class="share_opts">
				<div class="shr_opts_ttl">Select:</div>
				<div class="shr_opts_list">
					<ul>
						<li class="active_opt"><div class="s_opts_text">status</div></li>
						<li class="inactive_opt"><div class="s_opts_text">photos</div></li>
						<li class="inactive_opt"><div class="s_opts_text">videos/links</div></li>
					</ul>
				</div>
			</div>
			<div class="share_main_dialog">
				<div class="s_dialog_text">What do you wanna say?</div>
				<div class="s_d_content"></div>
			</div>
			<div class="share_submit_dialog">
				<div class="submit_text">Privacy settings:</div>
				<div class="privacy_opts">
					<select>
						<option>public</option>
						<option>Friends</option>
						<option>only me</option>
					</select>
				</div>
				<div class="sbmt_submit_btn">
					<input type="submit" value="Submit">					
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="post_feed_opts">
		<div class="opt_icons"></div>	
	</div>
	<div class="feed_column_status">
		<div class="feed_status">
			<div class="feed_s_top_bar">
				<div class="feed_s_img flt_l"><a href="/"><img height="45" width="45" src="/css/images/pp2.jpg"></a></div>
				<div class="feed_s_t_n flt_l">
					<div class="feed_s_name"><a href="/">Siddharth Dubey</a></div>
					<div class="feed_s_t">2 hours ago</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="feed_s_rep">+25</div>
			<div class="feed_s_cont">This is the testing status and it looks good.</div>
			<div class="feed_s_fbck">
				<div class="f_s_fbck_box f_s_fbck_up flt_l">
					<div class="fbck_align">
					<a class="flt_l" href="">
						<div class="fbck_img flt_l"><div class="up_img"></div></div>
						<div class="fbck_txt flt_l">Upvote</div>
						<div class="clearfix"></div>
					</a>
					<a class="flt_l" href="">
						<div class="s_fbck_repo">(999)</div>
					</a>
					<div class="clearfix"></div>
					</div>
				</div>
				<div class="f_s_fbck_box f_s_fbck_up flt_l">
					<div class="fbck_align">
					<a class="flt_l" href="">
						<div class="fbck_img flt_l"><div class="cmnt_img"></div></div>
						<div class="fbck_txt flt_l">Comment</div>
						<div class="clearfix"></div>
					</a>
					<a class="flt_l" href="">
						<div class="s_fbck_repo">(999)</div>
					</a>
					<div class="clearfix"></div>
					</div>
				</div>
				<div class="f_s_fbck_box f_s_fbck_down flt_r">
					<div class="fbck_align">
					<a class="flt_r" href="">
						<div class="s_fbck_repo">(999)</div>
					</a>
					<a class="flt_r" href="">
						<div class="fbck_txt flt_r">Downvote</div>
						<div class="fbck_img flt_r"><div class="dwn_img"></div></div>
						<div class="clearfix"></div>
					</a>
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="cherry_red"></div>
		</div>
		
		

	</div>
	<script type="text/javascript" src="/scripts/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/scripts/jquery.nicescroll.js"></script>
	<script type="text/javascript" src="/scripts/jquery.typewatch.js"></script>
	<script type="text/javascript" src="/scripts/controller_main.js"></script>
</body>
</html>