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

/* fashionist/template/extension/module/newslettersubscribe.twig */
class __TwigTemplate_2f47b915bfb1395d959c68e1dd900760039a8bf11e58bbd70103af4a05148aad extends \Twig\Template
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
        echo "<div id=\"_desktop_block_newsletter\">
\t<div class=\"block_newsletter col-lg-3 col-md-3 col-sm-12 col-xs-12\">
\t\t<div id=\"boxes\" class=\"newletter-container\">
\t\t\t<div style=\"\" id=\"dialog\" class=\"window\">
\t\t\t\t<div class=\"box\">
\t\t\t\t\t<div id=\"newsletter-container\" class=\"box-content\">
\t\t\t\t\t\t<div id=\"frm_subscribe\" class=\"newsletter_form\">
\t\t\t\t\t\t\t<form name=\"subscribe\" id=\"subscribe\">
\t\t\t\t\t\t\t\t<input type=\"text\" class=\"text-email\" placeholder=\"";
        // line 9
        echo ($context["entry_email"] ?? null);
        echo "\" value=\"\" name=\"subscribe_email\" id=\"subscribe_email\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"text-email\" placeholder=\"";
        // line 10
        echo ($context["entry_email"] ?? null);
        echo "\" value=\"\" name=\"subscribe_name\" id=\"subscribe_name\" />
\t\t\t\t\t\t\t\t<a class=\"button btn-submit\" onclick=\"email_subscribe()\"><span>";
        // line 11
        echo ($context["entry_button"] ?? null);
        echo "</span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<div id=\"notification-normal\"></div>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>\t
\t\t</div>
\t\t<script type=\"text/javascript\">
\t\t\tfunction email_subscribe(){
\t\t\t\t\$.ajax({
\t\t\t\t\t\ttype: 'post',
\t\t\t\t\t\turl: 'index.php?route=extension/module/newslettersubscribe/subscribe',
\t\t\t\t\t\tdataType: 'html',
\t\t\t\t\t\tdata:\$(\"#subscribe\").serialize(),
\t\t\t\t\t\tsuccess: function (html) {
\t\t\t\t\t\ttry {
\t\t\t\t\t\t
\t\t\t\t\t\t\teval(html);
\t\t\t\t\t\t
\t\t\t\t\t\t} catch (e) {
\t\t\t\t\t\t}
\t\t\t\t\t\t\t
\t\t\t\t\t\t}});\t
\t\t\t}
\t\t\tfunction email_unsubscribe(){
\t\t\t\t\$.ajax({
\t\t\t\t\t\ttype: 'post',
\t\t\t\t\t\turl: 'index.php?route=extension/module/newslettersubscribe/unsubscribe',
\t\t\t\t\t\tdataType: 'html',
\t\t\t\t\t\tdata:\$(\"#subscribe\").serialize(),
\t\t\t\t\t\tsuccess: function (html) {
\t\t\t\t\t\t\t\ttry {
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\teval(html);
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t} catch (e) {
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t}}); 
\t\t\t\t\$('html, body').delay( 1500 ).animate({ scrollTop: 0 }, 'slow'); 
\t\t\t}
\t\t</script>
\t\t<script type=\"text/javascript\">
\t\t\t\$(document).ready(function() {
\t\t\t\t\$('#subscribe_email').keypress(function(e) {
\t\t\t\t\tif(e.which == 13) {
\t\t\t\t\t\te.preventDefault();
\t\t\t\t\t\temail_subscribe();
\t\t\t\t\t}
\t\t\t\t\tvar name= \$(this).val();
\t\t\t\t\t\$('#subscribe_name').val(name);
\t\t\t\t});
\t\t\t\t\$('#subscribe_email').change(function() {
\t\t\t\tvar name= \$(this).val();
\t\t\t\t\t\t\$('#subscribe_name').val(name);
\t\t\t\t});
\t\t\t
\t\t\t});
\t\t</script>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "fashionist/template/extension/module/newslettersubscribe.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 11,  51 => 10,  47 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/newslettersubscribe.twig", "");
    }
}
