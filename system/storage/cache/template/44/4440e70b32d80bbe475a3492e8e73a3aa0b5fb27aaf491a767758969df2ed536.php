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

/* fashionist/template/product/category.twig */
class __TwigTemplate_1d4b64722188b7f0cd0331044fa6859935e4f318119c46c4fd63987d0ded0ab4 extends \Twig\Template
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
  <h2 class=\"page-title\">";
        // line 3
        echo ($context["heading_title"] ?? null);
        echo "</h2>
  <ul class=\"breadcrumb\">
    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 6
            echo "    <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 6);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 6);
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "  </ul>
</div>
<div id=\"product-category\" class=\"container\">
  <div class=\"row\">
  <div class=\"wrapper_container\">";
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
        echo "\">";
        echo ($context["content_top"] ?? null);
        echo "
      <div class=\"products\">
        ";
        // line 22
        if ((($context["thumb"] ?? null) || ($context["description"] ?? null))) {
            // line 23
            echo "          <div class=\"category_banner\">
            <div class=\"row\">
              <div class=\"col-sm-12 category-title\">";
            // line 25
            echo ($context["heading_title"] ?? null);
            echo "</div>
              ";
            // line 26
            if (($context["description"] ?? null)) {
                // line 27
                echo "              <div class=\"col-sm-12 category_description\">";
                echo ($context["description"] ?? null);
                echo "</div>
              ";
            }
            // line 29
            echo "            </div>
          </div>
        ";
        }
        // line 31
        echo "\t\t
        ";
        // line 32
        if ((($context["subcategory_type"] ?? null) != "none")) {
            // line 33
            echo "            ";
            if (($context["categories"] ?? null)) {
                // line 34
                echo "              <div class=\"refine-search\">
                  <div class=\"row\">
                    <div class=\"col-sm-12 category-list\">
                      <ul class=\"";
                // line 37
                if ((($context["subcategory_type"] ?? null) == "slider")) {
                    echo " owl-carousel ";
                } else {
                    echo "row";
                }
                echo "\">
                        ";
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 39
                    echo "                          <li class=\"item ";
                    if ((($context["subcategory_type"] ?? null) == "grid")) {
                        echo "col-md-3 col-sm-3 col-xs-4";
                    }
                    echo "\">
                            <a href=\"";
                    // line 40
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 40);
                    echo "\">
                              <img src=\"";
                    // line 41
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "subcategory_image", [], "any", false, false, false, 41);
                    echo "\" />
                              <span class=\"subcategory-title\">";
                    // line 42
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 42);
                    echo "</span>
                            </a>
                          </li>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 46
                echo "                      </ul>
                    </div>
                  </div>
              </div>
            ";
            }
            // line 51
            echo "        ";
        }
        echo "\t\t
        ";
        // line 52
        if (($context["products"] ?? null)) {
            // line 53
            echo "          <div class=\"product-list-top\">
            <div class=\"row\">
              <div class=\"btn-list-grid\">
                <div class=\"btn-group btn-group-sm\">
                  <button type=\"button\" id=\"grid-view\" class=\"btn btn-default\" data-toggle=\"tooltip\" title=\"";
            // line 57
            echo ($context["button_grid"] ?? null);
            echo "\"><i class=\"fa fa-th\"></i></button>
                  <button type=\"button\" id=\"list-view\" class=\"btn btn-default\" data-toggle=\"tooltip\" title=\"";
            // line 58
            echo ($context["button_list"] ?? null);
            echo "\"><i class=\"fa fa-th-list\"></i></button>                
                </div>
              </div>
              <div class=\"compare-total\"><a href=\"";
            // line 61
            echo ($context["compare"] ?? null);
            echo "\" id=\"compare-total\">";
            echo ($context["text_compare"] ?? null);
            echo "</a></div>
              <div class=\"pagination-right\">
                <div class=\"sort-by-wrapper\">
                  <div class=\"col-md-2 text-right sort-by\">
                    <label class=\"control-label\" for=\"input-sort\">";
            // line 65
            echo ($context["text_sort"] ?? null);
            echo "</label>
                  </div>
                  <div class=\"col-md-3 text-right sort\">
                    <div class=\"select-wrapper\">
                      <select id=\"input-sort\" class=\"form-control\" onchange=\"location = this.value;\">
                        ";
            // line 70
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["sorts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
                // line 71
                echo "                        ";
                if ((twig_get_attribute($this->env, $this->source, $context["sorts"], "value", [], "any", false, false, false, 71) == sprintf("%s-%s", ($context["sort"] ?? null), ($context["order"] ?? null)))) {
                    // line 72
                    echo "                        <option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 72);
                    echo "\" selected=\"selected\">";
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 72);
                    echo "</option>
                        ";
                } else {
                    // line 73
                    echo "                    
                        <option value=\"";
                    // line 74
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 74);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 74);
                    echo "</option>
                        ";
                }
                // line 76
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "                      </select>
                    </div>
                  </div>
                </div>
                <div class=\"show-wrapper\">
                  <div class=\"col-md-1 text-right show\">
                    <label class=\"control-label\" for=\"input-limit\">";
            // line 83
            echo ($context["text_limit"] ?? null);
            echo "</label>
                  </div>
                  <div class=\"col-md-2 text-right limit\">
                    <div class=\"select-wrapper\">
                      <select id=\"input-limit\" class=\"form-control\" onchange=\"location = this.value;\">
                        ";
            // line 88
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["limits"]);
            foreach ($context['_seq'] as $context["_key"] => $context["limits"]) {
                // line 89
                echo "                        ";
                if ((twig_get_attribute($this->env, $this->source, $context["limits"], "value", [], "any", false, false, false, 89) == ($context["limit"] ?? null))) {
                    // line 90
                    echo "                        <option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 90);
                    echo "\" selected=\"selected\">";
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 90);
                    echo "</option>
                        ";
                } else {
                    // line 92
                    echo "                        <option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 92);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 92);
                    echo "</option>
                        ";
                }
                // line 94
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limits'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "                  
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=\"row product-list-js\"> 
            ";
            // line 103
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 104
                echo "            <div class=\"product-layout product-list\" data-countdowntime=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 104);
                echo "\">
              <div class=\"product-container\">
                <div class=\"product-thumb\">
                  <div class=\"image\">
                    <a href=\"";
                // line 108
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 108);
                echo "\">
                          <img src=\"";
                // line 109
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 109);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 109);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 109);
                echo "\" class=\"img-responsive\" />
                          ";
                // line 110
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 110) != "") && (($context["hover_image"] ?? null) == 1))) {
                    // line 111
                    echo "                            <img class=\"product-img-extra img-responsive\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 111);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 111);
                    echo "\" src= \"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 111);
                    echo "\"/>
                          ";
                }
                // line 113
                echo "                        </a>  
    \t\t\t\t        ";
                // line 114
                if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 114)) {
                    echo "<span class=\"outstock-overlay\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 114);
                    echo "</span>";
                }
                // line 115
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 115)) {
                    // line 116
                    echo "                      <div class=\"rating\">
                        ";
                    // line 117
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 118
                        echo "                          ";
                        if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 118) < $context["i"])) {
                            echo " 
                            <span class=\"fa fa-stack\">
                              <i class=\"fa fa-star gray fa-stack-2x\"></i>
                            </span> 
                          ";
                        } else {
                            // line 122
                            echo " 
                            <span class=\"fa fa-stack\">
                              <i class=\"fa fa-star yellow fa-stack-2x\"></i>
                            </span> 
                          ";
                        }
                        // line 127
                        echo "                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 128
                    echo "                      </div>
                      ";
                } else {
                    // line 130
                    echo "                      <div class=\"rating\">
                        ";
                    // line 131
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 132
                        echo "                        <span class=\"fa fa-stack\">
                          <i class=\"fa fa-star gray fa-stack-2x\"></i>
                          </span>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 136
                    echo "                      </div>
                    ";
                }
                // line 138
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 138) && (($context["category_page_counter"] ?? null) == 1))) {
                    // line 139
                    echo "                      <div class='countdown-container'>
                        <div class='countdown-days counter'>
                          <span class=\"data\"></span>
                          <span class=\"lbl\">";
                    // line 142
                    echo ($context["days_name"] ?? null);
                    echo "</span>
                        </div>
                        <div class='countdown-hours counter'>
                          <span class=\"data\"></span>
                          <span class=\"lbl\">";
                    // line 146
                    echo ($context["hours_name"] ?? null);
                    echo "</span>
                        </div>
                        <div class='countdown-minutes counter'>
                          <span class=\"data\"></span>
                          <span class=\"lbl\">";
                    // line 150
                    echo ($context["min_name"] ?? null);
                    echo "</span>
                        </div>
                        <div class='countdown-seconds counter'>
                          <span class=\"data\"></span>
                          <span class=\"lbl\">";
                    // line 154
                    echo ($context["sec_name"] ?? null);
                    echo "</span>
                        </div>
                      </div>
                    ";
                }
                // line 157
                echo "\t
                    <div class=\"button-group\">  
                        <div class=\"btn-quickview\"> 
                          <div class=\"quickview-button button\" data-toggle=\"tooltip\" title=\" ";
                // line 160
                echo ($context["quick_view"] ?? null);
                echo "\"> 
                            <a class=\"quickbox\" href=\"";
                // line 161
                echo twig_get_attribute($this->env, $this->source, $context["product"], "quick", [], "any", false, false, false, 161);
                echo "\">
                              <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                <symbol id=\"quickview-eye-open\" viewBox=\"0 0 900 900\"><title>eye-open</title>
                                 <g>
                                  <g>
                                    <path d=\"M508.745,246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818,239.784,3.249,246.035c-4.332,5.936-4.332,13.987,0,19.923c4.569,6.257,113.557,153.206,252.748,153.206s248.174-146.95,252.748-153.201
                                    C513.083,260.028,513.083,251.971,508.745,246.041z M255.997,385.406c-102.529,0-191.33-97.533-217.617-129.418
                                    c26.253-31.913,114.868-129.395,217.617-129.395c102.524,0,191.319,97.516,217.617,129.418
                                    C447.361,287.923,358.746,385.406,255.997,385.406z\"/>
                                  </g>
                                  <g>
                                    <path d=\"M255.997,154.725c-55.842,0-101.275,45.433-101.275,101.275s45.433,101.275,101.275,101.275s101.275-45.433,101.275-101.275S311.839,154.725,255.997,154.725z M255.997,323.516c-37.23,0-67.516-30.287-67.516-67.516s30.287-67.516,67.516-67.516s67.516,30.287,67.516,67.516S293.227,323.516,255.997,323.516z\"/>
                                  </g>
                                  <g>
                                    <path d=\"M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z\"/>
                                  </g>
                                </g></symbol>
                              </svg>
                              <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#quickview-eye-open\" x=\"20%\" y=\"18%\"></use></svg>
                              <i class=\"fa fa-eye\" aria-hidden=\"true\"></i>
                              <span class=\"lblcart\">";
                // line 181
                echo ($context["quick_view"] ?? null);
                echo "</span>
                            </a>
                          </div>
                        </div>
                        <div class=\"btn-wishlist\">
                          <button type=\"button\" data-toggle=\"tooltip\" title=\"";
                // line 186
                echo ($context["button_wishlist"] ?? null);
                echo "\" onclick=\"wishlist.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 186);
                echo "');\"><i class=\"fa fa-heart\"></i>                            
                            <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                              <symbol id=\"heart-fillshape-outline\" viewBox=\"0 0 1050 1050\"><title>heart-fillshape-outline</title><path d=\"M475.366,71.949c-24.175-23.606-57.575-35.404-100.215-35.404c-11.8,0-23.843,2.046-36.117,6.136c-12.279,4.093-23.702,9.615-34.256,16.562c-10.568,6.945-19.65,13.467-27.269,19.556c-7.61,6.091-14.845,12.564-21.696,19.414c-6.854-6.85-14.087-13.323-21.698-19.41c-7.616-6.089-16.702-12.607-27.268-19.556c-10.564-6.95-21.985-12.468-34.261-16.562c-12.275-4.089-24.316-6.136-36.116-6.136c-42.637,0-76.039,11.801-100.211,35.404C12.087,95.55,0,128.286,0,170.16c0,12.753,2.24,25.891,6.711,39.398c4.471,13.514,9.566,25.031,15.275,34.546c5.708,9.514,12.181,18.792,19.414,27.834c7.233,9.041,12.519,15.272,15.846,18.698c3.33,3.426,5.948,5.903,7.851,7.427L243.25,469.938c3.427,3.426,7.614,5.144,12.562,5.144s9.138-1.718,12.563-5.144l177.87-171.31c43.588-43.58,65.38-86.406,65.38-128.472C511.626,128.279,499.54,95.546,475.366,71.949z M421.405,271.795L255.813,431.391L89.938,271.507C54.344,235.922,36.55,202.133,36.55,170.156c0-15.415,2.046-29.026,6.136-40.824c4.093-11.8,9.327-21.177,15.703-28.124c6.377-6.949,14.132-12.607,23.268-16.988c9.141-4.377,18.086-7.328,26.84-8.85c8.754-1.52,18.079-2.281,27.978-2.281c9.896,0,20.557,2.424,31.977,7.279c11.418,4.853,21.934,10.944,31.545,18.271c9.613,7.332,17.845,14.183,24.7,20.557c6.851,6.38,12.559,12.229,17.128,17.559c3.424,4.189,8.091,6.283,13.989,6.283c5.9,0,10.562-2.094,13.99-6.283c4.568-5.33,10.28-11.182,17.131-17.559c6.852-6.374,15.085-13.222,24.694-20.557c9.613-7.327,20.129-13.418,31.553-18.271c11.416-4.854,22.08-7.279,31.977-7.279s19.219,0.761,27.977,2.281c8.757,1.521,17.702,4.473,26.84,8.85c9.137,4.38,16.892,10.042,23.267,16.988c6.376,6.947,11.612,16.324,15.705,28.124c4.086,11.798,6.132,25.409,6.132,40.824C475.078,202.133,457.19,236.016,421.405,271.795z\"/>
                              </symbol>
                            </svg>
                            <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#heart-fillshape-outline\" x=\"24%\" y=\"26%\"></use></svg>
                          </button>
                        </div>
                        <div class=\"btn-compare\">  
                          <button type=\"button\" data-toggle=\"tooltip\" title=\"";
                // line 195
                echo ($context["button_compare"] ?? null);
                echo "\" onclick=\"compare.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 195);
                echo "');\"><i class=\"fa fa-exchange\"></i>                            
                            <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                              <symbol id=\"report\" viewBox=\"0 0 1200 1200\"><title>report</title><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m480 258.667969h60v220h-60zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m200 118.667969h60v360h-60zm0 0\"/><path d=\"m340-1.332031h60v480h-60zm0 0\"/><path d=\"m60 358.667969h60v120h-60zm0 0\"/><path d=\"m60 548.667969c.035156-3.414063.65625-6.796875 1.839844-10h-51.839844c-5.523438 0-10 4.476562-10 10 0 5.519531 4.476562 10 10 10h51.839844c-1.183594-3.203125-1.804688-6.589844-1.839844-10zm0 0\"/><path d=\"m118.160156 538.667969c2.457032 6.4375 2.457032 13.558593 0 20h83.679688c-2.457032-6.441407-2.457032-13.5625 0-20zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m341.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m481.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m590 538.667969h-51.839844c2.457032 6.4375 2.457032 13.558593 0 20h51.839844c5.523438 0 10-4.480469 10-10 0-5.523438-4.476562-10-10-10zm0 0\"/></symbol>
                            </svg>
                            <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#report\" x=\"22%\" y=\"28%\"></use></svg>
                          </button>
                        </div>
                        <div class=\"btn-cart\">
                          <button data-toggle=\"tooltip\" title=\"";
                // line 203
                echo ($context["button_cart"] ?? null);
                echo "\" onclick=\"cart.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 203);
                echo "');\" ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 203)) {
                    echo " class=\"sold-out\" disabled";
                }
                echo ">
                              <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                <symbol id=\"shopping-cart-button1\" viewBox=\"0 0 1000 1000\"><title>shopping-cart-button1</title>
                                  <path d=\"M405.387,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S440.588,362.612,405.387,362.612zM405.387,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536c14.083,0,25.536,11.453,25.536,25.536S419.47,451.988,405.387,451.988z\"/><path d=\"M507.927,115.875c-3.626-4.641-9.187-7.348-15.079-7.348H118.22l-17.237-72.12c-2.062-8.618-9.768-14.702-18.629-14.702H19.152C8.574,21.704,0,30.278,0,40.856s8.574,19.152,19.152,19.152h48.085l62.244,260.443c2.062,8.625,9.768,14.702,18.629,14.702h298.135c8.80,0,16.477-6.001,18.59-14.543l46.604-188.329C512.849,126.562,511.553,120.516,507.927,115.875zM431.261,296.85H163.227l-35.853-150.019h341.003L431.261,296.85z\"/><path d=\"M173.646,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S208.847,362.612,173.646,362.612z M173.646,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536s25.536,11.453,25.536,25.536S187.729,451.988,173.646,451.988z\"/></symbol>
                              </svg>
                              <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#shopping-cart-button1\" x=\"18%\" y=\"25%\"></use></svg>
                              <span class=\"lblcart\">";
                // line 209
                echo ($context["button_cart"] ?? null);
                echo "</span>
                          </button>
                        </div>
                    </div>  
                  </div>
                  <div class=\"caption\"> 
                    <h4><a href=\"";
                // line 215
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 215);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 215);
                echo "</a></h4>
                    <p class=\"description\">";
                // line 216
                echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 216);
                echo "</p>
                    ";
                // line 217
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 217)) {
                    // line 218
                    echo "                      <p class=\"price\"> 
                        ";
                    // line 219
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 219)) {
                        // line 220
                        echo "                        ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 220);
                        echo "
                        ";
                    } else {
                        // line 221
                        echo " <span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 221);
                        echo "</span> 
                        <span class=\"price-old\">";
                        // line 222
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 222);
                        echo "</span> 
                        ";
                    }
                    // line 224
                    echo "                        ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 224)) {
                        echo " 
                        <span class=\"price-tax\">";
                        // line 225
                        echo ($context["text_tax"] ?? null);
                        echo " ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 225);
                        echo "</span> 
                        ";
                    }
                    // line 226
                    echo " 
                      </p>
                    ";
                }
                // line 228
                echo " 
                  </div>    
                </div>
              </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 233
            echo " 
          </div>
          <div class=\"category-pagination\">
            <div class=\"row\">
              <div class=\"col-sm-6 col-xs-12 text-left pagination-desc\">";
            // line 237
            echo ($context["results"] ?? null);
            echo "</div>
              <div class=\"col-sm-6 col-xs-12 text-right\">";
            // line 238
            echo ($context["pagination"] ?? null);
            echo "</div>
            </div>
          </div>
        ";
        }
        // line 242
        echo "      </div>
      ";
        // line 243
        if (( !($context["categories"] ?? null) &&  !($context["products"] ?? null))) {
            // line 244
            echo "      <p>";
            echo ($context["text_empty"] ?? null);
            echo "</p>
      <div class=\"buttons\">
        <div class=\"pull-right\"><a href=\"";
            // line 246
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
      </div>
      ";
        }
        // line 249
        echo "      ";
        echo ($context["content_middle"] ?? null);
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 250
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
</div>
";
        // line 253
        echo ($context["footer"] ?? null);
        echo "
