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

/* fashionist/template/common/menu.twig */
class __TwigTemplate_938a332583f217d51c0c43fe530ad0867f1eb38ac8afa9b4e875dbea8ff24274 extends \Twig\Template
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
        echo "
";
        // line 2
        if (($context["categories"] ?? null)) {
            // line 3
            echo "    <div id=\"_desktop_top_menu\" class=\"menu js-top-menu hidden-xs hidden-sm ";
            echo ($context["ishome"] ?? null);
            echo "\">
        ";
            // line 5
            echo "          <ul id=\"top-menu\" class=\"top-menu\" data-depth=\"0\">
            ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 7
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 7)) {
                    // line 8
                    echo "            ";
                    $context["temprand"] = twig_random($this->env, 10000);
                    // line 9
                    echo "            <li class=\"top_level_category dropdown\">
              <a class=\"dropdown-item\" href=\"";
                    // line 10
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 10);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 10);
                    echo "
              </a>
              <span class=\"pull-xs-right hidden-md hidden-lg\">
                  <span data-target=\"#top_sub_menu_";
                    // line 13
                    echo ($context["temprand"] ?? null);
                    echo "\" data-toggle=\"collapse\" class=\"navbar-toggler collapse-icons\">
                    <i class=\"fa fa-angle-down add\"></i>
                    <i class=\"fa fa-angle-up remove\"></i>
                  </span>
              </span>
              <div id=\"top_sub_menu_";
                    // line 18
                    echo ($context["temprand"] ?? null);
                    echo "\" class=\"dropdown-menu popover sub-menu collapse\">
                  ";
                    // line 19
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_array_batch(twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 19), (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 19)) / twig_round(twig_get_attribute($this->env, $this->source, $context["category"], "column", [], "any", false, false, false, 19), 1, "ceil"))));
                    foreach ($context['_seq'] as $context["_key"] => $context["children"]) {
                        // line 20
                        echo "                  <ul class=\"list-unstyled childs_1 category_dropdownmenu ";
                        if ((twig_get_attribute($this->env, $this->source, $context["category"], "column", [], "any", false, false, false, 20) <= 1)) {
                            echo " ";
                            echo "single-dropdown-menu";
                            echo " ";
                        } else {
                            echo " ";
                            echo "multiple-dropdown-menu";
                            echo " ";
                        }
                        echo "\" data-depth=\"1\">

                    ";
                        // line 22
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["children"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                            echo "   ";
                            // line 23
                            echo "                    ";
                            if (twig_get_attribute($this->env, $this->source, $context["child"], "childs", [], "any", false, false, false, 23)) {
                                // line 24
                                echo "                    ";
                                $context["temprand"] = twig_random($this->env, 10000);
                                // line 25
                                echo "                      <li class=\"category dropdown sub-category\">
                        <a class=\"dropdown-item dropdown-submenu\" href=\"";
                                // line 26
                                echo twig_get_attribute($this->env, $this->source, $context["child"], "href", [], "any", false, false, false, 26);
                                echo "\">";
                                echo twig_get_attribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 26);
                                echo "</a>
                        <span class=\"pull-xs-right hidden-md hidden-lg\">
                            <span data-target=\"#top_sub_menu_";
                                // line 28
                                echo ($context["temprand"] ?? null);
                                echo "\" data-toggle=\"collapse\" class=\"navbar-toggler collapse-icons\">
                              <i class=\"fa fa-angle-down add\"></i>
                              <i class=\"fa fa-angle-up remove\"></i>
                            </span>
                        </span>
                        <div id=\"top_sub_menu_";
                                // line 33
                                echo ($context["temprand"] ?? null);
                                echo "\" class=\"dropdown-inner collapse\">
                            ";
                                // line 34
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(twig_array_batch(twig_get_attribute($this->env, $this->source, $context["child"], "childs", [], "any", false, false, false, 34), (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "childs", [], "any", false, false, false, 34)) / twig_round(twig_get_attribute($this->env, $this->source, $context["child"], "column", [], "any", false, false, false, 34), 1, "ceil"))));
                                foreach ($context['_seq'] as $context["_key"] => $context["childs_col"]) {
                                    // line 35
                                    echo "                            <ul class=\"list-unstyled childs_2 top-menu\" data-depth=\"2\">
                              ";
                                    // line 36
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable($context["childs_col"]);
                                    foreach ($context['_seq'] as $context["_key"] => $context["childs_2"]) {
                                        // line 37
                                        echo "                              <li class=\"category\">
                                <a class=\"dropdown-item\" href=\"";
                                        // line 38
                                        echo twig_get_attribute($this->env, $this->source, $context["childs_2"], "href", [], "any", false, false, false, 38);
                                        echo "\">";
                                        echo twig_get_attribute($this->env, $this->source, $context["childs_2"], "name", [], "any", false, false, false, 38);
                                        echo "</a>
                              </li>
                              ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['childs_2'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 41
                                    echo "                            </ul>
                            ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['childs_col'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 43
                                echo "                        </div>
                      </li>
                    ";
                            } else {
                                // line 46
                                echo "                      <li><a href=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["child"], "href", [], "any", false, false, false, 46);
                                echo "\">";
                                echo twig_get_attribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 46);
                                echo "</a></li>
                    ";
                            }
                            // line 47
                            echo "   ";
                            // line 48
                            echo "                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 49
                        echo "                  </ul>
                  ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['children'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 51
                    echo "              </div>
            </li>
            ";
                } else {
                    // line 54
                    echo "            <li class=\"maintitle\"><a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 54);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 54);
                    echo "</a></li>
            ";
                }
                // line 56
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "            ";
            if ((($context["blog_enable"] ?? null) == true)) {
                // line 58
                echo "            <li> <a href=\"";
                echo ($context["all_blogs"] ?? null);
                echo "\">
              <span data-hover=\"";
                // line 59
                echo ($context["text_blog"] ?? null);
                echo "\">";
                echo ($context["text_blog"] ?? null);
                echo "</span>
            </a></li>       
            ";
            }
            // line 61
            echo "   
          </ul>
    </div>    
    <div id=\"mobile_top_menu_wrapper\" class=\"hidden-lg hidden-md\" style=\"display:none;\">
      <div id=\"top_menu_closer\">
        <i class=\"fa fa-close\"></i>
      </div>
      <div class=\"js-top-menu mobile\" id=\"_mobile_top_menu\"></div>
    </div>  
";
        }
        // line 70
        echo "  ";
    }

    public function getTemplateName()
    {
        return "fashionist/template/common/menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 70,  229 => 61,  221 => 59,  216 => 58,  213 => 57,  207 => 56,  199 => 54,  194 => 51,  187 => 49,  181 => 48,  179 => 47,  171 => 46,  166 => 43,  159 => 41,  148 => 38,  145 => 37,  141 => 36,  138 => 35,  134 => 34,  130 => 33,  122 => 28,  115 => 26,  112 => 25,  109 => 24,  106 => 23,  101 => 22,  87 => 20,  83 => 19,  79 => 18,  71 => 13,  63 => 10,  60 => 9,  57 => 8,  54 => 7,  50 => 6,  47 => 5,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/common/menu.twig", "");
    }
}
