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

/* fashionist/template/extension/module/ishiproductsblock.twig */
class __TwigTemplate_b303c97e5fafc68d89b2bdab45ef2cc8b5b4366c23ac96d7b669f4fd9e85211e extends \Twig\Template
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
        echo "\" class=\"ishiproductsblock container\">
  <div class=\"row\">
  <h3 class=\"home-title\">";
        // line 3
        echo ($context["heading"] ?? null);
        echo "</h3>
  <p class=\"sub-title\">";
        // line 4
        echo ($context["subtitle"] ?? null);
        echo "</p>
  <ul class=\"ishiproductstab nav nav-tabs clearfix\">
    ";
        // line 6
        if (($context["featured"] ?? null)) {
            // line 7
            echo "      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"#featured-products-block";
            // line 8
            echo ($context["tab_randomnumer"] ?? null);
            echo "\" data-toggle=\"tab\">";
            echo ($context["heading_featured"] ?? null);
            echo "</a>
      </li>
    ";
        }
        // line 11
        echo "    ";
        if (($context["bestseller"] ?? null)) {
            // line 12
            echo "      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"#bestseller-products-block";
            // line 13
            echo ($context["tab_randomnumer"] ?? null);
            echo "\" data-toggle=\"tab\">";
            echo ($context["heading_bestseller"] ?? null);
            echo "</a>
      </li>
    ";
        }
        // line 16
        echo "    ";
        if (($context["new"] ?? null)) {
            // line 17
            echo "      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"#new-products-block";
            // line 18
            echo ($context["tab_randomnumer"] ?? null);
            echo "\" data-toggle=\"tab\">";
            echo ($context["heading_new"] ?? null);
            echo "</a>
      </li>
    ";
        }
        // line 21
        echo "    ";
        if (($context["special"] ?? null)) {
            // line 22
            echo "      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"#special-products-block";
            // line 23
            echo ($context["tab_randomnumer"] ?? null);
            echo "\" data-toggle=\"tab\">";
            echo ($context["heading_special"] ?? null);
            echo "</a>
      </li>
    ";
        }
        // line 26
        echo "\t";
        if (($context["category"] ?? null)) {
            // line 27
            echo "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["product_categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 28
                echo "\t\t  <li class=\"nav-item\">
\t\t\t<a class=\"nav-link\" href=\"#category-block";
                // line 29
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 29);
                echo "-";
                echo ($context["tab_randomnumer"] ?? null);
                echo "\" data-toggle=\"tab\">";
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 29);
                echo "</a>
