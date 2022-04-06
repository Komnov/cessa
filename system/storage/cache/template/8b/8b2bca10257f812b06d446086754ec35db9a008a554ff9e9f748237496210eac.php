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
class __TwigTemplate_0f940af7ab0ed3193cc55e05f7994059952af4ebadbb98b74a95335958e9ec51 extends \Twig\Template
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
            <section class=\"information col-lg-3 col-md-3 col-sm-12 footer-block\">
                <h5 class=\"hidden-sm hidden-xs\">";
        // line 15
        echo ($context["text_information"] ?? null);
        echo "</h5>
                <div class=\"footer-title clearfix  hidden-lg hidden-md collapsed\" data-target=\"#information-container\" data-toggle=\"collapse\">
                  <span class=\"h3\">";
        // line 17
        echo ($context["text_information"] ?? null);
        echo "</span>
                  <span class=\"navbar-toggler collapse-icons\">
                    <i class=\"fa fa-angle-down add\"></i>
                    <i class=\"fa fa-angle-up remove\"></i>
                  </span>
                </div>
                ";
        // line 23
        if (($context["informations"] ?? null)) {
            // line 24
            echo "                <div id=\"information-container\" class=\"collapse footer-dropdown\">    
                  <ul class=\"list-unstyled\">
                   ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
                // line 27
                echo "                    <li><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "href", [], "any", false, false, false, 27);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 27);
                echo "</a></li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "                  </ul>
                </div>
                ";
        }
        // line 32
        echo "            </section>
            <section class=\"extras col-lg-3 col-md-3 col-sm-12 footer-block\">
                <h5 class=\"hidden-sm hidden-xs\">";
        // line 34
        echo ($context["text_extra"] ?? null);
        echo "</h5>
                <div class=\"footer-title clearfix  hidden-lg hidden-md collapsed\" data-target=\"#extras-container\" data-toggle=\"collapse\">
                  <span class=\"h3\">";
        // line 36
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
        // line 44
        echo ($context["manufacturer"] ?? null);
        echo "\">";
        echo ($context["text_manufacturer"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 45
        echo ($context["voucher"] ?? null);
        echo "\">";
        echo ($context["text_voucher"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 46
        echo ($context["affiliate"] ?? null);
        echo "\">";
        echo ($context["text_affiliate"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 47
        echo ($context["special"] ?? null);
        echo "\">";
        echo ($context["text_special"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 48
        echo ($context["sitemap"] ?? null);
        echo "\">";
        echo ($context["text_sitemap"] ?? null);
        echo "</a></li>
                  </ul>
                </div>
            </section>
            <section class=\"account col-lg-3 col-md-3 col-sm-12 footer-block\">
                <h5 class=\"hidden-sm hidden-xs\">";
        // line 53
        echo ($context["text_account"] ?? null);
        echo "</h5>
                <div class=\"footer-title clearfix  hidden-lg hidden-md collapsed\" data-target=\"#account-container\" data-toggle=\"collapse\">
                  <span class=\"h3\">";
        // line 55
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
        // line 63
        echo ($context["account"] ?? null);
        echo "\">";
        echo ($context["text_account"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 64
        echo ($context["order"] ?? null);
        echo "\">";
        echo ($context["text_order"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 65
        echo ($context["wishlist"] ?? null);
        echo "\">";
        echo ($context["text_wishlist"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 66
        echo ($context["newsletter"] ?? null);
        echo "\">";
        echo ($context["text_newsletter"] ?? null);
        echo "</a></li>
                    <li><a href=\"";
        // line 67
        echo ($context["contact"] ?? null);
        echo "\">";
        echo ($context["text_contact"] ?? null);
        echo "</a></li>
                  </ul>
                </div>
            </section>
            <div class=\"block-contact col-lg-3 col-md-3 col-sm-12\">
                <div class=\"footer-title clearfix  hidden-lg hidden-md collapsed\" data-target=\"#contact-info-container\" data-toggle=\"collapse\">
                  <span class=\"h3\">";
        // line 73
        echo ($context["text_storeinformation"] ?? null);
        echo "</span>
                  <span class=\"navbar-toggler collapse-icons\">
                    <i class=\"fa fa-angle-down add\"></i>
                    <i class=\"fa fa-angle-up remove\"></i>
                  </span>
                </div>
                <div id=\"contact-info-container\" class=\"collapse footer-dropdown footer-contact\">
                  <h5 class=\"hidden-sm hidden-xs\">";
        // line 80
        echo ($context["text_contact"] ?? null);
        echo "</h5>
                    ";
        // line 81
        if (($context["storeaddress"] ?? null)) {
            // line 82
            echo "                    <div class=\"block address\">
                      <span class=\"icon\"><i class=\"fa fa-map-marker\"></i></span>
                      <div class=\"content\">";
            // line 84
            echo ($context["storeaddress"] ?? null);
            echo "</div>
                    </div>
                    ";
        }
        // line 87
        echo "                    ";
        if (($context["storetelephone"] ?? null)) {
            // line 88
            echo "                    <div class=\"block phone\">
                      <span class=\"icon phone\"><i class=\"fa fa-phone\"></i></span>
                      <div class=\"content\">
                        <a href=\"#\">";
            // line 91
            echo ($context["storetelephone"] ?? null);
            echo "</a>
                      </div>
                    </div>
                    ";
        }
        // line 95
        echo "                    ";
        if (($context["storefax"] ?? null)) {
            // line 96
            echo "                    <div class=\"block fax\">
                      <span class=\"icon\"><i class=\"fa fa-fax\"></i></span>
                      <div class=\"content\">";
            // line 98
            echo ($context["storefax"] ?? null);
            echo "</div>
                    </div>
                    ";
        }
        // line 101
        echo "                    ";
        if (($context["storeemail"] ?? null)) {
            // line 102
            echo "                    <div class=\"block email\">
                      <span class=\"icon\"><i class=\"fa fa-envelope\"></i></span>
                      <div class=\"content\">
                        <a href=\"mailto:";
            // line 105
            echo ($context["storeemail"] ?? null);
            echo "\">";
            echo ($context["storeemail"] ?? null);
            echo "</a>
                      </div>
                    </div>
                    ";
        }
        // line 109
        echo "                </div>
            </div> 
            ";
        // line 111
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
        // line 119
        echo ($context["powered"] ?? null);
        echo "</p>
          </div>
          <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12\">";
        // line 121
        echo ($context["footerafter"] ?? null);
        echo "</div>
        </div>
    </div>
  </div>
  <a id=\"slidetop\" href=\"#\" ></a>
</footer>
";
        // line 127
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 128
            echo "<script src=\"";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
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
        return array (  317 => 130,  308 => 128,  304 => 127,  295 => 121,  290 => 119,  279 => 111,  275 => 109,  266 => 105,  261 => 102,  258 => 101,  252 => 98,  248 => 96,  245 => 95,  238 => 91,  233 => 88,  230 => 87,  224 => 84,  220 => 82,  218 => 81,  214 => 80,  204 => 73,  193 => 67,  187 => 66,  181 => 65,  175 => 64,  169 => 63,  158 => 55,  153 => 53,  143 => 48,  137 => 47,  131 => 46,  125 => 45,  119 => 44,  108 => 36,  103 => 34,  99 => 32,  94 => 29,  83 => 27,  79 => 26,  75 => 24,  73 => 23,  64 => 17,  59 => 15,  48 => 7,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/common/footer.twig", "");
    }
}
