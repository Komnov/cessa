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

/* common/themeoption.twig */
class __TwigTemplate_36d7c53f6e4420060b8ee1061b55fbc24a4d639a483f0fa36e2df117c9da039b extends \Twig\Template
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
";
        // line 2
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-filter\" data-toggle=\"tooltip\" title=\"";
        // line 7
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button></div>
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
        if (($context["success"] ?? null)) {
            // line 18
            echo "    <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo ($context["success"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 22
        echo "\t";
        if (($context["error_warning"] ?? null)) {
            // line 23
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 27
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 29
        echo ($context["text_form"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 32
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-filter\" class=\"form-horizontal\">
\t\t\t<div class=\"theme_section\">
\t\t\t\t<h3>Themes configuration</h3>\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-button-color\">";
        // line 38
        echo ($context["text_primarycolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"primarycolor\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 40
        echo ($context["primarycolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-link-color\">";
        // line 44
        echo ($context["text_secondarycolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"secondary_color\" data-target=\".btntextcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 46
        echo ($context["secondary_color"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-third-color\">";
        // line 50
        echo ($context["text_thirdcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"third_color\" data-target=\".btntextcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 52
        echo ($context["third_color"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-product_iconcolor\">";
        // line 60
        echo ($context["entry_product_iconcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"product_iconcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 62
        echo ($context["product_iconcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-product_icon_hovercolor\">";
        // line 66
        echo ($context["entry_product_iconhovercolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"product_icon_hovercolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 68
        echo ($context["product_icon_hovercolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\">";
        // line 76
        echo ($context["entry_image"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\"><a href=\"\" id=\"thumb-breadcrumb_image\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
        // line 77
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" data-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" /></a>
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"breadcrumb_image\" value=\"";
        // line 78
        echo ($context["breadcrumb_image"] ?? null);
        echo "\" id=\"input-breadcrumb_image\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-breadcrumb-color\">";
        // line 82
        echo ($context["text_breadcrumbcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"breadcrumb_color\" data-target=\".btntextcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 84
        echo ($context["breadcrumb_color"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">\t
\t\t\t\t\t<div class=\"row\">\t\t\t\t\t
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-subcategory_type\">";
        // line 92
        echo ($context["entry_subcategorylist"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<select name=\"subcategory_type\" id=\"input-subcategory_type\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t<option value=\"none\" ";
        // line 95
        if ((($context["subcategory_type"] ?? null) == "none")) {
            echo " selected=selected ";
        }
        echo ">";
        echo ($context["text_none"] ?? null);
        echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"grid\" ";
        // line 96
        if ((($context["subcategory_type"] ?? null) == "grid")) {
            echo " selected=selected ";
        }
        echo ">";
        echo ($context["text_grid"] ?? null);
        echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"slider\" ";
        // line 97
        if ((($context["subcategory_type"] ?? null) == "slider")) {
            echo " selected=selected ";
        }
        echo ">";
        echo ($context["text_slider"] ?? null);
        echo "</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-productimage_type\">";
        // line 102
        echo ($context["entry_productlist"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<select name=\"productimage_type\" id=\"input-productimage_type\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t<option value=\"vertical\" ";
        // line 105
        if ((($context["productimage_type"] ?? null) == "vertical")) {
            echo " selected=selected ";
        }
        echo ">";
        echo ($context["text_vertical"] ?? null);
        echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"horizontal\" ";
        // line 106
        if ((($context["productimage_type"] ?? null) == "horizontal")) {
            echo " selected=selected ";
        }
        echo ">";
        echo ($context["text_horizontal"] ?? null);
        echo "</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group border_bottom\">\t
\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-loader\">";
        // line 113
        echo ($context["entry_loader"] ?? null);
        echo "</label>
\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t<input type=\"radio\" name=\"loader\" value=\"loader_1\" ";
        // line 116
        if ((($context["loader"] ?? null) == "loader_1")) {
            echo " checked ";
        }
        echo ">
\t\t\t\t\t\t\t<div class=\"loader\"><div class=\"loader-1\"></div></div>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"loader\" value=\"loader_2\" ";
        // line 120
        if ((($context["loader"] ?? null) == "loader_2")) {
            echo " checked ";
        }
        echo ">
\t\t\t\t\t\t<div class=\"loader\"><div class=\"loader-2\">
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t</div></div>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"loader\" value=\"loader_3\" ";
        // line 134
        if ((($context["loader"] ?? null) == "loader_3")) {
            echo " checked ";
        }
        echo ">
\t\t\t\t\t\t<div class=\"loader\"><div class=\"loader-3\">
\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t</div></div>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"loader\" value=\"loader_4\" ";
        // line 142
        if ((($context["loader"] ?? null) == "loader_4")) {
            echo " checked ";
        }
        echo ">
\t\t\t\t\t\t<div class=\"loader\"><div class=\"loader-4 la-dark la-2x\">
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t</div></div>
\t\t\t\t\t\t</label>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t<label class=\"col-sm-5 control-label\" for=\"input-category-counter\">";
        // line 155
        echo ($context["entry_category_counter"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-7\">
\t\t\t\t\t\t\t<label class=\"switch\">
\t\t\t\t\t\t\t\t";
        // line 158
        if (($context["category_counter"] ?? null)) {
            // line 159
            echo "\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"category_counter\" value=\"1\" class=\"primary\" checked=\"checked\" id=\"input-category-counter\" />
\t\t\t\t\t\t\t\t";
        } else {
            // line 161
            echo "\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"category_counter\" value=\"1\" class=\"primary\" id=\"input-category-counter\" />
\t\t\t\t\t\t\t\t";
        }
        // line 163
        echo "\t\t\t\t\t\t\t\t<span class=\"slider round\"></span>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t<label class=\"col-sm-5 control-label\" for=\"input-product-counter\">";
        // line 168
        echo ($context["entry_product_counter"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-7\">
\t\t\t\t\t\t\t<label class=\"switch\">
\t\t\t\t\t\t\t\t";
        // line 171
        if (($context["product_counter"] ?? null)) {
            // line 172
            echo "\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"product_counter\" value=\"1\" class=\"primary\" checked=\"checked\" id=\"input-product-counter\" />
\t\t\t\t\t\t\t\t";
        } else {
            // line 174
            echo "\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"product_counter\" value=\"1\" class=\"primary\" id=\"input-product-counter\" />
\t\t\t\t\t\t\t\t";
        }
        // line 176
        echo "\t\t\t\t\t\t\t\t<span class=\"slider round\"></span>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"theme_section\">\t
\t\t\t\t<h3>Header configuration</h3>\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-headerbg-top-color\">";
        // line 187
        echo ($context["entry_header_top_bgcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"header_top_bgcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 189
        echo ($context["header_top_bgcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-headertext-top-color\">";
        // line 193
        echo ($context["entry_header_top_textcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"header_top_textcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 195
        echo ($context["header_top_textcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-headerbg-color\">";
        // line 203
        echo ($context["entry_header_bgcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"header_bgcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 205
        echo ($context["header_bgcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-headertext-color\">";
        // line 209
        echo ($context["entry_header_textcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"header_textcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 211
        echo ($context["header_textcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-headertext-hover-color\">";
        // line 215
        echo ($context["entry_header_hovertextcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"header_text_hovercolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 217
        echo ($context["header_text_hovercolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-icon-color\">";
        // line 225
        echo ($context["text_iconcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"icon_color\" data-target=\".btntextcolor\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 227
        echo ($context["icon_color"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-iconresponsive-color\">";
        // line 231
        echo ($context["text_iconresponsivecolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"icon_responsivecolor\" data-target=\".btntextcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 233
        echo ($context["icon_responsivecolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"theme_section\">\t
\t\t\t\t<h3>Button configuration</h3>\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-btn-color\">";
        // line 244
        echo ($context["entry_btncolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"btn_color\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 246
        echo ($context["btn_color"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-hover-btn-color\">";
        // line 250
        echo ($context["entry_hoverbtncolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"btn_hover_color\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 252
        echo ($context["btn_hover_color"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>\t\t\t
\t\t\t\t\t</div>\t\t\t
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-txt-color\">";
        // line 260
        echo ($context["entry_btntextcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"btn_txtcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 262
        echo ($context["btn_txtcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-hover-text-color\">";
        // line 266
        echo ($context["entry_hoverbtntextcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"btn_hover_txtcolor\" data-target=\".btntextcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 268
        echo ($context["btn_hover_txtcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>\t\t\t\t
\t\t\t\t\t</div>\t\t\t\t
\t\t\t\t</div>\t\t\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-custom-btn-color\">";
        // line 276
        echo ($context["entry_cutom_btncolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"custom_btn_color\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 278
        echo ($context["custom_btn_color"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-custom-hover-link-color\">";
        // line 282
        echo ($context["entry_cutom_hoverbtncolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"custom_btn_hover_color\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 284
        echo ($context["custom_btn_hover_color"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-custom-link-color\">";
        // line 292
        echo ($context["entry_cutom_btntextcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"custom_btn_txtcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 294
        echo ($context["custom_btn_txtcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-custom-hover-text-color\">";
        // line 298
        echo ($context["entry_cutom_hoverbtntextcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"custom_btn_hover_txtcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 300
        echo ($context["custom_btn_hover_txtcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"theme_section footer_border\">\t
\t\t\t\t<h3>Footer configuration</h3>\t
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-footer_bgimage\">";
        // line 311
        echo ($context["entry_footer_bgimage"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\"><a href=\"\" id=\"thumb-footer_bgimage\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
        // line 312
        echo ($context["footer_thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" data-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" /></a>
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"footer_bgimage\" value=\"";
        // line 313
        echo ($context["footer_bgimage"] ?? null);
        echo "\" id=\"input-footer_bgimage\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-footer_bgcolor\">";
        // line 317
        echo ($context["entry_footer_bgcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"footer_bgcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 319
        echo ($context["footer_bgcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-footertitle-color\">";
        // line 327
        echo ($context["entry_footer_titlecolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"footer_titlecolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 329
        echo ($context["footer_titlecolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-footertext-color\">";
        // line 333
        echo ($context["entry_footer_textcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"footer_textcolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 335
        echo ($context["footer_textcolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t<label class=\"col-sm-6 control-label\" for=\"input-footertext-hover-color\">";
        // line 339
        echo ($context["entry_footer_hovertextcolor"] ?? null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"footer_text_hovercolor\" data-property=\"color\" class=\"form-control themecolor\" data-swatches=\"#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)\"  value=\"";
        // line 341
        echo ($context["footer_text_hovercolor"] ?? null);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
      </div>
    </div>
  </div>
  <style>
\t  \t.switch {
\t\t\tposition: relative;
\t\t\tdisplay: inline-block;
\t\t\twidth: 60px;
\t\t\theight: 34px;
\t\t}

\t\t/* Hide default HTML checkbox */
\t\t.switch input {display:none;}

\t\t/* The slider */
\t\t.slider {
\t\t\tposition: absolute;
\t\t\tcursor: pointer;
\t\t\ttop: 0;
\t\t\tleft: 0;
\t\t\tright: 0;
\t\t\tbottom: 0;
\t\t\tbackground-color: #ccc;
\t\t\t-webkit-transition: .4s;
\t\t\ttransition: .4s;
\t\t}

\t\t.slider:before {
\t\t\tposition: absolute;
\t\t\tcontent: \"\";
\t\t\theight: 26px;
\t\t\twidth: 26px;
\t\t\tleft: 4px;
\t\t\tbottom: 4px;
\t\t\tbackground-color: white;
\t\t\t-webkit-transition: .4s;
\t\t\ttransition: .4s;
\t\t}
\t\tinput.default:checked + .slider {
\t\t\tbackground-color: #444;
\t\t}
\t\tinput.primary:checked + .slider {
\t\t\tbackground-color: #2196F3;
\t\t}
\t\tinput.success:checked + .slider {
\t\t\tbackground-color: #8bc34a;
\t\t}
\t\tinput.info:checked + .slider {
\t\t\tbackground-color: #3de0f5;
\t\t}
\t\tinput.warning:checked + .slider {
\t\t\tbackground-color: #FFC107;
\t\t}
\t\tinput.danger:checked + .slider {
\t\t\tbackground-color: #f44336;
\t\t}

\t\tinput:focus + .slider {
\t\t\tbox-shadow: 0 0 1px #2196F3;
\t\t}

\t\tinput:checked + .slider:before {
\t\t\t-webkit-transform: translateX(26px);
\t\t\t-ms-transform: translateX(26px);
\t\t\ttransform: translateX(26px);
\t\t}

\t\t/* Rounded sliders */
\t\t.slider.round {
\t\t\tborder-radius: 34px;
\t\t}

\t\t.slider.round:before {
\t\t\tborder-radius: 50%;
\t\t}
  \t\t.theme_section {
\t\t\t  border-bottom: 2px solid #eee;
\t\t\t  padding: 20px 0;
\t\t}
\t\t.footer_border {
\t\t\tborder: 0;
\t\t}
\t\t@media (max-width: 1199px) {/* If media is below 1200 */
\t\t.border_bottom {
\t\t\tborder-bottom: 1px solid #ededed;
\t\t\tpadding-bottom: 15px;
\t\t\tmargin-bottom: 15px;
\t\t\tdisplay: block;
\t\t\tposition: relative;
\t\t\toverflow: hidden;
\t\t}}
\t\t[type=radio] { 
\t\tposition: absolute !important;
\t\topacity: 0 !important;
\t\twidth: 0 !important;
\t\theight: 0 !important;
\t\t}

\t\t/* IMAGE STYLES */
\t\t[type=radio] + .loader {
\t\tcursor: pointer;
\t\twidth: 120px;
\t\theight: 120px;
\t\tmargin: 0 15px;
\t\tposition: relative;
\t\tfloat: left;
\t\t}
\t\t[type=radio] + .loader {
\t\toutline: 2px solid #eee;
\t\t}

\t\t/* CHECKED STYLES */
\t\t[type=radio]:checked + .loader {
\t\toutline: 2px solid #f00;
\t\t}

\t\t:root {
\t\t\t--main-color: #cc9966;
\t\t}
\t\t.loader-1 {
\t\t\tdisplay: block;
\t\t\tposition: absolute;
\t\t\ttop: 8px;
\t\t\tleft: 0;
\t\t\tright: 0;
\t\t\twidth: 100px;
\t\t\theight: 100px;
\t\t\tborder-radius: 50%;
\t\t\ttext-align: center;
\t\t\tmargin: 0 auto;
\t\t\tborder: 3px solid transparent;
\t\t\tborder-top-color: transparent;
\t\t\tborder-top-color: var(--main-color);
\t\t\t-webkit-animation: spin 2s linear infinite;
\t\t\tanimation: spin 2s linear infinite;
\t\t}
\t\t.loader-1::before {
\t\t\tcontent: \"\";
\t\t\tposition: absolute;
\t\t\ttop: 5px;
\t\t\tleft: 5px;
\t\t\tright: 5px;
\t\t\tbottom: 5px;
\t\t\tborder-radius: 50%;
\t\t\tborder: 3px solid transparent;
\t\t\tborder-top-color: var(--main-color);
\t\t\t-webkit-animation: spin 3s linear infinite;
\t\t\tanimation: spin 3s linear infinite;
\t\t}
\t\t.loader-1::after {
\t\t\tcontent: \"\";
\t\t\tposition: absolute;
\t\t\ttop: 15px;
\t\t\tleft: 15px;
\t\t\tright: 15px;
\t\t\tbottom: 15px;
\t\t\tborder-radius: 50%;
\t\t\tborder: 3px solid transparent;
\t\t\tborder-top-color: transparent;
\t\t\tborder-top-color: var(--main-color);
\t\t\t-webkit-animation: spin 1.5s linear infinite;
\t\t\tanimation: spin 1.5s linear infinite;
\t\t}
\t\t.loader-2 {
\t\t\tposition: relative;
\t\t\ttop: 24px;
\t\t\tdisplay: grid;
\t\t\tgrid-template-columns: 33% 33% 33%;
\t\t\tgrid-gap: 2px;
\t\t\twidth: 70px;
\t\t\theight: 70px;
\t\t\ttext-align: center;
\t\t\tmargin: 0 auto;
\t\t}
\t\t.loader-2 > div {
\t\t\tposition: relative;
\t\t\tdisplay: inline-block;
\t\t\twidth: 100%;
\t\t\theight: 100%;
\t\t\tbackground: var(--main-color);
\t\t\ttransform: scale(0);
\t\t\ttransform-origin: center center;
\t\t\tanimation: loader 2s infinite linear;
\t\t}
\t\t.loader-2 > div:nth-of-type(1), .loader-2 > div:nth-of-type(5), .loader-2 > div:nth-of-type(9) {
\t\t\tanimation-delay: 0.4s;
\t\t}
\t\t.loader-2 > div:nth-of-type(4), .loader-2 > div:nth-of-type(8) {
\t\t\tanimation-delay: 0.2s;
\t\t}
\t\t.loader-2 > div:nth-of-type(2), .loader-2 > div:nth-of-type(6) {
\t\t\tanimation-delay: 0.6s;
\t\t}
\t\t.loader-2 > div:nth-of-type(3) {
\t\t\tanimation-delay: 0.8s;
\t\t}
\t\t.loader-3 {
\t\t\tdisplay: block;
\t\t\tfont-size: 0;
\t\t\tcolor: var(--main-color);
\t\t\twidth: 80px;
\t\t\theight: 80px;
\t\t\ttext-align: center;
\t\t\tmargin: 0 12px;
\t\t\ttop: 12px;
\t\t\tposition: relative;
\t\t\t-webkit-box-sizing: border-box;
\t\t\t-moz-box-sizing: border-box;
\t\t\tbox-sizing: border-box;
\t\t}
\t\t.loader-3 > div {
\t\t\tposition: absolute;
\t\t\ttop: 0;
\t\t\tleft: 0;
\t\t\twidth: 96px;
\t\t\theight: 96px;
\t\t\tborder-radius: 100%;
\t\t\topacity: 0;
\t\t\t-webkit-animation: ball-scale-ripple-multiple 1.25s 0s infinite cubic-bezier(0.21, 0.53, 0.56, 0.8);
\t\t\t-moz-animation: ball-scale-ripple-multiple 1.25s 0s infinite cubic-bezier(0.21, 0.53, 0.56, 0.8);
\t\t\t-o-animation: ball-scale-ripple-multiple 1.25s 0s infinite cubic-bezier(0.21, 0.53, 0.56, 0.8);
\t\t\tanimation: ball-scale-ripple-multiple 1.25s 0s infinite cubic-bezier(0.21, 0.53, 0.56, 0.8);
\t\t\t-webkit-box-sizing: border-box;
\t\t\t-moz-box-sizing: border-box;
\t\t\tbox-sizing: border-box;
\t\t\tdisplay: inline-block;
\t\t\tfloat: none;
\t\t\tbackground-color: currentColor;
\t\t\tborder: 0 solid currentColor;
\t\t}
\t\t.loader-3 > div:nth-child(1) {
\t\t\t-webkit-animation-delay: 0s;
\t\t\t-moz-animation-delay: 0s;
\t\t\t-o-animation-delay: 0s;
\t\t\tanimation-delay: 0s;
\t\t}
\t\t.loader-3 > div:nth-child(2) {
\t\t\t-webkit-animation-delay: 0.25s;
\t\t\t-moz-animation-delay: 0.25s;
\t\t\t-o-animation-delay: 0.25s;
\t\t\tanimation-delay: 0.25s;
\t\t}
\t\t.loader-3 > div:nth-child(3) {
\t\t\t-webkit-animation-delay: 0.5s;
\t\t\t-moz-animation-delay: 0.5s;
\t\t\t-o-animation-delay: 0.5s;
\t\t\tanimation-delay: 0.5s;
\t\t}
\t\t.loader-4 {
\t\t\tdisplay: block;
\t\t\tfont-size: 0;
\t\t\tcolor: var(--main-color);
\t\t\ttop: 43px;
\t\t\ttext-align: center;
\t\t\tmargin: 0 auto;
\t\t\tposition: relative;
    \t\t-webkit-box-sizing: border-box;
       \t\t-moz-box-sizing: border-box;
            box-sizing: border-box;
\t\t}
\t\t.loader-4 > div {
\t\t\tbackground-color: currentColor;
\t\t\tborder: 0 solid currentColor;
\t\t\tposition: absolute;
\t\t\ttop: 0;
\t\t\tleft: -100%;
\t\t\tdisplay: block;
\t\t\tborder-radius: 100%;
\t\t\topacity: .5;
    \t\t-webkit-animation: ball-circus-position 2.5s infinite cubic-bezier(.25, 0, .75, 1), ball-circus-size 2.5s infinite cubic-bezier(.25, 0, .75, 1);
       \t\t-moz-animation: ball-circus-position 2.5s infinite cubic-bezier(.25, 0, .75, 1), ball-circus-size 2.5s infinite cubic-bezier(.25, 0, .75, 1);
\t\t\t-o-animation: ball-circus-position 2.5s infinite cubic-bezier(.25, 0, .75, 1), ball-circus-size 2.5s infinite cubic-bezier(.25, 0, .75, 1);
            animation: ball-circus-position 2.5s infinite cubic-bezier(.25, 0, .75, 1), ball-circus-size 2.5s infinite cubic-bezier(.25, 0, .75, 1);
\t\t}
\t\t.loader-4 > div:nth-child(1) {
\t\t\t-webkit-animation-delay: 0s, -.5s;
\t\t\t-moz-animation-delay: 0s, -.5s;
\t\t\t\t-o-animation-delay: 0s, -.5s;
\t\t\t\t\tanimation-delay: 0s, -.5s;
\t\t}
\t\t.loader-4 > div:nth-child(2) {
\t\t\t-webkit-animation-delay: -.5s, -1s;
\t\t\t-moz-animation-delay: -.5s, -1s;
\t\t\t\t-o-animation-delay: -.5s, -1s;
\t\t\t\t\tanimation-delay: -.5s, -1s;
\t\t}
\t\t.loader-4 > div:nth-child(3) {
\t\t\t-webkit-animation-delay: -1s, -1.5s;
\t\t\t-moz-animation-delay: -1s, -1.5s;
\t\t\t\t-o-animation-delay: -1s, -1.5s;
\t\t\t\t\tanimation-delay: -1s, -1.5s;
\t\t}
\t\t.loader-4 > div:nth-child(4) {
\t\t\t-webkit-animation-delay: -1.5s, -2s;
\t\t\t-moz-animation-delay: -1.5s, -2s;
\t\t\t\t-o-animation-delay: -1.5s, -2s;
\t\t\t\t\tanimation-delay: -1.5s, -2s;
\t\t}
\t\t.loader-4 > div:nth-child(5) {
\t\t\t-webkit-animation-delay: -2s, -2.5s;
\t\t\t-moz-animation-delay: -2s, -2.5s;
\t\t\t\t-o-animation-delay: -2s, -2.5s;
\t\t\t\t\tanimation-delay: -2s, -2.5s;
\t\t}
\t\t.loader-4.la-2x {
\t\t\twidth: 32px;
\t\t\theight: 32px;
\t\t}
\t\t.loader-4.la-2x > div {
\t\t\twidth: 32px;
\t\t\theight: 32px;
\t\t}
\t\t@keyframes spin {
\t\t0% {
\t\t\t-webkit-transform: rotate(0deg);
\t\t\t-ms-transform: rotate(0deg);
\t\t\ttransform: rotate(0deg);
\t\t}

\t\t100% {
\t\t\t-webkit-transform: rotate(360deg);
\t\t\t-ms-transform: rotate(360deg);
\t\t\ttransform: rotate(360deg);
\t\t}
\t\t}
\t\t@-o-keyframes spin {
\t\t0% {
\t\t\t-webkit-transform: rotate(0deg);
\t\t\t-ms-transform: rotate(0deg);
\t\t\ttransform: rotate(0deg);
\t\t}

\t\t100% {
\t\t\t-webkit-transform: rotate(360deg);
\t\t\t-ms-transform: rotate(360deg);
\t\t\ttransform: rotate(360deg);
\t\t}
\t\t}
\t\t@-moz-keyframes spin {
\t\t0% {
\t\t\t-webkit-transform: rotate(0deg);
\t\t\t-ms-transform: rotate(0deg);
\t\t\ttransform: rotate(0deg);
\t\t}

\t\t100% {
\t\t\t-webkit-transform: rotate(360deg);
\t\t\t-ms-transform: rotate(360deg);
\t\t\ttransform: rotate(360deg);
\t\t}
\t\t}
\t\t@-webkit-keyframes spin {
\t\t0% {
\t\t\t-webkit-transform: rotate(0deg);
\t\t\t-ms-transform: rotate(0deg);
\t\t\ttransform: rotate(0deg);
\t\t}

\t\t100% {
\t\t\t-webkit-transform: rotate(360deg);
\t\t\t-ms-transform: rotate(360deg);
\t\t\ttransform: rotate(360deg);
\t\t}
\t\t}
\t\t@-ms-keyframes spin {
\t\t0% {
\t\t\t-webkit-transform: rotate(0deg);
\t\t\t-ms-transform: rotate(0deg);
\t\t\ttransform: rotate(0deg);
\t\t}

\t\t100% {
\t\t\t-webkit-transform: rotate(360deg);
\t\t\t-ms-transform: rotate(360deg);
\t\t\ttransform: rotate(360deg);
\t\t}
\t\t}


\t\t@keyframes loader {
\t\t0%   { transform: scale(0.0); }
\t\t40%  { transform: scale(1.0); }
\t\t80%  { transform: scale(1.0); }
\t\t100% { transform: scale(0.0); }
\t\t}
\t\t@-webkit-keyframes loader {
\t\t0%   { transform: scale(0.0); }
\t\t40%  { transform: scale(1.0); }
\t\t80%  { transform: scale(1.0); }
\t\t100% { transform: scale(0.0); }
\t\t}
\t\t@-ms-keyframes loader {
\t\t0%   { transform: scale(0.0); }
\t\t40%  { transform: scale(1.0); }
\t\t80%  { transform: scale(1.0); }
\t\t100% { transform: scale(0.0); }
\t\t}
\t\t@-o-keyframes loader {
\t\t0%   { transform: scale(0.0); }
\t\t40%  { transform: scale(1.0); }
\t\t80%  { transform: scale(1.0); }
\t\t100% { transform: scale(0.0); }
\t\t}
\t\t@-moz-keyframes loader {
\t\t0%   { transform: scale(0.0); }
\t\t40%  { transform: scale(1.0); }
\t\t80%  { transform: scale(1.0); }
\t\t100% { transform: scale(0.0); }
\t\t}


\t\t@-webkit-keyframes ball-scale-ripple-multiple {
\t\t0% {
\t\t\topacity: 1;
\t\t\t-webkit-transform: scale(.1);
\t\t\ttransform: scale(.1);
\t\t}

\t\t70% {
\t\t\topacity: .5;
\t\t\t-webkit-transform: scale(1);
\t\t\ttransform: scale(1);
\t\t}

\t\t95% {
\t\t\topacity: 0;
\t\t}
\t\t}

\t\t@-moz-keyframes ball-scale-ripple-multiple {
\t\t0% {
\t\t\topacity: 1;
\t\t\t-moz-transform: scale(.1);
\t\t\ttransform: scale(.1);
\t\t}

\t\t70% {
\t\t\topacity: .5;
\t\t\t-moz-transform: scale(1);
\t\t\ttransform: scale(1);
\t\t}

\t\t95% {
\t\t\topacity: 0;
\t\t}
\t\t}

\t\t@-o-keyframes ball-scale-ripple-multiple {
\t\t0% {
\t\t\topacity: 1;
\t\t\t-o-transform: scale(.1);
\t\t\ttransform: scale(.1);
\t\t}

\t\t70% {
\t\t\topacity: .5;
\t\t\t-o-transform: scale(1);
\t\t\ttransform: scale(1);
\t\t}

\t\t95% {
\t\t\topacity: 0;
\t\t}
\t\t}

\t\t@keyframes ball-scale-ripple-multiple {
\t\t0% {
\t\t\topacity: 1;
\t\t\t-webkit-transform: scale(.1);
\t\t\t-moz-transform: scale(.1);
\t\t\t-o-transform: scale(.1);
\t\t\ttransform: scale(.1);
\t\t}

\t\t70% {
\t\t\topacity: .5;
\t\t\t-webkit-transform: scale(1);
\t\t\t-moz-transform: scale(1);
\t\t\t-o-transform: scale(1);
\t\t\ttransform: scale(1);
\t\t}

\t\t95% {
\t\t\topacity: 0;
\t\t}
\t\t}
\t\t@keyframes ball-scale-ripple-multiple {
\t\t0% {
\t\t\topacity: 1;
\t\t\t-webkit-transform: scale(.1);
\t\t\t-moz-transform: scale(.1);
\t\t\t-o-transform: scale(.1);
\t\t\ttransform: scale(.1);
\t\t}

\t\t70% {
\t\t\topacity: .5;
\t\t\t-webkit-transform: scale(1);
\t\t\t-moz-transform: scale(1);
\t\t\t-o-transform: scale(1);
\t\t\ttransform: scale(1);
\t\t}

\t\t95% {
\t\t\topacity: 0;
\t\t}
\t\t}
\t\t@-webkit-keyframes ball-circus-position {
\t\t\t50% {
\t\t\t\tleft: 100%;
\t\t\t}
\t\t}
\t\t@-moz-keyframes ball-circus-position {
\t\t\t50% {
\t\t\t\tleft: 100%;
\t\t\t}
\t\t}
\t\t@-o-keyframes ball-circus-position {
\t\t\t50% {
\t\t\t\tleft: 100%;
\t\t\t}
\t\t}
\t\t@keyframes ball-circus-position {
\t\t\t50% {
\t\t\t\tleft: 100%;
\t\t\t}
\t\t}
\t\t@-webkit-keyframes ball-circus-size {
\t\t\t50% {
\t\t\t\t-webkit-transform: scale(.3, .3);
\t\t\t\t\t\ttransform: scale(.3, .3);
\t\t\t}
\t\t}
\t\t@-moz-keyframes ball-circus-size {
\t\t\t50% {
\t\t\t\t-moz-transform: scale(.3, .3);
\t\t\t\t\ttransform: scale(.3, .3);
\t\t\t}
\t\t}
\t\t@-o-keyframes ball-circus-size {
\t\t\t50% {
\t\t\t\t-o-transform: scale(.3, .3);
\t\t\t\ttransform: scale(.3, .3);
\t\t\t}
\t\t}
\t\t@keyframes ball-circus-size {
\t\t\t50% {
\t\t\t\t-webkit-transform: scale(.3, .3);
\t\t\t\t-moz-transform: scale(.3, .3);
\t\t\t\t\t-o-transform: scale(.3, .3);
\t\t\t\t\t\ttransform: scale(.3, .3);
\t\t\t}
\t\t}
  </style>
  <script type=\"text/javascript\">
  \t\$(document).ready( function() {
      \$('.themecolor').each( function() {
        \$(this).minicolors({
          control: \$(this).attr('data-control') || 'hue',
          defaultValue: \$(this).attr('data-defaultValue') || '',
          format: \$(this).attr('data-format') || 'hex',
          keywords: \$(this).attr('data-keywords') || '',
          inline: \$(this).attr('data-inline') === 'true',
          letterCase: \$(this).attr('data-letterCase') || 'lowercase',
          opacity: \$(this).attr('data-opacity'),
          position: \$(this).attr('data-position') || 'bottom',
          swatches: \$(this).attr('data-swatches') ? \$(this).attr('data-swatches').split('|') : [],
          change: function(value, opacity) {
            if( !value ) return;
            if( opacity ) value += ', ' + opacity;
            if( typeof console === 'object' ) {
              console.log(value);
            }
          },
          theme: 'bootstrap',
\t\t  change: function(hex, opacity) {
\t\t\t  jQuery('.panel .mail-preview iframe').contents().find(jQuery(this).attr('data-target')).css(jQuery(this).attr('data-property'), hex);
\t\t\t}
        });

      });
    });
  </script>
  <link href=\"view/javascript/bootstrap/colorpicker/jquery.minicolors.css\" rel=\"stylesheet\" />
  <script type=\"text/javascript\" src=\"view/javascript/bootstrap/colorpicker/jquery.minicolors.min.js\"></script> 
";
        // line 933
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "common/themeoption.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1270 => 933,  675 => 341,  670 => 339,  663 => 335,  658 => 333,  651 => 329,  646 => 327,  635 => 319,  630 => 317,  623 => 313,  617 => 312,  613 => 311,  599 => 300,  594 => 298,  587 => 294,  582 => 292,  571 => 284,  566 => 282,  559 => 278,  554 => 276,  543 => 268,  538 => 266,  531 => 262,  526 => 260,  515 => 252,  510 => 250,  503 => 246,  498 => 244,  484 => 233,  479 => 231,  472 => 227,  467 => 225,  456 => 217,  451 => 215,  444 => 211,  439 => 209,  432 => 205,  427 => 203,  416 => 195,  411 => 193,  404 => 189,  399 => 187,  386 => 176,  382 => 174,  378 => 172,  376 => 171,  370 => 168,  363 => 163,  359 => 161,  355 => 159,  353 => 158,  347 => 155,  329 => 142,  316 => 134,  297 => 120,  288 => 116,  282 => 113,  268 => 106,  260 => 105,  254 => 102,  242 => 97,  234 => 96,  226 => 95,  220 => 92,  209 => 84,  204 => 82,  197 => 78,  191 => 77,  187 => 76,  176 => 68,  171 => 66,  164 => 62,  159 => 60,  148 => 52,  143 => 50,  136 => 46,  131 => 44,  124 => 40,  119 => 38,  110 => 32,  104 => 29,  100 => 27,  92 => 23,  89 => 22,  81 => 18,  79 => 17,  73 => 13,  62 => 11,  58 => 10,  53 => 8,  49 => 7,  41 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "common/themeoption.twig", "");
    }
}
