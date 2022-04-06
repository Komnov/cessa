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
class __TwigTemplate_5e23edbbd943f49796621a36f0a50caeadecbc116201322bad965d14b21d449a extends \Twig\Template
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
        echo "<div id=\"_desktop_social\">
  <div class=\"block-social col-lg-3 col-sm-5 clearfix\">
    <div id=\"block-container\">
      <ul>
        ";
        // line 5
        if (($context["facebook"] ?? null)) {
            // line 6
            echo "          <li class=\"facebook\"><a href=\"";
            echo ($context["facebook"] ?? null);
            echo "\" ><i class=\"fa fa-facebook\"></i></a></li>
        ";
        }
        // line 8
        echo "        ";
        if (($context["twitter"] ?? null)) {
            // line 9
            echo "          <li class=\"twitter\"><a href=\"";
            echo ($context["twitter"] ?? null);
            echo "\" ><i class=\"fa fa-twitter\"></i></a></li>
        ";
        }
        // line 11
        echo "        ";
        if (($context["youtube"] ?? null)) {
            // line 12
            echo "          <li class=\"youtube\"><a href=\"";
            echo ($context["youtube"] ?? null);
            echo "\" ><i class=\"fa fa-youtube\"></i></a></li>
        ";
        }
        // line 14
        echo "        ";
        if (($context["gplus"] ?? null)) {
            // line 15
            echo "          <li class=\"googleplus\"><a href=\"";
            echo ($context["gplus"] ?? null);
            echo "\"><i class=\"fa fa-google-plus\"></i></a></li>
        ";
        }
        // line 17
        echo "        ";
        if (($context["rss"] ?? null)) {
            // line 18
            echo "          <li class=\"rss\"><a href=\"";
            echo ($context["rss"] ?? null);
            echo "\" ><i class=\"fa fa-rss\"></i></a></li>
        ";
        }
        // line 20
        echo "        ";
        if (($context["pinterest"] ?? null)) {
            // line 21
            echo "          <li class=\"pinterest\"><a href=\"";
            echo ($context["pinterest"] ?? null);
            echo "\" ><i class=\"fa fa-pinterest\"></i></a></li>
        ";
        }
        // line 23
        echo "        ";
        if (($context["vimeo"] ?? null)) {
            // line 24
            echo "          <li class=\"vimeo\"><a href=\"";
            echo ($context["vimeo"] ?? null);
            echo "\" ><i class=\"fa fa-vimeo\"></i></a></li>
        ";
        }
        // line 26
        echo "        ";
        if (($context["instagram"] ?? null)) {
            // line 27
            echo "          <li class=\"instagram\"><a href=\"";
            echo ($context["instagram"] ?? null);
            echo "\" ><i class=\"fa fa-instagram\"></i></a></li>
        ";
        }
        // line 28
        echo "   
      </ul>
      </div>
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
        return array (  114 => 28,  108 => 27,  105 => 26,  99 => 24,  96 => 23,  90 => 21,  87 => 20,  81 => 18,  78 => 17,  72 => 15,  69 => 14,  63 => 12,  60 => 11,  54 => 9,  51 => 8,  45 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/ishisocialfollow.twig", "");
    }
}
