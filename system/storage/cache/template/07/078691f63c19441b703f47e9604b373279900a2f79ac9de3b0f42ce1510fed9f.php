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

/* fashionist/template/information/blogger.twig */
class __TwigTemplate_754357fcdf2ffdf8733d5cb48880692e5025a9a3e1873ab00bbb58c109ade2e2 extends \Twig\Template
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
        echo ($context["header"] ?? null);
        echo "
<div class=\"breadcrumb-container\">
\t<h2 class=\"page-title\">";
        // line 3
        echo ($context["heading_title"] ?? null);
        echo "</h2>
\t<ul class=\"breadcrumb\">
\t\t\t";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 6
            echo "\t\t\t<li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 6);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 6);
            echo "</a></li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "\t\t</ul>
</div>
<div class=\"container\">
  <div class=\"wrapper_container row\">
  \t";
        // line 12
        echo ($context["column_left"] ?? null);
        echo "
    ";
        // line 13
        if ((($context["column_left"] ?? null) && ($context["column_right"] ?? null))) {
            // line 14
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 15
            echo "    ";
        } elseif ((($context["column_left"] ?? null) || ($context["column_right"] ?? null))) {
            // line 16
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 17
            echo "    ";
        } else {
            // line 18
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 19
            echo "    ";
        }
        // line 20
        echo "    <div id=\"content\" class=\"";
        echo ($context["class"] ?? null);
        echo " single-blog\">";
        echo ($context["content_top"] ?? null);
        echo "
      <div class=\"page-item-title\">
      \t<h1>";
        // line 22
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      </div>
      ";
        // line 24
        if ((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["blogs"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["image"] ?? null) : null)) {
            echo " 
\t  \t\t<div class=\"blog-img\">
\t  \t\t\t<img src=\"";
            // line 26
            echo (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["blogs"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["image"] ?? null) : null);
            echo "\" alt=\"";
            echo ($context["heading_title"] ?? null);
            echo "\" title=\"";
            echo ($context["heading_title"] ?? null);
            echo "\" class=\"img-responsive\" />
\t  \t\t</div>
\t  ";
        }
        // line 29
        echo "\t  <div class=\"blog-date\">";
        echo ($context["date"] ?? null);
        echo "</div>
\t  <div class=\"blog-desc\"> ";
        // line 30
        echo ($context["description"] ?? null);
        echo " </div>
      ";
        // line 31
        if (($context["success"] ?? null)) {
            echo " 
      \t<div class=\"alert alert-success\"><i class=\"fa fa-check-circle\"></i> ";
            // line 32
            echo ($context["success"] ?? null);
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>
      ";
        }
        // line 34
        echo "      <div class=\"smartblogcomments\">
