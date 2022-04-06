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

/* fashionist/template/extension/module/ishispecialblock.twig */
class __TwigTemplate_6b34a64945b22a4e1403d2993c7a76f8e9a71b054827968d3c2e2fce7d29ce74 extends \Twig\Template
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
        echo "<section class=\"ishispecial container\">
  <div class=\"row\">
  <h2 class=\"home-title\">";
        // line 3
        echo ($context["heading"] ?? null);
        echo "</h2>
  <p class=\"sub-title\">";
        // line 4
        echo ($context["subtitle"] ?? null);
        echo "</p>
  <div id=\"";
        // line 5
        echo ($context["ishi_randomnumer"] ?? null);
        echo "\" class=\"ishispecialblock owl-carousel\">
    ";
        // line 6
        $context["counter"] = 1;
        // line 7
        echo "    ";
        $context["lastproduct"] = twig_length_filter($this->env, ($context["products"] ?? null));
        // line 8
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 9
            echo "\t  ";
            if ((($context["product_row"] ?? null) != 1)) {
                // line 10
                echo "        ";
                if (((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 1)) {
                    // line 11
                    echo "            <div class=\"multilevel-item\">
        ";
                }
                // line 13
                echo "      ";
            }
            // line 14
            echo "      <div class=\"product-layout item\" data-countdowntime=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 14);
            echo "\">
        <div class=\"product-thumb\"> 
          <div class=\"image\">
                <a href=\"";
            // line 17
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 17);
            echo "\">
                  <img src=\"";
            // line 18
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 18);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 18);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 18);
            echo "\" class=\"img-responsive\" />
                  ";
            // line 19
            if (((twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 19) != "") && (($context["hover_image"] ?? null) == 1))) {
                // line 20
                echo "                    <img class=\"product-img-extra img-responsive\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 20);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 20);
                echo "\" src= \"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "extra", [], "any", false, false, false, 20);
                echo "\"/>
                  ";
            }
            // line 22
            echo "                </a>  
                ";
            // line 23
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 23)) {
                echo "<span class=\"outstock-overlay\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 23);
                echo "</span>";
            }
            // line 24
            echo "                ";
            if ((($context["product_counter"] ?? null) == 1)) {
                // line 25
                echo "                  ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 25)) {
                    // line 26
                    echo "                    <div class='countdown-container'>
                      <div class='countdown-days counter'>
                        <span class=\"data\"></span>
                        <span class=\"lbl\">";
                    // line 29
                    echo ($context["days_name"] ?? null);
                    echo "</span>
                      </div>
                      <div class='countdown-hours counter'>
                        <span class=\"data\"></span>
                        <span class=\"lbl\">";
                    // line 33
                    echo ($context["hours_name"] ?? null);
                    echo "</span>
                      </div>
                      <div class='countdown-minutes counter'>
                        <span class=\"data\"></span>
                        <span class=\"lbl\">";
                    // line 37
                    echo ($context["min_name"] ?? null);
                    echo "</span>
                      </div>
                      <div class='countdown-seconds counter'>
                        <span class=\"data\"></span>
                        <span class=\"lbl\">";
                    // line 41
                    echo ($context["sec_name"] ?? null);
                    echo "</span>
                      </div>
                    </div>
                  ";
                }
                // line 44
                echo " 
                ";
            }
            // line 45
            echo "  
                ";
            // line 46
            if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 46)) {
                // line 47
                echo "                  <div class=\"rating\">
                    ";
                // line 48
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 49
                    echo "                      ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 49) < $context["i"])) {
                        echo " 
                        <span class=\"fa fa-stack\">
                          <i class=\"fa fa-star gray fa-stack-2x\"></i>
                        </span> 
                      ";
                    } else {
                        // line 53
                        echo " 
                        <span class=\"fa fa-stack\">
                          <i class=\"fa fa-star yellow fa-stack-2x\"></i>
                        </span> 
                      ";
                    }
                    // line 58
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 59
                echo "                  </div>
                  ";
            } else {
                // line 61
                echo "                  <div class=\"rating\">
                    ";
                // line 62
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 63
                    echo "                    <span class=\"fa fa-stack\">
                      <i class=\"fa fa-star gray fa-stack-2x\"></i>
                      </span>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 67
                echo "                  </div>
                ";
            }
            // line 69
            echo "                <div class=\"button-group\">  
                    <div class=\"btn-quickview\"> 
                      <div class=\"quickview-button button\" data-toggle=\"tooltip\" title=\" ";
            // line 71
            echo ($context["quick_view"] ?? null);
            echo "\"> 
                        <a class=\"quickbox\" href=\"";
            // line 72
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quick", [], "any", false, false, false, 72);
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
            // line 92
            echo ($context["quick_view"] ?? null);
            echo "</span>
                        </a>
                      </div>
                    </div>
                    <div class=\"btn-wishlist\">
                      <button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 97
            echo ($context["button_wishlist"] ?? null);
            echo "\" onclick=\"wishlist.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 97);
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
            // line 106
            echo ($context["button_compare"] ?? null);
            echo "\" onclick=\"compare.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 106);
            echo "');\"><i class=\"fa fa-exchange\"></i>                            
                        <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                          <symbol id=\"report\" viewBox=\"0 0 1200 1200\"><title>report</title><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m480 258.667969h60v220h-60zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m240 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m200 118.667969h60v360h-60zm0 0\"/><path d=\"m340-1.332031h60v480h-60zm0 0\"/><path d=\"m60 358.667969h60v120h-60zm0 0\"/><path d=\"m60 548.667969c.035156-3.414063.65625-6.796875 1.839844-10h-51.839844c-5.523438 0-10 4.476562-10 10 0 5.519531 4.476562 10 10 10h51.839844c-1.183594-3.203125-1.804688-6.589844-1.839844-10zm0 0\"/><path d=\"m118.160156 538.667969c2.457032 6.4375 2.457032 13.558593 0 20h83.679688c-2.457032-6.441407-2.457032-13.5625 0-20zm0 0\"/><path d=\"m100 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m380 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m341.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m481.839844 558.667969c-2.457032-6.441407-2.457032-13.5625 0-20h-83.679688c2.457032 6.4375 2.457032 13.558593 0 20zm0 0\"/><path d=\"m520 548.667969c0 5.519531-4.476562 10-10 10s-10-4.480469-10-10c0-5.523438 4.476562-10 10-10s10 4.476562 10 10zm0 0\"/><path d=\"m590 538.667969h-51.839844c2.457032 6.4375 2.457032 13.558593 0 20h51.839844c5.523438 0 10-4.480469 10-10 0-5.523438-4.476562-10-10-10zm0 0\"/></symbol>
                        </svg>
                        <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#report\" x=\"22%\" y=\"28%\"></use></svg>
                      </button>
                    </div>
                    <div class=\"btn-cart\">
                      <button data-toggle=\"tooltip\" title=\"";
            // line 114
            echo ($context["button_cart"] ?? null);
            echo "\" onclick=\"cart.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 114);
            echo "');\" ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "stock_status", [], "any", false, false, false, 114)) {
                echo " class=\"sold-out\" disabled";
            }
            echo ">
                          <svg xmlns=\"http://www.w3.org/2000/svg\" style=\"display: none;\">
                            <symbol id=\"shopping-cart-button1\" viewBox=\"0 0 1000 1000\"><title>shopping-cart-button1</title>
                              <path d=\"M405.387,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S440.588,362.612,405.387,362.612zM405.387,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536c14.083,0,25.536,11.453,25.536,25.536S419.47,451.988,405.387,451.988z\"/><path d=\"M507.927,115.875c-3.626-4.641-9.187-7.348-15.079-7.348H118.22l-17.237-72.12c-2.062-8.618-9.768-14.702-18.629-14.702H19.152C8.574,21.704,0,30.278,0,40.856s8.574,19.152,19.152,19.152h48.085l62.244,260.443c2.062,8.625,9.768,14.702,18.629,14.702h298.135c8.80,0,16.477-6.001,18.59-14.543l46.604-188.329C512.849,126.562,511.553,120.516,507.927,115.875zM431.261,296.85H163.227l-35.853-150.019h341.003L431.261,296.85z\"/><path d=\"M173.646,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84S208.847,362.612,173.646,362.612z M173.646,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536s25.536,11.453,25.536,25.536S187.729,451.988,173.646,451.988z\"/></symbol>
                          </svg>
                          <svg class=\"icon\" viewBox=\"0 0 30 30\"><use xlink:href=\"#shopping-cart-button1\" x=\"18%\" y=\"25%\"></use></svg>
                          <span class=\"lblcart\">";
            // line 120
            echo ($context["button_cart"] ?? null);
            echo "</span>
                      </button>
                    </div>
                </div> 
          </div> 
          <div class=\"caption\">  
            <h4><a href=\"";
            // line 126
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 126);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 126);
            echo "</a></h4>
            <p class=\"description\">";
            // line 127
            echo (twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 127), 0, 60) . "...");
            echo "</p>          
            ";
            // line 128
            if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 128)) {
                // line 129
                echo "            <p class=\"price\">
              ";
                // line 130
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 130)) {
                    // line 131
                    echo "              ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 131);
                    echo "
              ";
                } else {
                    // line 133
                    echo "              <span class=\"price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 133);
                    echo "</span> <span class=\"price-new\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 133);
                    echo "</span> 
              ";
                }
                // line 135
                echo "              ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 135)) {
                    // line 136
                    echo "              <span class=\"price-tax\">";
                    echo ($context["text_tax"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 136);
                    echo "</span>
              ";
                }
                // line 138
                echo "            </p>
            ";
            }
            // line 139
            echo "              
          </div>
        </div>
      </div>
