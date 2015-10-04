window.addEventListener("load",function(){

	$("#sgn_btnn").on("click",function(){	  	
 		var state_go=$("#go").val();
 		if(state_go==20){ 
			$("#sgn_btnn").focus();
			var style={display:"none",margin:"-15px auto"};
			$(".msg_un").css(style);
			var a=new Array();
			var b=new Array();
			var state="go";
			 a[1]=restrict($("#first").val());
			 a[2]=restrict($("#last").val());
			 a[3]=restrict($("#user").val());
			 a[4]=restrict($("#email").val());
			 a[5]=restrict($("#pass").val());
			//console.log("ad");
			for (var i = 1; i <=5; i++) {
				if(a[i]==""){
					state="stop";
					error_handler(4);
					break;
				}
				
			}
			c=$("#pass").val();
			if(a[5].length!=c.length){
				error_handler(3);
				$("#pass").val("");
				state="stop";
			}
			if(a[4]!="" && (!validateEmail(a[4]))){
				error_handler(6);
				state="stop";
			}

			if(a[5]!="" && a[5].length<=5){
				error_handler(8);
				state="stop";
			}
			if(a[3]!="" && a[3].length>15){
				error_handler(9);
				state="stop";
			}


			if(state=="go"){
				var c={};
				$("#sgn_btnn").val("Wait...");
				$("#sgn_btnn").css({background:"#7579DD"});
				for (var j = 1; j <=5; j++) {
					c["entry"+j]=a[j];
				}
				/*console.log(a[5]);
				console.log(restrict("awfawfa?>?><>?"));*/
				// console.log(k);
				c["entry6"]=$("#itsme").val();
				c["entry7"]=$("#cemail").val();
				// if(g("tkn").checked){
				// 	c["entry7"]="10";
				// }else{
				// 	c["entry7"]="20";
				// }

				/*console.log(c["entry7"]);*/
				var k=JSON.stringify(c);
				//alert(k);
				$.ajax({
					url: '/cabinet/signup/',
					type: 'POST',
					loading:$("#go").val(10),
					dataType: 'JSON',
					data:k,
					success:function (response){
						console.log(response);
						var p=response;
						var reply=p["msg"];
						switch (reply){
							case "u_exists":error_handler(10);
								  break;
							case "e_exists":error_handler(11);
								  break;
							case "emp":error_handler(4);
								  break;
							case "fatal":error_handler(7);
								  break;
							case "ngd":success();
								  break;
							case "go":success();
								  break;
							default:error_handler(20);
						}

					}
				});
							
			}

		
		}
	});

	$("#first").on("change",function() {
		$("#first").val(restrict($("#first").val()));
	});

	$("#last").on("change",function() {
		$("#last").val(restrict($("#last").val()));
	});

	$("#user").on("change",function() {
		$("#user").val(restrict_usr($("#user").val()));
	});

	$("#email").on("change",function() {
		$("#email").val(restrict($("#email").val()));
	});

	function error_handler(x){
		$(".msg_un").css("display","block");
		$("#sgn_btnn").val("Sign up");
		$("#sgn_btnn").css({background:"#5419A2"});
		//console.log("xxx="+x);
		$(".msg_un").animate({margin:"5px auto"},600);
		$("#letsgo").css({background:"#f00"});
		// state="stop";
		var d="";
		$('#go').val("20");
		switch (x){
			case 1:d="Invalid characters in email and password";break;
			case 2:d="Invalid characters in email ";break;
			case 3:d="Invalid characters in password";break;
			case 4:d="You forgot to enter details";break;
			case 5:d="Either email or password is incorrect";break;
			case 6:d="Not a valid email address";break;
			case 7:d="Some problem.We`ll fix it quickly.Try reloading";break;
			case 8:d="Password should have minimum six characters";break;
			case 9:d="Username cannot be more than 15 characters";break;
			case 10:d="Username already exists";break;
			case 11:d="Email already exists";break;
			default:d="Some problem.Try reloading";
		}
		$(".msg_un_txt").html(d);
	}
	function success(){
		$(".succs_wrp").css('display', 'block');
		$(".sgn_form").html("");
		$(".sgn_form").css('display', 'none');
		$(".sgn_btnn").html("");
		$(".sgn_btnn").css('display', 'none');
		$(".sucs_ttl").html("Signup Successful");
		$(".sucs_txt").html("An activation email has been sent to your email address,go check your inbox to activate your account.By activating your account you agree to our <a class='sucsa' href='/terms'>Terms & Conditions</a>.If you don`t agree,do not activate your account and delete that email.");
	}

	function restrict(x){
			var sd=x;
			var rx=/[^a-z0-9-@._]/gi;
			var ret=sd.replace(rx,"");
			//console.log(ret);
			return ret;
		}

	function restrict_usr(x){
			var sd=x;
			var rx=/[^a-z0-9.]/gi;
			var ret=sd.replace(rx,"");
			//console.log(ret);
			return ret;
		}	

	function validateEmail(email)
		{
			var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
			if (reg.test(email)){
			return true; }
			else{
			return false;
			}	
		}

});