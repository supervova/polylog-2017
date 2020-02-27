<?php

/**
 * @file
 * Template to display a list of rows.
 */

// Get title
$title = $view->get_title();

// Get base path (contains language prefix)
$url = $view->get_url();

// Get current page number
$pageNumber = $_GET['page'];

// Render the sidebar to see if there's anything in it.
$sidebar = render(block_get_blocks_by_region('sidebar'));
?>

<main class="container<?php if (!$pageNumber): print ' collection-index'; endif; ?>">

  <div class="page-header">
    <?php if ($title): ?>
      <h1 class="page-header-headline">
        <?php if ($url == 'ru/company/arj'): ?>
          <a class="page-header-link" href="/ru/company/arj"><?php print $title; ?></a>
        <?php elseif ($url == 'en/company/arj'): ?>
          <a class="page-header-link" href="/en/company/arj"><?php print $title; ?></a>
        <?php endif; ?>
      </h1>
    <?php endif; ?>
    <span class="page-header-icon" role="presentation"></span>
  </div>


  <div class="row main">

    <ul class="list-view narrow chronology">
      <?php foreach ($rows as $id => $row): ?>
        <li class="list-view-item">
          <?php print $row; ?>
        </li>
      <?php endforeach; ?>
    </ul>

    <?php if ($sidebar):  ?>
      <aside class="sidebar">
        <?php print $sidebar; ?>
      </aside>
    <?php endif;  ?>

  </div>

</main>
