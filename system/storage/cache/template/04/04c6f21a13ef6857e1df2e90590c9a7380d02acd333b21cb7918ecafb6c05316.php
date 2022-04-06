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

/* fashionist/template/extension/module/ishitestimonialsblock.twig */
class __TwigTemplate_0edd0b67130630983e9cd7861289171155d503a6bfecf16aaab0ee9246fc05b1 extends \Twig\Template
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
        echo "<div class=\"ishitestimonials col-lg-4 col-sm-12 col-md-12 col-xs-12\">
\t\t";
        // line 2
        if (($context["title"] ?? null)) {
            // line 3
            echo "\t\t\t<h2 class=\"home-title\">";
            echo ($context["title"] ?? null);
            echo "</h2>
\t\t";
        }
        // line 5
        echo "\t\t<div id=\"";
        echo ($context["random_id"] ?? null);
        echo "\" class=\"ishitestimonials-container\" data-source-url=\"";
        echo ($context["bgimage"] ?? null);
        echo "\" style=\"background-image: url(";
        echo ($context["bgimage"] ?? null);
        echo ")\">
\t\t\t<div class=\"owl-carousel\">\t\t\t\t
\t\t\t\t";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["ishitestimonials"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["ishitestimonial"]) {
            // line 8
            echo "\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t<div class=\"user-details\">
\t\t\t\t\t\t\t<div class=\"testimonial-img\">
\t\t\t\t\t\t\t\t<img src=\"";
            // line 11
            echo twig_get_attribute($this->env, $this->source, $context["ishitestimonial"], "image", [], "any", false, false, false, 11);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["ishitestimonial"], "username", [], "any", false, false, false, 11);
            echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"user-detail\">
\t\t\t\t\t\t\t\t<span class=\"user-name\">
\t\t\t\t\t\t\t\t\t";
            // line 15
            echo twig_get_attribute($this->env, $this->source, $context["ishitestimonial"], "username", [], "any", false, false, false, 15);
            echo "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<span class=\"user-designation\">
\t\t\t\t\t\t\t\t\t";
            // line 18
            echo twig_get_attribute($this->env, $this->source, $context["ishitestimonial"], "designation", [], "any", false, false, false, 18);
            echo "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<div class=\"user-description\">
\t\t\t\t\t\t\t\t\t";
            // line 21
            echo twig_get_attribute($this->env, $this->source, $context["ishitestimonial"], "description", [], "any", false, false, false, 21);
            echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ishitestimonial'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "\t\t\t\t
\t\t\t</div>
\t\t</div>
\t    <script type=\"text/javascript\">  
\t        \$('#";
        // line 30
        echo ($context["random_id"] ?? null);
        echo " .owl-carousel').owlCarousel({
\t            loop:true,
\t            nav: false,
\t\t\t\tdotsClass: 'owl-dots ";
        // line 33
        echo ($context["dot_style"] ?? null);
        echo "',
\t            dots:";
        // line 34
        echo ($context["dot"] ?? null);
        echo ",
\t\t\t\tautoplay:";
        // line 35
        echo ($context["autoplay"] ?? null);
        echo ",
\t            rtl: \$('html').attr('dir') == 'rtl'? true : false,
\t            navText: [\"<i class='fa fa-arrow-left'></i>\",\"<i class='fa fa-arrow-right'></i>\"],
\t            items:1
\t        });
\t    </script>
\t\t<style>
\t\t\t#";
        // line 42
        echo ($context["random_id"] ?? null);
        echo "{
\t\t\t\tbackground-color: ";
        // line 43
        echo ($context["bgcolor"] ?? null);
        echo "
\t\t\t}
\t\t</style>
</div>";
    }

    public function getTemplateName()
    {
        return "fashionist/template/extension/module/ishitestimonialsblock.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 43,  130 => 42,  120 => 35,  116 => 34,  112 => 33,  106 => 30,  100 => 26,  88 => 21,  82 => 18,  76 => 15,  67 => 11,  62 => 8,  58 => 7,  48 => 5,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/ishitestimonialsblock.twig", "");
    }
}
