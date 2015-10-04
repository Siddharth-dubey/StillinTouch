/* Simple Image Panner and Zoomer (March 11th, 10)
 * This notice must stay intact for usage 
 * Author: Dynamic Drive at http://www.dynamicdrive.com/
 * Visit http://www.dynamicdrive.com/ for full source code
 */

// v1.1 (March 25th, 10): Updated with ability to zoom in/out of image

jQuery.noConflict()

var vebbly_imagepanner={

    magnifyicons: ['images/magnify.png','images/magnify2.png', 24,23], //set path to zoom in/out images, plus their dimensions
    maxzoom: 4, //set maximum zoom level (from 1x)

    init:function($, $img, options){
        var s=options
        s.imagesize=[$img.width(), $img.height()]
        s.oimagesize=[$img.width(), $img.height()] //always remember image's original size
        s.pos=(s.pos=="center")? [-(s.imagesize[0]/2-s.wrappersize[0]/2), -(s.imagesize[1]/2-s.wrappersize[1]/2)] : [0, 0] //initial coords of image
        s.pos=[Math.floor(s.pos[0]), Math.floor(s.pos[1])]
        $img.css({position:'absolute', left:s.pos[0], top:s.pos[1]})
        if (s.canzoom=="yes"){ //enable image zooming?
            s.dragcheck={h: (s.wrappersize[0]>s.imagesize[0])? false:true, v:(s.wrappersize[1]>s.imagesize[1])? false:true} //check if image should be draggable horizon and vertically
            s.$statusdiv=$('<div style="position:absolute;color:white;background:#353535;padding:2px 10px;font-size:12px;visibility:hidden">1x Magnify</div>').appendTo(s.$pancontainer) //create DIV to show current magnify level
            s.$statusdiv.css({left:0, top:s.wrappersize[1]-s.$statusdiv.outerHeight(), display:'none', visibility:'visible'})
            this.zoomfunct($, $img, s)
        }
        this.dragimage($, $img, s)
    },

    dragimage:function($, $img, s){
        $img.mousedown(function(e){
            s.pos=[parseInt($img.css('left')), parseInt($img.css('top'))]
            var xypos=[e.clientX, e.clientY]
            $img.bind('mousemove.dragstart', function(e){
                
                var pos=s.pos, imagesize=s.imagesize, wrappersize=s.wrappersize
                
                var dx=e.clientX-xypos[0] //distance to move horizontally
                var dy=e.clientY-xypos[1] //vertically
                var attrid = $img.attr("id");
                
                if(imagesize[0]==0) imagesize[0]=$img.width();
                if(imagesize[1]==0) imagesize[1]=$img.height();
                
                if(attrid=='image2' || attrid=='image3')
                {
                    console.log("in");
                    wrappersize[1] = getWrapperHeight(wrappersize);
                }
                else
                {
                    console.log("nxt");
                    if(wrappersize[1]==0) wrappersize[1]=parseInt($("#profile_pic").height());
                    else wrappersize[1]=parseInt($("#profile_pic").height());
                }
                
                s.dragcheck={
                    h: (wrappersize[0]>imagesize[0])? false:true, 
                    v:(wrappersize[1]>imagesize[1])? false:true
                }
                
                console.log(wrappersize[1] + " " + imagesize[1]);
                
                if (s.dragcheck.h==true) //allow dragging horizontally?
                    var newx=(dx>0)? Math.min(0, pos[0]+dx) : Math.max(-imagesize[0]+wrappersize[0], pos[0]+dx) //Set horizonal bonds. dx>0 indicates drag right versus left
                if (s.dragcheck.v==true) //allow dragging vertically?
                    var newy=(dy>0)? Math.min(0, s.pos[1]+dy) : Math.max(-imagesize[1]+wrappersize[1], pos[1]+dy) //Set vertical bonds. dy>0 indicates drag downwards versus up
                
                
                $img.css({
                    left:(typeof newx!="undefined")? newx : pos[0], 
                    top:(typeof newy!="undefined")? newy : pos[1]
                }) 
                
                return false //cancel default drag action
            })
            return false //cancel default drag action
        })
        
        $img.bind('mouseup mouseleave',function(e){
            $img.unbind('mousemove.dragstart');
        })
    },

    zoomfunct:function($, $img, s){
        var attrid = $img.attr("id");

        if(attrid=='image2' || attrid=='image3')
        {    
            s.wrappersize[1] = getWrapperHeight(s.wrappersize);
        }    
        else
        {    
            if(s.wrappersize[1]==0) s.wrappersize[1]=parseInt($("#lifephoto").height());
        }
        
        var magnifyicons=this.magnifyicons
        var $zoomimages=$('<img src="'+magnifyicons[0]+'" class="magnify"/><img src="'+magnifyicons[1]+'" class="magnify"/>')
        .css({
            width:magnifyicons[2], 
            height:magnifyicons[3], 
            cursor:'pointer', 
            zIndex:1, 
            position:'absolute',
            top:s.wrappersize[1]-magnifyicons[3]-1, 
            left:s.wrappersize[0]-magnifyicons[2]-3
        })
        .attr("title", "Zoom Out")
        .appendTo(s.$pancontainer)
        
        if(attrid=='image3')
        {
            $zoomimages.eq(0).css({
                left:parseInt($zoomimages.eq(0).css('left'))-magnifyicons[2]-3 , 
                opacity:1 
            }) //position "zoom in" image
            .attr("title", "Zoom In")

            $zoomimages.eq(1).css("opacity","1");
            
        }    
        else
        {
            $zoomimages.eq(0).css({
                left:parseInt($zoomimages.eq(0).css('left'))-magnifyicons[2]-3 , 
                opacity:0 
            }) //position "zoom in" image
            .attr("title", "Zoom In")

            $zoomimages.eq(1).css("opacity","0");
        }    
        
        $zoomimages.click(function(e){ //assign click behavior to zoom images
            if(s.oimagesize[0]==0) s.oimagesize=[$img.width(), $img.height()] //always remember image's original size
            var $zimg=$(this) //reference image clicked on
            var curzoom=s.curzoom //get current zoom level
            var zoomtype=($zimg.attr("title").indexOf("In")!=-1)? "in" : "out"
            if (zoomtype=="in" && s.curzoom==vebbly_imagepanner.maxzoom || zoomtype=="out" && s.curzoom==1) //exit if user at either ends of magnify levels
                return
            var basepos=[s.pos[0]/curzoom, s.pos[1]/curzoom]
            var newzoom=(zoomtype=="out")? Math.max(1, curzoom-1) : Math.min(vebbly_imagepanner.maxzoom, curzoom+0.1) //get new zoom level
            $zoomimages.css("opacity", 1)
            if (newzoom==1) //if zoom level is 1x, dim "zoom out" image
                $zoomimages.eq(1).css("opacity", 0.7)
            else if (newzoom==vebbly_imagepanner.maxzoom) //if zoom level is max level, dim "zoom in" image
                $zoomimages.eq(0).css("opacity", 0.7)
            clearTimeout(s.statustimer)
            s.$statusdiv.html(newzoom+"x Magnify").show() //show current zoom status/level
            var nd=[s.oimagesize[0]*newzoom, s.oimagesize[1]*newzoom]
            var newpos=[basepos[0]*newzoom, basepos[1]*newzoom]
            newpos=[(zoomtype=="in" && s.wrappersize[0]>s.imagesize[0] || zoomtype=="out" && s.wrappersize[0]>nd[0])? s.wrappersize[0]/2-nd[0]/2 : Math.max(-nd[0]+s.wrappersize[0], newpos[0]),
            (zoomtype=="in" && s.wrappersize[1]>s.imagesize[1] || zoomtype=="out" && s.wrappersize[1]>nd[1])? s.wrappersize[1]/2-nd[1]/2 : Math.max(-nd[1]+s.wrappersize[1], newpos[1])]
            $img.animate({
                width:nd[0], 
                height:nd[1], 
                left:newpos[0], 
                top:newpos[1]
            }, function(){
                s.statustimer=setTimeout(function(){
                    s.$statusdiv.hide()
                }, 500)
            })
            s.imagesize=nd
            s.curzoom=newzoom
            s.pos=[newpos[0], newpos[1]]
        })
    }

}