\t\t  </li>
\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "\t\t";
        }
        // line 33
        echo "\t</ul>

  <div class=\"tab-content\">
    <div class=\"tab-pane active\" id=\"featured-products-block";
        // line 36
        echo ($context["tab_randomnumer"] ?? null);
        echo "\">
      <div class=\"block_content\">        
        <div class=\"owl-carousel\"> 
            ";
        // line 39
        $context["counter"] = 1;
        // line 40
        echo "            ";
        $context["lastproduct"] = twig_length_filter($this->env, ($context["featured"] ?? null));
        echo " 
            ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["featured"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 42
            echo "              ";
            if ((($context["product_row"] ?? null) != 1)) {
                // line 43
                echo "                ";
                if (((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 1)) {
                    // line 44
                    echo "                  <div class=\"multilevel-item\">
                ";
                }
                // line 46
                echo "              ";
            }
            // line 47
            echo "                  <div class=\"item product-container\" data-countdowntime=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 47);
            echo "\"> 
                    <div class=\"product-thumb\">
                        <div class=\"image\">
                          <a href=\"";
            // line 50
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 50);
            echo "\">
                            <img src=\"";
            // line 51
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 51);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 51);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 51);
            echo "\" class=\"img-responsive\" />
                            ";
            // line 52
            if (((twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 52) != "") && (($context["hover_image"] ?? null) == 1))) {
                // line 53
                echo "                              <img class=\"product-img-extra img-responsive\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 53);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 53);
                echo "\" src= \"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 53);
                echo "\"/>
                            ";
            }
            // line 55
            echo "                          </a> 
                          ";
            // line 56
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 56)) {
                echo "<span class=\"outstock-overlay\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 56);
                echo "</span>";
            }
            // line 57
            echo "                          ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 57)) {
                // line 58
                echo "                            <div class=\"rating\">
                              ";
                // line 59
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 60
                    echo "                                ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 60) < $context["i"])) {
                        echo " 
                                  <span class=\"fa fa-stack\">
                                    <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                  </span> 
                                ";
                    } else {
                        // line 64
                        echo " 
                                  <span class=\"fa fa-stack\">
                                    <i class=\"fa fa-star yellow fa-stack-2x\"></i>
                                  </span> 
                                ";
                    }
                    // line 69
                    echo "                              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 70
                echo "                            </div>
                            ";
            } else {
                // line 72
                echo "                            <div class=\"rating\">
                              ";
                // line 73
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 74
                    echo "                              <span class=\"fa fa-stack\">
                                <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                </span>
                              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 78
                echo "                            </div>
                          ";
            }
            // line 79
            echo " 
                          ";
            // line 80
            if ((($context["product_counter"] ?? null) == 1)) {
                // line 81
                echo "                            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 81)) {
                    // line 82
                    echo "                              <div class='countdown-container'>
                                <div class='countdown-days counter'>
                                  <span class=\"data\"></span>
                                  <span class=\"lbl\">";
                    // line 85
                    echo ($context["days_name"] ?? null);
                    echo "</span>
                                </div>
                                <div class='countdown-hours counter'>
                                  <span class=\"data\"></span>
                                  <span class=\"lbl\">";
                    // line 89
                    echo ($context["hours_name"] ?? null);
                    echo "</span>
                                </div>
                                <div class='countdown-minutes counter'>
                                  <span class=\"data\"></span>
                                  <span class=\"lbl\">";
                    // line 93
                    echo ($context["min_name"] ?? null);
                    echo "</span>
                                </div>
                                <div class='countdown-seconds counter'>
                                  <span class=\"data\"></span>
                                  <span class=\"lbl\">";
                    // line 97
                    echo ($context["sec_name"] ?? null);
                    echo "</span>
                                </div>
                              </div>
                            ";
                }
                // line 100
                echo " 
                          ";
            }
            // line 101
            echo " 
                          <div class=\"button-group\">  
                              <div class=\"btn-quickview\"> 
                                <div class=\"quickview-button button\" data-toggle=\"tooltip\" title=\" ";
            // line 104
            echo ($context["quick_view"] ?? null);
            echo "\"> 
                                  <a class=\"quickbox\" href=\"";
            // line 105
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quick", [], "any", false, false, false, 105);
            echo "\">
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                      <symbol id=\"quickview-eye-open\" viewBox=\"0 0 900 900\"><title>eye-open</title>
                                          <path d=\"M508.745,246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818,239.784,3.249,246.035c-4.332,5.936-4.332,13.987,0,19.923c4.569,6.257,113.557,153.206,252.748,153.206s248.174-146.95,252.748-153.201
                                          C513.083,260.028,513.083,251.971,508.745,246.041z M255.997,385.406c-102.529,0-191.33-97.533-217.617-129.418
                                          c26.253-31.913,114.868-129.395,217.617-129.395c102.524,0,191.319,97.516,217.617,129.418
                                          C447.361,287.923,358.746,385.406,255.997,385.406z\"/>
                                          <path d=\"M255.997,154.725c-55.842,0-101.275,45.433-101.275,101.275s45.433,101.275,101.275,101.275s101.275-45.433,101.275-101.275S311.839,154.725,255.997,154.725z M255.997,323.516c-37.23,0-67.516-30.287-67.516-67.516s30.287-67.516,67.516-67.516s67.516,30.287,67.516,67.516S293.227,323.516,255.997,323.516z\"/>
                                          <path d=\"M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z\"/>
                                      </symbol>
                                    </svg>
                                    <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#quickview-eye-open\" x=\"20%\" y=\"18%\"></use></svg>
                                    <i class=\"fa fa-eye\" aria-hidden=\"true\"></i>
                                    <span class=\"lblcart\">";
            // line 118
            echo ($context["quick_view"] ?? null);
            echo "</span>
                                  </a>
                                </div>
                              </div>
                              <div class=\"btn-wishlist\">
                                <button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 123
            echo ($context["button_wishlist"] ?? null);
            echo "\" onclick=\"wishlist.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 123);
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
            // line 132
            echo ($context["button_compare"] ?? null);
            echo "\" onclick=\"compare.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 132);
            echo "');\"><i class=\"fa fa-exchange\"></i>                            
                                  <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                    <symbol id=\"report\" viewBox=\"0 0 1200 1200\"><title>report</title><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m480 258.667969h60v220h-60zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m200 118.667969h60v360h-60zm0 0\"/><path d=\"m340-1.332031h60v480h-60zm0 0\"/><path d=\"m60 358.667969h60v120h-60zm0 0\"/><path d=\"m60 548.667969c.035156-3.414063.65625-6.796875 1.839844-10h-51.839844c-5.523438 0-10 4.476562-10 10 0 5.519531 4.476562 10 10 10h51.839844c-1.183594-3.203125-1.804688-6.589844-1.839844-10zm0 0\"/><path d=\"m118.160156 538.667969c2.457032 6.4375 2.457032 13.558593 0 20h83.679688c-2.457032-6.441407-2.457032-13.5625 0-20zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m341.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m481.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m590 538.667969h-51.839844c2.457032 6.4375 2.457032 13.558593 0 20h51.839844c5.523438 0 10-4.480469 10-10 0-5.523438-4.476562-10-10-10zm0 0\"/></symbol>
                                  </svg>
                                  <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#report\" x=\"22%\" y=\"28%\"></use></svg>
                                </button>
                              </div>
                          </div>  
                    </div> 
                        <div class=\"caption\">
                          <h4><a href=\"";
            // line 142
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 142);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 142);
            echo "</a></h4>
                          <p class=\"description\">";
            // line 143
            echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 143);
            echo "</p>
                          ";
            // line 144
            if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 144)) {
                // line 145
                echo "                          <p class=\"price\">
                            ";
                // line 146
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 146)) {
                    // line 147
                    echo "                            ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 147);
                    echo "
                            ";
                } else {
                    // line 149
                    echo "                            <span class=\"price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 149);
                    echo "</span> <span class=\"price-new\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 149);
                    echo "</span> 
                            ";
                }
                // line 151
                echo "                            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 151)) {
                    // line 152
                    echo "                            <span class=\"price-tax\">";
                    echo ($context["text_tax"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 152);
                    echo "</span>
                            ";
                }
                // line 154
                echo "                          </p>
                          ";
            }
            // line 156
            echo "                              <div class=\"btn-cart\">
                                <button data-toggle=\"tooltip\" title=\"";
            // line 157
            echo ($context["button_cart"] ?? null);
            echo "\" onclick=\"cart.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 157);
            echo "');\" ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 157)) {
                echo " class=\"sold-out\" disabled";
            }
            echo ">
                                    <span class=\"lblcart\">";
            // line 158
            echo ($context["button_cart"] ?? null);
            echo "</span>
                                </button>
                              </div>
                        </div>
                    </div>                         
                  </div>
