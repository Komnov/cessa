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
class __TwigTemplate_57567232ab40233a4bf9854e0a256aa8481583fa8f686a13b4e772970754e9d9 extends \Twig\Template
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
                          </div> 
                    </div> 
                        <div class=\"caption\"> 
                          <h4><a href=\"";
            // line 288
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 288);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 288);
            echo "</a></h4>
                          <p class=\"description\">";
            // line 289
            echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 289);
            echo "</p>
                          ";
            // line 290
            if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 290)) {
                // line 291
                echo "                          <p class=\"price\">
                            ";
                // line 292
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 292)) {
                    // line 293
                    echo "                            ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 293);
                    echo "
                            ";
                } else {
                    // line 295
                    echo "                            <span class=\"price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 295);
                    echo "</span> <span class=\"price-new\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 295);
                    echo "</span> 
                            ";
                }
                // line 297
                echo "                            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 297)) {
                    // line 298
                    echo "                            <span class=\"price-tax\">";
                    echo ($context["text_tax"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 298);
                    echo "</span>
                            ";
                }
                // line 300
                echo "                          </p>
                          ";
            }
            // line 302
            echo "                          <div class=\"btn-cart\">
                                <button data-toggle=\"tooltip\" title=\"";
            // line 303
            echo ($context["button_cart"] ?? null);
            echo "\" onclick=\"cart.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 303);
            echo "');\" ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 303)) {
                echo " class=\"sold-out\" disabled";
            }
            echo ">
                                    <span class=\"lblcart\">";
            // line 304
            echo ($context["button_cart"] ?? null);
            echo "</span>
                                </button>
                              </div>
                        </div> 
                    </div>                            
                </div>