jQuery.noConflict();
(function ($) {
    $(function () {
        // more code using $ as alias to jQuery
        jQuery.fn.imgmover = function (options) {
            return this.each(function () { //return jQuery obj
                if (this.tagName != "IMG")
                    return true //skip to next matched element
                var $imgref = jQuery(this);
                if (parseInt(this.style.width) > 0 && parseInt(this.style.height) > 0) { //if image has explicit CSS width/height defined
                    vebbly_imagepanner.init(jQuery, $imgref, options);
                } else if (this.complete) { //account for IE not firing image.onload
                    vebbly_imagepanner.init(jQuery, $imgref, options)
                } else {
                    $imgref.bind('load', function () {
                        vebbly_imagepanner.init(jQuery, $imgref, options)
                    })
                }
            })
        }
    });
})(jQuery);

(function ($) {
	$(function () {
		// more code using $ as alias to jQuery
		// Code that uses jQuery's $ can follow here.
		//By default look for DIVs with class="pancontainer"
		var $pancontainer = jQuery('div.pancontainer')
			$pancontainer.each(function () {
				var $this = jQuery(this).css({
						position : 'relative',
                        overflow:'hidden',
						cursor : 'move'
					})
					var $img = $this.find('img:eq(0)') //image to pan
					var options = {
					$pancontainer : $this,
					pos : $this.attr('data-orient'),
					curzoom : 1,
					canzoom : $this.attr('data-canzoom'),
					wrappersize : [$this.width(), $this.height()]
				}
				$img.imgmover(options)
			})
	});
})(jQuery);

/**
 * Implemented By Ashok
 */
function getWrapperHeight(wrappersize) {
    if(wrappersize[1]==0) {wrappersize[1] = parseInt($("div.profileimageboxinner").height());}
    else if(wrappersize[1]!=0) {wrappersize[1] = parseInt($("div.profileimageboxinner").height());}
    
    return wrappersize[1];
}
