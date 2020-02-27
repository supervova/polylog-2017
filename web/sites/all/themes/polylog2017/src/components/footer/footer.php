<footer class="footer container">
  <!--noindex-->
  <div class="row">
    <div class="footer-last-options col-lg-6">

      <h3 class="footer-heading">Получайте на&nbsp;почту анонсы видеолекций и&nbsp;дайджест блога</h3>
      <form class="form subscription" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" action="https://polylog.us2.list-manage.com/subscribe/post?u=252bc5a38de27d3ce6515c16c&amp;id=6995ccb858" method="post" target="_blank">
        <input class="form-control" id="mce-FNAME" name="FNAME" type="text" value="" maxlength="128" aria-label="Имя" placeholder="Имя">
        <input class="form-control email" id="mce-EMAIL" name="EMAIL" type="email" value="" required="" maxlength="128" aria-label="Email" placeholder="Email">
        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>
        <div style="position: absolute; left: -5000px;" aria-hidden="true">
          <input type="text" name="b_252bc5a38de27d3ce6515c16c_6995ccb858" tabindex="-1" value="">
        </div>
        <div class="form-actions">
          <input class="button button-primary form-submit" id="mc-embedded-subscribe" name="subscribe" type="submit" value="Подписаться">
        </div>
        <div class="form-item webform-component webform-component-markup webform-component--form-disclaimer">
          <p class="form-disclaimer tooltip">Нажимая на&nbsp;кнопку, вы&nbsp;даете<br><a href="/ru/company/privacy-policy#consent" target="_blank">согласие на&nbsp;обработку своих персональных данных</a></p>
        </div>
      </form>

      <ul class="footer-quick-links" role="menu">
        <li class="quick-links-item">
          <h3 class="quick-links-caption">
            <a class="quick-links-caption-link" href="/ru/projects">
              Новости:
            </a>
          </h3>
          <?php print views_embed_view('ru_projects_footer', $display_id = 'block'); ?>
        </li>
        <li class="quick-links-item">
          <h3 class="quick-links-caption">
            <a class="quick-links-caption-link" href="/ru/blog/pr-tutorials">
              В блоге:
            </a>
          </h3>
          <?php print views_embed_view('blog_in_footer', $display_id = 'block'); ?>
        </li>
        <li class="quick-links-item">
          <h3 class="quick-links-caption">
            <a class="quick-links-caption-link" href="/ru/pr-blog/help">
              Словарь:
            </a>
          </h3>
          <a class="quick-links-link" href="/ru/help/pr-public-relations-svyazi-obshhestvennostyu-piar">
            PR (public relations, связи с общественностью, пиар)
          </a>
        </li>
      </ul>
    </div>

    <section class="footer-social col-lg-6 flex-lg-first">
      <h3 class="footer-heading">
        Нравится? Ставьте лайки, делитесь
      </h3>
      <button class="btn social facebook" id="footer-facebook-like" aria-label="Фейсбук — Нравится" title="Фейсбук — Нравится">
        <span class="fb-like" data-href="<?php print polylog2017_encoded_url(true); ?>" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></span>
      </button>
      <div class="btn social vk" id="vk-like" role="button" aria-label="Вконтакте" title="Вконтакте">
        <script src="//vk.com/js/api/openapi.js?136"></script>
        <script>
          VK.init({
            apiId: 5796141,
            onlyWidgets: true
          });
          VK.Widgets.Like("vk-like", {
            type: "mini",
            height: 30
          });
        </script>
      </div>
      <button class="btn social icon whatsapp js-share" id="footer-whatsapp" data-href="whatsapp://send?text=<?php print urlencode(drupal_get_title()); ?>%20<?php print polylog2017_encoded_url(); ?>" aria-label="WhatsApp" title="WhatsApp"></button>
      <button class="btn social icon twitter js-share" id="footer-twitter" data-href="http://twitter.com/share?text=<?php print urlencode(drupal_get_title()); ?>&amp;url=<?php print polylog2017_encoded_url(); ?>" aria-label="Твиттер" title="Твиттер"></button>
      <button class="btn social icon pocket js-share" id="footer-pocket" data-href="https://getpocket.com/edit.php?url=<?php print polylog2017_encoded_url(); ?>" aria-label="Покет" title="Покет"></button>
      <button class="btn social icon email-md js-share" id="footer-email-share" data-href="mailto:?subject=<?php print urlencode(drupal_get_title()); ?>&amp;body=<?php print polylog2017_encoded_url(); ?>" aria-label="Почта" title="Почта"></button>
      <h3 class="footer-heading last">
        PR&nbsp;и&nbsp;маркетинг в&nbsp;разных форматах. Подписывайтесь
      </h3>
      <a class="btn social icon facebook-page" id="footer-facebook-page" href="https://www.facebook.com/polylog" target="_blank" aria-label="Фейсбук" title="Фейсбук"></a>
      <a class="btn social icon instagram-acc" id="footer-instagram-acc" href="http://instagram.com/polylogteam" target="_blank" aria-label="Инстаграм" title="Инстаграм"></a>
      <a class="btn social icon rss" id="footer-rss" href="/rss/united.rss" target="_blank" aria-label="RSS" title="RSS"></a>
    </section>
  </div>
  <!--/noindex-->

  <div class="footer-contacts" itemscope itemtype="http://schema.org/Organization">
    <address class="footer-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
      <span itemprop="postalCode">123610</span>,
      <span itemprop="addressLocality">Москва</span>,
      <span itemprop="streetAddress">Краснопресненская наб. 12 (ЦМТ), подъезд 3, этаж 11, офис 1108.</span>
    </address>
    <span class="nowrap">Тел.: <a class="link phone-number" id="footer-phone" href="tel:+7-495-258-2045" content="+74952582045" itemprop="telephone" title="Звоните">+7 (495) 258-20-45</a></span> |
    <a class="js-contact" id="footer-email" href="mailto:service-request(at)gmail(dot)com" title="Написать письмо">Эл. почта</a>
    <p class="footer-privacy">© <span itemprop="name">«Полилог»</span> | PR, event, IT c&nbsp;2000г. <a class="nowrap" href="/ru/company/privacy-policy#consent">Политика конфиденциальности</a></p>
  </div>
</footer>
