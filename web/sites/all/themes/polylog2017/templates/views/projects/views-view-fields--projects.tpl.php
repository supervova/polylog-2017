<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

$thumbnail = $fields['field_img_view_grid_link']->content;

// Language set only in English view
if ($fields['language']->content) {
  $client = $fields['field_clients_en']->content;
} else {
  $client = $fields['field_clients']->content;
}
?>
<a class="project" href="<?php print $fields['path']->content; ?>">
  <?php if ($thumbnail): ?>
    <img src="<?php print $thumbnail; ?>" alt="<?php print $fields['field_clients']->content; ?>">
  <?php endif; ?>
  <div class="project-caption">
    <h3 class="project-eyebrow"><?php print $client; ?></h3>
    <h2 class="project-headline"><?php print $fields['title']->content; ?></h2>
  </div>
</a>
