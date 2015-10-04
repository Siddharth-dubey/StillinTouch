<?php
	
	class mail{

		public function mailact($fname,$token,$rscrc,$eml){
			$to=$eml;
			$u1=$fname;
			$msg='
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml"><head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>StillinTouch-Account Activation</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			</head>
			<body><table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="border-collapse:collapse;margin:0;padding:0;background-color:#ecdbdb;height:100%!important;width:100%!important">
                <tbody><tr>
                    <td align="center" valign="top" style="margin:0;padding:20px;border-top:0;height:100%!important;width:100%!important">
                        
                        <table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse;border:0">
                            <tbody><tr>
                                <td align="center" valign="top">
                                    
                                    <table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse;background-color:#ffffff;border-top:0;border-bottom:0">
                                        <tbody><tr>
                                        	<td valign="top" style="padding-top:9px"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
   			 <tbody>
            <tr>
                <td valign="top" style="padding:0px">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
                        <tbody><tr>
                            <td valign="top" style="padding-right:0px;padding-left:0px;padding-top:0;padding-bottom:0;text-align:center">


                                        <img align="left" alt="Stillintouch_logo" src="http://www.stillintouch.com/css/images/fnl_logo_small.png" width="65" style="padding-bottom:0;display:inline!important;vertical-align:bottom;border:0;float: left;padding-left: 20px;outline:none;padding-right:10px;text-decoration:none">
  <h3 style="margin: 0 10px;padding:0;display:block;font-family:Helvetica;font-size:18px;padding-left:10px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:-.5px;text-align:left;color:#606060!important"><br>Activation email </h3>


							                            </td>
							                        </tr>
							                    </tbody></table>
							                </td>
							            </tr>
							    </tbody>
							</table></td>
                                        </tr>
                                    </tbody></table>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    
                                    <table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse;background-color:#ffffff;border-top:0;border-bottom:0">
                                        <tbody><tr>
                                            <td valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#ffffff;border-collapse:collapse">
								    <tbody>
								        <tr>
								            <td style="padding: 10px 18px;">
								                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top-width: 2px;border-top-style:solid;border-top-color:#e6d6d6;border-collapse:collapse">
								                    <tbody><tr>
								                        <td>
								                            <span></span>
								                        </td>
								                    </tr>
								                </tbody></table>
								            </td>
								        </tr>
								    </tbody>
								</table></td>
                                        </tr>
                                    </tbody></table>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    
                                    <table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse;background-color:#ffffff;border-top:0;border-bottom:0">
                                        <tbody><tr>
                                            <td valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
						    <tbody>
						        <tr>
						            <td valign="top">

						                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse">
						                    <tbody><tr>

						                        <td valign="top" style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px;color:#606060;font-family:Helvetica;font-size:15px;line-height:150%;text-align:left">

						                            <h1 style="margin:0;padding:0;display:block;font-family:Helvetica;font-size:40px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:-1px;text-align:left;color:#606060!important">Hi '.$u1.',</h1>

						<h3 style="margin:0;padding:0;display:block;font-family:Helvetica;font-size:18px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:-.5px;text-align:left;color:#606060!important"><br>
						You are only one step away..</h3>
						<br>
						Just click on the button to complete your signup.<br>
						&nbsp;
						                        </td>
						                    </tr>
						                </tbody></table>

						            </td>
						        </tr>
						    </tbody>
						</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
						    <tbody>
						        <tr>
						            <td style="padding-top:0;padding-right:18px;padding-bottom:18px;padding-left:18px" valign="top" align="center">
						                <table border="0" cellpadding="0" cellspacing="0" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-right-radius:0px;border-bottom-left-radius:0px;background-color: #CA9B23;border-collapse:collapse">
						                    <tbody>
						                        <tr>
						                            <td align="center" valign="middle" style="font-family:Arial,sans-serif Neue,Helvetica,sans-serif;font-size:16px;padding:15px">
						                                <a title="Activate account" href="http://www.stillintouch.com/authenticate/act.php?mnk='.$token.'&amp;rsr='.$rscrc.'&amp;mode=activate" style="font-weight:bold;letter-spacing:-0.5px;line-height:100%;text-align:center;text-decoration:none;color:#ffffff;word-wrap:break-word" target="_blank">Activate account</a>
						                            </td>
						                        </tr>
						                    </tbody>
						                </table>
						            </td>
						        </tr>
						    </tbody>
						</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
						    <tbody>
						        <tr>
						            <td style="padding:18px">
						                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top-width:1px;border-top-style:ridge;border-top-color:#ecdddd;border-collapse:collapse">
						                    <tbody><tr>
						                        <td>
						                            <span></span>
						                        </td>
						                    </tr>
						                </tbody></table>
						            </td>
						        </tr>
						    </tbody>
						</table></td>
						                                        </tr>
						                                    </tbody></table>
						                                    
						                                </td>
						                            </tr>
						                            <tr>
						                                <td align="center" valign="top">
						                                    
						                                    <table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse;background-color:#ffffff;border-top:0;border-bottom:0">
						                                        <tbody><tr>
						                                            <td valign="top" style="padding-bottom:9px"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
						    <tbody>
						        <tr>
						            <td valign="top">

						                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse">
						                    <tbody><tr>

						                        <td valign="top" style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px;color:#606060;font-family:Helvetica;font-size:11px;line-height:125%;text-align:left">

						                            <br>
						<em>Copyright © 2014 StillinTouch, All rights reserved.</em><br><br><br>
						<strong>Our mailing address is:</strong><br>
						<a href="mailto:contact@stillintouch.com" target="_blank">contact@stillintouch.com</a><br>
						<br>
						If you got this by mistake just delete it.Sorry for the inconvenience
						                        </td>
						                    </tr>
						                </tbody></table>

						            </td>
						        </tr>
						    </tbody>
						</table></td>
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