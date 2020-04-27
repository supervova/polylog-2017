<?php
/**
 * @file
 * Returns the HTML for a node.
 * It is a template for the front page, page, project and job content types
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */

// Hide the auxiliary fields
hide($content['language']);
hide($content['links']);
hide($content['field_blog']);
hide($content['field_body_class']);
hide($content['field_css_head']);
hide($content['field_header_banner']);
hide($content['field_jumbotron']);

hide($content['field_img_view_grid']);
hide($content['field_img_view_grid_link']);
hide($content['field_industries']);
hide($content['field_clients']);
hide($content['field_services']);
hide($content['field_industries_en']);
hide($content['field_clients_en']);
hide($content['field_services_en']);


// Prepare vars for checks
$lang      = render($content['language']);
$banner    = render($content['field_header_banner']);
$jumbotron = render($content['field_jumbotron']);
?>

<?php // Front page ------------------------------------------------------------
  if ($node->type == 'frontpage'):
  print $jumbotron;
?>
<main class="container">
<?php print render($content);?>
</main>

<?php // Content type 'Page' ---------------------------------------------------
  else: ?>
<main class="container">
  <article class="article">
    <div class="page-header">
      <h1 class="page-header-headline"><?php print polylog2017_bb2html($title); ?></h1>
      <span class="page-header-icon" aria-hidden="true"></span>
    </div>

    <?php // Page header banner
      if ($banner):
        print $banner;
      endif;
    ?>

    <div class="article-body">
      <?php print render($content);?>
    </div>

  </article>
</main>
<?php endif;?>
