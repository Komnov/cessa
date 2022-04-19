
var opencart_responsive_current_width = window.innerWidth;
var opencart_responsive_min_width = 992;
var opencart_responsive_mobile = opencart_responsive_current_width < opencart_responsive_min_width;
var header_link_default = $('#_desktop_link_menu').html(); 

$(document).ready(() => {

    $('#siteloader').fadeOut();
    $('#spin-wrapper').fadeOut();

     $('.dropdown').on('show.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(600);
    });
    $('.dropdown').on('hide.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(600);
    });

    $('.search-widget .search-logo').click(function() {
        $(this).toggleClass('active').parents('.search-widget').find('form').stop(true,true).slideToggle('medium');
    });

    $(document).on('click','.btn-block',function() {
        $(this).siblings('.cart-dropdown').stop(true,true).slideToggle();
    });

    /* SlideTop*/
    $(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('#slidetop').fadeIn(500);
        } else {
            $('#slidetop').fadeOut(500);
        }
    });

    $('#slidetop').click(function(e) {
        e.preventDefault();     
        $('html, body').animate({scrollTop: 0}, 800);
    });   

    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
    if(!isMobile) {
    	if($(".parallax").length) {
    		$(".parallax").sitManParallex({  invert: false });
    	};
    } else {
    	$(".parallax").sitManParallex({  invert: true });
    }

    if($('.ishiparallaxbannerblock .parallax').data('deal') == '1') {
       var time = $('.ishiparallaxbannerblock .parallax').data('counter');
        var container = $('.ishiparallaxbannerblock .parallax').find('#parallaxcountdown');

        $(container).countdown(time, function(event) {
            $(this).find(".countdown-days .data").html(event.strftime('%D'));
            $(this).find(".countdown-hours .data").html(event.strftime('%H'));
            $(this).find(".countdown-minutes .data").html(event.strftime('%M'));
            $(this).find(".countdown-seconds .data").html(event.strftime('%S'));
            ;
        });
    }

    $(".banner-subtitle").html(function () { var t = $(this).text().trim().split(" "), i = t.shift(); return (t.length > 0 ? "<span>" + i + "</span> " : i) + t.join(" ") });

    $('#menu-icon').on('click', function () {
        $("#mobile_top_menu_wrapper").animate({
            width: "toggle"
        });
        $('#menu_wrapper').toggleClass('active');
        $('body').toggleClass('fixed');
    });

    $('#top_menu_closer i').on('click', function () {
        $("#mobile_top_menu_wrapper").animate({
            width: "toggle"
        });
        $('#menu_wrapper').toggleClass('active');
        $('body').toggleClass('fixed');
    });

    $('#menu_wrapper').on('click', function () {
        $("#mobile_top_menu_wrapper").animate({
            width: "toggle"
        });
        $('#menu_wrapper').toggleClass('active');
        $('body').toggleClass('fixed');
    });
    
    $('body').on('click', function () {
        $('.ajaxishi-search').hide(); 
    });

    if (opencart_responsive_mobile) {
        toggleMobileStyles();
    }
    
    adjustTopMenu();
    adjustFixedHeader();    
    $(window).resize(function() {
        adjustTopMenu();
        adjustFixedHeader();
    });   
    //fixed header
    $(window).scroll(function(){
         adjustFixedHeader();
    });
    
    jQuery(".product-list-js .product-layout,.ishispecialblock .product-layout,.latestproduct .product-layout,.ishiproductsblock .item,.related-product .item").each(function() {
        var ishicategorytime = $(this).data('countdowntime');
        var ishicategorycontainer = $(this).find('.countdown-container');
         $(ishicategorycontainer).countdown(ishicategorytime, function (event) {
             $(this).find(".countdown-days .data").html(event.strftime('%D'));
            $(this).find(".countdown-hours .data").html(event.strftime('%H'));
            $(this).find(".countdown-minutes .data").html(event.strftime('%M'));
            $(this).find(".countdown-seconds .data").html(event.strftime('%S'));
        });
    });
});

 
$(window).on('resize', function() {
    var _cw = opencart_responsive_current_width;
    var _mw = opencart_responsive_min_width;
    var _w = window.innerWidth;
    var _toggle = (_cw >= _mw && _w < _mw) || (_cw < _mw && _w >= _mw);
    opencart_responsive_current_width= _w;
    opencart_responsive_mobile = opencart_responsive_current_width < opencart_responsive_min_width;
    if (_toggle) {
        toggleMobileStyles();
    }
});     


  
function adjustTopMenu() {
    if (window.matchMedia('(min-width: 1200px)').matches) {
        $( "#_desktop_top_menu #top-menu .top_level_category" ).each(function( index ) {
          var subdiv = $(this).find('.sub-menu .category_dropdownmenu').length;
          var submenu = $(this).find('.sub-menu');
          if (subdiv == 1){
                submenu.css('width','230px');   
            }
            else{
                submenu.css('width',subdiv*200+30+'px');
            }
        });
    }
    else if (window.matchMedia('(min-width: 991px)').matches) {
        $( "#_desktop_top_menu #top-menu .top_level_category" ).each(function( index ) {
          var subdiv = $(this).find('.sub-menu .category_dropdownmenu').length;
          var submenu = $(this).find('.sub-menu');
          if (subdiv == 1){
                submenu.css('width','230px');
            } else if(subdiv < 4) {
                submenu.css('width',subdiv*200+30+'px');
            }
            else{
                submenu.css('width','830px');
            }
        });
    }
    else if (window.matchMedia('(max-width: 991px)').matches) {
        $( "#_mobile_top_menu #top-menu .top_level_category" ).each(function( index ) {
          var subdiv = $(this).find('.sub-menu .category_dropdownmenu').length;
          var submenu = $(this).find('.sub-menu');
          if (subdiv == 1){
                submenu.css('width','auto');   
            }
            else{
                submenu.css('width','auto');
            }
        });
    }

}

    function adjustFixedHeader() {
    var headerHeight = $('#header').height();
    var navHeightMobile = $('#header .nav-full-width').height();
    if(window.matchMedia('(max-width: 991px)').matches) {
        $('.header-top').removeClass('fixed-header');
        if ($(window).scrollTop() > navHeightMobile) {
            $('.nav-full-width').addClass('fixed-header');
        }
        else {
            $('.nav-full-width').removeClass('fixed-header');
        }
    } else {
        $('.nav-full-width').removeClass('fixed-header');
        if ($(window).scrollTop() > headerHeight) {
            $('.header-top, .product-right').addClass('fixed-header');
        }
        else {
            $('.header-top, .product-right').removeClass('fixed-header');
        }
    }   
}

