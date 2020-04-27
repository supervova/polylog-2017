<?php
/**
 * @file
 * Template name: Industry
 * Несмотря на языковой префикс в названии файла используется и для русской,
 * и для английской версии.
 */

  // Hide the auxiliary fields
  hide($content['links']);
  hide($content['field_jumbotron']);
  hide($content['language']);
  hide($content['field_body_class']);
  hide($content['field_css_head']);
  hide($content['field_header_banner']);
  hide($content['field_body_sidebar']);

  // Prepare vars for checks
  $banner = render($content['field_header_banner']);
  $lang   = render($content['language']);
?>

<main class="container">
  <article class="article">

    <div class="page-header">
      <h1 class="page-header-headline"><?php print polylog2017_bb2html($title); ?></h1>
      <span class="page-header-icon" aria-hidden="true"></span>
    </div>

  <?php
    if ($banner):
      print $banner;
    endif;
  ?>

  <div class="row has-sidebar-and-breadcrumb">

    <nav class="breadcrumb base">
      <?php if ($lang == 'en'): ?>
        <a class="breadcrumb-item home" href="/">Home</a>
        <a class="breadcrumb-item" href="/en/projects">Projects</a>
        <a class="breadcrumb-item" href="/en/projects/industries">Industry expertise</a>
      <?php else: ?>
        <a class="breadcrumb-item home" href="/">Главная</a>
        <a class="breadcrumb-item" href="/ru/projects">Проекты</a>
        <a class="breadcrumb-item" href="/ru/projects/industries">Наш опыт по&nbsp;отраслям</a>
      <?php endif;?>
      <span class="breadcrumb-item active"><?php print polylog2017_bb2html($title); ?></span>
    </nav>

    <?php print render($content); ?>

  </div>

  </article>
</main>
