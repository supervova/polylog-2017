<aside class="social-options js-sticky">
  <button class="btn social facebook expanded js-share" aria-label="Фейсбук — Нравится" title="Фейсбук — Нравится">
    <span class="fb-like" data-href="<?php print polylog2017_encoded_url(true); ?>" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></span>
  </button>

  <button class="btn social twitter expanded js-share" data-href="https://twitter.com/home?status=<?php print urlencode(drupal_get_title()); ?>+<?php print polylog2017_encoded_url(); ?>">
    <span class="icon twitter-xs" role="presentation"></span>Твитнуть
  </button>

  <button class="btn social telegram expanded js-share" data-href="https://telegram.me/share/url?url=<?php print polylog2017_encoded_url(); ?>" aria-label="Телеграм">
    <span class="icon telegram-xs" role="presentation"></span>Поделиться
  </button>

  <button class="btn social email expanded js-share" data-href="mailto:?subject=<?php print urlencode(drupal_get_title()); ?>&amp;body=<?php print polylog2017_encoded_url(); ?>" aria-label="Почта">
    <span class="icon email-xs-white" role="presentation"></span>Поделиться
  </button>
</aside>
