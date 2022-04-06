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
class __TwigTemplate_36a54fcd3af59c3409e2221cc7294c73bed6ef3bf2f1f2e7decae7e661cc4eb0 extends \Twig\Template
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
\t\t\t        <div class=\"mobile-width-left col-sm-4 col-xs-3\">
\t\t\t\t\t\t<div id=\"menu-icon\" class=\"menu-icon hidden-md hidden-lg\">
\t\t\t\t\t      <div class=\"nav-icon\">
\t\t\t\t\t        <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
\t\t\t\t\t          <symbol id=\"menu\" viewBox=\"0 0 750 750\"><title>menu</title>
\t\t\t\t\t              <path d=\"M12.03,84.212h360.909c6.641,0,12.03-5.39,12.03-12.03c0-6.641-5.39-12.03-12.03-12.03H12.03
\t\t\t\t\t              C5.39,60.152,0,65.541,0,72.182C0,78.823,5.39,84.212,12.03,84.212z\"></path>
\t\t\t\t\t              <path d=\"M372.939,180.455H12.03c-6.641,0-12.03,5.39-12.03,12.03s5.39,12.03,12.03,12.03h360.909c6.641,0,12.03-5.39,12.03-12.03
\t\t\t\t\t                  S379.58,180.455,372.939,180.455z\"></path>
\t\t\t\t\t              <path d=\"M372.939,300.758H12.03c-6.641,0-12.03,5.39-12.03,12.03c0,6.641,5.39,12.03,12.03,12.03h360.909
\t\t\t\t\t              c6.641,0,12.03-5.39,12.03-12.03C384.97,306.147,379.58,300.758,372.939,300.758z\"></path>
\t\t\t\t\t          </symbol>
\t\t\t\t\t        </svg>
\t\t\t\t\t        <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#menu\" x=\"22%\" y=\"25%\"></use></svg>
\t\t\t\t\t      </div>
\t\t\t\t\t    </div>
    \t\t\t\t\t<div id=\"_mobile_seach_widget\"></div>
\t\t\t\t\t</div>
\t\t\t        <div class=\"desktop-logo col-lg-3 col-md-3 col-sm-4 col-xs-4\">
\t\t\t          <div id=\"logo\">
\t\t\t            ";
        // line 113
        if (($context["logo"] ?? null)) {
            // line 114
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
            // line 116
            echo "\t\t\t            <span style=\"font-size: 20px;line-height: 20px;\">
\t\t\t              <a href=\"";
            // line 117
            echo ($context["home"] ?? null);
            echo "\">
\t\t\t                ";
            // line 118
            echo ($context["name"] ?? null);
            echo "
\t\t\t              </a>
\t\t\t            </span>
\t\t\t            ";
        }
        // line 122
        echo "\t\t\t          </div>
\t\t\t        </div>
\t\t\t        <div class=\"header-menu col-lg-7 col-md-7 col-sm-7 col-xs-7\">
\t\t\t        \t";
        // line 125
        echo ($context["menu"] ?? null);
        echo "\t
\t\t\t        </div>
\t\t\t        <div class=\"mobile-width-right col-sm-4 col-xs-4\">
    \t\t\t\t\t<div id=\"_mobile_cart\"></div>
    \t\t\t\t\t<div id=\"_mobile_user_info\"></div>
   \t \t\t\t\t\t<div id=\"_mobile_link_menu\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"header-right col-lg-3 col-md-3 col-sm-3 col-xs-3\">
\t\t\t\t        <div id=\"_desktop_cart\">
\t\t\t\t          <div class=\"blockcart\">
\t\t\t\t            ";
        // line 135
        echo ($context["cart"] ?? null);
        echo "
\t\t\t\t          </div>
\t\t\t\t        </div> 
\t\t\t\t\t\t<div id=\"_desktop_user_info\">
\t\t\t\t\t\t\t<div class=\"user-info\">
\t\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t\t\t<a title=\"";
        // line 141
        echo ($context["text_account"] ?? null);
        echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">    
