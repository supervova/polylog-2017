<?php

/**
 * @file
 * This template handles the layout of the views exposed filter form.
 *
 * Variables available:
 * - $widgets: An array of exposed form widgets. Each widget contains:
 * - $widget->label: The visible label to print. May be optional.
 * - $widget->operator: The operator for the widget. May be optional.
 * - $widget->widget: The widget itself.
 * - $sort_by: The select box to sort the view using an exposed form.
 * - $sort_order: The select box with the ASC, DESC options to define order. May be optional.
 * - $items_per_page: The select box with the available items per page. May be optional.
 * - $offset: A textfield to define the offset of the view. May be optional.
 * - $reset_button: A button to reset the exposed filter applied. May be optional.
 * - $button: The submit button for the form.
 *
 * @ingroup views_templates
 *
 * 1) Copy the views-exposed-form.tpl.php which is located at
 * /sites/all/modules/views/theme to your own theme folder.
 *
 * 2) Rename it views-exposed-form--<VIEW-NAME>.tpl.php
 */
?>

<?php
foreach ($widgets as $id => $widget) {
  print $widget->widget;
}
?>

<button class="search-reset" type="reset" aria-label="Clear" title="Clear">
  <span class="icon close" role="presentation"></span>
</button>
<button class="search-submit" type="submit" aria-label="Search" title="Search">
  <svg class="icon find" role="presentation">
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-search"></use>
  </svg>
</button>
<button class="search-cancel" type="button">
  Cancel
</button>