\t    ";
            // line 143
            if ((($context["product_row"] ?? null) != 1)) {
                // line 144
                echo "        ";
                if ((((($context["counter"] ?? null) % ($context["product_row"] ?? null)) == 0) || (($context["counter"] ?? null) == ($context["lastproduct"] ?? null)))) {
                    // line 145
                    echo "      </div>
       ";
                }
                // line 147
                echo "       ";
            }
            // line 148
            echo "      ";
            $context["counter"] = (($context["counter"] ?? null) + 1);
            // line 149
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " 
  </div>
  </div>
  <script type=\"text/javascript\">
    \$('#";
        // line 153
        echo ($context["ishi_randomnumer"] ?? null);
        echo "').owlCarousel({
        loop:true,
        nav:true,    
        dots:false,  
        rewind: true,
        rtl: \$('html').attr('dir') == 'rtl'? true : false,
        navText: [\"<i class='fa fa-angle-left'></i>\",\"<i class='fa fa-angle-right'></i>\"],
        responsive:{
          0:{
              items:";
        // line 162
        echo ($context["mobile_column"] ?? null);
        echo "
          },
          544:{
              items:";
        // line 165
        echo ($context["tablet_column"] ?? null);
        echo "
          },
          768:{ 
              items:";
        // line 168
        echo ($context["laptop_column"] ?? null);
        echo "
          },
          992:{
              items:";
        // line 171
        echo ($context["laptop_column"] ?? null);
        echo "
          },
          1200:{
              items:";
        // line 174
        echo ($context["desktop_column"] ?? null);
        echo "
          }
        }
    });   
  </script>
