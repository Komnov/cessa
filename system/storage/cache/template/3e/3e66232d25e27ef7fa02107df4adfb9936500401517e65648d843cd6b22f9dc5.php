<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* fashionist/template/common/header.twig */
class __TwigTemplate_09fde2937573a4b00d639be1382c155a4496d3b51a444ea523070e13539e7fc6 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir=\"";
        // line 3
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\" class=\"ie8\"><![endif]-->
<!--[if IE 9 ]><html dir=\"";
        // line 4
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\" class=\"ie9\"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir=\"";
        // line 6
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\">
<!--<![endif]-->
<head>
<meta charset=\"UTF-8\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
<title>";
        // line 12
        echo ($context["title"] ?? null);
        echo "</title>
<base href=\"";
        // line 13
        echo ($context["base"] ?? null);
        echo "\" />
";
        // line 14
        if (($context["description"] ?? null)) {
            // line 15
            echo "<meta name=\"description\" content=\"";
            echo ($context["description"] ?? null);
            echo "\" />
";
        }
        // line 17
        if (($context["keywords"] ?? null)) {
            // line 18
            echo "<meta name=\"keywords\" content=\"";
            echo ($context["keywords"] ?? null);
            echo "\" />
";
        }
        // line 20
        echo "<script src=\"catalog/view/javascript/jquery/jquery-2.1.1.min.js\" type=\"text/javascript\"></script>
<link href=\"catalog/view/javascript/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\" />
<script src=\"catalog/view/javascript/bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
<link href=\"catalog/view/javascript/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"catalog/view/javascript/jquery/magnific/magnific-popup.css\" />
<link href=\"//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"catalog/view/theme/";
        // line 26
        echo ($context["activetemplate"] ?? null);
        echo "/stylesheet/owl.carousel.min.css\" rel=\"stylesheet\">
<script src=\"catalog/view/theme/";
        // line 27
        echo ($context["activetemplate"] ?? null);
        echo "/javascripts/owl.carousel.min.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/theme/";
        // line 28
        echo ($context["activetemplate"] ?? null);
        echo "/javascripts/theme.js\" type=\"text/javascript\"></script>
<link href=\"catalog/view/theme/";
        // line 29
        echo ($context["activetemplate"] ?? null);
        echo "/stylesheet/stylesheet.css\" rel=\"stylesheet\">


";
        // line 32
        if ((($context["direction"] ?? null) == "rtl")) {
            // line 33
            echo "  
<link href=\"catalog/view/theme/";
            // line 34
            echo ($context["activetemplate"] ?? null);
            echo "/stylesheet/rtl.css\" rel=\"stylesheet\">
";
        }
        // line 36
        echo "
";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["styles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 38
            echo "<link href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "href", [], "any", false, false, false, 38);
            echo "\" type=\"text/css\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "rel", [], "any", false, false, false, 38);
            echo "\" media=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "media", [], "any", false, false, false, 38);
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 41
            echo "<script src=\"";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "<script src=\"catalog/view/javascript/common.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/javascript/support.js\" type=\"text/javascript\"></script>
