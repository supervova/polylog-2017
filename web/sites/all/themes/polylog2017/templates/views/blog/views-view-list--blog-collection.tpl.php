<?php

/**
 * @file
 * Template to display a list of rows.
 *
 * print $classes;
 */

// Get title
if (empty($title)):
  $title = $view->get_title();
endif;

// Render the sidebar to see if there's anything in it.
$sidebar = render(block_get_blocks_by_region('sidebar'));
?>

<main class="container">

  <div class="page-header">
    <?php if ($title): ?>
      <h1 class="page-header-headline">
        <a class="page-header-link" href="/ru/pr-blog"><?php print $title; ?></a>
      </h1>
    <?php endif; ?>
    <span class="page-header-icon" aria-hidden="true"></span>
  </div>


  <div class="row">

    <ul class="list-view narrow">
      <?php foreach ($rows as $id => $row): ?>
        <li class="entry" itemscope itemtype="https://schema.org/Article">
          <?php print $row; ?>
        </li>
      <?php endforeach; ?>
    </ul>

    <?php if ($sidebar):  ?>
      <aside class="sidebar blog">
        <?php print $sidebar; ?>
      </aside>
    <?php endif;  ?>

  </div>

</main>
