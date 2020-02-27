<?php
/**
 * @file
 * Returns the HTML for a node.
 * Пустой контейнер
 */

  // Hide the auxiliary fields
  hide($content['links']);
  hide($content['language']);
  hide($content['field_body_class']);
  hide($content['field_css_head']);
  hide($content['field_meta_description']);
  hide($content['field_meta_lang']);
  hide($content['field_meta_url']);

  print render($content);
?>
