var rw="";
var rp="";
window.addEventListener("load",function(){
		console.log("loaded");
		g("sgnup").addEventListener("click",function(){
			//alert("yup!");
			var f=g("flname").value;
			var u=g("usrname").value;
			var e=g("eml").value;
			var p=g("pass").value;
			var o=g("cred").value;
			var c=g("cpass").value;
			if(g("chchck").checked){
				var t="y";
			}
			else{
				var t="n";
			}
			if(f!="" && u!="" && e!="" && p!=""){
				if(rw=="eml_ngd"){
					console.log(rw);
					g("err").style.display="block";
					g("err").innerHTML="Invalid email address.";	
				}
				else if(rp=="pass_ngd"){
					console.log(rp);
					g("err").style.display="block";
					g("err").innerHTML="Password too short."
				}
				else if(rw=="eml_gd" && rp=="pass_gd"){
					g("err").style.display="none";
					g("err").innerHTML="";
					g("sgn_btn").style.display="none";
					var req=request();
					req.open("POST","/cabinet/signup/",true);
					req.onreadystatechange=function(){
						if(req.readyState==4 && req.status==200){
							var res=req.responseText.replace(/^\s+|\s+$/g, '');
							console.log(res);
							switch(res){
								case "good":g("usr_in_sgn").innerHTML="";
											g("usr_in_sgn").style.display="none";
											console.log("ingood");
											g("msg_hrf").innerHTML="Okay";
											g("sucs_bx").style.display="block";
											g("sucs_txt").innerHTML="Signup succsessful";
											g("sucs_msg").innerHTML="An activation e-mail has been sent to your email address.Verify the email address to activate your account.";
											break;
								case "fatal":g("usr_in_sgn").innerHTML="";console.log("very bad");
											 g("usr_in_sgn").style.display="none";
											 g("sucs_bx").style.display="block";
											 g("msg_hrf").innerHTML="Retry";
											 g("msg_hrf").href="/signup.php";
											 g("msg_hrf").target="";
											 g("sucs_txt").innerHTML="BOOM! Something has gone bad!";
											 g("sucs_msg").innerHTML="Our system experienced something.Try reloading and trying again.If problem persists then Report it.";
											 break;
								case "u_exists":g("err").style.display="block";
												g("err").innerHTML="Username already exists.";console.log("u exists");
												g("sgn_btn").style.display="block";
												break;
								case "e_exists":g("err").style.display="block";
												g("err").innerHTML="Email already exists.";console.log("e_exists");
											    g("sgn_btn").style.display="block";
											    break;
								case "empty":g("err").innerHTML="Hey. some fields are missing.";console.log("emtyy");
											 g("sgn_btn").style.display="block";
											 break;
								case "ngood":g("usr_in_sgn").innerHTML="";console.log("n_good");
											g("sucs_bx").style.display="block";
											g("usr_in_sgn").style.display="none";
											g("sucs_txt").innerHTML="Sign up succsessful";
											g("sucs_msg").innerHTML="An activation e-mail has been sent to your email address.Verify the email address to activate your account.";
											 break;
							}
						}
						else{ 

						}
					};
					req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
					req.send("f="+f+"&u="+u+"&e="+e+"&p="+p+"&c="+c+"&o="+o+"&t="+t);
				}
				else{
					g("err").style.display="block";
					g("err").innerHTML="Some error occured.Try Reloading the page.";	
				}
			}
			else if (rp=="pass_ngd" && p=="") {
				g("err").style.display="block";
				g("err").innerHTML="The password was having invalid characters.Try another password."
			}
			else{
				console.log("rp="+rp+"p="+p);
				g("err").style.display="block";
				g("err").innerHTML="Looks like you forgot to enter details.";
			}

		});

		g("eml").addEventListener("change",function(){
			var re_e=restrict("eml");
			var re_re_e=validateEmail(re_e);
			g("eml").value=re_e;
			if(!re_re_e){
				g("err").style.display="block";
				rw="eml_ngd";
				g("err").innerHTML="Invalid email address.";	
			}
			else{
				rw="eml_gd";
				console.log(rw);
				g("err").style.display="none";
				g("err").innerHTML="";
			}
		});
		g("usrname").addEventListener("change",function(){
			var re_e=restrict("usrname");
			g("usrname").value=re_e;
		});
		g("flname").addEventListener("change",function(){
			var re_e=restrict("flname");
			g("flname").value=re_e;
		});
		g("pass").addEventListener("change",function(){
			var re_p=g("pass").value;
			var re_re_p=restrict("pass");
			if(re_p!=re_re_p){
				console.log("Invalid characters ins password");
				g("err").style.display="block";
				rp="pass_ngd";
				g("pass").value="";
				g("err").innerHTML="Invalid characters in password";	
			}
			else if(re_p.length<6){
				rp="pass_ngd";
				g("err").style.display="block";
				g("err").innerHTML="Password too short.";	
			}
			else{
				rp="pass_gd";
				g("err").style.display="none";
				g("err").innerHTML="";
			}
		});
		function validateEmail(email)
		{
			var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
			if (reg.test(email)){
			return true; }
			else{
			return false;
			}	
		}
		function restrict(x){
			var tf=g(x).value;
			var rx;
			switch(x){
				case 'eml':
				rx=/[^a-z0-9\@\.\_\-]/gi;
				break;
				case 'usrname':
				//console.log('case wrkng');
				rx=/[^a-z0-9]/gi;
				break;
				case 'flname':
				rx=/[^a-z ]/gi;
				break;
				case 'pass':
				rx=/[<>]/gi;
			}
			var ret=tf.replace(rx,"");
			console.log(ret);
			return ret;
		}
	});