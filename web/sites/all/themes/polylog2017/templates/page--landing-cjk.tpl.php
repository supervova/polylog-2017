<?php

/**
 * @file
 * Returns the HTML for a CJK landing page.
 *
 * Useful variables:
 *
 * - $is_front: TRUE if the current page is the front page.
 * - $site_name: Set it in theme settings.
 * - $site_slogan: Set it in theme settings.
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title: The page title, for use in the actual HTML content.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $node
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar']: Items for the first sidebar.
 * - $page['footer']: Items for the footer region.
 * @see polylog.info
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<?php print render($page['content']); ?>