\t\t\t\t";
            // line 164
            if ((($context["product_row"] ?? null) != 1)) {
                // line 165
                echo "\t\t\t\t\t";
                if ((((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 0) || (($context["counter"] ?? null) == ($context["lastproduct"] ?? null)))) {
                    // line 166
                    echo "\t\t\t\t\t  </div>
\t\t\t\t\t";
                }
                // line 168
                echo "\t\t\t\t";
            }
            // line 169
            echo "\t\t\t\t";
            $context["counter"] = (($context["counter"] ?? null) + 1);
            // line 170
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 171
        echo "        </div>        
      </div>
    </div>

    <div class=\"tab-pane\" id=\"bestseller-products-block";
        // line 175
        echo ($context["tab_randomnumer"] ?? null);
        echo "\">
      <div class=\"block_content\">        
        <div class=\"owl-carousel\">      
            ";
        // line 178
        $context["counter"] = 1;
        // line 179
        echo "            ";
        $context["lastproduct"] = twig_length_filter($this->env, ($context["bestseller"] ?? null));
        // line 180
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["bestseller"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 181
            echo "              ";
            if ((($context["product_row"] ?? null) != 1)) {
                // line 182
                echo "                ";
                if (((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 1)) {
                    // line 183
                    echo "                  <div class=\"multilevel-item\">
                ";
                }
                // line 185
                echo "              ";
            }
            // line 186
            echo "                <div class=\"item product-container\" data-countdowntime=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 186);
            echo "\">
                  <div class=\"product-thumb\">
                        <div class=\"image\">
                          <a href=\"";
            // line 189
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 189);
            echo "\">
                            <img src=\"";
            // line 190
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 190);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 190);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 190);
            echo "\" class=\"img-responsive\" />
                            ";
            // line 191
            if (((twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 191) != "") && (($context["hover_image"] ?? null) == 1))) {
                // line 192
                echo "                              <img class=\"product-img-extra img-responsive\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 192);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 192);
                echo "\" src= \"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 192);
                echo "\"/>
                            ";
            }
            // line 194
            echo "                          </a>
                          ";
            // line 195
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 195)) {
                echo "<span class=\"outstock-overlay\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 195);
                echo "</span>";
            }
            // line 196
            echo "                          ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 196)) {
                // line 197
                echo "                            <div class=\"rating\">
                              ";
                // line 198
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 199
                    echo "                                ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 199) < $context["i"])) {
                        echo " 
                                  <span class=\"fa fa-stack\">
                                    <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                  </span> 
                                ";
                    } else {
                        // line 203
                        echo " 
                                  <span class=\"fa fa-stack\">
                                    <i class=\"fa fa-star yellow fa-stack-2x\"></i>
                                  </span> 
                                ";
                    }
                    // line 208
                    echo "                              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 209
                echo "                            </div>
                            ";
            } else {
                // line 211
                echo "                            <div class=\"rating\">
                              ";
                // line 212
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 213
                    echo "                              <span class=\"fa fa-stack\">
                                <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                </span>
                              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 217
                echo "                            </div>
                          ";
            }
            // line 218
            echo " 
                          ";
            // line 219
            if ((($context["product_counter"] ?? null) == 1)) {
                // line 220
                echo "                            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 220)) {
                    // line 221
                    echo "                              <div class='countdown-container'>
                                <div class='countdown-days counter'>
                                  <span class=\"data\"></span>
                                  <span class=\"lbl\">";
                    // line 224
                    echo ($context["days_name"] ?? null);
                    echo "</span>
                                </div>
                                <div class='countdown-hours counter'>
                                  <span class=\"data\"></span>
                                  <span class=\"lbl\">";
                    // line 228
                    echo ($context["hours_name"] ?? null);
                    echo "</span>
                                </div>
                                <div class='countdown-minutes counter'>
                                  <span class=\"data\"></span>
                                  <span class=\"lbl\">";
                    // line 232
                    echo ($context["min_name"] ?? null);
                    echo "</span>
                                </div>
                                <div class='countdown-seconds counter'>
                                  <span class=\"data\"></span>
                                  <span class=\"lbl\">";
                    // line 236
                    echo ($context["sec_name"] ?? null);
                    echo "</span>
                                </div>
                              </div>
                            ";
                }
                // line 239
                echo " 
                          ";
            }
            // line 241
            echo "                          <div class=\"button-group\">  
                              <div class=\"btn-quickview\"> 
                                <div class=\"quickview-button button\" data-toggle=\"tooltip\" title=\" ";
            // line 243
            echo ($context["quick_view"] ?? null);
            echo "\"> 
                                  <a class=\"quickbox\" href=\"";
            // line 244
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quick", [], "any", false, false, false, 244);
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
            // line 264
            echo ($context["quick_view"] ?? null);
            echo "</span>
                                  </a>
                                </div>
                              </div>
                              <div class=\"btn-wishlist\">
                                <button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 269
            echo ($context["button_wishlist"] ?? null);
            echo "\" onclick=\"wishlist.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 269);
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
            // line 278
            echo ($context["button_compare"] ?? null);
            echo "\" onclick=\"compare.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 278);
            echo "');\"><i class=\"fa fa-exchange\"></i>                            
                                  <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                    <symbol id=\"report\" viewBox=\"0 0 1200 1200\"><title>report</title><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m480 258.667969h60v220h-60zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m200 118.667969h60v360h-60zm0 0\"/><path d=\"m340-1.332031h60v480h-60zm0 0\"/><path d=\"m60 358.667969h60v120h-60zm0 0\"/><path d=\"m60 548.667969c.035156-3.414063.65625-6.796875 1.839844-10h-51.839844c-5.523438 0-10 4.476562-10 10 0 5.519531 4.476562 10 10 10h51.839844c-1.183594-3.203125-1.804688-6.589844-1.839844-10zm0 0\"/><path d=\"m118.160156 538.667969c2.457032 6.4375 2.457032 13.558593 0 20h83.679688c-2.457032-6.441407-2.457032-13.5625 0-20zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m341.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m481.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m590 538.667969h-51.839844c2.457032 6.4375 2.457032 13.558593 0 20h51.839844c5.523438 0 10-4.480469 10-10 0-5.523438-4.476562-10-10-10zm0 0\"/></symbol>
                                  </svg>
                                  <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#report\" x=\"22%\" y=\"28%\"></use></svg>
                                </button>
                              </div>
                              <div class=\"btn-cart\">
                                <button data-toggle=\"tooltip\" title=\"";
            // line 286
            echo ($context["button_cart"] ?? null);
            echo "\" onclick=\"cart.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 286);
            echo "');\" ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 286)) {
                echo " class=\"sold-out\" disabled";
            }
            echo ">
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                      <symbol id=\"shopping-cart-button1\" viewBox=\"0 0 1000 1000\"><title>shopping-cart-button1</title>
                                        <path d=\"M405.387,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S440.588,362.612,405.387,362.612zM405.387,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536c14.083,0,25.536,11.453,25.536,25.536S419.47,451.988,405.387,451.988z\"/><path d=\"M507.927,115.875c-3.626-4.641-9.187-7.348-15.079-7.348H118.22l-17.237-72.12c-2.062-8.618-9.768-14.702-18.629-14.702H19.152C8.574,21.704,0,30.278,0,40.856s8.574,19.152,19.152,19.152h48.085l62.244,260.443c2.062,8.625,9.768,14.702,18.629,14.702h298.135c8.80,0,16.477-6.001,18.59-14.543l46.604-188.329C512.849,126.562,511.553,120.516,507.927,115.875zM431.261,296.85H163.227l-35.853-150.019h341.003L431.261,296.85z\"/><path d=\"M173.646,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S208.847,362.612,173.646,362.612z M173.646,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536s25.536,11.453,25.536,25.536S187.729,451.988,173.646,451.988z\"/></symbol>
                                    </svg>
                                    <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#shopping-cart-button1\" x=\"18%\" y=\"25%\"></use></svg>
                                    <span class=\"lblcart\">";
            // line 292
            echo ($context["button_cart"] ?? null);
            echo "</span>
                                </button>
                              </div>
                          </div> 
                    </div> 
                        <div class=\"caption\"> 
                          <h4><a href=\"";
            // line 298
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 298);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 298);
            echo "</a></h4>
                          <p class=\"description\">";
            // line 299
            echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 299);
            echo "</p>
                          ";
            // line 300
            if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 300)) {
                // line 301
                echo "                          <p class=\"price\">
                            ";
                // line 302
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 302)) {
                    // line 303
                    echo "                            ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 303);
                    echo "
                            ";
                } else {
                    // line 305
                    echo "                            <span class=\"price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 305);
                    echo "</span> <span class=\"price-new\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 305);
                    echo "</span> 
                            ";
                }
                // line 307
                echo "                            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 307)) {
                    // line 308
                    echo "                            <span class=\"price-tax\">";
                    echo ($context["text_tax"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 308);
                    echo "</span>
                            ";
                }
                // line 310
                echo "                          </p>
                          ";
            }
            // line 312
            echo "                        </div> 
                    </div>                            
                </div>
