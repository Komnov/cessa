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

/* fashionist/template/extension/module/ishimanufacturerblock.twig */
class __TwigTemplate_3318ac3a9125fb199049020be4c8f5ae29c8a20c440f0f94bde7a9b38dcfbdae extends \Twig\Template
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
        echo "<section id=\"";
        echo ($context["ishi_randomnumer"] ?? null);
        echo "\" class=\"manufacturerblock container clearfix\">
    <div class=\"owl-carousel\">
        ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["manufacturers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
            // line 4
            echo "    <div class=\"item\">
                ";
            // line 5
            if (twig_get_attribute($this->env, $this->source, $context["manufacturer"], "link", [], "any", false, false, false, 5)) {
                // line 6
                echo "                    <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "link", [], "any", false, false, false, 6);
                echo "\">
                        <img src=\"";
                // line 7
                echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "image", [], "any", false, false, false, 7);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "title", [], "any", false, false, false, 7);
                echo "\" class=\"img-responsive\" />
        </a>
                ";
            } else {
                // line 10
                echo "                    <img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "image", [], "any", false, false, false, 10);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "title", [], "any", false, false, false, 10);
                echo "\" class=\"img-responsive\" />
                ";
            }
            // line 12
            echo "    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "    </div>
    <script type=\"text/javascript\">
        \$('#";
        // line 16
        echo ($context["ishi_randomnumer"] ?? null);
        echo " .owl-carousel').owlCarousel({
            loop:";
        // line 17
        echo ($context["loop"] ?? null);
        echo ",
            nav:false,
            dots:false,
            autoplay:";
        // line 20
        echo ($context["autoplay"] ?? null);
        echo ",
            animateOut: 'fadeOut',
            rtl: \$('html').attr('dir') == 'rtl'? true : false,
            navText: [\"<i class='fa fa-angle-left'></i>\",\"<i class='fa fa-angle-right'></i>\"],
            responsive:{
                    0:{
                        items:2
                    },
                    480:{
                        items:3
                    },
                    768:{
                        items:4
                    },
                    992:{
                        items:5
                    },
                    1200:{
                        items:6
                    }
                }
        });
    </script>
</section>";
    }

    public function getTemplateName()
    {
        return "fashionist/template/extension/module/ishimanufacturerblock.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 20,  88 => 17,  84 => 16,  80 => 14,  73 => 12,  65 => 10,  57 => 7,  52 => 6,  50 => 5,  47 => 4,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/ishimanufacturerblock.twig", "");
    }
}