\t\t\t\t";
            // line 310
            if ((($context["product_row"] ?? null) != 1)) {
                // line 311
                echo "\t\t\t\t\t";
                if ((((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 0) || (($context["counter"] ?? null) == ($context["lastproduct"] ?? null)))) {
                    // line 312
                    echo "\t\t\t\t\t  </div>
\t\t\t\t\t";
                }
                // line 314
                echo "\t\t\t\t";
            }
            // line 315
            echo "            ";
            $context["counter"] = (($context["counter"] ?? null) + 1);
            // line 316
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
        // line 321
        echo ($context["tab_randomnumer"] ?? null);
        echo "\">
      <div class=\"block_content\">       
        <div class=\"owl-carousel\"> 
          ";
        // line 324
        $context["counter"] = 1;
        // line 325
        echo "          ";
        $context["lastproduct"] = twig_length_filter($this->env, ($context["new"] ?? null));
        // line 326
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["new"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            echo "  
            ";
            // line 327
            if ((($context["product_row"] ?? null) != 1)) {
                // line 328
                echo "              ";
                if (((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 1)) {
                    // line 329
                    echo "                <div class=\"multilevel-item\">
              ";
                }
                // line 331
                echo "            ";
            }
            // line 332
            echo "              <div class=\"item product-container\" data-countdowntime=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 332);
            echo "\">
                <div class=\"product-thumb\">
                  <div class=\"image\">
                        <a href=\"";
            // line 335
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 335);
            echo "\">
                          <img src=\"";
            // line 336
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 336);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 336);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 336);
            echo "\" class=\"img-responsive\" />
                          ";
            // line 337
            if (((twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 337) != "") && (($context["hover_image"] ?? null) == 1))) {
                // line 338
                echo "                            <img class=\"product-img-extra img-responsive\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 338);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 338);
                echo "\" src= \"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 338);
                echo "\"/>
                          ";
            }
            // line 340
            echo "                        </a>
                        ";
            // line 341
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 341)) {
                echo "<span class=\"outstock-overlay\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 341);
                echo "</span>";
            }
            // line 342
            echo "                        ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 342)) {
                // line 343
                echo "                          <div class=\"rating\">
                            ";
                // line 344
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 345
                    echo "                              ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 345) < $context["i"])) {
                        echo " 
                                <span class=\"fa fa-stack\">
                                  <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                </span> 
                              ";
                    } else {
                        // line 349
                        echo " 
                                <span class=\"fa fa-stack\">
                                  <i class=\"fa fa-star yellow fa-stack-2x\"></i>
                                </span> 
                              ";
                    }
                    // line 354
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 355
                echo "                          </div>
                          ";
            } else {
                // line 357
                echo "                          <div class=\"rating\">
                            ";
                // line 358
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 359
                    echo "                            <span class=\"fa fa-stack\">
                              <i class=\"fa fa-star gray fa-stack-2x\"></i>
                              </span>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 363
                echo "                          </div>
                        ";
            }
            // line 365
            echo "                        ";
            if ((($context["product_counter"] ?? null) == 1)) {
                // line 366
                echo "                          ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 366)) {
                    // line 367
                    echo "                            <div class='countdown-container'>
                              <div class='countdown-days counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 370
                    echo ($context["days_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-hours counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 374
                    echo ($context["hours_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-minutes counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 378
                    echo ($context["min_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-seconds counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 382
                    echo ($context["sec_name"] ?? null);
                    echo "</span>
                              </div>
                            </div>
                          ";
                }
                // line 385
                echo " 
                        ";
            }
            // line 386
            echo " 
                        <div class=\"button-group\">  
                            <div class=\"btn-quickview\"> 
                              <div class=\"quickview-button button\" data-toggle=\"tooltip\" title=\" ";
            // line 389
            echo ($context["quick_view"] ?? null);
            echo "\"> 
                                <a class=\"quickbox\" href=\"";
            // line 390
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quick", [], "any", false, false, false, 390);
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
            // line 410
            echo ($context["quick_view"] ?? null);
            echo "</span>
                                </a>
                              </div>
                            </div>
                            <div class=\"btn-wishlist\">
                              <button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 415
            echo ($context["button_wishlist"] ?? null);
            echo "\" onclick=\"wishlist.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 415);
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
            // line 424
            echo ($context["button_compare"] ?? null);
            echo "\" onclick=\"compare.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 424);
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
            // line 434
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 434);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 434);
            echo "</a></h4>
                    <p class=\"description\">";
            // line 435
            echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 435);
            echo "</p>
                    ";
            // line 436
            if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 436)) {
                // line 437
                echo "                    <p class=\"price\">
                      ";
                // line 438
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 438)) {
                    // line 439
                    echo "                      ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 439);
                    echo "
                      ";
                } else {
                    // line 441
                    echo "                      <span class=\"price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 441);
                    echo "</span> <span class=\"price-new\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 441);
                    echo "</span> 
                      ";
                }
                // line 443
                echo "                      ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 443)) {
                    // line 444
                    echo "                      <span class=\"price-tax\">";
                    echo ($context["text_tax"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 444);
                    echo "</span>
                      ";
                }
                // line 446
                echo "                    </p>
                    ";
            }
            // line 447
            echo " 
                    <div class=\"btn-cart\">
                      <button data-toggle=\"tooltip\" title=\"";
            // line 449
            echo ($context["button_cart"] ?? null);
            echo "\" onclick=\"cart.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 449);
            echo "');\" ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 449)) {
                echo " class=\"sold-out\" disabled";
            }
            echo ">
                          <span class=\"lblcart\">";
            // line 450
            echo ($context["button_cart"] ?? null);
            echo "</span>
                      </button>
                    </div>
                  </div>
                </div>                           
              </div>
            ";
            // line 456
            if ((($context["product_row"] ?? null) != 1)) {
                // line 457
                echo "              ";
                if ((((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 0) || (($context["counter"] ?? null) == ($context["lastproduct"] ?? null)))) {
                    // line 458
                    echo "                </div>
              ";
                }
                // line 460
                echo "            ";
            }
            echo "\t
          ";
            // line 461
            $context["counter"] = (($context["counter"] ?? null) + 1);
            // line 462
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
        // line 467
        echo ($context["tab_randomnumer"] ?? null);
        echo "\">
      <div class=\"block_content\">       
        <div class=\"owl-carousel\">
          ";
        // line 470
        $context["counter"] = 1;
        // line 471
        echo "          ";
        $context["lastproduct"] = twig_length_filter($this->env, ($context["special"] ?? null));
        // line 472
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["special"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            echo "  
            ";
            // line 473
            if ((($context["product_row"] ?? null) != 1)) {
                // line 474
                echo "              ";
                if (((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 1)) {
                    // line 475
                    echo "                <div class=\"multilevel-item\">
              ";
                }
                // line 477
                echo "            ";
            }
            echo "\t\t  
              <div class=\"item product-container\" data-countdowntime=\"";
            // line 478
            echo twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 478);
            echo "\">
                <div class=\"product-thumb\">
                  <div class=\"image\">
                        <a href=\"";
            // line 481
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 481);
            echo "\">
                          <img src=\"";
            // line 482
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 482);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 482);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 482);
            echo "\" class=\"img-responsive\" />
                          ";
            // line 483
            if (((twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 483) != "") && (($context["hover_image"] ?? null) == 1))) {
                // line 484
                echo "                            <img class=\"product-img-extra img-responsive\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 484);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 484);
                echo "\" src= \"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 484);
                echo "\"/>
                          ";
            }
            // line 486
            echo "                        </a> 
                        ";
            // line 487
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 487)) {
                echo "<span class=\"outstock-overlay\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 487);
                echo "</span>";
            }
            echo " 
                        ";
            // line 488
            if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 488)) {
                // line 489
                echo "                          <div class=\"rating\">
                            ";
                // line 490
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 491
                    echo "                              ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 491) < $context["i"])) {
                        echo " 
                                <span class=\"fa fa-stack\">
                                  <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                </span> 
                              ";
                    } else {
                        // line 495
                        echo " 
                                <span class=\"fa fa-stack\">
                                  <i class=\"fa fa-star yellow fa-stack-2x\"></i>
                                </span> 
                              ";
                    }
                    // line 500
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 501
                echo "                          </div>
                          ";
            } else {
                // line 503
                echo "                          <div class=\"rating\">
                            ";
                // line 504
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 505
                    echo "                            <span class=\"fa fa-stack\">
                              <i class=\"fa fa-star gray fa-stack-2x\"></i>
                              </span>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 509
                echo "                          </div>
                        ";
            }
            // line 510
            echo " 
                        ";
            // line 511
            if ((($context["product_counter"] ?? null) == 1)) {
                // line 512
                echo "                          ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 512)) {
                    // line 513
                    echo "                            <div class='countdown-container'>
                              <div class='countdown-days counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 516
                    echo ($context["days_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-hours counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 520
                    echo ($context["hours_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-minutes counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 524
                    echo ($context["min_name"] ?? null);
                    echo "</span>
                              </div>
                              <div class='countdown-seconds counter'>
                                <span class=\"data\"></span>
                                <span class=\"lbl\">";
                    // line 528
                    echo ($context["sec_name"] ?? null);
                    echo "</span>
                              </div>
                            </div>
                          ";
                }
                // line 532
                echo "                        ";
            }
            // line 533
            echo "                        <div class=\"button-group\">  
                            <div class=\"btn-quickview\"> 
                              <div class=\"quickview-button button\" data-toggle=\"tooltip\" title=\" ";
            // line 535
            echo ($context["quick_view"] ?? null);
            echo "\"> 
                                <a class=\"quickbox\" href=\"";
            // line 536
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quick", [], "any", false, false, false, 536);
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
            // line 556
            echo ($context["quick_view"] ?? null);
            echo "</span>
                                </a>
                              </div>
                            </div>
                            <div class=\"btn-wishlist\">
                              <button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 561
            echo ($context["button_wishlist"] ?? null);
            echo "\" onclick=\"wishlist.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 561);
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
            // line 570
            echo ($context["button_compare"] ?? null);
            echo "\" onclick=\"compare.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 570);
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
            // line 580
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 580);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 580);
            echo "</a></h4>
                    <p class=\"description\">";
            // line 581
            echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 581);
            echo "</p>
                    ";
            // line 582
            if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 582)) {
                // line 583
                echo "                    <p class=\"price\">
                      ";
                // line 584
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 584)) {
                    // line 585
                    echo "                      ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 585);
                    echo "
                      ";
                } else {
                    // line 587
                    echo "                      <span class=\"price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 587);
                    echo "</span> <span class=\"price-new\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 587);
                    echo "</span> 
                      ";
                }
                // line 589
                echo "                      ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 589)) {
                    // line 590
                    echo "                      <span class=\"price-tax\">";
                    echo ($context["text_tax"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 590);
                    echo "</span>
                      ";
                }
                // line 592
                echo "                    </p>
                    ";
            }
            // line 593
            echo "  
                    <div class=\"btn-cart\">
                      <button data-toggle=\"tooltip\" title=\"";
            // line 595
            echo ($context["button_cart"] ?? null);
            echo "\" onclick=\"cart.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 595);
            echo "');\" ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 595)) {
                echo " class=\"sold-out\" disabled";
            }
            echo ">
                          <span class=\"lblcart\">";
            // line 596
            echo ($context["button_cart"] ?? null);
            echo "</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            ";
            // line 602
            if ((($context["product_row"] ?? null) != 1)) {
                // line 603
                echo "              ";
                if ((((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 0) || (($context["counter"] ?? null) == ($context["lastproduct"] ?? null)))) {
                    // line 604
                    echo "                </div>
              ";
                }
                // line 606
                echo "            ";
            }
            echo "\t
          ";
            // line 607
            $context["counter"] = (($context["counter"] ?? null) + 1);
            // line 608
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
        // line 613
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 614
            echo "\t<div class=\"tab-pane\" id=\"category-block";
            echo twig_get_attribute($this->env, $this->source, $context["cat"], "category_id", [], "any", false, false, false, 614);
            echo "-";
            echo ($context["tab_randomnumer"] ?? null);
            echo "\">
      <div class=\"block_content\">       
        <div class=\"owl-carousel\">
          ";
            // line 617
            $context["counter"] = 1;
            // line 618
            echo "              ";
            $context["lastproduct"] = twig_length_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["category"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["cat"], "category_id", [], "any", false, false, false, 618)] ?? null) : null));
            // line 619
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["category"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["cat"], "category_id", [], "any", false, false, false, 619)] ?? null) : null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 620
                echo "                ";
                if ((($context["product_row"] ?? null) != 1)) {
                    // line 621
                    echo "                  ";
                    if (((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 1)) {
                        // line 622
                        echo "                    <div class=\"multilevel-item\">
                  ";
                    }
                    // line 624
                    echo "                ";
                }
                // line 625
                echo "                  <div class=\"item product-container\" data-countdowntime=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 625);
                echo "\">
                    <div class=\"product-thumb\">
                          <div class=\"image\">
                            <a href=\"";
                // line 628
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 628);
                echo "\">
                              <img src=\"";
                // line 629
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 629);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 629);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 629);
                echo "\" class=\"img-responsive\" />
                              ";
                // line 630
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 630) != "") && (($context["hover_image"] ?? null) == 1))) {
                    // line 631
                    echo "                                <img class=\"product-img-extra img-responsive\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 631);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 631);
                    echo "\" src= \"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 631);
                    echo "\"/>
                              ";
                }
                // line 633
                echo "                            </a> 
                            ";
                // line 634
                if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 634)) {
                    echo "<span class=\"outstock-overlay\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 634);
                    echo "</span>";
                }
                echo " 
                             ";
                // line 635
                if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 635)) {
                    // line 636
                    echo "                              <div class=\"rating\">
                                ";
                    // line 637
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 638
                        echo "                                  ";
                        if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 638) < $context["i"])) {
                            echo " 
                                    <span class=\"fa fa-stack\">
                                      <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                    </span> 
                                  ";
                        } else {
                            // line 642
                            echo " 
                                    <span class=\"fa fa-stack\">
                                      <i class=\"fa fa-star yellow fa-stack-2x\"></i>
                                    </span> 
                                  ";
                        }
                        // line 647
                        echo "                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 648
                    echo "                              </div>
                              ";
                } else {
                    // line 650
                    echo "                              <div class=\"rating\">
                                ";
                    // line 651
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 652
                        echo "                                <span class=\"fa fa-stack\">
                                  <i class=\"fa fa-star gray fa-stack-2x\"></i>
                                  </span>
                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 656
                    echo "                              </div>
                            ";
                }
                // line 657
                echo " 
                            ";
                // line 658
                if ((($context["product_counter"] ?? null) == 1)) {
                    // line 659
                    echo "                              ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 659)) {
                        // line 660
                        echo "                                <div class='countdown-container'>
                                  <div class='countdown-days counter'>
                                    <span class=\"data\"></span>
                                    <span class=\"lbl\">";
                        // line 663
                        echo ($context["days_name"] ?? null);
                        echo "</span>
                                  </div>
                                  <div class='countdown-hours counter'>
                                    <span class=\"data\"></span>
                                    <span class=\"lbl\">";
                        // line 667
                        echo ($context["hours_name"] ?? null);
                        echo "</span>
                                  </div>
                                  <div class='countdown-minutes counter'>
                                    <span class=\"data\"></span>
                                    <span class=\"lbl\">";
                        // line 671
                        echo ($context["min_name"] ?? null);
                        echo "</span>
                                  </div>
                                  <div class='countdown-seconds counter'>
                                    <span class=\"data\"></span>
                                    <span class=\"lbl\">";
                        // line 675
                        echo ($context["sec_name"] ?? null);
                        echo "</span>
                                  </div>
                                </div>
                              ";
                    }
                    // line 678
                    echo "  
                            ";
                }
                // line 679
                echo "  
                            <div class=\"button-group\">  
                                <div class=\"btn-quickview\"> 
                                  <div class=\"quickview-button button\" data-toggle=\"tooltip\" title=\" ";
                // line 682
                echo ($context["quick_view"] ?? null);
                echo "\"> 
                                    <a class=\"quickbox\" href=\"";
                // line 683
                echo twig_get_attribute($this->env, $this->source, $context["product"], "quick", [], "any", false, false, false, 683);
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
                // line 703
                echo ($context["quick_view"] ?? null);
                echo "</span>
                                    </a>
                                  </div>
                                </div>
                                <div class=\"btn-wishlist\">
                                  <button type=\"button\" data-toggle=\"tooltip\" title=\"";
                // line 708
                echo ($context["button_wishlist"] ?? null);
                echo "\" onclick=\"wishlist.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 708);
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
                // line 717
                echo ($context["button_compare"] ?? null);
                echo "\" onclick=\"compare.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 717);
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
                // line 727
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 727);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 727);
                echo "</a></h4>
                            <p class=\"description\">";
                // line 728
                echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 728);
                echo "</p>
                            ";
                // line 729
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 729)) {
                    // line 730
                    echo "                            <p class=\"price\">
                              ";
                    // line 731
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 731)) {
                        // line 732
                        echo "                              ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 732);
                        echo "
                              ";
                    } else {
                        // line 734
                        echo "                              <span class=\"price-old\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 734);
                        echo "</span> <span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 734);
                        echo "</span> 
                              ";
                    }
                    // line 736
                    echo "                              ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 736)) {
                        // line 737
                        echo "                              <span class=\"price-tax\">";
                        echo ($context["text_tax"] ?? null);
                        echo " ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 737);
                        echo "</span>
                              ";
                    }
                    // line 739
                    echo "                            </p>
                            ";
                }
                // line 741
                echo "                            <div class=\"btn-cart\">
                              <button data-toggle=\"tooltip\" title=\"";
                // line 742
                echo ($context["button_cart"] ?? null);
                echo "\" onclick=\"cart.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 742);
                echo "');\" ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 742)) {
                    echo " class=\"sold-out\" disabled";
                }
                echo ">
                                  <span class=\"lblcart\">";
                // line 743
                echo ($context["button_cart"] ?? null);
                echo "</span>
                              </button>
                            </div>
                          </div>
                    </div>
                  </div>
                ";
                // line 749
                if ((($context["product_row"] ?? null) != 1)) {
                    // line 750
                    echo "                  ";
                    if ((((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 0) || (($context["counter"] ?? null) == ($context["lastproduct"] ?? null)))) {
                        // line 751
                        echo "                    </div>
                  ";
                    }
                    // line 753
                    echo "                ";
                }
                echo "\t
              ";
                // line 754
                $context["counter"] = (($context["counter"] ?? null) + 1);
                // line 755
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
        // line 760
        echo "  </div>
</div>
  <script type=\"text/javascript\">
    \$('#";
        // line 763
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
        // line 772
        echo ($context["mobile_column"] ?? null);
        echo "
            },
            544:{
                items:";
        // line 775
        echo ($context["tablet_column"] ?? null);
        echo "
            },
            768:{
                items:";
        // line 778
        echo ($context["laptop_column"] ?? null);
        echo "
            },
            992:{
                items:";
        // line 781
        echo ($context["laptop_column"] ?? null);
        echo "
            },
            1200:{
                items:";
        // line 784
        echo ($context["desktop_column"] ?? null);
        echo "
            }
        }
    });   
  </script>
