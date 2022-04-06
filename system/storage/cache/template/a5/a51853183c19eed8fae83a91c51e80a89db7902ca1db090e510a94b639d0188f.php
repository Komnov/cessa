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

/* extension/module/newslettersubscribe.twig */
class __TwigTemplate_a3bcab7f5e5084bb240996f32dab046ef8df67fa06015cf654038cef022c1f10 extends \Twig\Template
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
        <button type=\"submit\" form=\"form-html\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
\t\t<a onclick=\"location = '";
        // line 7
        echo ($context["export_csv"] ?? null);
        echo "'\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_export"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-upload\"></i></a>
        <a href=\"";
        // line 8
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
\t\t</div>
      <h1>";
        // line 10
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        <?php foreach (\$breadcrumbs as \$breadcrumb) { ?>
        <li><a href=\"";
        // line 13
        echo (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["breadcrumb"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["href"] ?? null) : null);
        echo "\">";
        echo (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["breadcrumb"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["text"] ?? null) : null);
        echo "</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 19
        if (($context["error_warning"] ?? null)) {
            // line 20
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 24
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 26
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 29
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal\">
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 31
        echo ($context["entry_name"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"";
        // line 33
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\" />
              ";
        // line 34
        if (($context["error_name"] ?? null)) {
            // line 35
            echo "              <div class=\"text-danger\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
              ";
        }
        // line 37
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-title-";
        // line 40
        echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "language_id", [], "any", false, false, false, 40);
        echo "\">";
        echo ($context["entry_title"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 43
            echo "                <div class=\"input-group\"><span class=\"input-group-addon\"><img src=\"language/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 43);
            echo "/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 43);
            echo ".png\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 43);
            echo "\" /></span>
                  <input type=\"text\" name=\"title[";
            // line 44
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 44);
            echo "]\" value=\"";
            echo (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["title"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 44)] ?? null) : null);
            echo "\" placeholder=\"";
            echo ($context["entry_title"] ?? null);
            echo "\" class=\"form-control\" required id=\"input-title-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 44);
            echo "\" />
                  ";
            // line 45
            if ((($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["error_title"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 45)] ?? null) : null)) {
                // line 46
                echo "                    <div class=\"text-danger\">";
                echo (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["error_title"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 46)] ?? null) : null);
                echo "</div>
                  ";
            }
            // line 48
            echo "                </div> 
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 53
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"status\" id=\"input-status\" class=\"form-control\">
                ";
        // line 56
        if (($context["status"] ?? null)) {
            // line 57
            echo "                <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                <option value=\"0\">";
            // line 58
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                ";
        } else {
            // line 60
            echo "                <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                <option value=\"0\" selected=\"selected\">";
            // line 61
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                ";
        }
        // line 63
        echo "              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 67
        echo ($context["tab_list"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t<table class=\"table table-bordered table-hover\">
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"left\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').attr('checked', this.checked);\" /></td>
\t\t\t\t\t\t\t\t\t<td class=\"left\">No</td>
\t\t\t\t\t\t\t\t\t<td class=\"left\">Email</td>
\t\t\t\t\t\t\t\t\t<td class=\"left\">Name</td>
\t\t\t\t\t\t\t\t\t<td class=\"right\">Action</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
        // line 82
        if (($context["users"] ?? null)) {
            // line 83
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["user"]) {
                // line 84
                echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"left\">
\t\t\t\t\t\t\t\t\t";
                // line 86
                if ((($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = $context["user"]) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666["selected"] ?? null) : null)) {
                    // line 87
                    echo "\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"selected[]\" value=\"";
                    echo (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = $context["user"]) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["id"] ?? null) : null);
                    echo "\" checked=\"checked\" />
\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 89
                    echo "\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"selected[]\" value=\"";
                    echo (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = $context["user"]) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["id"] ?? null) : null);
                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 91
                echo "\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"left\">";
                // line 92
                echo ((($context["page_nav"] ?? null) + $context["key"]) + 1);
                echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"left\">";
                // line 93
                echo (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = $context["user"]) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136["email_id"] ?? null) : null);
                echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"left\">";
                // line 94
                echo (($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = $context["user"]) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386["name"] ?? null) : null);
                echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"right\">
