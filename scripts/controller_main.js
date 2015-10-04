jQuery(document).ready(function($) {
	 $("#share_btn").on('click', function(event) {
	 	event.preventDefault();
	 	$(this).css('display', 'none');
	 	$(".share_box").css('display', 'block');
	 	$(".share_box").animate({width: '92.5%',height:'200px'}, 350);
	 	/* Act on the event */
	 });
	 $('.shr_opts_list ul li').on('click', function(event) {
	 	event.preventDefault();
	 	$('.shr_opts_list ul li').removeClass('active_opt');
	 	$('.shr_opts_list ul li').addClass('inactive_opt');
	 	$(this).removeClass('inactive_opt');
	 	$(this).addClass('active_opt');

	 });
	});


    $(".s_pop_out").hover(function() {
    	$(".ntfy_covr").niceScroll({cursorcolor:"#00F",scrollspeed :150,hidecursordelay:1000,background:"#ddd"});
    }, function() {
    	/* Stuff to do when the mouse leaves the element */
    });

    $(".icon6").on('click', function(event) {
    	event.preventDefault();
    	/* Act on the event */
    	$(".lg_out").css('display', 'block');
    	$(".lg_out").animate({left: -1},500);
    });
  	
  	$(".search_wrap").on('click', function(event) {
  		event.preventDefault();
  		$(".search_text").css('display', 'none');
  		$(".search_inp_wrp").css('display', 'block');
  		$(".search_bar").animate({
  			width: 200},
  			500, function() {
  			$(".search_bar").focus();
  		});
  		
  	});

  	function stop_search(event) {
  		$('.search_bar').animate({
  			width: 0},
  			200, function() {
  			$(".search_inp_wrp").css('display', 'none');
  		$(".search_text").css('display', 'block');
  		$(".search_bar").val("");
  		$('.search_r_wrap').animate({
  			top: -55},
  			250, function() {
  			$('.search_r_wrap').css('display', 'none');
  		});
  		});
  		
  	}

  	$(".search_bar").keyup(function(event) {
  		if($(this).length<2){
  			$('.search_r_wrap').animate({
  			top: -55},
  			250, function() {
  			$('.search_r_wrap').css('display', 'none');
  		});
  		}
  		else{
  			
  		}
  	});

  	var options = {callback: function(value){ 
  		srch={};
  		reg=restrict($(".search_bar").val());
  		$(".search_bar").val(reg);
  		srch["val"]=reg;
  		p=JSON.stringify(srch);
  		console.log(p);
  		$('.s_nores').css('display', 'none');
  		// $(".s_r_in").css('display', 'none');
  		$(".s_r_in").html('');
  		$('.search_r_wrap').css('display', 'block');
  		$('.search_r_wrap').animate({top: 45}, 250);
  		$(".s_r_init").css('display', 'block');

  		$.ajax({
  			url: '/cabinet/search/',
  			type: 'POST',
  			dataType: 'json',
  			data: p,
  			success:function (response){
  				console.log(response.length);
  				//resp=jQuery.parseJSON(response);
  				// console.log(resp);
  				$(".s_r_init").css('display', 'none');
		  		if(response.length>0){
		  				$(".s_r_in").css('display', 'block');
		  				 $.each(response, function(index, val) {
		  				 	 console.log("in="+index+"v="+val);
		  				 	 console.log(response[index]);
		  				 	 n=response[index]["name"];
		  				 	 pp=response[index]["profile_pic"];
		  				 	 i=response[index]["user_global_id"];
		  				 	 console.log("Name:"+n+"PIC:"+p+"Id:"+i);
		  				 	 $('<div>').attr('class', 's_r_in_res').append($('<img>').attr({
		  				 	 	height: '155',
		  				 	 	width: '155',
		  				 	 	src:'/cabinet/uploadpic/profile_pic/t_'+pp+'.jpg'
		  				 	 })).append($('<div>').attr({
		  				 	 	class: 's_r_info'
		  				 	 }).append($('<a>').attr({
		  				 	 	href: 'javascript:void(0);',
		  				 	 	id:'popup',
		  				 	 	class: 's_inf_usr'
		  				 	 }).append(n))).appendTo('.s_r_in');
		  				 	 $('.s_r_info:last a').on('click', function(event) {
		  				 	 	event.preventDefault();
		  				 	 	var o=new open(val);
		  				 	 });
		  				 	
		  				 });
		  		}
		  		else{
		  			$('.s_nores').css('display', 'block');
		  		}		 // console.log(response[0]);
  			}
  		})
  		.done(function() {
  			console.log("success");
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		});
  		
     },
    wait: 750,
    highlight: true,
    captureLength: 2
	}

	$(".search_bar").typeWatch( options );

	function restrict(x){
			var sd=x;
			var rx=/[^a-z0-9.]/gi;
			var ret=sd.replace(rx,"");
			//console.log(ret);
			return ret;
		}	

	$(document).keyup(function(event) {
		if(event.keyCode==27){
			alert($('.search_bar').val().length);
			//close all overlays,search,popup,sidetabs  e.tc in here
			$('.overlay').css('display', 'none');
		$('.overlay').html('');
			if($('.search_bar').length>=2){
	  			$('.search_r_wrap').animate({
	  			top: -55},
	  			250, function() {
	  			$('.search_r_wrap').css('display', 'none');
	  			});
			}
		}
	});

	


	function open(x){
		console.log(x);
		$('.overlay').css('display', 'block');
		$('<div>').attr('class', 'ovr_s_prfl').append($('<div>').attr('class', 's_prfl_lft flt_l').append($('<div>').attr('class', 's_pr_lft_img').append($('<img>').attr({height: '180',width: '180',src:'/cabinet/uploadpic/profile_pic/t_'+x["profile_pic"]+'.jpg'})))).appendTo('.overlay');
		$($('<div>').attr('class', 's_pr_nm').html(x["name"])).insertAfter('.s_pr_lft_img');
		$('<div>').attr('class', 's_prfl_rgt flt_l').append($('<div>').attr('class', 's_p_r_wrp').append($('<div>').attr('class', 's_p_r_hd flt_l').html("Recent Posts"))).appendTo('.ovr_s_prfl');
		$($('<div>').attr('class', 's_p_stop flt_r').append($('<div>').attr('class', 'close_align').append($('<a>').attr({
			class: 'close',
			id:'close',
			href: 'javascript:void(0);'
		})))).insertAfter('.s_p_r_hd');
		$('#close').on('click', function(event) {
		event.preventDefault();
		$('.overlay').css('display', 'none');
		$('.overlay').html('');
		});
		$($('<div>').attr({class:'clearfix',id:'fixer'})).insertAfter('.s_p_stop');
		$($('<div>').attr('class', 'cmng_soon').append($('<div>').attr('class', 'soon_txt').html("To be Rolled out soon until then just add the person if you know him/her."))).insertAfter('#fixer');
		$($('<div>').attr('class', 'frndload').css('display', 'block')).insertAfter('.s_pr_nm');
		
		f={};
		f["rec"]=x["user_global_id"];
		fr=JSON.stringify(f);
		console.log(fr);
		$.ajax({
			url: '/cabinet/friends/frstate.php',
			type: 'POST',
			dataType: 'json',
			data: fr,
			success:function (response) {
				console.log(response);
				result=response["msg"];
				// console.log(result);
				$('.frndload').css('display', 'none');
				switch (result){
					case "ok":
							$($('<div>').attr('class', 'fr_help').css('display', 'block').html("Already a friend!")).insertAfter('.s_pr_nm');
							$($('<div>').attr('class', 's_pr_add').append($('<input>').attr({
								type: 'button',
								value: 'Unfriend',
								id:'pr_btn_ad'
							}))).insertAfter('.fr_help');
							$('#pr_btn_ad').on('click', function(event) {
								event.preventDefault();
								doaction("unfriend",f["rec"]);
							});
						break;
					case "senca":
							$($('<div>').attr('class', 'fr_help').css('display', 'block').html("Friend request sent!")).insertAfter('.s_pr_nm');
							$($('<div>').attr('class', 's_pr_add').append($('<input>').attr({
								type: 'button',
								value: 'Cancel Request',
								id:'pr_btn_ad'
							}))).insertAfter('.fr_help');
							$('#pr_btn_ad').on('click', function(event) {
								event.preventDefault();
								doaction("cancel",f["rec"]);
							});
						break;
					case "accrej":
							$($('<div>').attr('class', 's_pr_add').append($('<input>').attr({
								type: 'button',
								value: 'Accept as Friend',
								id:'pr_btn_ad'
							}))).insertAfter('.s_pr_nm');
							$('#pr_btn_ad').on('click', function(event) {
								event.preventDefault();
								doaction("accept",f["rec"]);
							});
							$($('<div>').attr('class', 's_pr_add rej').css('margin', '10px auto').append($('<input>').attr({
								type: 'button',
								value: 'Reject Request',
								id:'pr_btn_ad'
							}))).insertAfter('.s_pr_add');
							$('#pr_btn_ad').on('click', function(event) {
								event.preventDefault();
								doaction("reject",f["rec"]);
							});
						break;
					case "rejaccep":
							$($('<div>').attr('class', 'fr_help').css('display', 'block').html("You rejected the request in the past.")).insertAfter('.s_pr_nm');
							$($('<div>').attr('class', 's_pr_add').append($('<input>').attr({
								type: 'button',
								value: 'Accept now.',
								id:'pr_btn_ad'
							}))).insertAfter('.fr_help');
							$('#pr_btn_ad').on('click', function(event) {
								event.preventDefault();
								doaction("accept",f["rec"]);
							});
						break;
					case "add":$($('<div>').attr('class', 's_pr_add').append($('<input>').attr({
								type: 'button',
								value: 'Add Friend',
								id:'pr_btn_ad'
							}))).insertAfter('.s_pr_nm');
							$('#pr_btn_ad').on('click', function(event) {
								event.preventDefault();
								doaction("sendreq",f["rec"]);
							});
						break;
					case "kill":alert("dead");
							break;
					default:alert("port");
					break;
				}
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});


		function doaction(method,val){
			msg={};
			switch (method){
				case "unfriend":msg["action"]="unfriend";
								break;
				case "cancel":msg["action"]="cancel";
								break;
				case "sendreq":msg["action"]="sendreq";
								break;
				case "accept":msg["action"]="accept";
								break;
				default:
					//some error

					break;

			}
			msg["id"]=val;
			dat=JSON.stringify(msg);
			console.log(dat);
			$.ajax({
				url: '/cabinet/friends/action.php',
				type: 'POST',
				dataType: 'json',
				data: dat,
				success:function(response){

				}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
		
	}

	