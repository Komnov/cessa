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

/* extension/module/ishibannerblock.twig */
class __TwigTemplate_8a1b4964ac9300fb4f85c05dd416ef59327ab9a70c214ab0d3c44897ca69c05b extends \Twig\Template
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
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-module\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 17
        if (($context["error_warning"] ?? null)) {
            // line 18
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 22
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 24
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 27
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal\">
\t\t\t<div class=\"tab-pane\" id=\"tab-design\">
\t\t\t\t<ul class=\"nav nav-tabs\">
\t\t\t\t\t<li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
        // line 30
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
\t\t\t\t\t<li><a href=\"#tab-banner\" data-toggle=\"tab\">";
        // line 31
        echo ($context["entry_banner"] ?? null);
        echo "</a></li>
\t\t\t\t</ul>
\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t<div class=\"tab-pane active\" id=\"tab-general\">
\t\t\t\t\t  <div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 36
        echo ($context["entry_name"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t  <input type=\"text\" name=\"name\" value=\"";
        // line 38
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\" />
\t\t\t\t\t\t  ";
        // line 39
        if (($context["error_name"] ?? null)) {
            // line 40
            echo "\t\t\t\t\t\t  <div class=\"text-danger\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
\t\t\t\t\t\t  ";
        }
        // line 42
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t  </div>
\t\t\t\t\t  <div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-width\">";
        // line 45
        echo ($context["entry_width"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t  <input type=\"text\" name=\"width\" value=\"";
        // line 47
        echo ($context["width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-width\" class=\"form-control\" />
\t\t\t\t\t\t  ";
        // line 48
        if (($context["error_width"] ?? null)) {
            // line 49
            echo "\t\t\t\t\t\t  <div class=\"text-danger\">";
            echo ($context["error_width"] ?? null);
            echo "</div>
\t\t\t\t\t\t  ";
        }
        // line 51
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t  </div>
\t\t\t\t\t  <div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-height\">";
        // line 54
        echo ($context["entry_height"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t  <input type=\"text\" name=\"height\" value=\"";
        // line 56
        echo ($context["height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-height\" class=\"form-control\" />
\t\t\t\t\t\t  ";
        // line 57
        if (($context["error_height"] ?? null)) {
            // line 58
            echo "\t\t\t\t\t\t  <div class=\"text-danger\">";
            echo ($context["error_height"] ?? null);
            echo "</div>
\t\t\t\t\t\t  ";
        }
        // line 60
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t  </div>
\t\t\t\t\t  <div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-column\">";
        // line 63
        echo ($context["entry_column"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<select name=\"column\" id=\"input-column\" class=\"form-control\">
\t\t\t\t\t\t\t\t<option value=\"1\" ";
        // line 66
        if ((($context["column"] ?? null) == 1)) {
            echo " selected=selected ";
        }
        echo ">1</option>
\t\t\t\t\t\t\t\t<option value=\"2\" ";
        // line 67
        if ((($context["column"] ?? null) == 2)) {
            echo " selected=selected ";
        }
        echo ">2</option>
\t\t\t\t\t\t\t\t<option value=\"3\" ";
        // line 68
        if ((($context["column"] ?? null) == 3)) {
            echo " selected=selected ";
        }
        echo ">3</option>
\t\t\t\t\t\t\t\t<option value=\"4\" ";
        // line 69
        if ((($context["column"] ?? null) == 4)) {
            echo " selected=selected ";
        }
        echo ">4</option>
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t  </div>
\t\t\t\t\t  <div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-scale\">";
        // line 74
        echo ($context["entry_scale"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<label class=\"switch\">
\t\t\t\t\t\t\t";
        // line 77
        if (($context["scale"] ?? null)) {
            // line 78
            echo "\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"scale\" value=\"1\" class=\"primary\" checked=\"checked\" id=\"input-scale\" />
\t\t\t\t\t\t\t";
        } else {
            // line 80
            echo "\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"scale\" value=\"1\" class=\"primary\" id=\"input-scale\" />
\t\t\t\t\t\t\t";
        }
        // line 82
        echo "\t\t\t\t\t\t\t\t<span class=\"slider round\"></span>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t  </div>
\t\t\t\t\t  <div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 87
        echo ($context["entry_status"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t  <select name=\"status\" id=\"input-status\" class=\"form-control\">
\t\t\t\t\t\t\t";
        // line 90
        if (($context["status"] ?? null)) {
            // line 91
            echo "\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t<option value=\"0\">";
            // line 92
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t";
        } else {
            // line 94
            echo "\t\t\t\t\t\t\t<option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 95
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        // line 97
        echo "\t\t\t\t\t\t  </select>
\t\t\t\t\t\t</div>
\t\t\t\t\t  </div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-banner\">
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-sm-2\">
\t\t\t\t\t\t\t\t<ul class=\"nav nav-pills nav-stacked\" id=\"bannerstab\">
\t\t\t\t\t\t\t\t\t";
        // line 105
        $context["banner_row"] = 0;
        // line 106
        echo "\t\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["ishi_banners"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["ishi_banner"]) {
            // line 107
            echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#tab-singlebanner";
            echo ($context["banner_row"] ?? null);
            echo "\" data-toggle=\"tab\"><i class=\"fa fa-minus-circle\" onclick=\"\$('a[href=\\'#tab-singlebanner";
            echo ($context["banner_row"] ?? null);
            echo "\\']').parent().remove(); \$('#tab-singlebanner";
            echo ($context["banner_row"] ?? null);
            echo "').remove(); \$('#bannerstab a:first').tab('show');\"></i>";
            echo twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "default_name", [], "any", false, false, false, 107);
            echo " </a></li>
\t\t\t\t\t\t\t\t\t";
            // line 108
            $context["banner_row"] = (($context["banner_row"] ?? null) + 1);
            // line 109
            echo "\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ishi_banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo "\t\t\t\t\t\t\t\t\t<li><button type=\"button\" class=\"btn btn-block\" onclick=\"addbannertab();\"><i class=\"fa fa-plus-circle\"></i> ";
        echo ($context["entry_addbanner"] ?? null);
        echo " </button></li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t\t <div class=\"tab-content\" id=\"ishi_bannertabs\">";
        // line 114
        $context["banner_row"] = 0;
        // line 115
        echo "\t\t\t\t\t\t\t\t ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["ishi_banners"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["ishi_banner"]) {
            // line 116
            echo "\t\t\t\t\t\t\t\t <div class=\"tab-pane\" id=\"tab-singlebanner";
            echo ($context["banner_row"] ?? null);
            echo "\">
\t\t\t\t\t\t\t\t <div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-image-";
            // line 118
            echo ($context["banner_row"] ?? null);
            echo "\">";
            echo ($context["entry_image"] ?? null);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"\" id=\"thumb-image-";
            // line 120
            echo ($context["banner_row"] ?? null);
            echo "\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "thumb", [], "any", false, false, false, 120);
            echo "\" alt=\"\" title=\"\" data-placeholder=\"";
            echo twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "placeholder", [], "any", false, false, false, 120);
            echo "\" /></a>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"ishibanner[";
            // line 121
            echo ($context["banner_row"] ?? null);
            echo "][image]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "image", [], "any", false, false, false, 121);
            echo "\" id=\"input-image-";
            echo ($context["banner_row"] ?? null);
            echo "\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-showtext\">";
            // line 125
            echo ($context["entry_showtext"] ?? null);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"switch\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 128
            if (twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "showtext", [], "any", false, false, false, 128)) {
                // line 129
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"ishibanner[";
                echo ($context["banner_row"] ?? null);
                echo "][showtext]\" value=\"1\" class=\"primary\" checked=\"checked\" id=\"input-showtext\" onclick=\"boxDisable('tab-singlebanner";
                echo ($context["banner_row"] ?? null);
                echo "', \$(this));\" />
\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 131
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"ishibanner[";
                echo ($context["banner_row"] ?? null);
                echo "][showtext]\" value=\"1\" class=\"primary\" id=\"input-showtext\" onclick=\"boxDisable('tab-singlebanner";
                echo ($context["banner_row"] ?? null);
                echo "', \$(this));\" />
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 133
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"slider round\"></span>
\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group showtext ";
            // line 137
            if (twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "showtext", [], "any", false, false, false, 137)) {
                echo " show ";
            }
            echo " tab-singlebanner";
            echo ($context["banner_row"] ?? null);
            echo "show\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-title-";
            // line 138
            echo ($context["banner_row"] ?? null);
            echo "\">";
            echo ($context["entry_title"] ?? null);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 140
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 141
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\"><span class=\"input-group-addon\"><img src=\"language/";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 141);
                echo "/";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 141);
                echo ".png\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 141);
                echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"ishibanner[";
                // line 142
                echo ($context["banner_row"] ?? null);
                echo "][title][";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 142);
                echo "]\" value=\"";
                echo (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "title", [], "any", false, false, false, 142)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 142)] ?? null) : null);
                echo "\" placeholder=\"";
                echo ($context["entry_title"] ?? null);
                echo "\" class=\"form-control\" id=\"input-title-";
                echo ($context["banner_row"] ?? null);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t</div> 
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 145
            echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group showtext ";
            // line 147
            if (twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "showtext", [], "any", false, false, false, 147)) {
                echo " show ";
            }
            echo " tab-singlebanner";
            echo ($context["banner_row"] ?? null);
            echo "show\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-subtitle-";
            // line 148
            echo ($context["banner_row"] ?? null);
            echo "\">";
            echo ($context["entry_subtitle"] ?? null);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 150
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 151
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\"><span class=\"input-group-addon\"><img src=\"language/";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 151);
                echo "/";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 151);
                echo ".png\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 151);
                echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"ishibanner[";
                // line 152
                echo ($context["banner_row"] ?? null);
                echo "][subtitle][";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 152);
                echo "]\" value=\"";
                echo (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "subtitle", [], "any", false, false, false, 152)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 152)] ?? null) : null);
                echo "\" placeholder=\"";
                echo ($context["entry_subtitle"] ?? null);
                echo "\" class=\"form-control\" id=\"input-subtitle-";
                echo ($context["banner_row"] ?? null);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t</div> 
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 155
            echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group showtext ";
            // line 157
            if (twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "showtext", [], "any", false, false, false, 157)) {
                echo " show ";
            }
            echo " tab-singlebanner";
            echo ($context["banner_row"] ?? null);
            echo "show\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-department-";
            // line 158
            echo ($context["banner_row"] ?? null);
            echo "\">";
            echo ($context["entry_button"] ?? null);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 160
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 161
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\"><span class=\"input-group-addon\"><img src=\"language/";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 161);
                echo "/";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 161);
                echo ".png\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 161);
                echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"ishibanner[";
                // line 162
                echo ($context["banner_row"] ?? null);
                echo "][button_name][";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 162);
                echo "]\" value=\"";
                echo (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "button_name", [], "any", false, false, false, 162)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 162)] ?? null) : null);
                echo "\" placeholder=\"";
                echo ($context["entry_button"] ?? null);
                echo "\" class=\"form-control\" id=\"input-department-";
                echo ($context["banner_row"] ?? null);
                echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div> 
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 165
            echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-link-";
            // line 168
            echo ($context["banner_row"] ?? null);
            echo "\">";
            echo ($context["entry_link"] ?? null);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"ishibanner[";
            // line 170
            echo ($context["banner_row"] ?? null);
            echo "][link]\" value=\"";
            echo ((twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "link", [], "any", false, false, false, 170)) ? (twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "link", [], "any", false, false, false, 170)) : (""));
            echo "\" placeholder=\"";
            echo ($context["entry_link"] ?? null);
            echo "\" class=\"form-control\" id=\"input-link-";
            echo ($context["banner_row"] ?? null);
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-sort-order-";
            // line 174
            echo ($context["banner_row"] ?? null);
            echo "\">";
            echo ($context["entry_sortorder"] ?? null);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"ishibanner[";
            // line 176
            echo ($context["banner_row"] ?? null);
            echo "][sort_order]\" value=\"";
            echo ((twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "sort_order", [], "any", false, false, false, 176)) ? (twig_get_attribute($this->env, $this->source, $context["ishi_banner"], "sort_order", [], "any", false, false, false, 176)) : (""));
            echo "\" placeholder=\"";
            echo ($context["entry_sortorder"] ?? null);
            echo "\" class=\"form-control\" id=\"input-sort-order-";
            echo ($context["banner_row"] ?? null);
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t </div>
\t\t\t\t\t\t\t\t ";
            // line 180
            $context["banner_row"] = (($context["banner_row"] ?? null) + 1);
            // line 181
            echo "\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ishi_banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 182
        echo "\t\t\t\t\t\t\t\t </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
        </form>
      </div>
    </div>
  </div>