\t\t\t\t\t\t\t\t\t";
                // line 96
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 = $context["user"]) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9["action"] ?? null) : null));
                foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                    // line 97
                    echo "\t\t\t\t\t\t\t\t\t [ <a href=\"";
                    echo (($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae = $context["action"]) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae["href"] ?? null) : null);
                    echo "\">";
                    echo (($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = $context["action"]) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f["text"] ?? null) : null);
                    echo "</a> ]
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 99
                echo "\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            echo "\t\t\t\t\t\t\t\t\t";
        } else {
            // line 103
            echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t  <td class=\"center\" colspan=\"8\">";
            // line 104
            echo ($context["text_no_results"] ?? null);
            echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
        }
        // line 107
        echo "\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t\t<div class=\"pagination\">";
        // line 109
        echo ($context["pagination"] ?? null);
        echo "</div>
\t\t\t\t</div>
            </div>
          </div>\t\t  
        </form>
      </div>
    </div>
  </div>
</div>
  <script type=\"text/javascript\" src=\"view/javascript/summernote/summernote.js\"></script>
  <link href=\"view/javascript/summernote/summernote.css\" rel=\"stylesheet\" />
  <script type=\"text/javascript\" src=\"view/javascript/summernote/summernote-image-attributes.js\"></script>
  <script type=\"text/javascript\" src=\"view/javascript/summernote/opencart.js\"></script>
 <script type=\"text/javascript\"><!--
function addModule() {
\tvar user_token = Math.random().toString(36).substr(2);
\t\t\t
\thtml  = '<tr id=\"module-row' + user_token + '\">';
\thtml += '  <td class=\"text-right\">' + (\$('tbody tr').length + 1) + '</td>';
\thtml += '  <td class=\"text-left\"><input type=\"text\" name=\"newslettersubscribe_module[' + user_token + '][limit]\" value=\"5\" placeholder=\"";
        // line 128
        echo ($context["entry_limit"] ?? null);
        echo "\" class=\"form-control\" /></td>';
\thtml += '  <td class=\"text-left\"><input type=\"text\" name=\"newslettersubscribe_module[' + user_token + '][width]\" value=\"200\" placeholder=\"";
        // line 129
        echo ($context["entry_width"] ?? null);
        echo "\" class=\"form-control\" /> <input type=\"text\" name=\"newslettersubscribe_module[' + user_token + '][height]\" value=\"200\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" class=\"form-control\" /></td>';\t
\thtml += '  <td class=\"text-left\"><button type=\"button\" onclick=\"\$(\\'#module-row' + user_token + '\\').remove();\" data-toggle=\"tooltip\" title=\"";
        // line 130
        echo ($context["button_remove"] ?? null);
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>';
\thtml += '</tr>';
\t
\t\$('#module tbody').append(html);
}
//--></script></div> 
<script  type =\"text/javascript\">
\t\$('#module li:first-child a').tab('show');
\t\$('#input-description').summernote({
\t\theight: 300
\t});
</script> 
<script type=\"text/javascript\"><!--\t
\$('select[name=\\'to\\']').bind('change', function() {
\t\$('#mail .to').hide();
\t\$('#mail #to-' + \$(this).val().replace('_', '-')).show();
\t
});

\$('select[name=\\'to\\']').trigger('change');
//--></script> 
<script type=\"text/javascript\"><!--
\$.widget('custom.catcomplete', \$.ui.autocomplete, {
\t_renderMenu: function(ul, items) {
\t\tvar self = this, currentCategory = '';
\t\t
\t\t\$.each(items, function(index, item) {
\t\t\tif (item.category != currentCategory) {
\t\t\t\tul.append('<li class=\"ui-autocomplete-category\">' + item.category + '</li>');
\t\t\t\t
\t\t\t\tcurrentCategory = item.category;
\t\t\t}
\t\t\t
\t\t\tself._renderItemData (ul, item);
\t\t});
\t}
});

