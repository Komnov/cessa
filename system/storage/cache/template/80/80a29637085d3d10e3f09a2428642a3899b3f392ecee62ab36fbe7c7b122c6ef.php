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

/* fashionist/template/extension/module/ishibannerblock.twig */
class __TwigTemplate_96bf70e149815a9a3534dd3560ce8763b044eb73e66a22e66415024ba1ff43e0 extends \Twig\Template
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
        echo "<div id=\"";
        echo ($context["ishi_randomnumer"] ?? null);
        echo "\" class=\"ishibannerblock\">
\t<div class=\"row\">
\t\t";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["banners"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
            // line 4
            echo "\t\t\t<div class=\"bannerblock ";
            echo ($context["column_class"] ?? null);
            echo "\">
\t\t\t\t<div class=\"image-container\">
\t\t\t\t\t<a href=\"";
            // line 6
            echo twig_get_attribute($this->env, $this->source, $context["banner"], "link", [], "any", false, false, false, 6);
            echo "\" class=\"";
            echo ($context["style"] ?? null);
            echo " ";
            echo ($context["scale"] ?? null);
            echo "\">
\t\t\t\t\t\t<img src=\"";
            // line 7
            echo twig_get_attribute($this->env, $this->source, $context["banner"], "image", [], "any", false, false, false, 7);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 7);
            echo "\" class=\"img-responsive\">  
\t\t\t\t\t</a>
\t\t\t\t\t";
            // line 9
            if ((twig_get_attribute($this->env, $this->source, $context["banner"], "showtext", [], "any", false, false, false, 9) == 1)) {
                // line 10
                echo "\t\t\t\t\t\t<div class=\"banner-desc\">      \t
\t\t\t\t\t\t\t<div class=\"banner-data\">
\t\t\t\t\t\t\t\t";
                // line 12
                if (twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 12)) {
                    // line 13
                    echo "\t\t\t\t\t\t\t\t<div class=\"banner-title\">";
                    echo twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 13);
                    echo "</div>
\t\t\t\t\t\t\t\t";
                }
                // line 15
                echo "\t\t\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["banner"], "subtitle", [], "any", false, false, false, 15)) {
                    // line 16
                    echo "\t\t\t\t\t\t\t\t<div class=\"banner-subtitle\">";
                    echo twig_get_attribute($this->env, $this->source, $context["banner"], "subtitle", [], "any", false, false, false, 16);
                    echo "</div>
\t\t\t\t\t\t\t\t";
                }
                // line 18
                echo "\t\t\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["banner"], "button_name", [], "any", false, false, false, 18)) {
                    // line 19
                    echo "\t\t\t\t\t\t\t\t<div href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["banner"], "link", [], "any", false, false, false, 19);
                    echo "\" class=\"banner-btn btn-primary\">";
                    echo twig_get_attribute($this->env, $this->source, $context["banner"], "button_name", [], "any", false, false, false, 19);
                    echo "</div>
\t\t\t\t\t\t\t\t";
                }
                // line 21
                echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 24
            echo "\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "\t</div>\t
</div>";
    }

    public function getTemplateName()
    {
        return "fashionist/template/extension/module/ishibannerblock.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 27,  107 => 24,  102 => 21,  94 => 19,  91 => 18,  85 => 16,  82 => 15,  76 => 13,  74 => 12,  70 => 10,  68 => 9,  61 => 7,  53 => 6,  47 => 4,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/ishibannerblock.twig", "");
    }
}