</div>
<style>
/* The switch - the box around the slider */
.showtext{
\tdisplay:none;
}
.show{
\tdisplay:block;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: \"\";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.default:checked + .slider {
  background-color: #444;
}
input.primary:checked + .slider {
  background-color: #2196F3;
}
input.success:checked + .slider {
  background-color: #8bc34a;
}
input.info:checked + .slider {
  background-color: #3de0f5;
}
input.warning:checked + .slider {
  background-color: #FFC107;
}
input.danger:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<script type=\"text/javascript\">
function boxDisable(e, t) {
var id = e + 'show';

    if (t.is(':checked')) {
\t\t\$('.'+id).attr(\"style\", \"display: block !important\");
    } else {
      \$('.'+id).attr(\"style\", \"display: none !important\");
    }
}
var banner_row = ";
        // line 285
        echo ($context["banner_row"] ?? null);
        echo ";
function addbannertab() {
\t\tvar newtab = 'tab-singlebanner'+ banner_row;

\t\thtml  = '<div class=\"tab-pane\" id=\"tab-singlebanner'+ banner_row +'\">';
\t\t\t\t\t\t\t\t
\t\thtml  += '<div class=\"form-group\"> <label class=\"col-sm-2 control-label\" for=\"input-title\">";
        // line 291
        echo ($context["entry_image"] ?? null);
        echo "</label> <div class=\"col-sm-10\"><a href=\"\" id=\"thumb-image-'+ banner_row +'\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" data-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\"/></a><input type=\"hidden\" name=\"ishibanner['+ banner_row +'][image]\" value=\"";
        echo ($context["image"] ?? null);
        echo "\" id=\"input-image-'+ banner_row +'\" /></div></div>';
\t\t
\t\thtml  += '<div class=\"form-group\">';
\t\thtml  += '<label class=\"col-sm-2 control-label\" for=\"input-showtext'+ banner_row +'\">";
        // line 294
        echo ($context["entry_showtext"] ?? null);
        echo "</label>';
\t\thtml  += '<div class=\"col-sm-10\">';
\t\thtml  += '<label class=\"switch\">';
\t\thtml  += '<input type=\"checkbox\" name=\"ishibanner['+ banner_row +'][showtext]\" value=\"1\" class=\"primary\" id=\"input-showtext'+ banner_row +'\" onclick=\"boxDisable(\\''+ newtab +'\\',\$(this));\"/>';
\t\thtml  += '<span class=\"slider round\"></span>';
\t\thtml  += '</label>';
\t\thtml  += '</div>';
\t\thtml  += '</div>';
\t\t
\t\thtml  += '<div class=\"form-group showtext tab-singlebanner'+ banner_row +'show\">';
\t\thtml  += '<label class=\"col-sm-2 control-label\" for=\"input-image\">";
        // line 304
        echo ($context["entry_title"] ?? null);
        echo "</label>';
\t\thtml  += '<div class=\"col-sm-10\">';
\t\t\t\t\t\t\t\t\t  
\t\t";
        // line 307
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 308
            echo "\t\thtml  += '<div class=\"input-group\"><span class=\"input-group-addon\"><img src=\"language/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 308);
            echo "/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 308);
            echo ".png\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 308);
            echo "\" /></span>';
\t\thtml  += '<input type=\"text\" name=\"ishibanner['+ banner_row +'][title][";
            // line 309
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 309);
            echo "]\" placeholder=\"";
            echo ($context["entry_title"] ?? null);
            echo "\" class=\"form-control\"/>';
\t\thtml  += '</div>'; 
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 312
        echo "\t\thtml  += '</div>';
\t\thtml  += '</div>';

\t\thtml  += '<div class=\"form-group showtext tab-singlebanner'+ banner_row +'show\">';
\t\thtml  += '<label class=\"col-sm-2 control-label\" for=\"input-image\">";
        // line 316
        echo ($context["entry_subtitle"] ?? null);
        echo "</label>';
\t\thtml  += '<div class=\"col-sm-10\">';
\t\t\t\t\t\t\t\t\t  
\t\t";
        // line 319
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 320
            echo "\t\thtml  += '<div class=\"input-group\"><span class=\"input-group-addon\"><img src=\"language/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 320);
            echo "/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 320);
            echo ".png\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 320);
            echo "\" /></span>';
\t\thtml  += '<input type=\"text\" name=\"ishibanner['+ banner_row +'][subtitle][";
            // line 321
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 321);
            echo "]\" placeholder=\"";
            echo ($context["entry_subtitle"] ?? null);
            echo "\" class=\"form-control\"/>';
\t\thtml  += '</div>'; 
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 324
        echo "\t\thtml  += '</div>';
\t\thtml  += '</div>';
\t\t
\t\thtml  += '<div class=\"form-group showtext tab-singlebanner'+ banner_row +'show\">';
\t\thtml  += '<label class=\"col-sm-2 control-label\" for=\"input-department\">";
        // line 328
        echo ($context["entry_button"] ?? null);
        echo "</label>';
\t\thtml  += '<div class=\"col-sm-10\">';
\t\t";
        // line 330
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 331
            echo "\t\thtml  += '<div class=\"input-group\"><span class=\"input-group-addon\"><img src=\"language/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 331);
            echo "/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 331);
            echo ".png\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 331);
            echo "\" /></span>';
\t\thtml  += '<input type=\"text\" name=\"ishibanner['+ banner_row +'][button_name][";
            // line 332
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 332);
            echo "]\" value=\"\" placeholder=\"";
            echo ($context["entry_button"] ?? null);
            echo "\" class=\"form-control\"/>';
