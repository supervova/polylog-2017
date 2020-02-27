<nav class="navbar">
  <!--noindex-->
  <ul class="navbar-nav nav" role="menubar">

    <li class="navbar-item dropdown" role="menuitem">

      <a class="navbar-dropdown-toggle services js-menu-link" id="dropdown-services" href="/ru/services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="icon services" role="presentation"></span>
        <span class="hidden-md-up"><?php print t('PR Services'); ?></span>
        <span class="hidden-sm-down"><?php print t('Services'); ?></span>
      </a>

      <button class="btn navbar-dropdown-toggle-split" type="button" data-toggle="dropdown">
        <span class="sr-only">Выбрать раздел</span>
      </button>

      <ul class="dropdown-menu" aria-labelledby="dropdown-services" aria-hidden="true" role="menu">

        <li class="dropdown-item index">
          <a class="dropdown-link" href="/ru/services">
            <b><?php print t('Overview'); ?></b>
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/services/event-management">
            <?php print t('Event Management'); ?>
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/services/public-relations">
            PR
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="http://it.polylog.ru" target="_blank" rel="noopener noreferrer">
            Цифровые IT-решения
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/services/fundraising">
            <?php print t('Fundraising'); ?>
          </a>
        </li>

      </ul>
    </li>

    <li class="navbar-item dropdown" role="menuitem">

      <a class="navbar-dropdown-toggle projects js-menu-link" id="dropdown-projects" href="/ru/projects" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="icon projects" role="presentation"></span>
        <?php print t('Projects'); ?>
      </a>

      <button class="btn navbar-dropdown-toggle-split" type="button" data-toggle="dropdown">
        <span class="sr-only">Выбрать раздел</span>
      </button>

      <ul class="dropdown-menu" aria-labelledby="dropdown-projects" aria-hidden="true" role="menu">

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/projects">
            <?php print t('Case Studies'); ?>
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/projects/industries">
            <?php print t('Industries'); ?>
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="http://it.polylog.ru/polycode" target="_blank" rel="noopener noreferrer">
            POLYCODE
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/projects/testimonials">
            <?php print t('Testimonials'); ?>
          </a>
        </li>

        <!-- <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/upcoming-events">
            Готовим событие
          </a>
        </li> -->

      </ul>
    </li>

    <li class="navbar-item dropdown" role="menuitem">

      <a class="navbar-dropdown-toggle company js-menu-link" id="dropdown-company" href="/ru/company" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="icon company" role="presentation"></span>
        <?php print t('Company'); ?>
      </a>

      <button class="btn navbar-dropdown-toggle-split" type="button" data-toggle="dropdown">
        <span class="sr-only">Выбрать раздел</span>
      </button>

      <ul class="dropdown-menu" aria-labelledby="dropdown-company" aria-hidden="true" role="menu">

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/company">
            <?php print t('About Us'); ?>
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/company/management">
            <?php print t('Team'); ?>
          </a>
        </li>

        <!-- <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/company/pr-events-agency-ratings">
            <?php print t('Awards and Ratings'); ?>
          </a>
        </li> -->

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/company/iso">
            <?php print t('Quality management system'); ?>
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/company/arj">
            <?php print t('News Archive'); ?>
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/company/contacts">
            <?php print t('Contacts'); ?>
          </a>
        </li>

      </ul>
    </li>

    <li class="navbar-item dropdown hidden-xs-down" role="menuitem">

      <a class="navbar-dropdown-toggle careers js-menu-link" id="dropdown-careers" href="/ru/careers/jobs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="icon career" role="presentation"></span>
        Карьера
      </a>

      <button class="btn navbar-dropdown-toggle-split" type="button" data-toggle="dropdown">
        <span class="sr-only">Выбрать раздел</span>
      </button>

      <ul class="dropdown-menu" aria-labelledby="dropdown-careers" aria-hidden="true" role="menu">

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/careers">
            Почему «Полилог»?
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/careers/jobs">
            Вакансии
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/careers/internship">
            Стажировка
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/careers/talents">
            Конкурс талантов
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/careers/culture">
            Корпоративная культура
          </a>
        </li>

      </ul>
    </li>

    <li class="navbar-item dropdown hidden-xs-down">

      <a class="navbar-dropdown-toggle blog js-menu-link" id="dropdown-blog" href="/ru/pr-blog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="icon blog" role="presentation"></span>
        Блог
      </a>

      <button class="btn navbar-dropdown-toggle-split" type="button" data-toggle="dropdown">
        <span class="sr-only">Выбрать раздел</span>
      </button>

      <ul class="dropdown-menu" aria-labelledby="dropdown-blog" aria-hidden="true" role="menu">

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/pr-blog">
            Идеи и&nbsp;опыт
          </a>
        </li>

        <!--
        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/pr-blog/tutorials">
            Видеолекции
          </a>
        </li>

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/pr-blog/focus">
            Фокус
          </a>
        </li> -->

        <li class="dropdown-item">
          <a class="dropdown-link" href="/ru/pr-blog/help">
            Энциклопедия&nbsp;PR
          </a>
        </li>

      </ul>
    </li>

    <li class="navbar-cta">
      <h3 class="navbar-cta-headline">
        <?php print t('How can we help '); ?>
        <small><?php print t('your business?'); ?></small>
      </h3>
      <button class="navbar-cta-btn js-open-modal" id="navbar-cta" data-href="/ru/company/contact-us" data-target="#modal" data-toggle="modal">
        <?php print t('Пишите'); ?>
      </button>
    </li>

  </ul>
  <!--/noindex-->
</nav>
