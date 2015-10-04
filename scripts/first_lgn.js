//Script to get details and profile picture of user.
//error and success handling
jQuery(document).ready(function($) {

	$('#save').on("click",function(){
		console.log("s");
		$('.tips').html("The information is for security purpose in case if you ever lose access to your account.");
		$('div .ques_list').removeClass("error");
		$('.ques_det').removeClass("txt_error");
		$('.tips').css({color:"#3A3535"});
		var a=new Array();
		var b;var state=0;
		var c=[];
		a[0]=$("#s_ques");
		a[1]=$("#s_ans");
		a[2]=$("#s_sex");
		a[3]=$("#dob_date");
		a[4]=$("#dob_month");
		a[5]=$("#dob_year");
		a[6]=$("#s_cntry");
		//console.log(a+b+c+d+e+f+g+h);
		for(i=0;i<=6;i++){
				b=restrict(a[i].val());
			if(b=="" || b=="0"){
				console.log("emp");
				$('.tips').html("Make sure you have filled in all fields.");
				$('.tips').css({color:"#f00"});
				if(i>=3 && i<=5){
					a[i].parent().parent().parent().addClass("error");
					a[i].parent().parent().parent().children(".ques_det").addClass("txt_error");
				}
				else{
					a[i].parent().parent().addClass("error");
					a[i].parent().parent().children(".ques_det").addClass("txt_error");
				}
			}
			else{
				c[i]=b;
				state++;					
				console.log(state);
			}

		}
		var o=restrict($("#mob").val());
		var db_k=0;
			if(c[3]>="29"){
					if (c[4]=="02"){
						if(c[5]=="2000" || ((c[5]%4)=="0") && c[3]=="29"){db_k="50";}
						else{
							db_k="25";display_error();
						}	
					}
					else{
						console.log(c[4]);
						switch(c[4]){
							case "04":
							case "06":
							case "09":
							case "11":if(c[3]=="31"){db_k="25";display_error();}else{db_k="50";}break;
							default:db_k="50";
						}
					}
					
			}
			else{
				db_k="50";
			}

		function display_error(){
			a[3].parent().parent().parent().addClass("error");
			a[3].parent().parent().parent().children(".ques_det").addClass("txt_error");
			$('.tips').html("Invalid Date given.");
			$('.tips').css({color:"#f00"});
		}

		console.log("state="+state+"db="+db_k);
		if(state=="7" && db_k=="50"){
				var ev={};
				ev["ques"]=c[0];ev["ans"]=c[1];ev["sex"]=c[2];ev["date"]=c[3];ev["month"]=c[4];ev["year"]=c[5];ev["o"]=o;ev["cntry"]=c[6];
				//console.log(JSON.stringify(ev));
				jev=JSON.stringify(ev);
				$.ajax({
					dataTYPE:"json",
					data:jev,
					type:"POST",
					url:"/cabinet/first_login.php",
					success:function(response){
						console.log(response);
						resp=$.parseJSON(response);
						console.log(JSON.parse(response));	
						if(resp["msg"]=="success"){
							window.location.replace("/");    //update: kinda of not needing  it.//timeout and delay redirect
						}
						else if (resp["msg"]=="fail") {
							window.location.reload(true);
						};
					}
				});
			}
			



	});

	$("#s_ans").on("change",function(){
		var y=restrict($("#s_ans").val());
		$("#s_ans").val(y);
	});
	$(".change_btn").on('click', function(event) {
				event.preventDefault();
				$(".overlay_pic").css('display', 'block');
	});
	$("#submit").on('click', function(event) {
		event.preventDefault();
		//alert("daw");
	});
function restrict(x){
			var rx=/[^a-z0-9]/gi;
			var ret=x.replace(rx,"");
			//console.log(ret);
			return ret;
		}	

});