$(function () {
    $('.flexslider').flexslider({
        animation: "fade"
    });
    $('.show_menu').click(function(){
        $('.menu').fadeIn();
        $('.show_menu').fadeOut();
        $('.hide_menu').fadeIn();
    });
    $('.hide_menu').click(function(){
        $('.menu').fadeOut();
        $('.show_menu').fadeIn();
        $('.hide_menu').fadeOut();
    });
});