\t\thtml  += '</div>'; 
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 335
        echo "\t\thtml  += '</div>';
\t\thtml  += '</div>';

\t\thtml  += '<div class=\"form-group\">';
\t\thtml  += '<label class=\"col-sm-2 control-label\" for=\"input-contactno'+ banner_row +'\">";
        // line 339
        echo ($context["entry_link"] ?? null);
        echo "</label>';
\t\thtml  += '<div class=\"col-sm-10\">';
\t\thtml  += '<input type=\"text\" name=\"ishibanner['+ banner_row +'][link]\" value=\"\" placeholder=\"";
        // line 341
        echo ($context["entry_link"] ?? null);
        echo "\" class=\"form-control\" id=\"input-contactno'+ banner_row +'\" />';
\t\thtml  += '<span>";
        // line 342
        echo ($context["help_contact"] ?? null);
        echo "</span>';
\t\thtml  += '</div>';
\t\thtml  += '</div>';
\t\t
\t\thtml  += '<div class=\"form-group\">';
\t\thtml  += '<label class=\"col-sm-2 control-label\" for=\"input-sort-order-'+ banner_row +'\">";
        // line 347
        echo ($context["entry_sortorder"] ?? null);
        echo "</label>';
\t\thtml  += '<div class=\"col-sm-10\">';
\t\thtml  += '<input type=\"text\" name=\"ishibanner['+ banner_row +'][sort_order]\" value=\"1\" placeholder=\"";
        // line 349
        echo ($context["entry_sortorder"] ?? null);
        echo "\" class=\"form-control\" id=\"input-sort-order-'+ banner_row +'\" />';
