<?php
include_once($_SERVER["DOCUMENT_ROOT"].'/assets/bootloader.php');
$d=new auth();
$tk=$d->set_token();
$c=new login();
?>
<div class="login_text"><u>Login</u></div>
<div class="inp_api">
	<form method="POST" action="javascript:void(0)">
	<div class="api_inp_txt inline">Email address:</div>
	<div class="api_inp_field inline"><input id="api_eml" type="email"></div>
</div>
<div class="inp_api">
	<input id="token" type="hidden" value="<?php echo $tk; ?>">
	<div class="api_inp_txt inline">Your Password:</div>
	<div class="api_inp_field inline"><input id="api_pass" type="password"></div>
</div>
<div class="inp_api">
	<div class="api_btn"><input type="submit" value="Login" id="api_login"></div>
</div></form>
<div class="inp_api">
	<div class="api_error"></div>
</div>

