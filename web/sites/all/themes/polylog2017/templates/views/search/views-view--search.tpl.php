<?php

/**
 * @file
 * Template to display a list of rows.
 */
$lang = polylog2017_lang();

// Render the sidebar to see if there's anything in it.
$sidebar = render(block_get_blocks_by_region('sidebar'));

// Get search query
$params = drupal_get_query_parameters();
$title = $params['for'];
?>

<main class="container">

  <div class="row main">

    <div class="search list-view narrow">

    <?php if (!empty($title)): ?>
      <h1 class="search-headline"><?php print $title; ?></h1>
    <?php endif; ?>

    <?php if ($header && !$empty): ?>
      <p class="search-counter"><?php print $header; ?></p>
    <?php endif; ?>

    <?php if ($rows): ?>
      <ol class="list-view-inner page-search">
        <?php print $rows; ?>
      </ol>
    <?php else: ?>
      <?php if ($lang == 'en'): ?>
        <p class="alert text-center" role="alert">Sorry, no&nbsp;results were found.</p>
      <?php else: ?>
        <p class="alert text-center" role="alert">Извините, по&nbsp;вашему запросу ничего не&nbsp;найдено</p>
        <p class="alert text-center" role="alert">Sorry, no&nbsp;results were found.</p>
      <?php endif; ?>
    <?php endif; ?>

    </div>

    <?php if ($sidebar):  ?>
      <aside class="sidebar">
        <?php print $sidebar; ?>
      </aside>
    <?php endif;  ?>

  </div>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>
</main>
