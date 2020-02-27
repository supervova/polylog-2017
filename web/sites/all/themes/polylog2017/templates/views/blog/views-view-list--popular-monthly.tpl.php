<?php

/**
 * @file
 * Template to display a list of rows.
 */
?>

<?php print $wrapper_prefix; ?>
  <h2 class="module-headline"><?php print t('Best of the month'); ?></h2>
  <?php print $list_type_prefix; ?>
    <?php foreach ($rows as $id => $row): ?>
      <li class="module-item"><?php print $row; ?></li>
    <?php endforeach; ?>
  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>