<link href=\"catalog/view/javascript/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
<script src=\"catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js\"></script>
<script src=\"catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js\" type=\"text/javascript\"></script>
";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 51
            echo "<link href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "href", [], "any", false, false, false, 51);
            echo "\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "rel", [], "any", false, false, false, 51);
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["analytics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["analytic"]) {
            // line 54
            echo $context["analytic"];
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['analytic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "</head>
<body>
  <main> 
  \t<div id=\"menu_wrapper\"></div>
    <header id=\"header\" class=\"";
        // line 60
        echo ($context["ishome"] ?? null);
        echo "\">
    \t<div class=\"header-nav\">
      \t\t<div class=\"container\">
\t\t\t  <div class=\"row\">
\t\t      \t<div class=\"col-xs-12 col-sm-4 col-md-4 left-nav\">
\t\t\t\t\t<div class=\"contact-email\">
\t\t\t\t\t\t<div class=\"email-img\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\"> 
\t\t\t\t\t\t\t\t<symbol id=\"envelope\" viewBox=\"0 0 400 400\"><title>envelope</title><path d=\"M230,49.585c0-0.263,0.181-0.519,0.169-0.779l-70.24,67.68l70.156,65.518c0.041-0.468-0.085-0.94-0.085-1.418V49.585z\"/><path d=\"M149.207,126.901l-28.674,27.588c-1.451,1.396-3.325,2.096-5.2,2.096c-1.836,0-3.672-0.67-5.113-2.013l-28.596-26.647L11.01,195.989c1.717,0.617,3.56,1.096,5.49,1.096h197.667c2.866,0,5.554-0.873,7.891-2.175L149.207,126.901z\"/>
\t\t\t\t\t\t\t\t<path d=\"M115.251,138.757L222.447,35.496c-2.427-1.443-5.252-2.411-8.28-2.411H16.5c-3.943,0-7.556,1.531-10.37,3.866L115.251,138.757z\"/>
\t\t\t\t\t\t\t\t<path d=\"M0,52.1v128.484c0,1.475,0.339,2.897,0.707,4.256l69.738-67.156L0,52.1z\"/></symbol>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t<svg class=\"icon\" viewBox=\"0 0 40 40\">
\t\t\t\t\t\t\t\t<use xlink:href=\"#envelope\" x=\"31%\" y=\"20%\"></use>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t<span class=\"cont-email\">";
        // line 77
        echo ($context["email"] ?? null);
        echo "</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t    \t</div>
\t\t\t\t<div class=\"col-xs-12 col-sm-4 col-md-4 center-nav\">
\t\t        \t";
        // line 82
        echo ($context["headerbefore"] ?? null);
        echo "
\t\t\t\t</div>
\t\t    \t<div class=\"col-xs-12 col-sm-4 col-md-4 right-nav\">
\t\t      \t\t<div class=\"language-selector\">";
        // line 85
        echo ($context["language"] ?? null);
        echo "</div>
\t\t      \t\t<div class=\"currency-selector\">";
        // line 86
        echo ($context["currency"] ?? null);
        echo "</div>
\t\t\t\t </div>
\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"header-top\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"row\">
\t\t\t        <div class=\"desktop-logo\">
\t\t\t          <div id=\"logo\">
\t\t\t            ";
        // line 96
        if (($context["logo"] ?? null)) {
            // line 97
            echo "\t\t\t            <a href=\"";
            echo ($context["home"] ?? null);
            echo "\"><img src=\"";
            echo ($context["logo"] ?? null);
            echo "\" title=\"";
            echo ($context["name"] ?? null);
            echo "\" alt=\"";
            echo ($context["name"] ?? null);
            echo "\" class=\"img-responsive\" /></a>
\t\t\t            ";
        } else {
            // line 99
            echo "\t\t\t            <span style=\"font-size: 20px;line-height: 20px;\">
\t\t\t              <a href=\"";
            // line 100
            echo ($context["home"] ?? null);
            echo "\">
\t\t\t                ";
            // line 101
            echo ($context["name"] ?? null);
            echo "
\t\t\t              </a>
\t\t\t            </span>
\t\t\t            ";
        }
        // line 105
        echo "\t\t\t          </div>
\t\t\t        </div>
\t\t\t\t\t";
        // line 107
        echo ($context["menu"] ?? null);
        echo "
\t\t\t        <div id=\"_desktop_cart\">
\t\t\t          <div class=\"blockcart\">
\t\t\t            ";
        // line 110
        echo ($context["cart"] ?? null);
        echo "
\t\t\t          </div>
\t\t\t        </div> 
\t\t\t\t\t<div id=\"_desktop_user_info\">
\t\t\t\t\t\t<div class=\"user-info\">
\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t\t<a title=\"";
        // line 116
        echo ($context["text_account"] ?? null);
        echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">    
\t\t\t\t\t\t\t\t\t<div class=\"user-logo\">
\t\t\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
\t\t\t\t\t\t\t\t\t\t<symbol id=\"account\" viewBox=\"0 0 1150 1150\"><title>account</title><path d=\"m275.565 275.565c-75.972 0-137.783-61.81-137.783-137.783s61.811-137.782 137.783-137.782 137.783 61.81 137.783 137.783-61.811 137.782-137.783 137.782zm0-241.119c-56.983 0-103.337 46.353-103.337 103.337s46.353 103.337 103.337 103.337 103.337-46.354 103.337-103.337-46.354-103.337-103.337-103.337z\"/><path d=\"m499.461 551.13h-447.793c-9.52 0-17.223-7.703-17.223-17.223v-118.558c0-17.795 9.099-34.513 23.732-43.663 129.339-80.682 305.554-80.665 434.759-.017 14.649 9.166 23.749 25.885 23.749 43.679v118.558c0 9.521-7.703 17.224-17.224 17.224zm-430.57-34.445h413.348v-101.336c0-6.004-2.893-11.555-7.552-14.464-118.256-73.819-279.905-73.87-398.26.017-4.642 2.893-7.535 8.443-7.535 14.448z\"/></symbol>
\t\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t\t\t<svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#account\" x=\"24%\" y=\"28%\"></use></svg>
\t\t\t\t\t\t\t\t\t</div>      
\t\t\t\t\t\t\t\t\t<span class=\"expand-more\">";
        // line 123
        echo ($context["text_account"] ?? null);
        echo "</span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t";
        // line 126
        if (($context["logged"] ?? null)) {
            // line 127
            echo "\t\t\t\t\t\t\t\t<li><a href=\"";
            echo ($context["account"] ?? null);
            echo "\">";
            echo ($context["text_account"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 128
            echo ($context["order"] ?? null);
            echo "\">";
            echo ($context["text_order"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 129
            echo ($context["transaction"] ?? null);
            echo "\">";
            echo ($context["text_transaction"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 130
            echo ($context["download"] ?? null);
            echo "\">";
            echo ($context["text_download"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 131
            echo ($context["logout"] ?? null);
            echo "\">";
            echo ($context["text_logout"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t";
        } else {
            // line 133
            echo "\t\t\t\t\t\t\t\t<li><a href=\"";
            echo ($context["register"] ?? null);
            echo "\"> <i class=\"fa fa-user\"></i>  ";
            echo ($context["text_register"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 134
            echo ($context["login"] ?? null);
            echo "\"> <i class=\"fa fa-sign-in\"></i>  ";
            echo ($context["text_login"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 135
            echo ($context["wishlist"] ?? null);
            echo "\" id=\"wishlist-total\" title=\"";
            echo ($context["text_wishlist"] ?? null);
            echo "\"> <i class=\"fa fa-heart\"></i>  <span class=\"wishlist-text\">";
            echo ($context["text_wishlist"] ?? null);
            echo "</span></a></li>
\t\t\t\t\t\t\t\t";
        }
        // line 137
        echo "\t\t\t\t\t\t\t\t</ul>             
\t\t\t\t\t\t\t</div>           
\t\t\t\t\t\t</div> 
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"_desktop_search_widget\">
\t\t\t            <div id=\"ishisearch_widget\" class=\"search-widget\">
\t\t\t              <div class=\"search-logo\">
\t\t\t\t\t\t  \t<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
\t\t\t\t\t\t\t\t<symbol id=\"magnifying-glass\" viewBox=\"0 0 1099 1099\"><title>magnifying-glass</title><path d=\"m202.667969 405.339844c-111.746094 0-202.667969-90.921875-202.667969-202.664063 0-111.746093 90.921875-202.6679685 202.667969-202.6679685 111.742187 0 202.664062 90.9218755 202.664062 202.6679685 0 111.742188-90.921875 202.664063-202.664062 202.664063zm0-373.332032c-94.101563 0-170.667969 76.566407-170.667969 170.667969 0 94.101563 76.566406 170.664063 170.667969 170.664063 94.101562 0 170.664062-76.5625 170.664062-170.664063 0-94.101562-76.5625-170.667969-170.664062-170.667969zm0 0\"/><path d=\"m496 512.007812c-4.097656 0-8.191406-1.558593-11.308594-4.691406l-161.277344-161.28125c-6.25-6.25-6.25-16.382812 0-22.636718 6.25-6.25 16.382813-6.25 22.632813 0l161.28125 161.28125c6.25 6.25 6.25 16.382812 0 22.636718-3.136719 3.132813-7.230469 4.691406-11.328125 4.691406zm0 0\"/></symbol>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t<svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#magnifying-glass\" x=\"25%\" y=\"22%\"></use></svg>
\t\t\t\t\t\t  </div>
\t\t\t              <form>";
        // line 149
        echo ($context["search"] ?? null);
        echo "</form>
\t\t\t            </div>
        \t\t\t</div> 
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>  
        ";
        // line 155
        echo ($context["headerafter"] ?? null);
        echo " 
\t      <div class=\"nav-full-width\">
\t        <div class=\"container\">
\t          <div class=\"row\"> 
\t          \t\t<div id=\"menu-icon\" class=\"menu-icon hidden-md hidden-lg\">
\t\t\t\t        <i class=\"fa fa-bars\" aria-hidden=\"true\"></i>
\t\t\t\t    </div>
                 \t<div id=\"_mobile_cart\"></div>
\t\t\t\t    <div id=\"_mobile_user_info\"></div>
\t\t\t\t    <div id=\"_mobile_search_widget\"></div>
\t\t\t\t    <div id=\"_mobile_link_menu\"></div>        
\t          </div>
\t        </div>
\t      </div>
    </header>
    
    <div id=\"mobile_top_menu_wrapper\" class=\"hidden-lg hidden-md\" style=\"display:none;\">
      <div id=\"top_menu_closer\">
        <i class=\"fa fa-close\"></i>
      </div>
      <div class=\"js-top-menu mobile\" id=\"_mobile_top_menu\"></div>
    </div>
    <div id=\"spin-wrapper\"></div>
\t<div id=\"siteloader\">
\t\t";
        // line 179
        if ((($context["loader"] ?? null) == "loader_1")) {
            // line 180
            echo "\t\t<div class=\"loader loader-1\"></div>
\t\t";
        } elseif ((        // line 181
($context["loader"] ?? null) == "loader_2")) {
            // line 182
            echo "\t\t<div class=\"loader loader-2\">
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t</div>
\t\t";
        } elseif ((        // line 193
($context["loader"] ?? null) == "loader_3")) {
            // line 194
            echo "\t\t<div class=\"loader loader-3\">
\t      <div></div>
\t      <div></div>
\t      <div></div>
\t  \t</div>
\t\t";
        } else {
            // line 200
            echo "\t\t<div class=\"loader loader-4 la-dark la-2x\">
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t</div>
\t\t";
        }
        // line 208
        echo "\t</div>

<!-- ======= Quick view JS ========= -->
<script> 
function quickbox(){
 \tif (\$(window).width() > 767) {
\t\t\$('.quickview-button').magnificPopup({
\t\ttype:'iframe',
\t\tdelegate: 'a',
\t\tpreloader: true,
\t\ttLoading: 'Loading image #%curr%...',
\t\t});    
 \t}  
}
jQuery(document).ready(function() {quickbox();});
jQuery(window).resize(function() {quickbox();});
\$( \"input[name=\\'search\\']\" ).keyup(function( event ) {
\t\$('input[name=\\'search\\']').autocomplete({
\t\t'source': function(request, response) {
\t\t\t\$.ajax({
\t\t\t\turl: 'index.php?route=product/search/autocomplete&filter_name=' +  encodeURIComponent(request),
\t\t\t\tdataType: 'json',
\t\t\t\tsuccess: function(result) {
\t\t\t\t\tvar products = result.products;
\t\t\t\t\t\$('.ajaxishi-search ul li').remove();
\t\t\t\t\t  \$.each(products, function(index,product) {
\t\t\t\t\t\tvar html = '<li>';
\t\t\t\t\t\t\thtml += '<div>';
\t\t\t\t\t\t\thtml += '<a href=\"' + product.url + '\" title=\"' + product.name + '\">';
\t\t\t\t\t\t\thtml += '<div class=\"product-image\"><img alt=\"' + product.name + '\" src=\"' + product.image + '\"></div>';
\t\t\t\t\t\t\thtml += '<div class=\"product-desc\">';
\t\t\t\t\t\t\thtml += '<div class=\"product-name\">' + product.name + '</div>';
\t\t\t\t\t\t\tif (product.special) {
\t                            html += '<div class=\"product-price\"><span class=\"special\">' + product.price + '</span><span class=\"price\">' + product.special + '</span></div>';
\t                        } else {
\t                            html += '<div class=\"product-price\"><span class=\"price\">' + product.price + '</span></div>';
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\thtml += '</div>';
\t\t\t\t\t\t\thtml += '</a>';
\t\t\t\t\t\t\thtml += '</div>';
\t\t\t\t\t\t\thtml += '</li>';
\t\t\t\t\t\t\t\$('.ajaxishi-search ul').append(html);
\t\t\t\t\t  });
\t\t\t\t\t  \$('.ajaxishi-search').css('display','block');
\t                return false;
\t\t\t\t}
\t\t\t});
\t\t},
\t\t'select': function(product) {
\t\t\t\$('input[name=\\'filter_name\\']').val(product.name);
\t\t}
\t});
});
</script>";
    }

    public function getTemplateName()
    {
        return "fashionist/template/common/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  460 => 208,  450 => 200,  442 => 194,  440 => 193,  427 => 182,  425 => 181,  422 => 180,  420 => 179,  393 => 155,  384 => 149,  370 => 137,  361 => 135,  355 => 134,  348 => 133,  341 => 131,  335 => 130,  329 => 129,  323 => 128,  316 => 127,  314 => 126,  308 => 123,  298 => 116,  289 => 110,  283 => 107,  279 => 105,  272 => 101,  268 => 100,  265 => 99,  253 => 97,  251 => 96,  238 => 86,  234 => 85,  228 => 82,  220 => 77,  200 => 60,  194 => 56,  186 => 54,  182 => 53,  171 => 51,  167 => 50,  158 => 43,  149 => 41,  145 => 40,  132 => 38,  128 => 37,  125 => 36,  120 => 34,  117 => 33,  115 => 32,  109 => 29,  105 => 28,  101 => 27,  97 => 26,  89 => 20,  83 => 18,  81 => 17,  75 => 15,  73 => 14,  69 => 13,  65 => 12,  54 => 6,  47 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/common/header.twig", "");
    }
}