</section>";
    }

    public function getTemplateName()
    {
        return "fashionist/template/extension/module/ishispecialblock.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  421 => 174,  415 => 171,  409 => 168,  403 => 165,  397 => 162,  385 => 153,  374 => 149,  371 => 148,  368 => 147,  364 => 145,  361 => 144,  359 => 143,  353 => 139,  349 => 138,  341 => 136,  338 => 135,  330 => 133,  324 => 131,  322 => 130,  319 => 129,  317 => 128,  313 => 127,  307 => 126,  298 => 120,  283 => 114,  270 => 106,  256 => 97,  248 => 92,  225 => 72,  221 => 71,  217 => 69,  213 => 67,  204 => 63,  200 => 62,  197 => 61,  193 => 59,  187 => 58,  180 => 53,  171 => 49,  167 => 48,  164 => 47,  162 => 46,  159 => 45,  155 => 44,  148 => 41,  141 => 37,  134 => 33,  127 => 29,  122 => 26,  119 => 25,  116 => 24,  110 => 23,  107 => 22,  97 => 20,  95 => 19,  87 => 18,  83 => 17,  76 => 14,  73 => 13,  69 => 11,  66 => 10,  63 => 9,  58 => 8,  55 => 7,  53 => 6,  49 => 5,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fashionist/template/extension/module/ishispecialblock.twig", "");
    }
}