\t\t\t\t";
            // line 315
            if ((($context["product_row"] ?? null) != 1)) {
                // line 316
                echo "\t\t\t\t\t";
                if ((((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 0) || (($context["counter"] ?? null) == ($context["lastproduct"] ?? null)))) {
                    // line 317
                    echo "\t\t\t\t\t  </div>
\t\t\t\t\t";
                }
                // line 319
                echo "\t\t\t\t";
            }
            // line 320
            echo "            ";
            $context["counter"] = (($context["counter"] ?? null) + 1);
            // line 321
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "        
        </div>        
      </div>
    </div>

    <div class=\"tab-pane\" id=\"new-products-block";
        // line 326
        echo ($context["tab_randomnumer"] ?? null);
        echo "\">
      <div class=\"block_content\">       
        <div class=\"owl-carousel\"> 
          ";
        // line 329
        $context["counter"] = 1;
        // line 330
        echo "          ";
        $context["lastproduct"] = twig_length_filter($this->env, ($context["new"] ?? null));
        // line 331
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["new"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            echo "  
            ";
            // line 332
            if ((($context["product_row"] ?? null) != 1)) {
                // line 333
                echo "              ";
                if (((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 1)) {
                    // line 334
                    echo "                <div class=\"multilevel-item\">
              ";
                }
                // line 336
                echo "            ";
            }
            // line 337
            echo "              <div class=\"item product-container\" data-countdowntime=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 337);
            echo "\">
                <div class=\"product-thumb\">
                  <div class=\"image\">
                        <a href=\"";
            // line 340
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 340);
            echo "\">
                          <img src=\"";
            // line 341
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 341);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 341);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 341);
            echo "\" class=\"img-responsive\" />
                          ";
            // line 342
            if (((twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 342) != "") && (($context["hover_image"] ?? null) == 1))) {
                // line 343
                echo "                            <img class=\"product-img-extra img-responsive\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 343);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 343);
                echo "\" src= \"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 343);
                echo "\"/>
                          ";
            }
            // line 345
            echo "                        </a>
                        ";
            // line 346
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 346)) {
                echo "<span class=\"outstock-overlay\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 346);
                echo "</span>";
            }
            // line 347
            echo "                        ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 347)) {
                // line 348
                echo "                          <div class=\"rating\">
                            ";
                // line 349
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 350
                    echo "                              ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 350) < $context["i"])) {
                        echo " 
                                <span class=\"fa fa-stack\">
                                  <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                </span> 
                              ";
                    } else {
                        // line 354
                        echo " 
                                <span class=\"fa fa-stack\">
                                  <i class=\"fa fa-star yellow fa-stack-2x\"></i>
                                </span> 
                              ";
                    }
                    // line 359
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 360
                echo "                          </div>
                          ";
            } else {
                // line 362
                echo "                          <div class=\"rating\">
                            ";
                // line 363
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 364
                    echo "                            <span class=\"fa fa-stack\">
                              <i class=\"fa fa-star gray fa-stack-2x\"></i>
                              </span>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 368
                echo "                          </div>
                        ";
            }
            // line 370
            echo "                        ";
            if ((($context["product_counter"] ?? null) == 1)) {
                // line 371
                echo "                          ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 371)) {
                    // line 372
                    echo "                            <div class='countdown-container'>
                              <div class='countdown-days counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 375
                    echo ($context["days_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-hours counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 379
                    echo ($context["hours_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-minutes counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 383
                    echo ($context["min_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-seconds counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 387
                    echo ($context["sec_name"] ?? null);
                    echo "</span>
                              </div>
                            </div>
                          ";
                }
                // line 390
                echo " 
                        ";
            }
            // line 391
            echo " 
                        <div class=\"button-group\">  
                            <div class=\"btn-quickview\"> 
                              <div class=\"quickview-button button\" data-toggle=\"tooltip\" title=\" ";
            // line 394
            echo ($context["quick_view"] ?? null);
            echo "\"> 
                                <a class=\"quickbox\" href=\"";
            // line 395
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quick", [], "any", false, false, false, 395);
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
            // line 415
            echo ($context["quick_view"] ?? null);
            echo "</span>
                                </a>
                              </div>
                            </div>
                            <div class=\"btn-wishlist\">
                              <button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 420
            echo ($context["button_wishlist"] ?? null);
            echo "\" onclick=\"wishlist.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 420);
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
            // line 429
            echo ($context["button_compare"] ?? null);
            echo "\" onclick=\"compare.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 429);
            echo "');\"><i class=\"fa fa-exchange\"></i>                            
                                <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                  <symbol id=\"report\" viewBox=\"0 0 1200 1200\"><title>report</title><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m480 258.667969h60v220h-60zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m200 118.667969h60v360h-60zm0 0\"/><path d=\"m340-1.332031h60v480h-60zm0 0\"/><path d=\"m60 358.667969h60v120h-60zm0 0\"/><path d=\"m60 548.667969c.035156-3.414063.65625-6.796875 1.839844-10h-51.839844c-5.523438 0-10 4.476562-10 10 0 5.519531 4.476562 10 10 10h51.839844c-1.183594-3.203125-1.804688-6.589844-1.839844-10zm0 0\"/><path d=\"m118.160156 538.667969c2.457032 6.4375 2.457032 13.558593 0 20h83.679688c-2.457032-6.441407-2.457032-13.5625 0-20zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m341.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m481.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m590 538.667969h-51.839844c2.457032 6.4375 2.457032 13.558593 0 20h51.839844c5.523438 0 10-4.480469 10-10 0-5.523438-4.476562-10-10-10zm0 0\"/></symbol>
                                </svg>
                                <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#report\" x=\"22%\" y=\"28%\"></use></svg>
                              </button>
                            </div>
                            <div class=\"btn-cart\">
                              <button data-toggle=\"tooltip\" title=\"";
            // line 437
            echo ($context["button_cart"] ?? null);
            echo "\" onclick=\"cart.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 437);
            echo "');\" ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 437)) {
                echo " class=\"sold-out\" disabled";
            }
            echo ">
                                  <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                    <symbol id=\"shopping-cart-button1\" viewBox=\"0 0 1000 1000\"><title>shopping-cart-button1</title>
                                      <path d=\"M405.387,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S440.588,362.612,405.387,362.612zM405.387,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536c14.083,0,25.536,11.453,25.536,25.536S419.47,451.988,405.387,451.988z\"/><path d=\"M507.927,115.875c-3.626-4.641-9.187-7.348-15.079-7.348H118.22l-17.237-72.12c-2.062-8.618-9.768-14.702-18.629-14.702H19.152C8.574,21.704,0,30.278,0,40.856s8.574,19.152,19.152,19.152h48.085l62.244,260.443c2.062,8.625,9.768,14.702,18.629,14.702h298.135c8.80,0,16.477-6.001,18.59-14.543l46.604-188.329C512.849,126.562,511.553,120.516,507.927,115.875zM431.261,296.85H163.227l-35.853-150.019h341.003L431.261,296.85z\"/><path d=\"M173.646,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S208.847,362.612,173.646,362.612z M173.646,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536s25.536,11.453,25.536,25.536S187.729,451.988,173.646,451.988z\"/></symbol>
                                  </svg>
                                  <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#shopping-cart-button1\" x=\"18%\" y=\"25%\"></use></svg>
                                  <span class=\"lblcart\">";
            // line 443
            echo ($context["button_cart"] ?? null);
            echo "</span>
                              </button>
                            </div>
                        </div> 
                  </div>   
                  <div class=\"caption\">
                    <h4><a href=\"";
            // line 449
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 449);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 449);
            echo "</a></h4>
                    <p class=\"description\">";
            // line 450
            echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 450);
            echo "</p>
                    ";
            // line 451
            if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 451)) {
                // line 452
                echo "                    <p class=\"price\">
                      ";
                // line 453
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 453)) {
                    // line 454
                    echo "                      ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 454);
                    echo "
                      ";
                } else {
                    // line 456
                    echo "                      <span class=\"price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 456);
                    echo "</span> <span class=\"price-new\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 456);
                    echo "</span> 
                      ";
                }
                // line 458
                echo "                      ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 458)) {
                    // line 459
                    echo "                      <span class=\"price-tax\">";
                    echo ($context["text_tax"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 459);
                    echo "</span>
                      ";
                }
                // line 461
                echo "                    </p>
                    ";
            }
            // line 462
            echo " 
                  </div>
                </div>                           
              </div>
            ";
            // line 466
            if ((($context["product_row"] ?? null) != 1)) {
                // line 467
                echo "              ";
                if ((((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 0) || (($context["counter"] ?? null) == ($context["lastproduct"] ?? null)))) {
                    // line 468
                    echo "                </div>
              ";
                }
                // line 470
                echo "            ";
            }
            echo "\t
          ";
            // line 471
            $context["counter"] = (($context["counter"] ?? null) + 1);
            // line 472
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "        
        </div>        
      </div>
    </div>

    <div class=\"tab-pane\" id=\"special-products-block";
        // line 477
        echo ($context["tab_randomnumer"] ?? null);
        echo "\">
      <div class=\"block_content\">       
        <div class=\"owl-carousel\">
          ";
        // line 480
        $context["counter"] = 1;
        // line 481
        echo "          ";
        $context["lastproduct"] = twig_length_filter($this->env, ($context["special"] ?? null));
        // line 482
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["special"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            echo "  
            ";
            // line 483
            if ((($context["product_row"] ?? null) != 1)) {
                // line 484
                echo "              ";
                if (((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 1)) {
                    // line 485
                    echo "                <div class=\"multilevel-item\">
              ";
                }
                // line 487
                echo "            ";
            }
            echo "\t\t  
              <div class=\"item product-container\" data-countdowntime=\"";
            // line 488
            echo twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 488);
            echo "\">
                <div class=\"product-thumb\">
                  <div class=\"image\">
                        <a href=\"";
            // line 491
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 491);
            echo "\">
                          <img src=\"";
            // line 492
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 492);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 492);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 492);
            echo "\" class=\"img-responsive\" />
                          ";
            // line 493
            if (((twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 493) != "") && (($context["hover_image"] ?? null) == 1))) {
                // line 494
                echo "                            <img class=\"product-img-extra img-responsive\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 494);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 494);
                echo "\" src= \"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 494);
                echo "\"/>
                          ";
            }
            // line 496
            echo "                        </a> 
                        ";
            // line 497
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 497)) {
                echo "<span class=\"outstock-overlay\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 497);
                echo "</span>";
            }
            echo " 
                        ";
            // line 498
            if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 498)) {
                // line 499
                echo "                          <div class=\"rating\">
                            ";
                // line 500
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 501
                    echo "                              ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 501) < $context["i"])) {
                        echo " 
                                <span class=\"fa fa-stack\">
                                  <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                </span> 
                              ";
                    } else {
                        // line 505
                        echo " 
                                <span class=\"fa fa-stack\">
                                  <i class=\"fa fa-star yellow fa-stack-2x\"></i>
                                </span> 
                              ";
                    }
                    // line 510
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 511
                echo "                          </div>
                          ";
            } else {
                // line 513
                echo "                          <div class=\"rating\">
                            ";
                // line 514
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 515
                    echo "                            <span class=\"fa fa-stack\">
                              <i class=\"fa fa-star gray fa-stack-2x\"></i>
                              </span>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 519
                echo "                          </div>
                        ";
            }
            // line 520
            echo " 
                        ";
            // line 521
            if ((($context["product_counter"] ?? null) == 1)) {
                // line 522
                echo "                          ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 522)) {
                    // line 523
                    echo "                            <div class='countdown-container'>
                              <div class='countdown-days counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 526
                    echo ($context["days_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-hours counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 530
                    echo ($context["hours_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-minutes counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 534
                    echo ($context["min_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-seconds counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 538
                    echo ($context["sec_name"] ?? null);
                    echo "</span>
                              </div>
                            </div>
                          ";
                }
                // line 542
                echo "                        ";
            }
            // line 543
            echo "                        <div class=\"button-group\">  
                            <div class=\"btn-quickview\"> 
                              <div class=\"quickview-button button\" data-toggle=\"tooltip\" title=\" ";
            // line 545
            echo ($context["quick_view"] ?? null);
            echo "\"> 
                                <a class=\"quickbox\" href=\"";
            // line 546
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quick", [], "any", false, false, false, 546);
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
            // line 566
            echo ($context["quick_view"] ?? null);
            echo "</span>
                                </a>
                              </div>
                            </div>
                            <div class=\"btn-wishlist\">
                              <button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 571
            echo ($context["button_wishlist"] ?? null);
            echo "\" onclick=\"wishlist.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 571);
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
            // line 580
            echo ($context["button_compare"] ?? null);
            echo "\" onclick=\"compare.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 580);
            echo "');\"><i class=\"fa fa-exchange\"></i>                            
                                <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                  <symbol id=\"report\" viewBox=\"0 0 1200 1200\"><title>report</title><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m480 258.667969h60v220h-60zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m200 118.667969h60v360h-60zm0 0\"/><path d=\"m340-1.332031h60v480h-60zm0 0\"/><path d=\"m60 358.667969h60v120h-60zm0 0\"/><path d=\"m60 548.667969c.035156-3.414063.65625-6.796875 1.839844-10h-51.839844c-5.523438 0-10 4.476562-10 10 0 5.519531 4.476562 10 10 10h51.839844c-1.183594-3.203125-1.804688-6.589844-1.839844-10zm0 0\"/><path d=\"m118.160156 538.667969c2.457032 6.4375 2.457032 13.558593 0 20h83.679688c-2.457032-6.441407-2.457032-13.5625 0-20zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m341.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m481.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m590 538.667969h-51.839844c2.457032 6.4375 2.457032 13.558593 0 20h51.839844c5.523438 0 10-4.480469 10-10 0-5.523438-4.476562-10-10-10zm0 0\"/></symbol>
                                </svg>
                                <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#report\" x=\"22%\" y=\"28%\"></use></svg>
                              </button>
                            </div>
                            <div class=\"btn-cart\">
                              <button data-toggle=\"tooltip\" title=\"";
            // line 588
            echo ($context["button_cart"] ?? null);
            echo "\" onclick=\"cart.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 588);
            echo "');\" ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 588)) {
                echo " class=\"sold-out\" disabled";
            }
            echo ">
                                  <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                    <symbol id=\"shopping-cart-button1\" viewBox=\"0 0 1000 1000\"><title>shopping-cart-button1</title>
                                      <path d=\"M405.387,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S440.588,362.612,405.387,362.612zM405.387,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536c14.083,0,25.536,11.453,25.536,25.536S419.47,451.988,405.387,451.988z\"/><path d=\"M507.927,115.875c-3.626-4.641-9.187-7.348-15.079-7.348H118.22l-17.237-72.12c-2.062-8.618-9.768-14.702-18.629-14.702H19.152C8.574,21.704,0,30.278,0,40.856s8.574,19.152,19.152,19.152h48.085l62.244,260.443c2.062,8.625,9.768,14.702,18.629,14.702h298.135c8.80,0,16.477-6.001,18.59-14.543l46.604-188.329C512.849,126.562,511.553,120.516,507.927,115.875zM431.261,296.85H163.227l-35.853-150.019h341.003L431.261,296.85z\"/><path d=\"M173.646,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S208.847,362.612,173.646,362.612z M173.646,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536s25.536,11.453,25.536,25.536S187.729,451.988,173.646,451.988z\"/></symbol>
                                  </svg>
                                  <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#shopping-cart-button1\" x=\"18%\" y=\"25%\"></use></svg>
                                  <span class=\"lblcart\">";
            // line 594
            echo ($context["button_cart"] ?? null);
            echo "</span>
                              </button>
                            </div>
                        </div> 
                  </div>                   
                  <div class=\"caption\">
                    <h4><a href=\"";
            // line 600
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 600);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 600);
            echo "</a></h4>
                    <p class=\"description\">";
            // line 601
            echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 601);
            echo "</p>
                    ";
            // line 602
            if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 602)) {
                // line 603
                echo "                    <p class=\"price\">
                      ";
                // line 604
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 604)) {
                    // line 605
                    echo "                      ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 605);
                    echo "
                      ";
                } else {
                    // line 607
                    echo "                      <span class=\"price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 607);
                    echo "</span> <span class=\"price-new\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 607);
                    echo "</span> 
                      ";
                }
                // line 609
                echo "                      ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 609)) {
                    // line 610
                    echo "                      <span class=\"price-tax\">";
                    echo ($context["text_tax"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 610);
                    echo "</span>
                      ";
                }
                // line 612
                echo "                    </p>
                    ";
            }
            // line 613
            echo "  
                  </div>
                </div>
              </div>
            ";
            // line 617
            if ((($context["product_row"] ?? null) != 1)) {
                // line 618
                echo "              ";
                if ((((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 0) || (($context["counter"] ?? null) == ($context["lastproduct"] ?? null)))) {
                    // line 619
                    echo "                </div>
              ";
                }
                // line 621
                echo "            ";
            }
            echo "\t
          ";
            // line 622
            $context["counter"] = (($context["counter"] ?? null) + 1);
            // line 623
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "        
        </div>        
      </div>
    </div>
\t
\t";
        // line 628
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 629
            echo "\t<div class=\"tab-pane\" id=\"category-block";
            echo twig_get_attribute($this->env, $this->source, $context["cat"], "category_id", [], "any", false, false, false, 629);
            echo "-";
            echo ($context["tab_randomnumer"] ?? null);
            echo "\">
      <div class=\"block_content\">       
        <div class=\"owl-carousel\">
          ";
            // line 632
            $context["counter"] = 1;
            // line 633
            echo "              ";
            $context["lastproduct"] = twig_length_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["category"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["cat"], "category_id", [], "any", false, false, false, 633)] ?? null) : null));
            // line 634
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["category"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["cat"], "category_id", [], "any", false, false, false, 634)] ?? null) : null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 635
                echo "                ";
                if ((($context["product_row"] ?? null) != 1)) {
                    // line 636
                    echo "                  ";
                    if (((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 1)) {
                        // line 637
                        echo "                    <div class=\"multilevel-item\">
                  ";
                    }
                    // line 639
                    echo "                ";
                }
                // line 640
                echo "                  <div class=\"item product-container\" data-countdowntime=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 640);
                echo "\">
                    <div class=\"product-thumb\">
                          <div class=\"image\">
                            <a href=\"";
                // line 643
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 643);
                echo "\">
                              <img src=\"";
                // line 644
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 644);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 644);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 644);
                echo "\" class=\"img-responsive\" />
                              ";
                // line 645
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 645) != "") && (($context["hover_image"] ?? null) == 1))) {
                    // line 646
                    echo "                                <img class=\"product-img-extra img-responsive\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 646);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 646);
                    echo "\" src= \"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 646);
                    echo "\"/>
                              ";
                }
                // line 648
                echo "                            </a> 
                            ";
                // line 649
                if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 649)) {
                    echo "<span class=\"outstock-overlay\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 649);
                    echo "</span>";
                }
                echo " 
                             ";
                // line 650
                if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 650)) {
                    // line 651
                    echo "                              <div class=\"rating\">
                                ";
                    // line 652
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 653
                        echo "                                  ";
                        if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 653) < $context["i"])) {
                            echo " 
                                    <span class=\"fa fa-stack\">
                                      <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                    </span> 
                                  ";
                        } else {
                            // line 657
                            echo " 
                                    <span class=\"fa fa-stack\">
                                      <i class=\"fa fa-star yellow fa-stack-2x\"></i>
                                    </span> 
                                  ";
                        }
                        // line 662
                        echo "                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 663
                    echo "                              </div>
                              ";
                } else {
                    // line 665
                    echo "                              <div class=\"rating\">
                                ";
                    // line 666
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 667
                        echo "                                <span class=\"fa fa-stack\">
                                  <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                  </span>
                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 671
                    echo "                              </div>
                            ";
                }
                // line 672
                echo " 
                            ";
                // line 673
                if ((($context["product_counter"] ?? null) == 1)) {
                    // line 674
                    echo "                              ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 674)) {
                        // line 675
                        echo "                                <div class='countdown-container'>
                                  <div class='countdown-days counter'>
                                    <span class=\"data\"></span>
                                    <span class=\"lbl\">";
                        // line 678
                        echo ($context["days_name"] ?? null);
                        echo "</span>
                                  </div>
                                  <div class='countdown-hours counter'>
                                    <span class=\"data\"></span>
                                    <span class=\"lbl\">";
                        // line 682
                        echo ($context["hours_name"] ?? null);
                        echo "</span>
                                  </div>
                                  <div class='countdown-minutes counter'>
                                    <span class=\"data\"></span>
                                    <span class=\"lbl\">";
                        // line 686
                        echo ($context["min_name"] ?? null);
                        echo "</span>
                                  </div>
                                  <div class='countdown-seconds counter'>
                                    <span class=\"data\"></span>
                                    <span class=\"lbl\">";
                        // line 690
                        echo ($context["sec_name"] ?? null);
                        echo "</span>
                                  </div>
                                </div>
                              ";
                    }
                    // line 693
                    echo "  
                            ";
                }
                // line 694
                echo "  
                            <div class=\"button-group\">  
                                <div class=\"btn-quickview\"> 
                                  <div class=\"quickview-button button\" data-toggle=\"tooltip\" title=\" ";
                // line 697
                echo ($context["quick_view"] ?? null);
                echo "\"> 
                                    <a class=\"quickbox\" href=\"";
                // line 698
                echo twig_get_attribute($this->env, $this->source, $context["product"], "quick", [], "any", false, false, false, 698);
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
                // line 718
                echo ($context["quick_view"] ?? null);
                echo "</span>
                                    </a>
                                  </div>
                                </div>
                                <div class=\"btn-wishlist\">
                                  <button type=\"button\" data-toggle=\"tooltip\" title=\"";
                // line 723
                echo ($context["button_wishlist"] ?? null);
                echo "\" onclick=\"wishlist.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 723);
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
                // line 732
                echo ($context["button_compare"] ?? null);
                echo "\" onclick=\"compare.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 732);
                echo "');\"><i class=\"fa fa-exchange\"></i>                            
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                      <symbol id=\"report\" viewBox=\"0 0 1200 1200\"><title>report</title><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m480 258.667969h60v220h-60zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m200 118.667969h60v360h-60zm0 0\"/><path d=\"m340-1.332031h60v480h-60zm0 0\"/><path d=\"m60 358.667969h60v120h-60zm0 0\"/><path d=\"m60 548.667969c.035156-3.414063.65625-6.796875 1.839844-10h-51.839844c-5.523438 0-10 4.476562-10 10 0 5.519531 4.476562 10 10 10h51.839844c-1.183594-3.203125-1.804688-6.589844-1.839844-10zm0 0\"/><path d=\"m118.160156 538.667969c2.457032 6.4375 2.457032 13.558593 0 20h83.679688c-2.457032-6.441407-2.457032-13.5625 0-20zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m341.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m481.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m590 538.667969h-51.839844c2.457032 6.4375 2.457032 13.558593 0 20h51.839844c5.523438 0 10-4.480469 10-10 0-5.523438-4.476562-10-10-10zm0 0\"/></symbol>
                                    </svg>
                                    <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#report\" x=\"22%\" y=\"28%\"></use></svg>
                                  </button>
                                </div>
                                <div class=\"btn-cart\">
                                  <button data-toggle=\"tooltip\" title=\"";
                // line 740
                echo ($context["button_cart"] ?? null);
                echo "\" onclick=\"cart.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 740);
                echo "');\" ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 740)) {
                    echo " class=\"sold-out\" disabled";
                }
                echo ">
                                      <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                                        <symbol id=\"shopping-cart-button1\" viewBox=\"0 0 1000 1000\"><title>shopping-cart-button1</title>
                                          <path d=\"M405.387,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S440.588,362.612,405.387,362.612zM405.387,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536c14.083,0,25.536,11.453,25.536,25.536S419.47,451.988,405.387,451.988z\"/><path d=\"M507.927,115.875c-3.626-4.641-9.187-7.348-15.079-7.348H118.22l-17.237-72.12c-2.062-8.618-9.768-14.702-18.629-14.702H19.152C8.574,21.704,0,30.278,0,40.856s8.574,19.152,19.152,19.152h48.085l62.244,260.443c2.062,8.625,9.768,14.702,18.629,14.702h298.135c8.80,0,16.477-6.001,18.59-14.543l46.604-188.329C512.849,126.562,511.553,120.516,507.927,115.875zM431.261,296.85H163.227l-35.853-150.019h341.003L431.261,296.85z\"/><path d=\"M173.646,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S208.847,362.612,173.646,362.612z M173.646,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536s25.536,11.453,25.536,25.536S187.729,451.988,173.646,451.988z\"/></symbol>
                                      </svg>
                                      <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#shopping-cart-button1\" x=\"18%\" y=\"25%\"></use></svg>
                                      <span class=\"lblcart\">";
                // line 746
                echo ($context["button_cart"] ?? null);
                echo "</span>
                                  </button>
                                </div>
                            </div> 
                      </div>                   
                          <div class=\"caption\">   
                            <h4><a href=\"";
                // line 752
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 752);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 752);
                echo "</a></h4>
                            <p class=\"description\">";
                // line 753
                echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 753);
                echo "</p>
                            ";
                // line 754
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 754)) {
                    // line 755
                    echo "                            <p class=\"price\">
                              ";
                    // line 756
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 756)) {
                        // line 757
                        echo "                              ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 757);
                        echo "
                              ";
                    } else {
                        // line 759
                        echo "                              <span class=\"price-old\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 759);
                        echo "</span> <span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 759);
                        echo "</span> 
                              ";
                    }
                    // line 761
                    echo "                              ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 761)) {
                        // line 762
                        echo "                              <span class=\"price-tax\">";
                        echo ($context["text_tax"] ?? null);
                        echo " ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 762);
                        echo "</span>
                              ";
                    }
                    // line 764
                    echo "                            </p>
                            ";
                }
                // line 765
                echo " 
                          </div>
                    </div>
                  </div>
                ";
                // line 769
                if ((($context["product_row"] ?? null) != 1)) {
                    // line 770
                    echo "                  ";
                    if ((((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 0) || (($context["counter"] ?? null) == ($context["lastproduct"] ?? null)))) {
                        // line 771
                        echo "                    </div>
                  ";
                    }
                    // line 773
                    echo "                ";
                }
                echo "\t
              ";
                // line 774
                $context["counter"] = (($context["counter"] ?? null) + 1);
                // line 775
                echo "              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "        
            </div>        
          </div>
        </div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 780
        echo "  </div>
</div>
  <script type=\"text/javascript\">
    \$('#";
        // line 783
        echo ($context["ishi_randomnumer"] ?? null);
        echo " .owl-carousel').owlCarousel({
        loop:false,
        nav:true,  
        dots:false, 
        rewind: true,
        rtl: \$('html').attr('dir') == 'rtl'? true : false,
        navText: [\"<i class='fa fa-angle-left'></i>\",\"<i class='fa fa-angle-right'></i>\"],
        responsive:{
            0:{
                items:";
        // line 792
        echo ($context["mobile_column"] ?? null);
        echo "
            },
            544:{
                items:";
        // line 795
        echo ($context["tablet_column"] ?? null);
        echo "
            },
            768:{
                items:";
        // line 798
        echo ($context["laptop_column"] ?? null);
        echo "
            },
            992:{
                items:";
        // line 801
        echo ($context["laptop_column"] ?? null);
        echo "
            },
            1200:{
                items:";
        // line 804
        echo ($context["desktop_column"] ?? null);
        echo "
            }
        }
    });   
  </script>
<script type=\"text/javascript\"><!--
\$('#";
        // line 810
        echo ($context["ishi_randomnumer"] ?? null);
        echo " li a:first').tab('show');
//--></script>
</section>";
    }

    public function getTemplateName()
    {
        return "fashionist/template/extension/module/ishiproductsblock.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1889 => 810,  1880 => 804,  1874 => 801,  1868 => 798,  1862 => 795,  1856 => 792,  1844 => 783,  1839 => 780,  1824 => 775,  1822 => 774,  1817 => 773,  1813 => 771,  1810 => 770,  1808 => 769,  1802 => 765,  1798 => 764,  1790 => 762,  1787 => 761,  1779 => 759,  1773 => 757,  1771 => 756,  1768 => 755,  1766 => 754,  1762 => 753,  1756 => 752,  1747 => 746,  1732 => 740,  1719 => 732,  1705 => 723,  1697 => 718,  1674 => 698,  1670 => 697,  1665 => 694,  1661 => 693,  1654 => 690,  1647 => 686,  1640 => 682,  1633 => 678,  1628 => 675,  1625 => 674,  1623 => 673,  1620 => 672,  1616 => 671,  1607 => 667,  1603 => 666,  1600 => 665,  1596 => 663,  1590 => 662,  1583 => 657,  1574 => 653,  1570 => 652,  1567 => 651,  1565 => 650,  1557 => 649,  1554 => 648,  1544 => 646,  1542 => 645,  1534 => 644,  1530 => 643,  1523 => 640,  1520 => 639,  1516 => 637,  1513 => 636,  1510 => 635,  1505 => 634,  1502 => 633,  1500 => 632,  1491 => 629,  1487 => 628,  1475 => 623,  1473 => 622,  1468 => 621,  1464 => 619,  1461 => 618,  1459 => 617,  1453 => 613,  1449 => 612,  1441 => 610,  1438 => 609,  1430 => 607,  1424 => 605,  1422 => 604,  1419 => 603,  1417 => 602,  1413 => 601,  1407 => 600,  1398 => 594,  1383 => 588,  1370 => 580,  1356 => 571,  1348 => 566,  1325 => 546,  1321 => 545,  1317 => 543,  1314 => 542,  1307 => 538,  1300 => 534,  1293 => 530,  1286 => 526,  1281 => 523,  1278 => 522,  1276 => 521,  1273 => 520,  1269 => 519,  1260 => 515,  1256 => 514,  1253 => 513,  1249 => 511,  1243 => 510,  1236 => 505,  1227 => 501,  1223 => 500,  1220 => 499,  1218 => 498,  1210 => 497,  1207 => 496,  1197 => 494,  1195 => 493,  1187 => 492,  1183 => 491,  1177 => 488,  1172 => 487,  1168 => 485,  1165 => 484,  1163 => 483,  1156 => 482,  1153 => 481,  1151 => 480,  1145 => 477,  1133 => 472,  1131 => 471,  1126 => 470,  1122 => 468,  1119 => 467,  1117 => 466,  1111 => 462,  1107 => 461,  1099 => 459,  1096 => 458,  1088 => 456,  1082 => 454,  1080 => 453,  1077 => 452,  1075 => 451,  1071 => 450,  1065 => 449,  1056 => 443,  1041 => 437,  1028 => 429,  1014 => 420,  1006 => 415,  983 => 395,  979 => 394,  974 => 391,  970 => 390,  963 => 387,  956 => 383,  949 => 379,  942 => 375,  937 => 372,  934 => 371,  931 => 370,  927 => 368,  918 => 364,  914 => 363,  911 => 362,  907 => 360,  901 => 359,  894 => 354,  885 => 350,  881 => 349,  878 => 348,  875 => 347,  869 => 346,  866 => 345,  856 => 343,  854 => 342,  846 => 341,  842 => 340,  835 => 337,  832 => 336,  828 => 334,  825 => 333,  823 => 332,  816 => 331,  813 => 330,  811 => 329,  805 => 326,  793 => 321,  790 => 320,  787 => 319,  783 => 317,  780 => 316,  778 => 315,  773 => 312,  769 => 310,  761 => 308,  758 => 307,  750 => 305,  744 => 303,  742 => 302,  739 => 301,  737 => 300,  733 => 299,  727 => 298,  718 => 292,  703 => 286,  690 => 278,  676 => 269,  668 => 264,  645 => 244,  641 => 243,  637 => 241,  633 => 239,  626 => 236,  619 => 232,  612 => 228,  605 => 224,  600 => 221,  597 => 220,  595 => 219,  592 => 218,  588 => 217,  579 => 213,  575 => 212,  572 => 211,  568 => 209,  562 => 208,  555 => 203,  546 => 199,  542 => 198,  539 => 197,  536 => 196,  530 => 195,  527 => 194,  517 => 192,  515 => 191,  507 => 190,  503 => 189,  496 => 186,  493 => 185,  489 => 183,  486 => 182,  483 => 181,  478 => 180,  475 => 179,  473 => 178,  467 => 175,  461 => 171,  455 => 170,  452 => 169,  449 => 168,  445 => 166,  442 => 165,  440 => 164,  431 => 158,  421 => 157,  418 => 156,  414 => 154,  406 => 152,  403 => 151,  395 => 149,  389 => 147,  387 => 146,  384 => 145,  382 => 144,  378 => 143,  372 => 142,  357 => 132,  343 => 123,  335 => 118,  319 => 105,  315 => 104,  310 => 101,  306 => 100,  299 => 97,  292 => 93,  285 => 89,  278 => 85,  273 => 82,  270 => 81,  268 => 80,  265 => 79,  261 => 78,  252 => 74,  248 => 73,  245 => 72,  241 => 70,  235 => 69,  228 => 64,  219 => 60,  215 => 59,  212 => 58,  209 => 57,  203 => 56,  200 => 55,  190 => 53,  188 => 52,  180 => 51,  176 => 50,  169 => 47,  166 => 46,  162 => 44,  159 => 43,  156 => 42,  152 => 41,  147 => 40,  145 => 39,  139 => 36,  134 => 33,  131 => 32,  118 => 29,  115 => 28,  110 => 27,  107 => 26,  99 => 23,  96 => 22,  93 => 21,  85 => 18,  82 => 17,  79 => 16,  71 => 13,  68 => 12,  65 => 11,  57 => 8,  54 => 7,  52 => 6,  47 => 4,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/ishiproductsblock.twig", "");
    }
}
