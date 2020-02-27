<?php
/**
 * @file
 * Returns the HTML for a webform node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */

  // Hide the auxiliary fields
  hide($content['links']);
  hide($content['language']);
  hide($content['field_body_class']);

  // Check modal friendly form
  $bodyClass = render($content['field_body_class']);
?>

<!-- <div class="form-wrapper js-modal-content"> -->
<div class="form-wrapper<?php if (strpos($bodyClass, 'modal-friendly') !== false): print ' js-modal-content'; endif; ?>">
  <h2 class="form-headline"><?php print render($title); ?></h2>
  <?php if (!empty($content['field_subhead'])): ?>
    <p class="form-subhead">
      <?php print render($content['field_subhead']); ?>
    </p>
  <?php endif; ?>
  <?php print render($content); ?>
</div>