\$('input[name=\\'customers\\']').catcomplete({
\tdelay: 500,
\tsource: function(request, response) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=sale/customer/autocomplete&user_token=";
        // line 172
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request.term),
\t\t\tdataType: 'json',
\t\t\tsuccess: function(json) {\t
\t\t\t\tresponse(\$.map(json, function(item) {
\t\t\t\t\treturn {
\t\t\t\t\t\tcategory: item.customer_group,
\t\t\t\t\t\tlabel: item.name,
\t\t\t\t\t\tvalue: item.customer_id
\t\t\t\t\t}
\t\t\t\t}));
\t\t\t}
\t\t});
\t\t
\t}, 
\tselect: function(event, ui) {
\t\t\$('#customer' + ui.item.value).remove();
\t\t
\t\t\$('#customer').append('<div id=\"customer' + ui.item.value + '\">' + ui.item.label + '<img src=\"view/image/delete.png\" alt=\"\" /><input type=\"hidden\" name=\"customer[]\" value=\"' + ui.item.value + '\" /></div>');

\t\t\$('#customer div:odd').attr('class', 'odd');
\t\t\$('#customer div:even').attr('class', 'even');
\t\t\t\t
\t\treturn false;
\t},
\tfocus: function(event, ui) {
      \treturn false;
   \t}
});

\$('#customer div img').bind('click', function() {
\t\$(this).parent().remove();
\t
\t\$('#customer div:odd').attr('class', 'odd');
\t\$('#customer div:even').attr('class', 'even');\t
});
//--></script> 
<script type=\"text/javascript\"><!--\t
\$('input[name=\\'affiliates\\']').autocomplete({
\tdelay: 500,
\tsource: function(request, response) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=sale/affiliate/autocomplete&user_token=";
        // line 213
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request.term),
\t\t\tdataType: 'json',
\t\t\tsuccess: function(json) {\t\t
\t\t\t\tresponse(\$.map(json, function(item) {
\t\t\t\t\treturn {
\t\t\t\t\t\tlabel: item.name,
\t\t\t\t\t\tvalue: item.affiliate_id
\t\t\t\t\t}
\t\t\t\t}));
\t\t\t}
\t\t});
\t\t
\t}, 
\tselect: function(event, ui) {
\t\t\$('#affiliate' + ui.item.value).remove();
\t\t
\t\t\$('#affiliate').append('<div id=\"affiliate' + ui.item.value + '\">' + ui.item.label + '<img src=\"view/image/delete.png\" alt=\"\" /><input type=\"hidden\" name=\"affiliate[]\" value=\"' + ui.item.value + '\" /></div>');

\t\t\$('#affiliate div:odd').attr('class', 'odd');
\t\t\$('#affiliate div:even').attr('class', 'even');
\t\t\t\t
\t\treturn false;
\t},
\tfocus: function(event, ui) {
      \treturn false;
   \t}
});

\$('#affiliate div img').bind('click', function() {
\t\$(this).parent().remove();
\t
\t\$('#affiliate div:odd').attr('class', 'odd');
\t\$('#affiliate div:even').attr('class', 'even');\t
});

\$('input[name=\\'products\\']').autocomplete({
\tdelay: 500,
\tsource: function(request, response) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=catalog/product/autocomplete&user_token=";
        // line 252
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request.term),
\t\t\tdataType: 'json',
\t\t\tsuccess: function(json) {\t\t
\t\t\t\tresponse(\$.map(json, function(item) {
\t\t\t\t\treturn {
\t\t\t\t\t\tlabel: item.name,
\t\t\t\t\t\tvalue: item.product_id
\t\t\t\t\t}
\t\t\t\t}));
\t\t\t}
\t\t});
\t}, 
\tselect: function(event, ui) {
\t\t\$('#product' + ui.item.value).remove();
\t\t
\t\t\$('#product').append('<div id=\"product' + ui.item.value + '\">' + ui.item.label + '<img src=\"view/image/delete.png\" alt=\"\" /><input type=\"hidden\" name=\"product[]\" value=\"' + ui.item.value + '\" /></div>');

\t\t\$('#product div:odd').attr('class', 'odd');
\t\t\$('#product div:even').attr('class', 'even');
\t\t\t\t
\t\treturn false;
\t},
\tfocus: function(event, ui) {
      \treturn false;
   \t}
});

