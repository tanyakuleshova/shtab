! function(e){
    e.fn.cslide=function(){return this.each(function(){var t="#"+e(this).attr("id"),
    n=e(t+".cslide - slide").size(),i=100*n+" % ",s=100/n+" % ";e(t+".cslide - slides - container ").css({width:i,visibility:"visible "}),
    e(t+".cslide - slide").css({width:s}),e(t+".cslide - slides - container.cslide - slide ").last().addClass("cslide - last "),
    e(t+".cslide - slides - container.cslide - slide ").first().addClass("cslide - first cslide - active "),
    e(t+".cslide - prev").addClass("cslide - disabled "),
    e(t+".cslide - slide.cslide - active.cslide - first ").hasClass("cslide - last ")||e(t+".cslide - prev - next ").css({display:"block"}),
    e(t+".cslide - next").click(function(){var n=e(t+".cslide - slide.cslide - active ").index(),i=n+1,s="-"+100*i+"%";
    e(t+".cslide - slide.cslide - active ").hasClass("cslide - last ")||(e(t+".cslide - slide.cslide - active ").removeClass("cslide - active ").next(".cslide - slide ").addClass("cslide - active "),
        e(t+".cslide - slides - container ").animate({marginLeft:s},250),
        e(t+".cslide - slide.cslide - active ").hasClass("cslide - last ")&&e(t+".cslide - next ").addClass("cslide - disabled ")),
        !e(t+".cslide - slide.cslide - active ").hasClass("cslide - first ")&&e(".cslide - prev ").hasClass("cslide - disabled ")&&e(t+".cslide - prev ").removeClass("cslide - disabled ")}),
    e(t+".cslide - prev ").click(function(){var n=e(t+".cslide - slide.cslide - active ").index(),i=n-1,s=" - "+100*i+" % ";e(t+".cslide - slide.cslide - active ").hasClass("cslide - first ")||(e(t+".cslide - slide.cslide - active ").removeClass("cslide - active ").prev(".cslide - slide ").addClass("cslide - active "),e(t+".cslide - slides - container ").animate({marginLeft:s},250),
        e(t+".cslide - slide.cslide - active ").hasClass("cslide - first ")&&e(t+".cslide - prev ").addClass("cslide - disabled ")),
        !e(t+".cslide - slide.cslide - active ").hasClass("cslide - last ")&&e(".cslide - next ").hasClass("cslide - disabled ")&&e(t+".cslide - next ").removeClass("cslide - disabled ")})}),this}
}(jQuery);
