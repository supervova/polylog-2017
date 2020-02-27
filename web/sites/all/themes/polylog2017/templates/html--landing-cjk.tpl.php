<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 *
 */


switch ($meta_lang) {
  case 'en':
    $site_name = 'Polylog — Russian PR Agency';
    break;
  case 'zh':
    $site_name = '公关机构“Polylog”';
    break;
  case 'ja':
    $site_name = 'PR代理店「ポリロッグ」';
    break;
  default:
    $site_name = $head_title_array['name'];
    break;
}

?>
<!DOCTYPE html>
<html lang="<?php print $meta_lang; ?>" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php print polylog2017_strip($head_title_array['title']) . ' | ' . $site_name; ?></title>
<meta property="og:title" content="<?php print polylog2017_strip($head_title_array['title']); ?>">
<?php if ($meta_description) : ?>
<meta name="description" content="<?php print $meta_description; ?>">
<meta property="og:description" content="<?php print $meta_description; ?>">
<?php endif; ?>
<meta property="og:image" content="https://www.polylog.ru/a/img/logo/polylog-logo.svg">
<meta name="twitter:card" content="summary_large_image">
<?php if ($meta_url) : ?>
<meta property="og:url" content="<?php print $meta_url; ?>">
<link rel="canonical" href="<?php print $meta_url; ?>">
<?php endif; ?>
<link rel="shortcut icon" href="https://www.polylog.ru/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/a/css/cjk.css?v2019-09-05a">
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
</head>

<body class="<?php print polylog2017_body_classes(); if ($field_body_class) : print ' ' . $field_body_class; endif; ?>">
<!-- Google Tag Manager + -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P4R6SM7" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<?php
  print $page;
?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/a/js/vendor/jquery-1.12.4.min.js"><\/script>')</script>

<script src="/a/js/plugins.js"></script>
<script src="/a/js/main.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.7&appId=630730836946347";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>
</html>
