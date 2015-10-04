<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/assets/bootloader.php');
if(!logged_in() /*$_SESSION['act_state']!=30*/){
	ob_start();
	header("Location:http://www.stillintouch.com");
}
else{
	$init=new auth();
	$tk=$init->set_token();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome | StillinTouch</title>
<meta rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
<meta name="robots" content="noindex,nofollow"/>
<link rel="stylesheet" type="text/css" href="/css/first_time.css">
<script type="text/javascript">
 	// window.addEventListener("load",function(e){
 	// 	//alert("awd");
	 // 	if(window.File && window.Blob && window.FileReader && window.FileList){
	 // 		var f_input=g("img_up");
	 // 		f_input.addEventListener('change',function(e){
	 // 			var f=f_input.files[0];
	 // 			//alert("in");
	 // 			if(f.type.match('image.*')){
	 // 				var f_read=new FileReader();
	 // 				f_read.onload=function(e){
	 // 					g("profile_pic").src=f_read.result;
	 // 				}
	 // 				f_read.readAsDataURL(f);
	 // 			}
	 // 			else
	 // 			{
	 // 				alert("invalid format");
	 // 			}
	 // 		});
	 // 		// /alert("goon")
	 // 	}
	 // 	else{
	 // 		alert("nananana");
	 // 	}

	 // 	var img = document.getElementById('profile_pic'); 
		// var width = img.clientWidth;
		// var height = img.clientHeight;
		// console.log("width="+width+"height="+height);

	 // 	$('#lg_out').on('click',function(e){
	 // 		$('.extra_msg_banner').animate({top:0},1000);
	 // 		$('.bnr_btn').on('click',function(e){
	 // 			$('.extra_msg_banner').animate({top:-175},500)
	 // 		});
	 // 	});

	 // 	$('.image_holder').hover(function(e){
	 // 		//alert("s");
	 // 		$('.img_options').css({display:"block"});
	 // 		$('.img_options').animate({opacity:1},250);
	 // 		},function(e){
	 // 		$('.img_options').animate({opacity:0},250,function(e){
	 // 			$('.img_options').css({display:"none"});
	 // 		});	
	 // 		});

	 		
 	// });
</script>
</head>
<body>
	<div class="extra_msg_banner">
			<div class="msg_btwn">
				<div class="extra_msg">Are you sure you wanna logout?</div>
				<div class="banner_btn"><a href="javascript:void(0)" class="bnr_btn">Yes</a></div>
				<div class="clearfix"></div>
			</div>
	</div>
	<div class="overlay_pic">
		<div class="pic_chnge_wrap">
			<div class="upload_text">Upload your profile picture</div>
			<div class="upload_area">
				<div class="imgupld_error">Make sure image is atleast 300px x 300px</div>
				<div class="area_text">Select a picture from your computer</div>
				<div class="imagearea">
					<img src="/" id="thisimg">
					<input type="hidden" id="x1" value="120">
					<input type="hidden" id="y1" value="90">
					<input type="hidden" id="x2" value="320">
					<input type="hidden" id="y2" value="290">
					<input type="hidden" id="w" value="265">
					<input type="hidden" id="h" value="265">
				</div>
			</div>
			<div class="upld_selectors">
				<div class="upld_select_btn">
					<div class="img_upld"><div class="select_text">Select picture<input type="file" id="selectimg"></div></div>
				</div>
				<div class="upld_select_btn">
					<div class="img_upld"><div class="select_text extra">Submit<input type="button" id="submit"></div></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	 <div class="cover_wrap">	
	 <div class="main_bar_top">
	 	<div class="logo"></div>
		<div class="user_info"><div class="user_pic"><a href="/logout">Logout</a></div><div class="user_name"><?php echo $_SESSION['full_name']; ?></div></div>
		<div class="search_wrap">
		<div class="search_text"></div>
		<div class="search_main" style="display:none;"></div>
		</div>
		<div class="name_site">StillinTouch</div>
	</div>
	 	<div class="info_wrap">
	 		<div class="info_top"></div>
	 		<div class="info_main">
	 			<div class="left_side">
	 				<div class="lft_head">
	 				 <i>Just a few things about you!</i>
	 				</div>
	 				<div class="form_wrap">
	 				  <form method="POST" id="security_info" action="">
	 					<div class="ques_list" id="questn">
	 						<div class="ques_det">Security question</div>
	 						<div class="the_ques">
	 							<select id="s_ques">
	 								<option value="0">Select:</option>
	 								<option value="1">What is the first name of your grandmother?</option>
	 								<option value="2">Where were you when you had your first kiss? </option>
	 								<option value="3">What was your favorite place to visit as a child?</option>
	 								<option value="4">What is your preferred musical genre? </option>
	 								<option value="5">What is the last name of your first crush?</option>
	 								<option value="6">What is the city of your ultimate dream vacation?</option>
	 							</select>
	 						</div>
	 					</div>
	 					<div class="ques_list">
	 						<div class="ques_det">Your answer:</div>
	 						<div class="the_ques">
	 							<input type="text" id="s_ans" maxlength="50" placeholder="Enter your answer (no spaces allowed)" required>
	 						</div>
	 					</div>
	 					<div class="ques_list">
	 						<div class="ques_det">Your sex:</div>
	 						<div class="the_ques">
	 							<select id="s_sex">
	 								<option value="0">Select:</option>
	 								<option value="f">Female</option>
	 								<option value="m">Male</option>
	 							</select>
	 						</div>
	 					</div>
	 					<div class="ques_list">
	 						<div class="ques_det">Date of Birth:</div>
	 						<div class="the_ques extra_ques">
	 							<div class="ex_day">
	 								<select id="dob_date">
	 									<option value="0">Date:</option>
	 									<?php
	 									for($i=1;$i<=31;$i++){
	 										echo '<option value="'.$i.'">'.$i.'</option>';
	 									}
	 									?>
	 								</select>
	 							</div>
	 							<div class="ex_month">
	 								<select id="dob_month">
	 									<option value="0">Month:</option>
	 									<option value = "01">January</option>
										<option value = "02">February</option>
										<option value = "03">March</option>
										<option value = "04">April</option>
										<option value = "05">May</option>
										<option value = "06">June</option>
										<option value = "07">July</option>
										<option value = "08">August</option>
										<option value = "09">September</option>
										<option value = "10">October</option>
										<option value = "11">November</option>
										<option value = "12">December</option> 
	 								</select>
	 							</div>
	 							<div class="ex_year">
	 								<select id="dob_year">
	 									<option value="0">Year:</option>
	 									<?php
	 									for($i=2014;$i>=1900;$i--){
	 										echo '<option value="'.$i.'">'.$i.'</option>';
	 									}
	 									?>
	 								</select>
	 							</div>
	 						</div>
	 					</div>
	 					<div class="ques_list">
	 						<div class="ques_det">Country:</div>
	 						<div class="the_ques">
	 							<select id="s_cntry">
	 								<option value="0">Select country:</option>
									<option value="AF">Afghanistan</option>
									<option value="AX">Åland Islands</option>
									<option value="AL">Albania</option>
									<option value="DZ">Algeria</option>
									<option value="AS">American Samoa</option>
									<option value="AD">Andorra</option>
									<option value="AO">Angola</option>
									<option value="AI">Anguilla</option>
									<option value="AQ">Antarctica</option>
									<option value="AG">Antigua and Barbuda</option>
									<option value="AR">Argentina</option>
									<option value="AM">Armenia</option>
									<option value="AW">Aruba</option>
									<option value="AU">Australia</option>
									<option value="AT">Austria</option>
									<option value="AZ">Azerbaijan</option>
									<option value="BS">Bahamas</option>
									<option value="BH">Bahrain</option>
									<option value="BD">Bangladesh</option>
									<option value="BB">Barbados</option>
									<option value="BY">Belarus</option>
									<option value="BE">Belgium</option>
									<option value="BZ">Belize</option>
									<option value="BJ">Benin</option>
									<option value="BM">Bermuda</option>
									<option value="BT">Bhutan</option>
									<option value="BO">Bolivia, Plurinational State of</option>
									<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
									<option value="BA">Bosnia and Herzegovina</option>
									<option value="BW">Botswana</option>
									<option value="BV">Bouvet Island</option>
									<option value="BR">Brazil</option>
									<option value="IO">British Indian Ocean Territory</option>
									<option value="BN">Brunei Darussalam</option>
									<option value="BG">Bulgaria</option>
									<option value="BF">Burkina Faso</option>
									<option value="BI">Burundi</option>
									<option value="KH">Cambodia</option>
									<option value="CM">Cameroon</option>
									<option value="CA">Canada</option>
									<option value="CV">Cape Verde</option>
									<option value="KY">Cayman Islands</option>
									<option value="CF">Central African Republic</option>
									<option value="TD">Chad</option>
									<option value="CL">Chile</option>
									<option value="CN">China</option>
									<option value="CX">Christmas Island</option>
									<option value="CC">Cocos (Keeling) Islands</option>
									<option value="CO">Colombia</option>
									<option value="KM">Comoros</option>
									<option value="CG">Congo</option>
									<option value="CD">Congo, the Democratic Republic of the</option>
									<option value="CK">Cook Islands</option>
									<option value="CR">Costa Rica</option>
									<option value="CI">Côte d'Ivoire</option>
									<option value="HR">Croatia</option>
									<option value="CU">Cuba</option>
									<option value="CW">Curaçao</option>
									<option value="CY">Cyprus</option>
									<option value="CZ">Czech Republic</option>
									<option value="DK">Denmark</option>
									<option value="DJ">Djibouti</option>
									<option value="DM">Dominica</option>
									<option value="DO">Dominican Republic</option>
									<option value="EC">Ecuador</option>
									<option value="EG">Egypt</option>
									<option value="SV">El Salvador</option>
									<option value="GQ">Equatorial Guinea</option>
									<option value="ER">Eritrea</option>
									<option value="EE">Estonia</option>
									<option value="ET">Ethiopia</option>
									<option value="FK">Falkland Islands (Malvinas)</option>
									<option value="FO">Faroe Islands</option>
									<option value="FJ">Fiji</option>
									<option value="FI">Finland</option>
									<option value="FR">France</option>
									<option value="GF">French Guiana</option>
									<option value="PF">French Polynesia</option>
									<option value="TF">French Southern Territories</option>
									<option value="GA">Gabon</option>
									<option value="GM">Gambia</option>
									<option value="GE">Georgia</option>
									<option value="DE">Germany</option>
									<option value="GH">Ghana</option>
									<option value="GI">Gibraltar</option>
									<option value="GR">Greece</option>
									<option value="GL">Greenland</option>
									<option value="GD">Grenada</option>
									<option value="GP">Guadeloupe</option>
									<option value="GU">Guam</option>
									<option value="GT">Guatemala</option>
									<option value="GG">Guernsey</option>
									<option value="GN">Guinea</option>
									<option value="GW">Guinea-Bissau</option>
									<option value="GY">Guyana</option>
									<option value="HT">Haiti</option>
									<option value="HM">Heard Island and McDonald Islands</option>
									<option value="VA">Holy See (Vatican City State)</option>
									<option value="HN">Honduras</option>
									<option value="HK">Hong Kong</option>
									<option value="HU">Hungary</option>
									<option value="IS">Iceland</option>
									<option value="IN">India</option>
									<option value="ID">Indonesia</option>
									<option value="IR">Iran, Islamic Republic of</option>
									<option value="IQ">Iraq</option>
									<option value="IE">Ireland</option>
									<option value="IM">Isle of Man</option>
									<option value="IL">Israel</option>
									<option value="IT">Italy</option>
									<option value="JM">Jamaica</option>
									<option value="JP">Japan</option>
									<option value="JE">Jersey</option>
									<option value="JO">Jordan</option>
									<option value="KZ">Kazakhstan</option>
									<option value="KE">Kenya</option>
									<option value="KI">Kiribati</option>
									<option value="KP">Korea, Democratic People's Republic of</option>
									<option value="KR">Korea, Republic of</option>
									<option value="KW">Kuwait</option>
									<option value="KG">Kyrgyzstan</option>
									<option value="LA">Lao People's Democratic Republic</option>
									<option value="LV">Latvia</option>
									<option value="LB">Lebanon</option>
									<option value="LS">Lesotho</option>
									<option value="LR">Liberia</option>
									<option value="LY">Libya</option>
									<option value="LI">Liechtenstein</option>
									<option value="LT">Lithuania</option>
									<option value="LU">Luxembourg</option>
									<option value="MO">Macao</option>
									<option value="MK">Macedonia, the former Yugoslav Republic of</option>
									<option value="MG">Madagascar</option>
									<option value="MW">Malawi</option>
									<option value="MY">Malaysia</option>
									<option value="MV">Maldives</option>
									<option value="ML">Mali</option>
									<option value="MT">Malta</option>
									<option value="MH">Marshall Islands</option>
									<option value="MQ">Martinique</option>
									<option value="MR">Mauritania</option>
									<option value="MU">Mauritius</option>
									<option value="YT">Mayotte</option>
									<option value="MX">Mexico</option>
									<option value="FM">Micronesia, Federated States of</option>
									<option value="MD">Moldova, Republic of</option>
									<option value="MC">Monaco</option>
									<option value="MN">Mongolia</option>
									<option value="ME">Montenegro</option>
									<option value="MS">Montserrat</option>
									<option value="MA">Morocco</option>
									<option value="MZ">Mozambique</option>
									<option value="MM">Myanmar</option>
									<option value="NA">Namibia</option>
									<option value="NR">Nauru</option>
									<option value="NP">Nepal</option>
									<option value="NL">Netherlands</option>
									<option value="NC">New Caledonia</option>
									<option value="NZ">New Zealand</option>
									<option value="NI">Nicaragua</option>
									<option value="NE">Niger</option>
									<option value="NG">Nigeria</option>
									<option value="NU">Niue</option>
									<option value="NF">Norfolk Island</option>
									<option value="MP">Northern Mariana Islands</option>
									<option value="NO">Norway</option>
									<option value="OM">Oman</option>
									<option value="PK">Pakistan</option>
									<option value="PW">Palau</option>
									<option value="PS">Palestinian Territory, Occupied</option>
									<option value="PA">Panama</option>
									<option value="PG">Papua New Guinea</option>
									<option value="PY">Paraguay</option>
									<option value="PE">Peru</option>
									<option value="PH">Philippines</option>
									<option value="PN">Pitcairn</option>
									<option value="PL">Poland</option>
									<option value="PT">Portugal</option>
									<option value="PR">Puerto Rico</option>
									<option value="QA">Qatar</option>
									<option value="RE">Réunion</option>
									<option value="RO">Romania</option>
									<option value="RU">Russian Federation</option>
									<option value="RW">Rwanda</option>
									<option value="BL">Saint Barthélemy</option>
									<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
									<option value="KN">Saint Kitts and Nevis</option>
									<option value="LC">Saint Lucia</option>
									<option value="MF">Saint Martin (French part)</option>
									<option value="PM">Saint Pierre and Miquelon</option>
									<option value="VC">Saint Vincent and the Grenadines</option>
									<option value="WS">Samoa</option>
									<option value="SM">San Marino</option>
									<option value="ST">Sao Tome and Principe</option>
									<option value="SA">Saudi Arabia</option>
									<option value="SN">Senegal</option>
									<option value="RS">Serbia</option>
									<option value="SC">Seychelles</option>
									<option value="SL">Sierra Leone</option>
									<option value="SG">Singapore</option>
									<option value="SX">Sint Maarten (Dutch part)</option>
									<option value="SK">Slovakia</option>
									<option value="SI">Slovenia</option>
									<option value="SB">Solomon Islands</option>
									<option value="SO">Somalia</option>
									<option value="ZA">South Africa</option>
									<option value="GS">South Georgia and the South Sandwich Islands</option>
									<option value="SS">South Sudan</option>
									<option value="ES">Spain</option>
									<option value="LK">Sri Lanka</option>
									<option value="SD">Sudan</option>
									<option value="SR">Suriname</option>
									<option value="SJ">Svalbard and Jan Mayen</option>
									<option value="SZ">Swaziland</option>
									<option value="SE">Sweden</option>
									<option value="CH">Switzerland</option>
									<option value="SY">Syrian Arab Republic</option>
									<option value="TW">Taiwan, Province of China</option>
									<option value="TJ">Tajikistan</option>
									<option value="TZ">Tanzania, United Republic of</option>
									<option value="TH">Thailand</option>
									<option value="TL">Timor-Leste</option>
									<option value="TG">Togo</option>
									<option value="TK">Tokelau</option>
									<option value="TO">Tonga</option>
									<option value="TT">Trinidad and Tobago</option>
									<option value="TN">Tunisia</option>
									<option value="TR">Turkey</option>
									<option value="TM">Turkmenistan</option>
									<option value="TC">Turks and Caicos Islands</option>
									<option value="TV">Tuvalu</option>
									<option value="UG">Uganda</option>
									<option value="UA">Ukraine</option>
									<option value="AE">United Arab Emirates</option>
									<option value="GB">United Kingdom</option>
									<option value="US">United States</option>
									<option value="UM">United States Minor Outlying Islands</option>
									<option value="UY">Uruguay</option>
									<option value="UZ">Uzbekistan</option>
									<option value="VU">Vanuatu</option>
									<option value="VE">Venezuela, Bolivarian Republic of</option>
									<option value="VN">Viet Nam</option>
									<option value="VG">Virgin Islands, British</option>
									<option value="VI">Virgin Islands, U.S.</option>
									<option value="WF">Wallis and Futuna</option>
									<option value="EH">Western Sahara</option>
									<option value="YE">Yemen</option>
									<option value="ZM">Zambia</option>
									<option value="ZW">Zimbabwe</option>
								</select>
								<input type="hidden" id="mob" value="<?php echo $tk; ?>">
							</div>
	 					</div>
	 					<div class="ques_list sub">
	 						<input type="button" id="save" class="save_btn" value="Save & Continue">
	 					</div>
	 				  </form>	
	 				</div>
	 			</div>
	 			<div class="right_side">
	 				<div class="image_holder">
	 				<div class="img_contain" style="width:265px; height:380px;">
	 						<img id="profile_pic" src="/cabinet/uploadpic/profile_pic/t_<?php echo $_SESSION["user_pic"]; ?>.jpg" width="265" height="265" >
	 				</div>
	 					<div class="img_options">

	 					<input type="file" id="img_up">
	 					Change profile picture
	 					</div>
	 				</div>
	 				<div class="change_btn">Change profile picture</div>
	 				<div class="imp_info">
	 					<div class="i_info_txt">Make sure you are smiling and charming or else be damn serious</div>
	 				</div>
	 			</div>
	 			
	 			</div>
	 		<div class="info_btm">
	 			<div class="tips">
	 				The information is for security purpose in case if you ever lose access to your account.
	 			</div>
	 		</div>	
	 	</div>
	 </div>
</body>

<script type="text/javascript" src="/scripts/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/imgareaselect-default.css" /> 
<script type="text/javascript" src="/scripts/jquery.imgareaselect.pack.js"></script>
<script type="text/javascript" src="/scripts/first_lgn.js"></script>
<script type="text/javascript" src="/scripts/image_upload.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		// $('.image_holder').hover(function(e){
	 // 		//alert("s");
	 // 		$('.img_options').css({display:"block"});
	 // 		$('.img_options').animate({opacity:1},250);
	 // 		},function(e){
	 // 		$('.img_options').animate({opacity:0},250,function(e){
	 // 			$('.img_options').css({display:"none"});
	 // 		});	
	 // 		});
			
				//$(".overlay_pic").fadeIn('1000');
					

			
	});
</script>
</html>
<?php
}
?>