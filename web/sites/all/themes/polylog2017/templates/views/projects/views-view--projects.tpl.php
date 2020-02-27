<?php
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */


// Get base path (contains language prefix)
$url = $view->get_url();

// Get URI
$params = $_SERVER['REQUEST_URI'];

// Render the featured projects region to see if there's anything in it.
$featured = render(block_get_blocks_by_region('featured_case_studies'));
?>

<main class="container has-page-header has-article-banner mb-5<?php if ($params == '/ru/projects'): print ' collection-index'; endif; ?>">
  <article class="article">

    <div class="page-header mb-0">
      <h1 class="page-header-headline">
        <?php if ($url == 'ru/projects'): ?>
          <a class="page-header-link" href="/ru/projects">Наша работа</a>
        <?php else: ?>
          <a class="page-header-link" href="/en/projects">Our Work</a>
        <?php endif; ?>
      </h1>
      <span class="page-header-icon" role="presentation"></span>
    </div>

    <?php
    // Featured projects
    if (($params == '/ru/projects' || $params == '/en/projects')  && $featured) {
      print $featured;
    }

    if ($exposed) {
      print $exposed;
    }
    ?>

    <div class="projects row">

      <?php
      // Collection Area
      if ($rows) {
        print $rows;
      } elseif ($empty) {
        print $empty;
      }
      ?>
    </div>
  </article>
</main>

<?php
// Pager
if ($pager) {
  print $pager;
}
?>
