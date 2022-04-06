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

/* fashionist/template/extension/module/ishisocialfollow.twig */
class __TwigTemplate_e42d26ec8a974f8c8f65a834d1d503fd8eee231c479172d797d17257a712cb2b extends \Twig\Template
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
        echo "<div class=\"block-social col-lg-3 col-sm-5 clearfix\">
  <div class=\"footer-title clearfix  hidden-lg hidden-md collapsed\" data-target=\"#block-container\" data-toggle=\"collapse\">
    <span class=\"h3\">";
        // line 3
        echo ($context["text_followus"] ?? null);
        echo "</span>
    <span class=\"navbar-toggler collapse-icons\">
      <i class=\"fa fa-angle-down add\"></i>
      <i class=\"fa fa-angle-up remove\"></i>
    </span>
  </div>
  <div id=\"block-container\" class=\"collapse footer-dropdown footer-contact\">
    <ul>
      ";
        // line 11
        if (($context["facebook"] ?? null)) {
            // line 12
            echo "        <li class=\"facebook\"><a href=\"";
            echo ($context["facebook"] ?? null);
            echo "\" ><i class=\"fa fa-facebook\"></i></a></li>
      ";
        }
        // line 14
        echo "      ";
        if (($context["twitter"] ?? null)) {
            // line 15
            echo "        <li class=\"twitter\"><a href=\"";
            echo ($context["twitter"] ?? null);
            echo "\" ><i class=\"fa fa-twitter\"></i></a></li>
      ";
        }
        // line 17
        echo "      ";
        if (($context["youtube"] ?? null)) {
            // line 18
            echo "        <li class=\"youtube\"><a href=\"";
            echo ($context["youtube"] ?? null);
            echo "\" ><i class=\"fa fa-youtube\"></i></a></li>
      ";
        }
        // line 20
        echo "      ";
        if (($context["gplus"] ?? null)) {
            // line 21
            echo "        <li class=\"googleplus\"><a href=\"";
            echo ($context["gplus"] ?? null);
            echo "\"><i class=\"fa fa-google-plus\"></i></a></li>
      ";
        }
        // line 23
        echo "      ";
        if (($context["rss"] ?? null)) {
            // line 24
            echo "        <li class=\"rss\"><a href=\"";
            echo ($context["rss"] ?? null);
            echo "\" ><i class=\"fa fa-rss\"></i></a></li>
      ";
        }
        // line 26
        echo "      ";
        if (($context["pinterest"] ?? null)) {
            // line 27
            echo "        <li class=\"pinterest\"><a href=\"";
            echo ($context["pinterest"] ?? null);
            echo "\" ><i class=\"fa fa-pinterest\"></i></a></li>
      ";
        }
        // line 29
        echo "      ";
        if (($context["vimeo"] ?? null)) {
            // line 30
            echo "        <li class=\"vimeo\"><a href=\"";
            echo ($context["vimeo"] ?? null);
            echo "\" ><i class=\"fa fa-vimeo\"></i></a></li>
      ";
        }
        // line 32
        echo "      ";
        if (($context["instagram"] ?? null)) {
            // line 33
            echo "        <li class=\"instagram\"><a href=\"";
            echo ($context["instagram"] ?? null);
            echo "\" ><i class=\"fa fa-instagram\"></i></a></li>
      ";
        }
        // line 34
        echo "   
    </ul>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "fashionist/template/extension/module/ishisocialfollow.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 34,  117 => 33,  114 => 32,  108 => 30,  105 => 29,  99 => 27,  96 => 26,  90 => 24,  87 => 23,  81 => 21,  78 => 20,  72 => 18,  69 => 17,  63 => 15,  60 => 14,  54 => 12,  52 => 11,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/ishisocialfollow.twig", "");
    }
}
