<header class="header">

  <a class="logo en" href="/en/home" rel="home" title="Home">
    Polylog PR
  </a>

  <div class="container">

    <!--noindex-->
    <?php print render(block_get_blocks_by_region('search_form')); ?>

    <a class="search-toggler" href="/ru/search" role="button" aria-haspopup="true" aria-label="Site search">
      <svg class="icon find" role="presentation"><use xlink:href="#icon-search" /></svg>
    </a>
    <!--/noindex-->

    <div class="header-options">
      <a class="header-link phone-number" id="header-phone" href="tel:+7-495-258-2045" title="<?php print t('Call Us'); ?>">
        <svg class="icon phone" role="presentation"><use xlink:href="#icon-phone"></use></svg>+7 (495) <b>258-20-45</b>
      </a>
      <div class="dropdown">
        <a class="header-locale-switcher" href="/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="In Russian, Chinese or Japanese">
          <span class="icon flag-ru" role="presentation"></span>
        </a>

        <div class="dropdown-menu">
          <a class="dropdown-item is-active" href="/en/home">
            <span class="icon flag-gb" role="presentation"></span>
            English
          </a>
          <a class="dropdown-item" href="/">
            <span class="icon flag-ru" role="presentation"></span>
            Русский
          </a>
          <a class="dropdown-item" href="/zh/home">
            <span class="icon flag-cn" role="presentation"></span>
            中文
          </a>
          <a class="dropdown-item" href="/ja/home">
            <span class="icon flag-jp" role="presentation"></span>
            日本語
          </a>
        </div>

      </div>
    </div>

  </div>
</header>
