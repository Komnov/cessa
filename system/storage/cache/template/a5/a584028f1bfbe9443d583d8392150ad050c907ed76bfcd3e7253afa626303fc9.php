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

/* fashionist/template/common/footer.twig */
class __TwigTemplate_279afc63feff57a2b4318b012d9d91cc141aea37bd1d3ae8e7d678f9eec5dc04 extends \Twig\Template
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
        echo "<div id=\"_mobile_column_left\" class=\"container\"></div>
<div id=\"_mobile_column_right\" class=\"container\"></div>
<footer id=\"footer\" class=\"";
        // line 3
        echo ($context["ishome"] ?? null);
        echo "\">
  <div class=\"footer-before\">    
    <div class=\"container\"> 
      <div class=\"row\">
           ";
        // line 7
        echo ($context["footerbefore"] ?? null);
        echo " 
      </div>
    </div>
  </div>
      <div class=\"footer-container\">
        <div class=\"container\">
          <div class=\"row\">
            <div id=\"_mobile_blockcontact\"></div>
            <div id=\"_mobile_block_newsletter\"></div>
            <div id=\"_mobile_social\"></div>
            <section class=\"information col-lg-3 col-md-3 col-sm-12 footer-block\">
                <h5 class=\"hidden-sm hidden-xs\">";
        // line 18
        echo ($context["text_information"] ?? null);
        echo "</h5>
                <div class=\"footer-title clearfix  hidden-lg hidden-md collapsed\" data-target=\"#information-container\" data-toggle=\"collapse\">
                  <span class=\"h3\">";
        // line 20
        echo ($context["text_information"] ?? null);
        echo "</span>
                  <span class=\"navbar-toggler collapse-icons\">
                    <i class=\"fa fa-angle-down add\"></i>
                    <i class=\"fa fa-angle-up remove\"></i>
                  </span>
                </div>
                ";
        // line 26
        if (($context["informations"] ?? null)) {
            // line 27
            echo "                <div id=\"information-container\" class=\"collapse footer-dropdown\">    
                  <ul class=\"list-unstyled\">
                   ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
                // line 30
                echo "                    <li><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "href", [], "any", false, false, false, 30);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 30);
                echo "</a></li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "                  </ul>
                </div>
                ";
        }
        // line 35
        echo "            </section>
            <section class=\"extras col-lg-3 col-md-3 col-sm-12 footer-block\">
                <h5 class=\"hidden-sm hidden-xs\">";
        // line 37
        echo ($context["text_extra"] ?? null);
        echo "</h5>
                <div class=\"footer-title clearfix  hidden-lg hidden-md collapsed\" data-target=\"#extras-container\" data-toggle=\"collapse\">
                  <span class=\"h3\">";
        // line 39
        echo ($context["text_extra"] ?? null);
        echo "</span>
                  <span class=\"navbar-toggler collapse-icons\">
                    <i class=\"fa fa-angle-down add\"></i>
                    <i class=\"fa fa-angle-up remove\"></i>
                  </span>
                </div>
                <div id=\"extras-container\" class=\"collapse footer-dropdown\">
                  <ul class=\"list-unstyled\">
                    <li><a href=\"";
        // line 47
        echo ($context["manufacturer"] ?? null);
        echo "\">";
        echo ($context["text_manufacturer"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 48
        echo ($context["voucher"] ?? null);
        echo "\">";
        echo ($context["text_voucher"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 49
        echo ($context["affiliate"] ?? null);
        echo "\">";
        echo ($context["text_affiliate"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 50
        echo ($context["special"] ?? null);
        echo "\">";
        echo ($context["text_special"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 51
        echo ($context["sitemap"] ?? null);
        echo "\">";
        echo ($context["text_sitemap"] ?? null);
        echo "</a></li>
                  </ul>
                </div>
            </section>
            <section class=\"account col-lg-3 col-md-3 col-sm-12 footer-block\">
                <h5 class=\"hidden-sm hidden-xs\">";
        // line 56
        echo ($context["text_account"] ?? null);
        echo "</h5>
                <div class=\"footer-title clearfix  hidden-lg hidden-md collapsed\" data-target=\"#account-container\" data-toggle=\"collapse\">
                  <span class=\"h3\">";
        // line 58
        echo ($context["text_account"] ?? null);
        echo "</span>
                  <span class=\"navbar-toggler collapse-icons\">
                    <i class=\"fa fa-angle-down add\"></i>
                    <i class=\"fa fa-angle-up remove\"></i>
                  </span>
                </div>
                <div id=\"account-container\" class=\"collapse footer-dropdown\">
                  <ul class=\"list-unstyled\">
                  <li><a href=\"";
        // line 66
        echo ($context["account"] ?? null);
        echo "\">";
        echo ($context["text_account"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 67
        echo ($context["order"] ?? null);
        echo "\">";
        echo ($context["text_order"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 68
        echo ($context["wishlist"] ?? null);
        echo "\">";
        echo ($context["text_wishlist"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 69
        echo ($context["newsletter"] ?? null);
        echo "\">";
        echo ($context["text_newsletter"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 70
        echo ($context["contact"] ?? null);
        echo "\">";
        echo ($context["text_contact"] ?? null);
        echo "</a></li>
                  </ul>
                </div>
            </section>
            <div id=\"_desktop_blockcontact\">
              <div class=\"block-contact col-lg-3 col-md-3 col-sm-12\">
                  <div class=\"footer-title clearfix  hidden-lg hidden-md collapsed\" data-target=\"#contact-info-container\" data-toggle=\"collapse\">
                  <span class=\"h3\">";
        // line 77
        echo ($context["text_contact"] ?? null);
        echo "</span>
                  <span class=\"navbar-toggler collapse-icons\">
                    <i class=\"fa fa-angle-down add\"></i>
                    <i class=\"fa fa-angle-up remove\"></i>
                  </span>
                </div>
                  <div id=\"contact-info-container\" class=\"collapse footer-dropdown\">
                    <h5 class=\"hidden-sm hidden-xs\">";
        // line 84
        echo ($context["text_contact"] ?? null);
        echo "</h5>
                      ";
        // line 85
        if (($context["storeaddress"] ?? null)) {
            // line 86
            echo "                      <div class=\"block address col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                        <span class=\"icon\"><i class=\"fa fa-map-marker\"></i></span>
                        <div class=\"content\">";
            // line 88
            echo ($context["storeaddress"] ?? null);
            echo "</div>
                      </div>
                      ";
        }
        // line 91
        echo "                      ";
        if (($context["storetelephone"] ?? null)) {
            // line 92
            echo "                      <div class=\"block phone col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                        <span class=\"icon phone\"><i class=\"fa fa-phone\"></i></span>
                        <div class=\"content\">
                          <a href=\"#\">";
            // line 95
            echo ($context["storetelephone"] ?? null);
            echo "</a>
                        </div>
                      </div>
                      ";
        }
        // line 99
        echo "                      ";
        if (($context["storefax"] ?? null)) {
            // line 100
            echo "                      <div class=\"block fax col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                        <span class=\"icon\"><i class=\"fa fa-fax\"></i></span>
                        <div class=\"content\">";
            // line 102
            echo ($context["storefax"] ?? null);
            echo "</div>
                      </div>
                      ";
        }
        // line 105
        echo "                      ";
        if (($context["storeemail"] ?? null)) {
            // line 106
            echo "                      <div class=\"block email col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                        <span class=\"icon\"><i class=\"fa fa-envelope\"></i></span>
                        <div class=\"content\">
                          <a href=\"mailto:";
            // line 109
            echo ($context["storeemail"] ?? null);
            echo "\">";
            echo ($context["storeemail"] ?? null);
            echo "</a>
                        </div>
                      </div>
                      ";
        }
        // line 113
        echo "                  </div>
              </div> 
            </div>
            ";
        // line 116
        echo ($context["footermiddle"] ?? null);
        echo "  
        </div>
    </div>
  </div>
  <div class=\"footer-after\">
    <div class=\"container\">
        <div class=\"row\">
          <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12\">
            <p class=\"footer-aftertext\">";
        // line 124
        echo ($context["powered"] ?? null);
        echo "</p>
          </div>
          <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12\">";
        // line 126
        echo ($context["footerafter"] ?? null);
        echo "</div>
        </div>
    </div>
  </div>
  <a id=\"slidetop\" href=\"#\" ></a>
</footer>
";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 133
            echo "<script src=\"";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo "<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</body></html>";
    }

    public function getTemplateName()
    {
        return "fashionist/template/common/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  322 => 135,  313 => 133,  309 => 132,  300 => 126,  295 => 124,  284 => 116,  279 => 113,  270 => 109,  265 => 106,  262 => 105,  256 => 102,  252 => 100,  249 => 99,  242 => 95,  237 => 92,  234 => 91,  228 => 88,  224 => 86,  222 => 85,  218 => 84,  208 => 77,  196 => 70,  190 => 69,  184 => 68,  178 => 67,  172 => 66,  161 => 58,  156 => 56,  146 => 51,  140 => 50,  134 => 49,  128 => 48,  122 => 47,  111 => 39,  106 => 37,  102 => 35,  97 => 32,  86 => 30,  82 => 29,  78 => 27,  76 => 26,  67 => 20,  62 => 18,  48 => 7,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/common/footer.twig", "");
    }
}
