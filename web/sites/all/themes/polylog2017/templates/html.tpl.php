<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 *
 */

// Костыль многоязычности
$lang = polylog2017_lang();
if ($lang == 'en') {
  $site_name = 'Polylog — Russian PR Agency';
} else {
  $site_name = $head_title_array['name'];
}

// Это возвращает только русский
// global $language ;
// $lang_name = $language->language ;

// Как сделать правильно
// http://go.shr.lc/2rbK2FH

?><!DOCTYPE html>
<html lang="<?php print $lang; ?>" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php
if ($lang == 'en') {
  print polylog2017_strip($head_title_array['title']) . ' | ' . $site_name;
} elseif (drupal_is_front_page()) {
  print 'Агентство «Полилог»: PR, организация мероприятий, IT-решения, фандрайзинг';
} else {
  print polylog2017_strip($head_title);
}
?></title>

<meta name="robots" content="noyaca">
<?php print $head; ?>
<meta property="og:title" content="<?php print polylog2017_strip($head_title_array['title']); ?>">
<meta property="fb:admins" content="506386402">
<meta property="fb:app_id" content="129823214280964">
<meta name="twitter:title" content="<?php print polylog2017_strip($head_title_array['title']); ?>">
<meta name="twitter:site" content="@polylog">
<meta name="twitter:creator" content="@supervova">

<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="<?php print $site_name; ?>">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Polylog">
<link rel="apple-touch-icon" href="/a/img/icon/icon.png">

<meta name="msapplication-TileImage" content="/a/img/icon/touch/apple-touch-icon.png">
<meta name="msapplication-TileColor" content="#cc3333">
<meta name="msapplication-tap-highlight" content="no">

<meta name="theme-color" content="#cc3333">

<meta content="origin" name="referrer">

<link rel="home" href="https://www.polylog.ru">
<link rel="sitemap" type="application/xml" href="/sitemap.xml">
<link rel="shortcut icon" href="https://www.polylog.ru/favicon.ico" type="image/x-icon">
<?php if ($lang != 'en') : ?>
<link rel="alternate" href="https://www.polylog.ru/rss/united.rss" type="application/rss+xml" title="RSS: передовой опыт в области пиар и event-менеджмента">
<?php else : ?>
<link rel="alternate" href="https://www.polylog.ru/en/rss/news.rss" type="application/rss+xml" title="Public relations in Russian market">
<?php endif; ?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:600i%7CRoboto:100,300,400,500&amp;subset=cyrillic">
<link rel="stylesheet" href="/a/css/main.css?v2020-04-17b">

<?php if ($field_css_head) : ?>
<style>
  <?php print $field_css_head; ?>
</style>
<?php endif; ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P4R6SM7');</script>

<?php
// print $styles;
// print $scripts;
?>
</head>

<body class="<?php print polylog2017_body_classes(); if ($field_body_class) : print ' ' . $field_body_class; endif; ?>">
<!-- Google Tag Manager + -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P4R6SM7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <?php
  // print $page_top;
    print $page;
  // print $page_bottom;
  ?>
</body>
</html>