\t\thtml  += '</div>';
\t\thtml  += '</div>';
\t\t
\t\t\$('#tab-banner #ishi_bannertabs').append(html);
\t\t
\t\t\$('#bannerstab > li:last-child').before('<li><a href=\"#tab-singlebanner' + banner_row + '\" data-toggle=\"tab\"><i class=\"fa fa-minus-circle\" onclick=\" \$(\\'#bannerstab a:first\\').tab(\\'show\\');\$(\\'a[href=\\\\\\'#tab-singlebanner' + banner_row + '\\\\\\']\\').parent().remove(); \$(\\'#tab-singlebanner' + banner_row + '\\').remove();\"></i> ";
        // line 355
        echo ($context["entry_banner"] ?? null);
        echo " </li>');
\t\t 
\t\t\$('#bannerstab a[href=\\'#tab-singlebanner' + banner_row + '\\']').tab('show');

\t\tbanner_row++;
\t}
\t\$('#bannerstab a:first').tab('show');
</script>
";
        // line 363
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/ishibannerblock.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  874 => 363,  863 => 355,  854 => 349,  849 => 347,  841 => 342,  837 => 341,  832 => 339,  826 => 335,  815 => 332,  806 => 331,  802 => 330,  797 => 328,  791 => 324,  780 => 321,  771 => 320,  767 => 319,  761 => 316,  755 => 312,  744 => 309,  735 => 308,  731 => 307,  725 => 304,  712 => 294,  700 => 291,  691 => 285,  586 => 182,  580 => 181,  578 => 180,  565 => 176,  558 => 174,  545 => 170,  538 => 168,  533 => 165,  516 => 162,  507 => 161,  503 => 160,  496 => 158,  488 => 157,  484 => 155,  467 => 152,  458 => 151,  454 => 150,  447 => 148,  439 => 147,  435 => 145,  418 => 142,  409 => 141,  405 => 140,  398 => 138,  390 => 137,  384 => 133,  376 => 131,  368 => 129,  366 => 128,  360 => 125,  349 => 121,  341 => 120,  334 => 118,  328 => 116,  323 => 115,  321 => 114,  313 => 110,  307 => 109,  305 => 108,  294 => 107,  289 => 106,  287 => 105,  277 => 97,  272 => 95,  267 => 94,  262 => 92,  257 => 91,  255 => 90,  249 => 87,  242 => 82,  238 => 80,  234 => 78,  232 => 77,  226 => 74,  216 => 69,  210 => 68,  204 => 67,  198 => 66,  192 => 63,  187 => 60,  181 => 58,  179 => 57,  173 => 56,  168 => 54,  163 => 51,  157 => 49,  155 => 48,  149 => 47,  144 => 45,  139 => 42,  133 => 40,  131 => 39,  125 => 38,  120 => 36,  112 => 31,  108 => 30,  102 => 27,  96 => 24,  92 => 22,  84 => 18,  82 => 17,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/ishibannerblock.twig", "");
    }
}
