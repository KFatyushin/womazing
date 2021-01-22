
// MENU
const hamburger = document.querySelector('.hamburger');
const mobileMenu = document.querySelector('.menu_mobile');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle("open");

    mobileMenu.classList.toggle("active");
});

// SVG CONVECTOR
const svgConvector = function (svg) {
    $(svg).each(function(){
        var $img = $(this);
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');
        $.get(imgURL, function(data) {
            var $svg = $(data).find('svg');
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }
            $svg = $svg.removeAttr('xmlns:a');
            if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }
            $img.replaceWith($svg);
        }, 'xml');
    });
};
svgConvector($('img.img-svg'));
svgConvector($('.pagination-arrow img'));


// HEADER SLIDES
$('.header-slides').slick({
    arrows: false,
    autoplay: true,
    fade: true,
    dots: true,
    dotsClass: 'header-slides__dots',
    asNavFor: '.header-img-slides'
});
$('.header-img-slides').slick({
    arrows: false,
    autoplay: true,
    fade: true,
    dots: false,
    asNavFor: '.header-slides'
});

// COMMAND SLIDES
$('.command-slides').slick({
    dots: true,
    dotsClass: 'command-slides__dots',
});

$('.value input').prop('checked', false);
$('.small-btn').on('click', function () {
    var currTab = $(this).parent().index();

    $('.small-btn').removeClass('active');
    $(this).addClass('active');
});
$('.btn-pa_color').on('click', function () {
    var currTab = $(this).parent().index();

    $('.btn-pa_color').removeClass('active');
    $(this).addClass('active');
});

$(document).ready(function(){
    $(".header-slides__go-down-btn").on("click", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1000);
    });
});

// SELECT EDIT
$('.sorting_title').click(function () {
    $('.sorting_title').toggleClass('active')
    $('.sorting__list').toggle();
})

// MODAL WINDOW
$('.request-call__btn').click(function (e) {
    e.preventDefault();
    $('.modal-window').addClass('active');
})
$('.modal-window__close').click(function () {
    $('.modal-window').removeClass('active');
})
$('.modal-window__overlay').click(function () {
    $('.modal-window').removeClass('active');
});

// MENU FIXED
$(document).ready(function(){

    var $menu = $("#menu-head");

    $(window).scroll(function(){
        if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
            $menu.fadeOut('fast',function(){
                $(this).removeClass("default")
                    .addClass("fixed")
                    .fadeIn('fast');
            });
        } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
            $menu.fadeOut('fast',function(){
                $(this).removeClass("fixed")
                    .addClass("default")
                    .fadeIn('fast');
            });
        }
    });
});