\t\t\t\t\t\t\t\t\t\t<div class=\"user-logo hidden-xs hidden-sm\">
\t\t\t\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">          
\t\t\t\t\t\t\t\t\t\t        <symbol id=\"user-desktop\" viewBox=\"0 0 480 480\"><title>user-desktop</title>
\t\t\t\t\t\t\t\t\t\t              <path d=\"M187.497,152.427H73.974c-38.111,0-69.117,31.006-69.117,69.117v39.928h251.758v-39.928
\t\t\t\t\t\t\t\t\t\t                 C256.614,183.433,225.608,152.427,187.497,152.427z M241.614,246.473H19.856v-24.928c0-29.84,24.277-54.117,54.117-54.117h113.523
\t\t\t\t\t\t\t\t\t\t                 c29.84,0,54.117,24.277,54.117,54.117L241.614,246.473L241.614,246.473z\"></path>
\t\t\t\t\t\t\t\t\t\t              <path d=\"M130.735,145.326c40.066,0,72.663-32.597,72.663-72.663S170.802,0,130.735,0S58.072,32.596,58.072,72.663
\t\t\t\t\t\t\t\t\t\t                 S90.669,145.326,130.735,145.326z M130.735,15c31.796,0,57.663,25.867,57.663,57.663s-25.867,57.663-57.663,57.663
\t\t\t\t\t\t\t\t\t\t                 s-57.663-25.868-57.663-57.663S98.939,15,130.735,15z\"></path>
\t\t\t\t\t\t\t\t\t\t            </symbol> 
\t\t\t\t\t\t\t\t\t\t    </svg>
\t\t\t\t\t\t\t\t\t\t   <svg class=\"icon\" viewBox=\"0 0 40 40\"><use xlink:href=\"#user-desktop\" x=\"19%\" y=\"19%\"></use></svg>
\t\t\t\t\t\t\t\t\t\t</div>      
\t\t\t\t\t\t\t\t\t\t<div class=\"user-logo hidden-lg hidden-md\">
\t\t\t\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">          
\t\t\t\t\t\t\t\t\t\t\t      <symbol id=\"user-responsive\" viewBox=\"0 0 480 480\"><title>user</title>
\t\t\t\t\t\t\t\t\t\t\t        <path d=\"M187.497,152.427H73.974c-38.111,0-69.117,31.006-69.117,69.117v39.928h251.758v-39.928
\t\t\t\t\t\t\t\t\t\t\t                 C256.614,183.433,225.608,152.427,187.497,152.427z M241.614,246.473H19.856v-24.928c0-29.84,24.277-54.117,54.117-54.117h113.523
\t\t\t\t\t\t\t\t\t\t\t                 c29.84,0,54.117,24.277,54.117,54.117L241.614,246.473L241.614,246.473z\"></path>
\t\t\t\t\t\t\t\t\t\t\t        <path d=\"M130.735,145.326c40.066,0,72.663-32.597,72.663-72.663S170.802,0,130.735,0S58.072,32.596,58.072,72.663
\t\t\t\t\t\t\t\t\t\t\t                 S90.669,145.326,130.735,145.326z M130.735,15c31.796,0,57.663,25.867,57.663,57.663s-25.867,57.663-57.663,57.663
\t\t\t\t\t\t\t\t\t\t\t                 s-57.663-25.868-57.663-57.663S98.939,15,130.735,15z\"></path>
\t\t\t\t\t\t\t\t\t\t\t      </symbol>
\t\t\t\t\t\t\t\t\t\t    </svg>
\t\t\t\t\t\t\t\t\t\t    <svg class=\"icon\" viewBox=\"0 0 40 40\"><use xlink:href=\"#user-responsive\" x=\"19%\" y=\"19%\"></use></svg>
\t\t\t\t\t\t\t\t\t\t</div> 
\t\t\t\t\t\t\t\t\t\t<span class=\"expand-more\">";
        // line 168
        echo ($context["text_account"] ?? null);
        echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t";
        // line 171
        if (($context["logged"] ?? null)) {
            // line 172
            echo "\t\t\t\t\t\t\t\t\t<li><a href=\"";
            echo ($context["account"] ?? null);
            echo "\">";
            echo ($context["text_account"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 173
            echo ($context["order"] ?? null);
            echo "\">";
            echo ($context["text_order"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 174
            echo ($context["transaction"] ?? null);
            echo "\">";
            echo ($context["text_transaction"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 175
            echo ($context["download"] ?? null);
            echo "\">";
            echo ($context["text_download"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 176
            echo ($context["logout"] ?? null);
            echo "\">";
            echo ($context["text_logout"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t";
        } else {
            // line 178
            echo "\t\t\t\t\t\t\t\t\t<li><a href=\"";
            echo ($context["register"] ?? null);
            echo "\"> <i class=\"fa fa-user\"></i>  ";
            echo ($context["text_register"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 179
            echo ($context["login"] ?? null);
            echo "\"> <i class=\"fa fa-sign-in\"></i>  ";
            echo ($context["text_login"] ?? null);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 180
            echo ($context["wishlist"] ?? null);
            echo "\" id=\"wishlist-total\" title=\"";
            echo ($context["text_wishlist"] ?? null);
            echo "\"> <i class=\"fa fa-heart\"></i>  <span class=\"wishlist-text\">";
            echo ($context["text_wishlist"] ?? null);
            echo "</span></a></li>
\t\t\t\t\t\t\t\t\t";
        }
        // line 182
        echo "\t\t\t\t\t\t\t\t\t</ul>             
\t\t\t\t\t\t\t\t</div>           
\t\t\t\t\t\t\t</div> 
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div id=\"_desktop_search_widget\">
\t\t\t\t            <div id=\"ishisearch_widget\" class=\"search-widget\">
\t\t\t\t              <div class=\"search-logo\">
\t\t\t\t\t\t\t  \t<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">   
\t\t\t\t\t\t\t        <symbol id=\"magnifying-desktop\" viewBox=\"0 0 1200 1200\"><title>magnifying-desktop</title>
\t\t\t\t\t\t\t          <path d=\"M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
\t\t\t\t\t\t\t               C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
\t\t\t\t\t\t\t               l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
\t\t\t\t\t\t\t               c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
\t\t\t\t\t\t\t               S377.82,467.8,257.493,467.8z\"></path>
\t\t\t\t\t\t\t         </symbol>
\t\t\t\t\t\t\t      </svg>
\t\t\t\t\t\t\t      <svg class=\"icon\" viewBox=\"0 0 40 40\"><use xlink:href=\"#magnifying-desktop\" x=\"20%\" y=\"22%\"></use></svg>
\t\t\t\t\t\t\t  </div>
\t\t\t\t              <form>";
        // line 200
        echo ($context["search"] ?? null);
        echo "</form>
\t\t\t\t            </div>
\t        \t\t\t</div> 
        \t\t\t</div>
\t\t\t</div>
\t\t</div>  
        ";
        // line 206
        echo ($context["headerafter"] ?? null);
        echo " 
\t      <div class=\"nav-full-width\">
\t        <div class=\"container\">
\t          <div class=\"row\"> 
\t          \t\t<div id=\"menu-icon\" class=\"menu-icon hidden-md hidden-lg\">
\t          \t\t\t<div class=\"nav-icon\">
\t\t          \t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
\t\t\t\t\t\t        <symbol id=\"menu\" viewBox=\"0 0 750 750\"><title>menu</title>
\t\t\t\t\t\t            <path d=\"M12.03,84.212h360.909c6.641,0,12.03-5.39,12.03-12.03c0-6.641-5.39-12.03-12.03-12.03H12.03
\t\t\t\t\t\t            C5.39,60.152,0,65.541,0,72.182C0,78.823,5.39,84.212,12.03,84.212z\"></path>
\t\t\t\t\t\t            <path d=\"M372.939,180.455H12.03c-6.641,0-12.03,5.39-12.03,12.03s5.39,12.03,12.03,12.03h360.909c6.641,0,12.03-5.39,12.03-12.03
\t\t\t\t\t\t                S379.58,180.455,372.939,180.455z\"></path>
\t\t\t\t\t\t            <path d=\"M372.939,300.758H12.03c-6.641,0-12.03,5.39-12.03,12.03c0,6.641,5.39,12.03,12.03,12.03h360.909
\t\t\t\t\t\t            c6.641,0,12.03-5.39,12.03-12.03C384.97,306.147,379.58,300.758,372.939,300.758z\"></path>
\t\t\t\t\t\t        </symbol>
\t\t\t\t\t\t    </svg>
\t\t\t\t\t\t    <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#menu\" x=\"22%\" y=\"25%\"></use></svg>
\t\t\t\t\t    </div>
\t\t\t\t    </div>   
\t          </div>
\t        </div>
\t      </div>
    </header>
    <div id=\"spin-wrapper\"></div>
\t<div id=\"siteloader\">
\t\t";
        // line 231
        if ((($context["loader"] ?? null) == "loader_1")) {
            // line 232
            echo "\t\t<div class=\"loader loader-1\"></div>
\t\t";
        } elseif ((        // line 233
($context["loader"] ?? null) == "loader_2")) {
            // line 234
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
        } elseif ((        // line 245
($context["loader"] ?? null) == "loader_3")) {
            // line 246
            echo "\t\t<div class=\"loader loader-3\">
\t      <div></div>
\t      <div></div>
\t      <div></div>
\t  \t</div>
\t\t";
        } else {
            // line 252
            echo "\t\t<div class=\"loader loader-4 la-dark la-2x\">
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t\t<div></div>
\t\t</div>
\t\t";
        }
        // line 260
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
        return array (  512 => 260,  502 => 252,  494 => 246,  492 => 245,  479 => 234,  477 => 233,  474 => 232,  472 => 231,  444 => 206,  435 => 200,  415 => 182,  406 => 180,  400 => 179,  393 => 178,  386 => 176,  380 => 175,  374 => 174,  368 => 173,  361 => 172,  359 => 171,  353 => 168,  323 => 141,  314 => 135,  301 => 125,  296 => 122,  289 => 118,  285 => 117,  282 => 116,  270 => 114,  268 => 113,  238 => 86,  234 => 85,  228 => 82,  220 => 77,  200 => 60,  194 => 56,  186 => 54,  182 => 53,  171 => 51,  167 => 50,  158 => 43,  149 => 41,  145 => 40,  132 => 38,  128 => 37,  125 => 36,  120 => 34,  117 => 33,  115 => 32,  109 => 29,  105 => 28,  101 => 27,  97 => 26,  89 => 20,  83 => 18,  81 => 17,  75 => 15,  73 => 14,  69 => 13,  65 => 12,  54 => 6,  47 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/common/header.twig", "");
    }
}