\$('#product div img').bind('click', function() {
\t\$(this).parent().remove();
\t
\t\$('#product div:odd').attr('class', 'odd');
\t\$('#product div:even').attr('class', 'even');\t
});

function send(url) { 
\t
\t\$.ajax({
\t\turl: url,
\t\ttype: 'post',
\t\tdata: \$('#form-html').serialize(),\t\t
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('#button-send').attr('disabled', true);
\t\t\t\$('#button-send').before('<span class=\"wait\"><img src=\"view/image/loading.gif\" alt=\"\" />&nbsp;</span>');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-send').attr('disabled', false);
\t\t\t//\$('.wait').html('Sent mail successfully');
\t\t},\t\t\t\t
\t\tsuccess: function(json) {
\t\t\t\$('.success, .warning, .error').remove();
\t\t\t
\t\t\tif (json['error']) {
\t\t\t\tif (json['error']['warning']) {
\t\t\t\t\t\$('.box').before('<div class=\"warning\" style=\"display: none;\">' + json['error']['warning'] + '</div>');
\t\t\t
\t\t\t\t\t\$('.warning').fadeIn('slow');
\t\t\t\t}
\t\t\t\t
\t\t\t\tif (json['error']['subject']) {
\t\t\t\t\t\$('input[name=\\'subject\\']').after('<span class=\"error\">' + json['error']['subject'] + '</span>');
\t\t\t\t}\t
\t\t\t\t
\t\t\t\tif (json['error']['message']) {
\t\t\t\t\t\$('textarea[name=\\'message\\']').parent().append('<span class=\"error\">' + json['error']['message'] + '</span>');
\t\t\t\t}\t\t\t\t\t\t\t\t\t
\t\t\t}\t\t\t
\t\t\t
\t\t\tif (json['next']) {
\t\t\t\tif (json['success']) {
\t\t\t\t\t\$('.box').before('<div class=\"success\">' + json['success'] + '</div>');
\t\t\t\t\t
\t\t\t\t\tsend(json['next']);
\t\t\t\t}\t\t
\t\t\t} else {
\t\t\t\tif (json['success']) {
\t\t\t\t\t\$('.box').before('<div class=\"success\" style=\"display: none;\">' + json['success'] + '</div>');
\t\t\t
\t\t\t\t\t\$('.success').fadeIn('slow');
\t\t\t\t}\t\t\t\t\t
\t\t\t}\t\t\t\t
\t\t}
\t});
}
//--></script>
";
        // line 337
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/newslettersubscribe.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  562 => 337,  474 => 252,  432 => 213,  388 => 172,  343 => 130,  337 => 129,  333 => 128,  311 => 109,  307 => 107,  301 => 104,  298 => 103,  295 => 102,  287 => 99,  276 => 97,  272 => 96,  267 => 94,  263 => 93,  259 => 92,  256 => 91,  250 => 89,  244 => 87,  242 => 86,  238 => 84,  233 => 83,  231 => 82,  213 => 67,  207 => 63,  202 => 61,  197 => 60,  192 => 58,  187 => 57,  185 => 56,  179 => 53,  174 => 50,  167 => 48,  161 => 46,  159 => 45,  149 => 44,  140 => 43,  136 => 42,  129 => 40,  124 => 37,  118 => 35,  116 => 34,  110 => 33,  105 => 31,  100 => 29,  94 => 26,  90 => 24,  82 => 20,  80 => 19,  69 => 13,  63 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/newslettersubscribe.twig", "");
    }
}
