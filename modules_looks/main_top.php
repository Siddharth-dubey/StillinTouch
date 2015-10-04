<Style>
.main_top_wrap{
	position: fixed;
	z-index: 500;
	width: 100%;
	height:45px;
	box-shadow: 0 10px 10px #ddd;
	-webkit-box-shadow: 0 10px 10px #ddd;
	-ms-box-shadow: 0 10px 10px #ddd;
	-moz-box-shadow: 0 10px 10px #ddd;
	-ms-box-shadow: 0 10px 10px #ddd;
	-o-box-shadow: 0 10px 10px #ddd;
	background:#fff;
}
.main_top{
	position: relative;
	margin: 0;
	height: 45px;
}
.main_logo{
	position: relative;
	float: left;
	width: 45px;
	height: 45px;
	line-height: 45px;
}
.main_name{
	position: relative;
	color:#9C9292;
	text-align: center;
	font-family: sans-serif;
	line-height: 45px;
	height: 45px;
}
.main_settings{
	position: relative;
	line-height: 45px;
	color: #9C9292;
	text-align: center;
	font-family: sans-serif;
	padding:0;
}
.main_top ul{
	list-style: none;
	margin: 0;
	float: right;
	/*font-size: 0;*/
	padding: 0;
}
.main_top ul li{
	list-style: none;
	font-size: 16px;
	margin: 0;
	display: inline-block;
	text-align: center;
}
.main_top ul a{
	text-decoration: none;
	color: #9C9292;
	padding: 10px 10px;
}
.main_top ul a:hover{
	
	background: #CEBABA;
	color: #fff;
	-webkit-transition: all 0.2s ease-in;
	-moz-transition:all .2s ease-in;
	-o-transition:all .2s ease-in;
	cursor: pointer;
	-ms-transition:all .2s ease-in;
}
.log_off{
	position: relative;
	font-family: sans-serif;
	line-height: 45px;

}
.clearfix{
	clear: both;
}
.main_search{
	position: relative;
	float: left;
	width: 50%;
	box-shadow: 0px -5px 10px #ddd;
	margin: 5px 15px;
	border: 1px solid #ddd;
	outline: none;
}
.main_search input[type="text"]{
	width: 90%;
	outline: none;
	border: none;
	padding: 0px 10px;
	height: 30px;
}
</Style>
<div class="main_top_wrap">
	<div class="main_top">
		<div class="main_logo"><a href="/"><img height="45" width="45" src="/css/images/fnl_logo_small.jpg" alt="ST_logo"></a></div>
		<div class="main_search"><input id="search" type="text" placeholder="Find friends,pages,posts and lots more."></div>
		<ul>
		<li>
			<div class="main_name"><a href="/"><?php  echo "Siddharth";//echo get_name();?></a></div><div class="clearfix"></div>
		</li><li>
			<div class="main_settings"><a href="/">Options</a></div><div class="clearfix"></div>
		</li><li>
			<div class="log_off"><a href="javascript:void(0)" id="lg_out">Logout</a></div><div class="clearfix"></div>
		</li>
		<div class="clearfix"></div>
		</ul>
	</div>
</div>
