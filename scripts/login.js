window.addEventListener("load",function(){
		$('#letsgo').on("click",function(){
		//alert("awd");
		$('#letsgo').focus();
		if($('#resp').val()=="21")
		{	
			var style={display:"none",margin:"0px auto"};
			$(".msg_wrap").css(style);
			$("#letsgo").css({background:"#B82E2E"});
			var a=$("#visitor").val();
			var b=$("#ticket").val();
			if(a!="" || b!=""){
				//console.log("awdfg");
				var state=validate_data(a,b);
				//resp_state=12;
				if(state=="5"){
					console.log("success");
					var login={};
					var c=$("#itsme").val();
					login["auth"]=a;login["access"]=b;
					login["ticket"]=c;
					var logger=JSON.stringify(login);
					console.log(logger);
					$.ajax({
						dataTYPE:"json",
						data:logger,
						loading:$('#resp').val("12"),
						type:"POST",
						url:"/cabinet/login/",
						success:function(response){
							console.log(response);
							var lpp=JSON.parse(response);
							var auth_st=lpp["msg"];
							
							if(auth_st=="go"){
								window.location.replace("/");
							}
							else if(auth_st=="err" || auth_st=="ko"){
								error_handler(5);
							}
							else if (auth_st=="emp") {
								error_handler(4);
							}
							else if(auth_st=="no"){
								error_handler(7);
							}
							else{
								error_handler(6)
							}
						}
						});
					}
					else{
						error_handler(state);
					}
				}
				else{
						
						//console.log("adw");
						//console.log(a);
						error_handler(4);
		
					}
		}
		else{
			//console.log("yooy");
		}
	});

	function error_handler(x){
		$(".msg_wrap").css("display","block");
		//console.log("xxx="+x);
		$(".msg_wrap").animate({margin:"5px auto"},300);
		$("#letsgo").css({background:"#f00"});
		var d="";
		$('#resp').val("21");
		switch (x){
			case 1:d="Invalid characters in email and password";break;
			case 2:d="Invalid characters in email ";break;
			//case "3":d="Invalid characters in password";break;
			case 4:d="You forgot to enter details";break;
			case 5:d="Either email or password is incorrect";break;
			case 6:d="Some problem.We`ll fix it quickly.Try reloading";break;
			case 7:d="Some problem.We`ll fix it quickly.Try reloading";break;
			default:d="Some problem.Try reloading";
		}
		$(".msg_txt").html(d);
	}

	function validate_data(x,y){
		var k=x;var l=y;var kl=x.length;var ll=l.length;
		var rx=/[^a-z0-9-@._]/gi;
		//console.log(rx);
		var kr=k.replace(rx,"");
		var lr=l.replace(rx,"");
		if(kr.length!=kl && lr.length!=ll){
			return 1;
		}
		else if(kr.length!=kl){
			return 2;
		}
		else if(lr.length!=ll){
			return 3;
		}
		else{
			return 5;
		}

	}
});