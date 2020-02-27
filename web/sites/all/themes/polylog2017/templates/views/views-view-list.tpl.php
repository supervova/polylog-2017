<?php

/**
 * @file
 * Template to display a list of rows.
 *
 * print $classes;
 */
?>


<ul class="list-view">
<?php foreach ($rows as $id => $row): ?>
  <li <?php print $row_attributes[$id]; ?>><?php print $row; ?></li>
<?php endforeach; ?>
</ul>
