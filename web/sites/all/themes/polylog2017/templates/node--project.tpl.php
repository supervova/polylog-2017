<?php
/**
 * @file
 * Returns the HTML for a node.
 * It is a template for the front page, page, project and job content types
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */

// Hide the auxiliary fields
hide($content['language']);
hide($content['links']);
hide($content['field_blog']);
hide($content['field_body_class']);
hide($content['field_css_head']);
hide($content['field_header_banner']);
hide($content['field_jumbotron']);

hide($content['field_img_view_grid']);
hide($content['field_img_view_grid_link']);
hide($content['field_image_link']);
hide($content['field_industries']);
hide($content['field_clients']);
hide($content['field_services']);
hide($content['field_industries_en']);
hide($content['field_clients_en']);
hide($content['field_services_en']);


// Prepare vars for checks
$lang      = render($content['language']);
$banner    = render($content['field_header_banner']);
$jumbotron = render($content['field_jumbotron']);
?>

<?php if ($teaser): ?>

  <article class="entry lonely" itemscope itemtype="https://schema.org/Article">
    <div class="entry-inner">
      <h2 class="entry-headline" itemprop="headline">
        <a href="<?php print $node_url; ?>">
          <?php print polylog2017_bb2html($title); ?>
        </a>
      </h2>
      <p class="entry-summary" itemprop="about">
        <?php print render($content);?>
      </p>
      <time class="meta-date" itemprop="datePublished" datetime="<?php print format_date($node->created, 'custom', 'Y-m-d'); ?>"><i><?php print format_date($node->created, 'custom', 'd'); ?></i> <?php print format_date($node->created, 'custom', 'M Y'); ?></time>
    </div>
  </article>

<?php else: // Full page ?>

  <?php // Jumbotron
  if ($jumbotron): ?>

  <section class="jumbotron base">
    <div class="jumbotron-container">
    <?php print $jumbotron; ?>
    </div>
  </section>

  <main class="container">
    <?php print render($content); ?>
  </main>

  <?php // W/o jumbotron
  else: ?>
  <main class="container">
    <article class="article">
      <header class="article-eyebrow meta">
        <?php if ($node->language == 'en'): ?>
          <a class="meta-link section back" href="/en/projects">Projects</a>
        <?php else:  ?>
          <a class="meta-link section back" href="/ru/projects">Проекты</a>
        <?php endif; ?>
      </header>

      <h1 class="article-headline">
        <?php print polylog2017_bb2html($title);?>
      </h1>

      <div class="article-body">
        <?php print render($content);?>
      </div>

      <footer class="article-footer meta">
        <time class="meta-date" datetime="<?php print format_date($node->created, 'custom', 'Y-m-d');?>"><i><?php print format_date($node->created, 'custom', 'd');?></i> <?php print format_date($node->created, 'custom', 'M Y');?></time>
      </footer>
    </article>
  </main>
  <?php endif; // w/o jumbotron ?>
<?php endif; // full page ?>
