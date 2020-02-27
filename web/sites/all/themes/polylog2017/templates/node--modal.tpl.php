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
  hide($content['links']);
  hide($content['language']);
  hide($content['field_body_class']);

?>

<main class="container modal-stand-alone">
  <article class="article js-modal-content">

    <h1 class="article-headline"><?php print polylog2017_bb2html($title); ?></h1>

    <?php print render($content); ?>

  </article>
</main>