\t      ";
        // line 35
        if (($context["blog_comments"] ?? null)) {
            echo " 
\t      \t\t<div class=\"reply-title\">";
            // line 36
            echo ($context["text_your_comments"] ?? null);
            echo "</div>
\t\t        ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["blog_comments"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["blog_comment"]) {
                echo " 
\t\t\t        <div class=\"view-comment\">
        \t\t\t\t<div class=\"user_icon\"><i class=\"fa fa-user-o\"></i></div>
        \t\t\t\t<div class=\"user_list\">
        \t\t\t\t\t<div class=\"name\">";
                // line 41
                echo ($context["entry_author"] ?? null);
                echo " : ";
                echo twig_get_attribute($this->env, $this->source, $context["blog_comment"], "author", [], "any", false, false, false, 41);
                echo "</div>
        \t\t\t\t\t<div class=\"date\">";
                // line 42
                echo ($context["text_date_added"] ?? null);
                echo " : ";
                echo twig_get_attribute($this->env, $this->source, $context["blog_comment"], "date_added", [], "any", false, false, false, 42);
                echo "</div>
        \t\t\t\t\t<div class=\"comment-text\">";
                // line 43
                echo twig_get_attribute($this->env, $this->source, $context["blog_comment"], "comment", [], "any", false, false, false, 43);
                echo "</div>
        \t\t\t\t</div>
\t\t\t        </div>
\t\t      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['blog_comment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo " 
\t      ";
        }
        // line 48
        echo "\t  </div>
      ";
        // line 49
        if (($context["allow_comments"] ?? null)) {
            // line 50
            echo "\t  <div class=\"block-title\"><div class=\"reply-title\">";
            echo ($context["button_comment_add"] ?? null);
            echo "</div></div>
      <div class=\"panel panel-default\" id=\"add-comment\">
        ";
            // line 52
            if ((($context["login_required"] ?? null) &&  !($context["is_logged"] ?? null))) {
                echo " 
        \t<h4 class=\"text-center\">";
                // line 53
                echo ($context["text_login_required"] ?? null);
                echo "</h4>
        ";
            } else {
                // line 54
                echo " 
\t        <form action=\"";
                // line 55
                echo ($context["action"] ?? null);
                echo "\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
\t          <div class=\"form-group required\">
\t            <label class=\"col-sm-3 control-label\" for=\"input-author\">";
                // line 57
                echo ($context["entry_author"] ?? null);
                echo "</label>
\t            <div class=\"col-sm-9\">
\t              <input type=\"text\" name=\"author\" value=\"";
                // line 59
                echo ($context["author"] ?? null);
                echo "\" id=\"input-author\" placeholder=\"";
                echo ($context["entry_author"] ?? null);
                echo "\" class=\"form-control\" />
\t              ";
                // line 60
                if (($context["error_author"] ?? null)) {
                    echo " 
\t              <div class=\"text-danger\">";
                    // line 61
                    echo ($context["error_author"] ?? null);
                    echo "</div>
\t              ";
                }
                // line 62
                echo " 
\t            </div>
\t          </div>
\t          <div class=\"form-group required\">
\t            <label class=\"col-sm-3 control-label\" for=\"input-email\">";
                // line 66
                echo ($context["entry_email"] ?? null);
                echo "</label>
\t            <div class=\"col-sm-9\">
\t              <input type=\"text\" name=\"email\" value=\"";
                // line 68
                echo ($context["email"] ?? null);
                echo "\" id=\"input-email\" placeholder=\"";
                echo ($context["entry_email"] ?? null);
                echo "\" class=\"form-control\" />
\t              ";
                // line 69
                if (($context["error_email"] ?? null)) {
                    echo " 
\t              <div class=\"text-danger\">";
                    // line 70
                    echo ($context["error_email"] ?? null);
                    echo "</div>
\t              ";
                }
                // line 71
                echo " 
\t            </div>
\t          </div>
\t          <div class=\"form-group\">
\t            <label class=\"col-sm-3 control-label\" for=\"input-comment\">";
                // line 75
                echo ($context["entry_comment"] ?? null);
                echo "</label>
\t            <div class=\"col-sm-9\">
\t              <textarea name=\"comment\" rows=\"10\" id=\"input-comment\" class=\"form-control\" />";
                // line 77
                echo ($context["comment"] ?? null);
                echo "</textarea>
\t              ";
                // line 78
                if (($context["error_comment"] ?? null)) {
                    echo " 
\t              <div class=\"text-danger\">";
                    // line 79
                    echo ($context["error_comment"] ?? null);
                    echo "</div>
\t              ";
                }
                // line 80
                echo " 
\t            </div>
\t          </div>
\t          ";
                // line 83
                echo ($context["captcha"] ?? null);
                echo " 
\t          <input type=\"hidden\" name=\"auto_approve\" value=\"";
                // line 84
                echo ($context["auto_approve"] ?? null);
                echo "\" />
\t\t\t  <div class=\"col-sm-3\"></div>
\t          <div class=\"col-sm-10 submit-btn buttons text-left\">
\t\t\t  \t\t<input class=\"btn btn-primary\" type=\"submit\" value=\"";
                // line 87
                echo ($context["button_submit"] ?? null);
                echo "\" title=\"";
                echo ($context["button_submit"] ?? null);
                echo "\" />
\t\t\t  </div>
\t        </form>
        ";
            }
            // line 91
            echo "      </div>
      <div class=\"buttons text-right\"></div>
      
     ";
        }
        // line 95
        echo "    ";
        echo ($context["content_middle"] ?? null);
        echo ($context["content_bottom"] ?? null);
        echo "</div>
  ";
        // line 96
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
";
        // line 98
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "fashionist/template/information/blogger.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  323 => 98,  318 => 96,  312 => 95,  306 => 91,  297 => 87,  291 => 84,  287 => 83,  282 => 80,  277 => 79,  273 => 78,  269 => 77,  264 => 75,  258 => 71,  253 => 70,  249 => 69,  243 => 68,  238 => 66,  232 => 62,  227 => 61,  223 => 60,  217 => 59,  212 => 57,  207 => 55,  204 => 54,  199 => 53,  195 => 52,  189 => 50,  187 => 49,  184 => 48,  180 => 46,  170 => 43,  164 => 42,  158 => 41,  149 => 37,  145 => 36,  141 => 35,  138 => 34,  133 => 32,  129 => 31,  125 => 30,  120 => 29,  110 => 26,  105 => 24,  100 => 22,  92 => 20,  89 => 19,  86 => 18,  83 => 17,  80 => 16,  77 => 15,  74 => 14,  72 => 13,  68 => 12,  62 => 8,  51 => 6,  47 => 5,  42 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/information/blogger.twig", "");
    }
}
