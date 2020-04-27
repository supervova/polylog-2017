<?php
/**
 * @file
 * Template name: Page Custom Main Area
 * Несмотря на языковой префикс в названии файла используется и для русской,
 * и для английской версии.
 *
 */

  // Hide the auxiliary fields
  hide($content['links']);
  hide($content['field_jumbotron']);
  hide($content['language']);
  hide($content['field_body_class']);
  hide($content['field_css_head']);
  hide($content['field_header_banner']);
  hide($content['field_body_sidebar']);

  // Prepare vars for checks
  $banner = render($content['field_header_banner']);
?>

<main class="container">
  <article class="article">

    <div class="page-header">
      <h1 class="page-header-headline"><?php print polylog2017_bb2html($title); ?></h1>
      <span class="page-header-icon" aria-hidden="true"></span>
    </div>

    <?php
      if ($banner):
        print $banner;
      endif;
    ?>

    <?php print render($content); ?>

  </article>
</main>
