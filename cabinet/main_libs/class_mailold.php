<?php
	
	class mail{

		public function mailact($uname,$token,$rscrc,$eml){
			$to=$eml;
			$msg='
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml"><head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
			<title>StillinTouch-Account Activation</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
			</head>
			<body style="margin: 0; padding: 0;">
			  <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
			    <tbody><tr>
			      <td style="padding: 10px 0 30px 0;">
			        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
			          <tbody><tr>
			            <td align="center" bgcolor="#3D79E4" style="padding: 40px 0 30px 0; color: #FFFFFF; font-size: 35px; font-weight: bold; font-family: Arial, sans-serif;">
			              StillinTouch
			            </td>
			          </tr>
			          <tr>
			            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
			              <table border="0" cellpadding="0" cellspacing="0" width="100%">
			                <tbody><tr>
			                  <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
			                    <b>Hi  '.$uname.',</b>
			                  </td>
			                </tr>
			                <tr>
			                  <td style="padding: 20px 0 30px 0; color: #2A3033; font-family: sans-serif; font-size: 16px; line-height: 20px;">Thank you for signing up.Just activate your account by clicking in the button below.</td>
			                </tr>
			                <tr>
			                  <td>
			                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
			                      <tbody><tr>
			                        <td align="center" width="260" valign="top">
			                          <table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
			                            <tbody><tr>
			                              <td style="text-align: center;background-color:#9C2EF0;color: #fff; padding: 10px 0px;">
			                                <a href="http://www.stillintouch.com/authenticate/act.php?mnk='.$token.'&rsr='.$rscrc.'&mode=activate" target="_blank" style="color: #fff;text-decoration: none;"">Activate Account</a>
			                              </td>
			                            </tr>
			                          </tbody></table>
			                        </td>
			                        <td style="font-size: 0; line-height: 0;" width="20">
			                          &nbsp;
			                        </td>
			                      </tr>
			                    </tbody></table>
			                  </td>
			                </tr>                      
			              </tbody></table>
			            </td>
			          </tr>
			           <tr>
			                  <td style="padding: 10px 30px 30px 30px; color: #2A3033;font-size: 12px; line-height: 20px;">*If you did not signup for StillinTouch then ignore this mail and delete it.Sorry for the inconvenience.</td>
			                </tr>
			          <tr>
			            <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
			              <table border="0" cellpadding="0" cellspacing="0" width="100%">
			                <tbody><tr>
			                  <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 15px;padding: 0px 0px;" width="75%">
			                    &copy; Copyrights reserved, StillinTouch 2013<br></br>
			                    <a href="#" style="color: #ffffff;padding: 0px 0px;"><font color="#ffffff"></font></a></td>
			                  <td align="right" width="25%">
			                    <table border="0" cellpadding="0" cellspacing="0">
			                      <tbody><tr>
			                        <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
			                          
			                        </td>
			                        <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
			                        <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
			                          
			                        </td>
			                      </tr>
			                    </tbody></table>
			                  </td>
			                </tr>
			              </tbody></table>
			            </td>
			          </tr>
			        </tbody></table>
			      </td>
			    </tr>
			  </tbody></table>
			</body></html>';
			$subject='StillinTouch Account activation';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: StillinTouch <activation@stillintouch.com>' . "\r\n";
			if(mail($to, $subject, $msg, $headers)){
			return true;
			}
			else { return false;}
		}
	}

?>