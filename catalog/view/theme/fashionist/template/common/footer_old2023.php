<div id="_mobile_column_left" class="container"></div>
<div id="_mobile_column_right" class="container"></div>
<footer id="footer" class="{{ ishome }}">
  <div class="footer-before">    
    <div class="container"> 
      <div class="row">
           {{ footerbefore }} 
      </div>
    </div>
  </div>
      <div class="footer-container">
        <div class="container">
          <div class="row">
            <div id="_mobile_block_newsletter"></div>
            <div id="_mobile_social"></div>
            <div id="_mobile_blockcontact"></div>
            <section class="information col-lg-3 col-md-3 col-sm-12 footer-block">
                <div class="footer-title clearfix  hidden-lg hidden-md collapsed" data-target="#information-container" data-toggle="collapse">
                  <span class="h3">{{ text_information }}</span>
                  <span class="navbar-toggler collapse-icons">
                    <i class="fa fa-angle-down add"></i>
                    <i class="fa fa-angle-up remove"></i>
                  </span>
                </div>
                {% if informations %}
                <div id="information-container" class="collapse footer-dropdown">    
                  <ul class="list-unstyled">
                   {% for information in informations %}
                    <li><a href="{{ information.href }}">{{ information.title }}</a></li>
                    {% endfor %}
                  </ul>
                </div>
                {% endif %}
            </section>
            <section class="extras col-lg-3 col-md-3 col-sm-12 footer-block">
                <div class="footer-title clearfix  hidden-lg hidden-md collapsed" data-target="#extras-container" data-toggle="collapse">
                  <span class="h3">Каталог</span>
                  <span class="navbar-toggler collapse-icons">
                    <i class="fa fa-angle-down add"></i>
                    <i class="fa fa-angle-up remove"></i>
                  </span>
                </div>
                <div id="extras-container" class="collapse footer-dropdown">
                  <ul class="list-unstyled">
                    <li><a href="http://cessa-shoes.ru/novinki">Новинки</a></li>
                    <li><a href="http://cessa-shoes.ru/sale">Sale</a></li>
                    <li><a href="http://cessa-shoes.ru/predzakaz">Предзаказ</a></li>
                  </ul>
                </div>
            </section>
            <section class="account col-lg-3 col-md-3 col-sm-12 footer-block">
                <div class="footer-title clearfix  hidden-lg hidden-md collapsed" data-target="#account-container" data-toggle="collapse">
                  <span class="h3">{{ text_account }}</span>
                  <span class="navbar-toggler collapse-icons">
                    <i class="fa fa-angle-down add"></i>
                    <i class="fa fa-angle-up remove"></i>
                  </span>
                </div>
                <div id="account-container" class="collapse footer-dropdown">
                  <ul class="list-unstyled">
                  <li><a href="{{ account }}">{{ text_account }}</a></li>
                    <li><a href="{{ order }}">{{ text_order }}</a></li>
                    <li><a href="{{ contact }}">{{ text_contact }}</a></li>
                  </ul>
                </div>
            </section>
            <div id="_desktop_blockcontact">
              <div class="block-contact col-lg-3 col-md-3 col-sm-12">
                  <div class="footer-title clearfix  hidden-lg hidden-md collapsed" data-target="#contact-info-container" data-toggle="collapse">
                  <span class="h3">{{ text_contact }}</span>
                  <span class="navbar-toggler collapse-icons">
                    <i class="fa fa-angle-down add"></i>
                    <i class="fa fa-angle-up remove"></i>
                  </span>
                </div>
                  <div id="contact-info-container" class="collapse footer-dropdown">
                      {% if storeaddress %}
                      <div class="block address col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                        <div class="content">{{ storeaddress }}</div>
                      </div>
                      {% endif %}
                      {% if storetelephone %}
                      <div class="block phone col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="icon phone"><i class="fa fa-phone"></i></span>
                        <div class="content">
                          <a href="tel:{{ storetelephone }}">{{ storetelephone }}</a>
                        </div>
                      </div>
                      {% endif %}
                      {% if storefax %}
                      <div class="block fax col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="icon"><i class="fa fa-fax"></i></span>
                        <div class="content">{{ storefax }}</div>
                      </div>
                      {% endif %}
                      {% if storeemail %}
                      <div class="block email col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="icon"><i class="fa fa-envelope"></i></span>
                        <div class="content">
                          <a href="mailto:{{ storeemail }}">{{ storeemail }}</a>
                        </div>
                      </div>
                      {% endif %}
					  <div class="block email col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="icon"><i class="fa fa-instagram" aria-hidden="true"></i></span>
                        <div class="content">
                          <a href="https://www.instagram.com/cessa_shoes/" target="_blank">@cessa_shoes</a>
                        </div>
                      </div>
                  </div>
              </div> 
            </div>
            {{ footermiddle }}  
        </div>
    </div>
  </div>
  <div class="footer-after">
    <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <p class="footer-aftertext">{{ powered }}</p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">{{ footerafter }}</div>
        </div>
    </div>
  </div>
  <a id="slidetop" href="#" ></a>
</footer>
{% for script in scripts %}
<script src="{{ script }}" type="text/javascript"></script>
{% endfor %}
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(86730422, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/86730422" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script async src="//files.jumpoutpopup.ru/56640f43558c138ff5a4.js"></script>
</body></html>