<script type=\"text/javascript\"><!--
\$('#";
        // line 790
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
        return array (  1868 => 790,  1859 => 784,  1853 => 781,  1847 => 778,  1841 => 775,  1835 => 772,  1823 => 763,  1818 => 760,  1803 => 755,  1801 => 754,  1796 => 753,  1792 => 751,  1789 => 750,  1787 => 749,  1778 => 743,  1768 => 742,  1765 => 741,  1761 => 739,  1753 => 737,  1750 => 736,  1742 => 734,  1736 => 732,  1734 => 731,  1731 => 730,  1729 => 729,  1725 => 728,  1719 => 727,  1704 => 717,  1690 => 708,  1682 => 703,  1659 => 683,  1655 => 682,  1650 => 679,  1646 => 678,  1639 => 675,  1632 => 671,  1625 => 667,  1618 => 663,  1613 => 660,  1610 => 659,  1608 => 658,  1605 => 657,  1601 => 656,  1592 => 652,  1588 => 651,  1585 => 650,  1581 => 648,  1575 => 647,  1568 => 642,  1559 => 638,  1555 => 637,  1552 => 636,  1550 => 635,  1542 => 634,  1539 => 633,  1529 => 631,  1527 => 630,  1519 => 629,  1515 => 628,  1508 => 625,  1505 => 624,  1501 => 622,  1498 => 621,  1495 => 620,  1490 => 619,  1487 => 618,  1485 => 617,  1476 => 614,  1472 => 613,  1460 => 608,  1458 => 607,  1453 => 606,  1449 => 604,  1446 => 603,  1444 => 602,  1435 => 596,  1425 => 595,  1421 => 593,  1417 => 592,  1409 => 590,  1406 => 589,  1398 => 587,  1392 => 585,  1390 => 584,  1387 => 583,  1385 => 582,  1381 => 581,  1375 => 580,  1360 => 570,  1346 => 561,  1338 => 556,  1315 => 536,  1311 => 535,  1307 => 533,  1304 => 532,  1297 => 528,  1290 => 524,  1283 => 520,  1276 => 516,  1271 => 513,  1268 => 512,  1266 => 511,  1263 => 510,  1259 => 509,  1250 => 505,  1246 => 504,  1243 => 503,  1239 => 501,  1233 => 500,  1226 => 495,  1217 => 491,  1213 => 490,  1210 => 489,  1208 => 488,  1200 => 487,  1197 => 486,  1187 => 484,  1185 => 483,  1177 => 482,  1173 => 481,  1167 => 478,  1162 => 477,  1158 => 475,  1155 => 474,  1153 => 473,  1146 => 472,  1143 => 471,  1141 => 470,  1135 => 467,  1123 => 462,  1121 => 461,  1116 => 460,  1112 => 458,  1109 => 457,  1107 => 456,  1098 => 450,  1088 => 449,  1084 => 447,  1080 => 446,  1072 => 444,  1069 => 443,  1061 => 441,  1055 => 439,  1053 => 438,  1050 => 437,  1048 => 436,  1044 => 435,  1038 => 434,  1023 => 424,  1009 => 415,  1001 => 410,  978 => 390,  974 => 389,  969 => 386,  965 => 385,  958 => 382,  951 => 378,  944 => 374,  937 => 370,  932 => 367,  929 => 366,  926 => 365,  922 => 363,  913 => 359,  909 => 358,  906 => 357,  902 => 355,  896 => 354,  889 => 349,  880 => 345,  876 => 344,  873 => 343,  870 => 342,  864 => 341,  861 => 340,  851 => 338,  849 => 337,  841 => 336,  837 => 335,  830 => 332,  827 => 331,  823 => 329,  820 => 328,  818 => 327,  811 => 326,  808 => 325,  806 => 324,  800 => 321,  788 => 316,  785 => 315,  782 => 314,  778 => 312,  775 => 311,  773 => 310,  764 => 304,  754 => 303,  751 => 302,  747 => 300,  739 => 298,  736 => 297,  728 => 295,  722 => 293,  720 => 292,  717 => 291,  715 => 290,  711 => 289,  705 => 288,  690 => 278,  676 => 269,  668 => 264,  645 => 244,  641 => 243,  637 => 241,  633 => 239,  626 => 236,  619 => 232,  612 => 228,  605 => 224,  600 => 221,  597 => 220,  595 => 219,  592 => 218,  588 => 217,  579 => 213,  575 => 212,  572 => 211,  568 => 209,  562 => 208,  555 => 203,  546 => 199,  542 => 198,  539 => 197,  536 => 196,  530 => 195,  527 => 194,  517 => 192,  515 => 191,  507 => 190,  503 => 189,  496 => 186,  493 => 185,  489 => 183,  486 => 182,  483 => 181,  478 => 180,  475 => 179,  473 => 178,  467 => 175,  461 => 171,  455 => 170,  452 => 169,  449 => 168,  445 => 166,  442 => 165,  440 => 164,  431 => 158,  421 => 157,  418 => 156,  414 => 154,  406 => 152,  403 => 151,  395 => 149,  389 => 147,  387 => 146,  384 => 145,  382 => 144,  378 => 143,  372 => 142,  357 => 132,  343 => 123,  335 => 118,  319 => 105,  315 => 104,  310 => 101,  306 => 100,  299 => 97,  292 => 93,  285 => 89,  278 => 85,  273 => 82,  270 => 81,  268 => 80,  265 => 79,  261 => 78,  252 => 74,  248 => 73,  245 => 72,  241 => 70,  235 => 69,  228 => 64,  219 => 60,  215 => 59,  212 => 58,  209 => 57,  203 => 56,  200 => 55,  190 => 53,  188 => 52,  180 => 51,  176 => 50,  169 => 47,  166 => 46,  162 => 44,  159 => 43,  156 => 42,  152 => 41,  147 => 40,  145 => 39,  139 => 36,  134 => 33,  131 => 32,  118 => 29,  115 => 28,  110 => 27,  107 => 26,  99 => 23,  96 => 22,  93 => 21,  85 => 18,  82 => 17,  79 => 16,  71 => 13,  68 => 12,  65 => 11,  57 => 8,  54 => 7,  52 => 6,  47 => 4,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/ishiproductsblock.twig", "");
    }
}