function swapChildren(obj1, obj2)
{
    var temp = obj2.children().detach();
    obj2.empty().append(obj1.children().detach());
    obj1.append(temp);
}



function toggleMobileStyles()
{
    if (opencart_responsive_mobile) {
        $("*[id^='_desktop_']").each(function(idx, el) {
            var target = $('#' + el.id.replace('_desktop_', '_mobile_'));
            if (target.length) {
                swapChildren($(el), target);
            }
        });
    } else {
        $("*[id^='_mobile_']").each(function(idx, el) {
            var target = $('#' + el.id.replace('_mobile_', '_desktop_'));
            if (target.length) {
                swapChildren($(el), target);
            }
        });
    }
}

$(function() {
    $('#common-home .ishiservices .services a').on('click', function (e) {
    e.preventDefault(); //убираем переход по ссылке с блока преимуществ на главной
    });
});

$(function() {
    let oldPrice = $('.product__info .list-unstyled.price .product-dis span').text().replace(/[^0-9]/gi, '');
    let salePrice = $('.product-right .list-unstyled.price .product-price h2').text().replace(/[^0-9]/gi, '');
    if ( oldPrice.length > 0 ) {
        let checkSale = oldPrice - salePrice;
        $('.product__info .stiker').prepend('<span>Экономия ' +checkSale+ ' руб.</span>');
    }
});