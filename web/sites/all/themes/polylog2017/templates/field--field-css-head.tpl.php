<?php
/**
 * Возвращает значение поля css_head (стили в разделе head)
 */
?>

<?php foreach ($items as $delta => $item): ?>
  <?php print render($item); ?>
<?php endforeach; ?>
