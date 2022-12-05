
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
    // выводим сумму экономии в карточку
    let oldPrice = $('.product__info .list-unstyled.price .product-dis span').text().replace(/[^0-9]/gi, '');
    let salePrice = $('.product-right .list-unstyled.price .product-price h2').text().replace(/[^0-9]/gi, '');
    if ( oldPrice.length > 0 ) {
        let checkSale = oldPrice - salePrice;
        $('.product__info .stiker').prepend('<span>Экономия ' +checkSale+ ' руб.</span>');
    }

    //скрываем часть контента в корзине в блоке доставка
    if ($(window).width() > 500) {
        let shipContainer = $('#simplecheckout_shipping .simplecheckout-block-content');
        $('#simplecheckout_shipping').append('<div class="ship_all">Показать все</div>');
        $('#simplecheckout_shipping .simplecheckout-block-content').toggleClass('desktop-hidden');
        $('#simplecheckout_shipping').on('click', function() {
            $(' #simplecheckout_shipping .simplecheckout-block-content.desktop-hidden').removeClass('desktop-hidden');
            $('#simplecheckout_shipping .ship_all').remove();
        });
    }

    //Аккордеоны Долями на странице описания
    let faqAnsw = $('.dolyami__container .dolyami__faq .item-question .answer');
    faqAnsw.hide()
    $(document).on('click', '.dolyami__container .dolyami__faq .item-question', function() {
        $(this).find('.answer').toggle(300);
        $(this).toggleClass('active');
    });

    //долями в карточке товара
    let lastPrice = $('.product__info > ul > li:first').text().replace(/[^0-9]/gi, '');
    let dolyamiPriceGet = lastPrice/4;
    let dolyamiPrice = Math.ceil(dolyamiPriceGet);
    $('.product__info .price__info_dolyame .price__info_sum span').text(dolyamiPrice);
    $('.product__info .price__info_dolyame .dolyame-price').text(dolyamiPrice + ' ₽');

    //Долями в каталоге
    $( ".product-list-js .product-layout" ).each(function() {
        let dolyameCategory = $(this).find('.price > *:first').text().replace(/[^0-9]/gi, '');
        let dolyameCategoryPrice = dolyameCategory/4;
        console.log();
        $(this).find('.dolyami-category span').text(dolyameCategoryPrice);
    });

    //ссылка на стр с отзывами
    $('#ex-store-reviews').append('<div class="review__page_link"><div class="write_rev">Нам очень важно ваше мнение о нашем магазине, мы будем рады, если вы оставите отзыв о нас <a href="/otzyvy#form-review">Написать отзыв</a></div><div class="all_rev"><a href="/otzyvy">Все отзывы</a></div></div>')

    //ссылка о накопительных баллах в лк
    $('.user__cabinet .a-link-list ul').append('<li><a href="https://cessa-shoes.ru/index.php?route=account/discounts_total">Накопительная скидка</a></li>')
});

$(function() {
    if ($(window).width() < 992) {
        //отображаем долями в адаптиве
        $(document).on('click', '.product__info .price__info_dolyame', function() {
            $(this).toggleClass('active');
        })

        //видео фон
        $('body').prepend('<div class="mobile__video"> <div class="mobile__video_overlay"></div> <video class="mobile__video_video" id="" autoplay="" playsinline="" muted="" loop="" poster="/catalog/view/theme/fashionist/img/other/poster_theme.jpg"> <source src="/catalog/view/theme/fashionist/img/other/video1.mp4" type="video/mp4"> <source src="/catalog/view/theme/fashionist/img/other/video1.webm" type="video/webm"> </video> </div>');

    }
});

$(function(){
    if ($(window).width() < 500){
        var observer = new IntersectionObserver(function(entries){
            entries.forEach(function(entry){
                //let productSize = $('#item__buy_info label.active.in-stock-item-js span').text();
                let productPrice = $('.product__info .product-price').text();
                //let productBuyBtn = $('.product__info_buy #product').html();

                let createFixBlock = '<div class="product__fix_container"><div class="price">' + productPrice + '</div>' + '<div class="btn_txt">Добавить в корзину</div> </div>';
              if(entry.isIntersecting) {
                $(entry.target).removeClass('fix__buy_block');
                $('body .product__fix_container').remove();
              } else {
                $(entry.target).addClass('fix__buy_block');
                $('body').append(createFixBlock);
                console.log('non visible');
                $(".product__fix_container").click(function () {
                    $("html, body").animate({ scrollTop: $(".product__info").offset().top }, 500);
                    return true;
                });
              }
            });
          }, {threshold: 0.1});
          $('.product__info_buy #product').each(function(){
            observer.observe(this);
          });

          
    }
});