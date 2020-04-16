<header class="header">

  <a class="logo ru" href="/" rel="home" title="<?php print t('Home'); ?>">
    <?php print $site_name; ?>
  </a>

  <div class="container">

  <!--noindex-->
  <?php print render(block_get_blocks_by_region('search_form')); ?>

  <a class="search-toggler" href="/ru/search" role="button" aria-haspopup="true" aria-label="Site search">
    <svg class="icon find" aria-hidden="true"><use xlink:href="#icon-search" /></svg>
  </a>
  <!--/noindex-->

  <a class="header-link phone-number" id="header-phone" href="tel:+7-495-258-2045" title="<?php print t('Call Us'); ?>">
    <svg class="icon phone" aria-hidden="true"><use xlink:href="#icon-phone" /></svg>+7 (495) <b>258-20-45</b>
  </a>

  <a class="header-locale-switcher" href="/en/home" aria-label="Switch to English" title="Switch to English">
    <span class="icon flag-gb" aria-hidden="true"></span>
  </a>

  </div>
</header>
