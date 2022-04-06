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

/* fashionist/template/extension/module/ishiservicesblock.twig */
class __TwigTemplate_0e70283087f9dd6b25d16777f99e7a2ff94cc1ce137018ef92084a78cd8236ed extends \Twig\Template
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
        echo "<section class=\"ishiservicesblock clearfix\" >
    <div class=\"container\">
        ";
        // line 3
        if ((($context["showtitle"] ?? null) == 1)) {
            // line 4
            echo "            <h3 class=\"home-title\">";
            echo ($context["title"] ?? null);
            echo "</h3>
             <p class=\"sub-title\">";
            // line 5
            echo ($context["subtitle"] ?? null);
            echo "</p>
        ";
        }
        // line 7
        echo "        <div class=\"ishiservices\" style=\"background: ";
        echo ($context["bg_color"] ?? null);
        echo ";\">
    \t\t";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["ishiservices"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["ishiservice"]) {
            // line 9
            echo "                <div class=\"services ";
            echo ($context["class"] ?? null);
            echo "\">
                    <a href=\"#\">
                        <div class=\"service-img\">
                            <span style=\"background-image: url(";
            // line 12
            echo twig_get_attribute($this->env, $this->source, $context["ishiservice"], "image", [], "any", false, false, false, 12);
            echo ");\"></span>
                        </div>
                        <div class=\"service-block\">
                            <div class=\"service-title\">";
            // line 15
            echo twig_get_attribute($this->env, $this->source, $context["ishiservice"], "title", [], "any", false, false, false, 15);
            echo "</div>
                            <div class=\"service-desc\">";
            // line 16
            echo twig_get_attribute($this->env, $this->source, $context["ishiservice"], "description", [], "any", false, false, false, 16);
            echo "</div>
                        </div>
                    </a>
                </div>
    \t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ishiservice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "        </div>
    </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "fashionist/template/extension/module/ishiservicesblock.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 21,  79 => 16,  75 => 15,  69 => 12,  62 => 9,  58 => 8,  53 => 7,  48 => 5,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/ishiservicesblock.twig", "");
    }
}
