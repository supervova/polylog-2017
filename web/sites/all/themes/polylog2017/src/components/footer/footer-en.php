<footer class="footer container">
  <!--noindex-->
  <div class="row">

    <div class="footer-last-options col-lg-6">
      <h3 class="footer-heading">
        Connect with Us
      </h3>
      <a class="btn social icon facebook-page" id="footer-facebook-page" href="https://www.facebook.com/polylog" target="_blank" aria-label="Facebook" title="Facebook"></a>
      <a class="btn social icon linkedin-page" id="footer-linkedin-page" href="https://www.linkedin.com/company/polylog-pr-" target="_blank" aria-label="Linkedin" title="Linkedin"></a>
      <a class="btn social icon instagram-acc" id="footer-instagram-acc" href="http://instagram.com/polylogteam" target="_blank" aria-label="Instagram" title="Instagram"></a>
      <a class="btn social icon rss" id="footer-rss" href="/en/rss/news.rss" target="_blank" aria-label="RSS" title="RSS"></a>
    </div>

    <section class="footer-social col-lg-6 flex-lg-first">
      <h3 class="footer-heading">
        Do you like the page? Share it
      </h3>
      <button class="btn social facebook" id="footer-facebook-like" aria-label="Facebook — Like" title="Facebook — Like">
        <span class="fb-like" data-href="<?php print polylog2017_encoded_url(true); ?>" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></span>
      </button>
      <button class="btn social icon whatsapp js-share" id="footer-whatsapp" data-href="whatsapp://send?text=<?php print urlencode(drupal_get_title()); ?>%20<?php print polylog2017_encoded_url(); ?>" aria-label="WhatsApp" title="WhatsApp"></button>
      <button class="btn social icon twitter js-share" id="footer-twitter"  data-href="http://twitter.com/share?text=<?php print urlencode(drupal_get_title()); ?>&amp;url=<?php print polylog2017_encoded_url(); ?>" aria-label="Twitter" title="Twitter"></button>
      <button class="btn social icon pocket js-share" id="footer-pocket" data-href="https://getpocket.com/edit.php?url=<?php print polylog2017_encoded_url(); ?>" aria-label="Pocket" title="Pocket"></button>
      <button class="btn social icon linkedin js-share" id="footer-linkedin" data-href="https://www.linkedin.com/shareArticle?mini=true&url=<?php print polylog2017_encoded_url(); ?>&amp;title=<?php print urlencode(drupal_get_title()); ?>" aria-label="Linkedin" title="Linkedin"></button>
      <button class="btn social icon email-md js-share" id="footer-email-share" data-href="mailto:?subject=<?php print urlencode(drupal_get_title()); ?>&amp;body=<?php print polylog2017_encoded_url(); ?>" aria-label="Email" title="Email"></button>
    </section>
  </div>
  <!--/noindex-->

  <div class="footer-contacts" itemscope itemtype="http://schema.org/Organization">
    <address class="footer-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
      <span itemprop="streetAddress">12&nbsp;Krasnopresnenskaya Naberezhnaya (WTC), Office&nbsp;1108</span>, <span itemprop="postalCode">123610</span> <span itemprop="addressLocality">Moscow, Russia</span>.
    </address>
    <span class="nowrap">Tel: <a class="link phone-number" href="tel:+7-495-258-2045" content="+74952582045" itemprop="telephone" title="Call Us">+7 (495) 258-20-45</a></span> |
    <a class="js-contact" href="mailto:service-request(at)gmail(dot)com" title="Contact Us">Email</a>
    <p class="footer-privacy">© <span itemprop="name">Polylog</span> | PR, events, IT since 2000. <a class="nowrap" href="/en/company/privacy-policy#consent">Privacy policy</a></p>
  </div>
</footer>