<script type=\"text/javascript\">
  \$('.category-list .owl-carousel').owlCarousel({
    loop:false,
    nav:true,    
    margin: 30,
    dots: false,      
    rewind: true,
    rtl: \$('html').attr('dir') == 'rtl'? true : false,  
    navText: [\"<i class='fa fa-angle-left'></i>\",\"<i class='fa fa-angle-right'></i>\"],
    responsive:{
          0:{
              items:2
          },
          450:{
              items:3
          },
          767:{
              items:3
          },
          991:{
              items:3
          },
          1200:{
              items:4
          }
      }
  });   
</script>";
    }

    public function getTemplateName()
    {
        return "fashionist/template/product/category.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  643 => 253,  637 => 250,  631 => 249,  623 => 246,  617 => 244,  615 => 243,  612 => 242,  605 => 238,  601 => 237,  595 => 233,  584 => 228,  579 => 226,  572 => 225,  567 => 224,  562 => 222,  557 => 221,  551 => 220,  549 => 219,  546 => 218,  544 => 217,  540 => 216,  534 => 215,  525 => 209,  510 => 203,  497 => 195,  483 => 186,  475 => 181,  452 => 161,  448 => 160,  443 => 157,  436 => 154,  429 => 150,  422 => 146,  415 => 142,  410 => 139,  407 => 138,  403 => 136,  394 => 132,  390 => 131,  387 => 130,  383 => 128,  377 => 127,  370 => 122,  361 => 118,  357 => 117,  354 => 116,  351 => 115,  345 => 114,  342 => 113,  332 => 111,  330 => 110,  322 => 109,  318 => 108,  310 => 104,  306 => 103,  290 => 94,  282 => 92,  274 => 90,  271 => 89,  267 => 88,  259 => 83,  251 => 77,  245 => 76,  238 => 74,  235 => 73,  227 => 72,  224 => 71,  220 => 70,  212 => 65,  203 => 61,  197 => 58,  193 => 57,  187 => 53,  185 => 52,  180 => 51,  173 => 46,  163 => 42,  159 => 41,  155 => 40,  148 => 39,  144 => 38,  136 => 37,  131 => 34,  128 => 33,  126 => 32,  123 => 31,  118 => 29,  112 => 27,  110 => 26,  106 => 25,  102 => 23,  100 => 22,  92 => 20,  89 => 19,  86 => 18,  83 => 17,  80 => 16,  77 => 15,  74 => 14,  72 => 13,  68 => 12,  62 => 8,  51 => 6,  47 => 5,  42 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/product/category.twig", "");
    }
}
