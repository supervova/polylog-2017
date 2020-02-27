<?php
/**
 * @file
 * Template name: Project w/ Jumbotron
 */

  // Hide the auxiliary fields
  hide($content['links']);
  hide($content['field_jumbotron']);
  hide($content['language']);
  hide($content['field_body_class']);
  hide($content['field_css_head']);
?>

<article class="jumbotron base">
  <div class="jumbotron-container">
  <?php print render($content['field_jumbotron']); ?>
  </div>
</article>

<main class="container">
  <?php print render($content); ?>
</main>
