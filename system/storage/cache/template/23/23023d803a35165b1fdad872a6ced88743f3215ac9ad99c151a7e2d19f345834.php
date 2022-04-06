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
class __TwigTemplate_e363802d8f32681f1677f2f804b9eceecb4cf665b68ed22749b069fcbe81447c extends \Twig\Template
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
\t\t\t\t</div>
\t\t\t\t";
            // line 10
            if ((twig_get_attribute($this->env, $this->source, $context["banner"], "showtext", [], "any", false, false, false, 10) == 1)) {
                // line 11
                echo "\t\t\t\t<div class=\"banner-desc\">      \t
\t\t\t\t\t<div class=\"banner-data\">
\t\t\t\t\t\t";
                // line 13
                if (twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 13)) {
                    // line 14
                    echo "\t\t\t\t\t\t<div class=\"banner-title\">";
                    echo twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 14);
                    echo "</div>
\t\t\t\t\t\t";
                }
                // line 16
                echo "\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["banner"], "button_name", [], "any", false, false, false, 16)) {
                    // line 17
                    echo "\t\t\t\t\t\t<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["banner"], "link", [], "any", false, false, false, 17);
                    echo "\" class=\"banner-btn btn-primary\">";
                    echo twig_get_attribute($this->env, $this->source, $context["banner"], "button_name", [], "any", false, false, false, 17);
                    echo "</a>
\t\t\t\t\t\t";
                }
                // line 19
                echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
            }
            // line 22
            echo "\t\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
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
        return array (  106 => 24,  99 => 22,  94 => 19,  86 => 17,  83 => 16,  77 => 14,  75 => 13,  71 => 11,  69 => 10,  61 => 7,  53 => 6,  47 => 4,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/ishibannerblock.twig", "");
    }
}
