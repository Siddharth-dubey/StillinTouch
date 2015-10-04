jQuery(document).ready(function($) {
		var ig_width,ig_height,img_show_w,img_show_h;
		$("#selectimg").on('change',function(event) {
			event.preventDefault();
			area_Select("go");
			var state="go";
			$(".imgupld_error").css('display', 'none');
			$(".area_text").css('display', 'none');
			if(window.File && window.Blob && window.FileReader && window.FileList){
	 			var o=document.getElementById("selectimg");
	 			var f=o.files[0];
	 			console.log("in");
	 			if(f.type.match('image/jpeg')){ 
	 				var f_read=new FileReader();
	 				f_read.onload=function(e){
	 					var img_got=new Image();
	 					img_got.src=f_read.result;
	 					ig_width=img_got.width;
	 					ig_height=img_got.height;

	 					if(ig_height<300 || ig_width<300){
	 						console.log(ig_height+"--"+ig_width);
	 						state="stop";
	 						msgg="Make sure image is atleast 300px * 300px";
	 					}
	 					var ratio=(ig_width/ig_height);
	 					size=img_got.size;
	 					size_mb=((f.size/1024)/1024);
	 					if(size_mb>2){			//for not allowing images greater than 2Mb.
	 						console.log("pop");
	 						state="stop";
	 						msgg="Size of image must be less than 2MB";
	 					}
	 					if(ig_width>1000){
	 						img_show_w='1000';
	 					}
	 					else{
	 						img_show_w=ig_width;
	 					}
	 					if(ig_height>350){
	 						img_show_h='350';
	 						console.log(350*ratio);
	 						img_show_w=(350*ratio);
	 						if(img_show_w>1000){
	 							img_show_w='1000';
	 						}
	 					}
	 					else{
	 						img_show_h=ig_height;
	 					}
	 					// $('.org').attr({
	 					// 	width: img_show_w,
	 					// 	height: img_show_h,
	 					// 	src:f_read.result
	 					// });
						if(state=="go"){
							$(".imagearea").css('width', img_show_w);
							$("#thisimg").css('opacity', '1');
							$('#thisimg').attr({height: img_show_h,
							 					width: img_show_w,
							 					src:f_read.result
							 });
						}
						else{
							$(".imgupld_error").css('display', 'block');
							$(".imgupld_error").html(msgg);
							$("#thisimg").attr('src', '/');
						}
	 					
	 				}
	 				f_read.readAsDataURL(f);
	 			}
	 			else
	 			{
	 				alert("Please ");
	 			}
	 		}
            else{
	 		alert("nananana");
	  	}
	  		
		
	 	});

	function area_Select(mode) {
			if(mode=="stop"){
				disabled=true;
				hidden=true;
			}
			else{
				disabled=false;
				hidden=false;
			}
			$('#thisimg').imgAreaSelect({ aspectRatio: '1:1',handles:true,disable:disabled,hide:hidden,x1: 120 ,y1: 90, x2: 320, y2: 290,onSelectEnd: function (img, selection) {
            console.log("x1="+selection.x1+"y1="+selection.y1+"x2="+selection.x2+"y2="+selection.y2); 
            $("#x1").val(selection.x1);
            $("#y1").val(selection.y1);
            $("#x2").val(selection.x2);           
            $("#y2").val(selection.y2);
            $("#w").val(selection.width);
            $("#h").val(selection.height);
       			 } });	

			}		

			jQuery.noConflict();    
    formdata = new FormData();      
    jQuery("#submit").on("click", function(event) {
    	event.preventDefault;
        var file = document.querySelector("#selectimg").files[0];
        console.log("Awd");
        if (formdata) {
            formdata.append("image", file);
            var x1,y1,x2,y2,h,w;
            x1=$("#x1").val();
            y1=$("#y1").val();
            x2=$("#x2").val();
            y2=$("#y2").val();
            w=$("#w").val();
            h=$("#h").val();
            console.log(x1);
            formdata.append("x1",x1);
            formdata.append("y1",y1);
            formdata.append("x2",x2);
            formdata.append("y2",y2);
            formdata.append("w",w);
            formdata.append("h",h);
            formdata.append("w_x",img_show_w);
            formdata.append("h_x",img_show_h);
        	console.log(img_show_h);
            jQuery.ajax({
                url: "/cabinet/uploadpic/uploaded.php",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success:function(response){
                	console.log(response);
                	p=$.parseJSON(response);
                	if(p["msg"]=="success"){
                		$(".overlay_pic").css('display', 'none');
                		area_Select("stop");
                		$(".imgupld_error").css('display', 'none');
						$(".area_text").css('display', 'block');
						$("#thisimg").attr({
							src: '/',
							height: '0'
						});
                		$("#profile_pic").attr('src', '/cabinet/uploadpic/'+p["img"]);
                	}
                	else{
                		$(".imgupld_error").css('display', 'block');
						$(".imgupld_error").html("Some problem.Try reloading");
                	}
                	//$("#got").attr('src',response);
                }
            });
        }                       
    }); 

});