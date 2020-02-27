<?php

/*
 * -----------------------------------------------------------------------------
 * КЛАССЫ <BODY> В ЗАВИСИМОСТИ ОТ ТЕКУЩЕГО АДРЕСА
 * -----------------------------------------------------------------------------
 */

function polylog2017_body_classes() {

  // 1) Получаем путь, относительный к корню
  // 2) Разбиваем его на фрагменты по на '/'. Фрагменты /ru, /en, /user
  // записываем в $prefix. Второй и третий — в две переменные: раздел и страница.
  // 3) Создаем класс раздела
  // 4) Создаем модификатор разводящей страницы.

  if (drupal_is_front_page()) {
    $class = 'page-front has-dark-jumbotron';
  } else {
    // $path = drupal_get_path_alias($_GET['q'], language_default()->language);
    $path = drupal_get_path_alias($_GET['q']); // 1
    list($prefix, $section, $page) = explode('/', $path, 3); // 2

    if ($prefix == 'user') {
      $class = 'section-user';
    } elseif ($section == 'pr-blog' || $section == 'pr-tutorials') {
      $class = 'section-blog';
    } elseif ($section == 'search-results') {
      $class = 'page-search';
    } else {
      $class = 'section-' . $section; // 3

      if (strpos($page, 'index.htm') || empty($page)) {
        // 4
        $class .= ' index';
      }
    }
  }

  return $class;
}

/*
 * -----------------------------------------------------------------------------
 * СМЕНА ЯЗЫКА ПО URL'у
 * -----------------------------------------------------------------------------
 */

// function polylog2017_lang(&$variables) {
function polylog2017_lang() {

  // 1) Получаем путь от корня, разбиваем его на фрагменты
  // 2) Сохраняем первый фрагмент в переменную
  // 3) Получаем список доступных языков
  // 4) Если сохраненный фрагмент URL'а — 'en', переключаем язык

  // global $language;
  // $langs = array($language->language);

  if (drupal_is_front_page()) {
    $lang = 'ru';
  } else {
    $lang = explode('/', $_SERVER['REQUEST_URI']); // 1
    $lang = $lang[1]; // 2
  }



  // $langs = language_list(); // 3

  // if ($lang = 'en') { // 4
  //   $variables['language'] = $langs['en'];
  // }

  return $lang;
}


/*
 * -----------------------------------------------------------------------------
 * PREPROCESS HTML
 * -----------------------------------------------------------------------------
 */

function polylog2017_preprocess_html(&$variables, $hook) {

  // ДОБАВЛЕНИЕ ЗНАЧЕНИЙ ПОЛЬЗОВАТЕЛЬСКИХ ПОЛЕЙ В ШАБЛОН HTML.TPL.PHP

  // 1) Класс <body>
  // 2) CSS в <head>
  // 3) Язык ноды

  // a) Создать пользовательское поле. Например, field_body_class
  // б) Создать шаблон поля.
  // modules/field/theme/field.tpl.php -> field--field-body-class.tpl.php
  // в) Скрыть заголовок поля в настройках видимости
  // admin/structure/types/manage/page/display
  // г) Скрыть поле в node.tpl.php
  // hide($content['field_body_class']);
  // д) Вывести значение в html.tpl.php
  // print $field_body_class;

  $node = menu_get_object();
  if ($node && isset($node->nid)) {
    $node = node_load($node->nid);
    node_build_content($node);
    $variables['field_body_class'] = render($node->content['field_body_class']); // 1
    $variables['field_css_head'] = render($node->content['field_css_head']); // 2
    $variables['field_language'] = render($node->content['language']); // 3

    $variables['meta_url'] = $node->field_meta_url['und'][0]['value'];
    $variables['meta_description'] = $node->field_meta_description['und'][0]['value'];
    $variables['meta_lang'] = $node->field_meta_lang['und'][0]['value'];

    // Альтернативный шаблон html--content-type-name.tpl.php
    $variables['theme_hook_suggestions'][] = 'html__'. $node->type;
  }
}


/*
 * -----------------------------------------------------------------------------
 * PREPROCESS PAGE
 * -----------------------------------------------------------------------------
 */

function polylog2017_preprocess_page(&$variables) {

  // 1) ШАБЛОНЫ СТРАНИЦ ПО ТИПУ МАТЕРИАЛА (NOD'Ы)

  if (isset($variables['node']->type)) {
    // If the content type's machine name is "my_machine_name" the file
    // name will be "page--my-machine-name.tpl.php".
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  }

  // 2) ДОСТУП К ПОЛЬЗОВАТЕЛЬСКОМУ ПОЛЮ ИЗ PAGE.TPL.PHP

  // Using in page.tpl.php:
  // if (isset($node_content) && $node_content['field_name']) {
  //   print render($node_content['field_name']);
  // }

  // Hide field in node.tpl.php:
  // hide($content['field_name']);

  $nid = arg(1);
  if (arg(0) == 'node' && is_numeric($nid)) {
    if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
      $variables['node_content'] = &$variables['page']['content']['system_main']['nodes'][$nid];
    }
  }
}


/*
 * -----------------------------------------------------------------------------
 * PREPROCESS NODE
 * -----------------------------------------------------------------------------
 */

function polylog2017_preprocess_node(&$variables) {

  // 1) ВЫБОР ШАБЛОНА NOD'Ы ПО ЗНАЧЕНИЮ ПОЛЬЗОВАТЕЛЬСКОГО ПОЛЯ

  $node = $variables['node'];
  if ($node->field_custom['und'][0]['value'] == 1) {
    $variables['theme_hook_suggestion'][] = 'node__with_custom_field';
  }

  // 2) ВЫВОД РЕГИОНА В NODE.TPL.PHP

  // .info:
  // regions[region_name] = Custom Node Region

  // node*tpl.php:
  // if ($region_name):
  //   print render($region_name);
  // endif;

  if ($blocks = block_get_blocks_by_region('social_addon')) {
    $variables['social_addon'] = $blocks;
  }

  // 3) ОДИН ШАБЛОН NODE.TPL.PHP ДЛЯ МАТЕРИАЛОВ РАЗНЫХ ТИПОВ
  // 3.1) Content types
  // 3.2) looks for node--post.tpl.php in the theme directory
  if ($variables['node']) {
    $node = $variables['node'];
    switch ($node->type) {
      case 'blog': // 3.1
      case 'tutorial':
      case 'news':
        $variables['theme_hook_suggestion'] = 'node__post'; // 3.2
      break;
    }
  }
}


/*
 * -----------------------------------------------------------------------------
 * ЧИСТКА <HEAD>
 * -----------------------------------------------------------------------------
 */

// drupal_add_html_head_link:canonical:</en/news/2015/10-16.htm>;
// drupal_add_html_head_link:shortlink:</node/3412>;
// metatag_description_0
// metatag_image_src
// metatag_canonical
// metatag_shortlink
// drupal_add_html_head_link:shortcut icon:http://www.polylog.dev/misc/favicon.ico

function polylog2017_html_head_alter(&$head_elements) {

  // remove unneeded metatags
  $remove = [
    'system_meta_content_type', // Content Type
    'metatag_image_src',
  ];

  foreach ($remove as $item) {
    if (isset($head_elements[$item])) {
      unset($head_elements[$item]);
    }
  }

  // remove unneeded links
  $remove = [
    '/^drupal_add_html_head_link:shortcut icon:/', // Favicon
    '/^drupal_add_html_head_link:shortlink:/', // Shortlink
  ];

  foreach ($remove as $item) {
    foreach (preg_grep($item, array_keys($head_elements)) as $key) {
      unset($head_elements[$key]);
    }
  }

  // Use this loop to find out which keys are available.
  /* -- Delete this line to execute this loop
echo '<pre>';
foreach ($head_elements as $key => $element) {
echo $key ."\n";
}
echo '</pre>';
// */
}


/*
 * -----------------------------------------------------------------------------
 * ПЕРЕВОДИМ BBCODE В ОСНОВНОМ ЗАГОЛОВКЕ В HTML
 * -----------------------------------------------------------------------------
 */

// print polylog2017_bb2html($title)
// This code does not deal with classes, so in the most cases it's prefer using
// HTML Title module. <i class="{slaquo-h1, hlaquo-h1, hidden-md-down}"

function polylog2017_bb2html($text) {

  // $bbcode_regex = '/\[(strong|span|em|b|small|br)\](.*)\[\/\1\]/';
  // return preg_replace($bbcode_regex, '<$1>$2', $text);

  $bbcode = [
    '[b]', '[/b]',
    '[br]',
    '[em]', '[/em]',
    '[i]', '[/i]',
    '[small]', '[/small]',
    '[span]', '[/span]',
    '[strong]', '[/strong]',
  ];

  $htmlcode = [
    '<b>', '</b>',
    '<br>',
    '<em>', '</em>',
    '<i>', '</i>',
    '<small>', '</small>',
    '<span>', '</span>',
    '<strong>', '</strong>',
  ];

  return str_replace($bbcode, $htmlcode, $text);
}


/*
 * -----------------------------------------------------------------------------
 * УДАЛЯЕМ ИЗ ПЕРЕМЕННЫХ BBCODE И HTML
 * -----------------------------------------------------------------------------
 */

// print polylog2017_strip($head_title)

// Там, где надо удалить только HTML, вместо этой функции можно использовать
// стандартную strip_tags($myInput);

// Для того, что BBCode не выводился в RSS-лентах, переписать шаблон
// соответствующего view с polylog2017_strip()

function polylog2017_strip($text) {

  $tags = [
    '[b]', '[/b]',
    '[br]',
    '[em]', '[/em]',
    '[i]', '[/i]',
    '[small]', '[/small]',
    '[span]', '[/span]',
    '[strong]', '[/strong]',

    '<em>', '</em>',
    '<p>', '</p>',
  ];

  return str_replace($tags, ' ', $text);
}


/*
 * -----------------------------------------------------------------------------
 * ССЫЛКИ ДЛЯ ПУБЛИКАЦИИ В СОЦСЕТЯХ
 * -----------------------------------------------------------------------------
 */

function polylog2017_encoded_url($decoded) {

  if (drupal_is_front_page()) {
    $link = $GLOBALS['base_url'];
  } else {
    $link = url(current_path(), array('absolute' => true));
  }

  if (!isset($decoded)) {
    return urlencode($link);
  } else {
    return $link;
  }
}


/*
 * -----------------------------------------------------------------------------
 * ПОДСЧЕТ МАТЕРИАЛОВ ПО ТИПАМ
 * -----------------------------------------------------------------------------
 */

// Использование
// print 'Блог: ' . polylog2017_get_node_count('blog');
// print 'Проекты: ' . polylog2017_get_node_count('project');

function polylog2017_get_node_count($content_type) {
  $query = "SELECT COUNT(*) amount FROM {node} n " .
    "WHERE n.type = :type";
  $result = db_query($query, array(':type' => $content_type))->fetch();
  return $result->amount;
}

/*
 * -----------------------------------------------------------------------------
 * ПОДСЧЕТ МАТЕРИАЛОВ ПО ТИПАМ №2
 * -----------------------------------------------------------------------------
 */
/**
 * @param tid
 *   Term ID
 * @param child_count
 *   TRUE - Also count all nodes in child terms (if they exists) - Default
 *   FALSE - Count only nodes related to Term ID
 */

function polylog2017_term_count($tid) {
  $tids = array($tid);

  // global $language;
  // $langs = array($language->language);
  // $langs[] = 'und';

  $query = db_select('taxonomy_index', 't');
  $query->condition('tid', $tids, 'IN');
  $query->join('node', 'n', 't.nid = n.nid');
  $query->condition('n.status', 1, '=');
  // $query->condition('n.language', $langs, 'IN');

  $count = $query->countQuery()->execute()->fetchField();
  return $count;
}


/*
 * -----------------------------------------------------------------------------
 *   РАЗМЕТКА ПОЛЕЙ ВВОДА В ФОРМАХ
 * -----------------------------------------------------------------------------
 */

// 1) Удаляем maxlength и size

function polylog2017_textfield($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'text';
  element_set_attributes($element, array('id', 'name', 'value')); // 1
  _form_set_class($element, array('form-control'));

  $extra = '';
  if ($element['#autocomplete_path'] && !empty($element['#autocomplete_input'])) {
    drupal_add_library('system', 'drupal.autocomplete');
    $element['#attributes']['class'][] = 'form-autocomplete';

    $attributes = array();
    $attributes['type'] = 'hidden';
    $attributes['id'] = $element['#autocomplete_input']['#id'];
    $attributes['value'] = $element['#autocomplete_input']['#url_value'];
    $attributes['disabled'] = 'disabled';
    $attributes['class'][] = 'autocomplete';
    $extra = '<input' . drupal_attributes($attributes) . ' />';
  }

  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

  return $output . $extra;
}


/*
 * -----------------------------------------------------------------------------
 *   РАЗМЕТКА ФОРМ
 * -----------------------------------------------------------------------------
 */

function polylog2017_form_alter(&$form, $form_state, $form_id) {

  // Вес дисклеймера
  if ($form["#id"] == 'webform-client-form-3598'
    || $form["#id"] == 'webform-client-form-3601'
    || $form["#id"] == 'webform-client-form-3730') {
      $form['form_disclaimer'] = $form['submitted']['form_disclaimer'];
      unset($form['submitted']['form_disclaimer']);
      $form['form_disclaimer']['#weight'] = $form['actions']['#weight'] + 1;
  }

  // [Ru] Смена ярлыков в фильтре проектов
  if ($form["#id"] == 'views-exposed-form-projects-page') {
    $form['services']['#options']["All"] = 'Все услуги';
    $form['industries']['#options']["All"] = 'Все отрасли';
    $form['period']['#options']["All"] = 'За всё время';
  }

  // [En] Смена ярлыков в фильтре проектов
  if ($form["#id"] == 'views-exposed-form-projects-en-page') {
    $form['services']['#options']["All"] = 'All Services';
    $form['industries']['#options']["All"] = 'All Industries';
    $form['period']['#options']["All"] = 'Since the Foundation';
  }

  // [Ru] Поисковая форма
  if ($form["#id"] == 'views-exposed-form-search-results-page') {
    $form['#attributes']['class'][] = 'form search';
    $form['for']['#attributes'] = array(
      'class' => array('search-input'),
      'autocomplete' => 'off',
      'aria-label' => 'Поиск по сайту',
      'placeholder' => 'Поиск: PR, организация мероприятий, IT-решения'
    );
  }

  // [En] Поисковая форма
  if ($form["#id"] == 'views-exposed-form-search-results-en-page') {
    $form['#attributes']['class'][] = 'form search';
    $form['for']['#attributes'] = array(
      'class' => array('search-input'),
      'autocomplete' => 'off',
      'aria-label' => 'Site search',
      'placeholder' => 'Search PR, event management and e-Governance solutions'
    );
  }
}

function polylog2017_preprocess_search_result(&$variables) {
  $result = $variables['result'];
  if (strlen($result['snippet']) < 10) {
    $variables['snippet'] = drupal_substr($result['node']->body['und'][0]['value'], 160);
  }
}

/*
 * -----------------------------------------------------------------------------
 *   ПЕЙДЖЕР
 * -----------------------------------------------------------------------------
 */

function polylog2017_views_mini_pager($vars) {
  global $pager_page_array, $pager_total;

  $tags = $vars['tags'];
  $element = $vars['element'];
  $parameters = $vars['parameters'];

  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  if ($pager_total[$element] > 1) {
    $li_previous = theme(
      'pager_previous',
    array(
      'text' => (isset($tags[1]) ? $tags[1] : t('‹‹')),
      'element' => $element,
      'interval' => 1,
      'parameters' => $parameters,
    )
    );
    if (empty($li_previous)) {
      $li_previous = "&nbsp;";
    }

    $li_next = theme(
      'pager_next',
      array(
        'text' => (isset($tags[3]) ? $tags[3] : t('››')),
        'element' => $element,
        'interval' => 1,
        'parameters' => $parameters,
      )
    );

    if (empty($li_next)) {
      $li_next = "&nbsp;";
    }

    $items[] = array(
      'class' => array('pager-previous'),
      'data' => $li_previous,
    );

    $items[] = array(
      'class' => array('pager-current'),
      'data' => t('@current / @max', array('@current' => $pager_current, '@max' => $pager_max)),
    );

    $items[] = array(
      'class' => array('pager-next'),
      'data' => $li_next,
    );
    return theme(
      'item_list',
      array(
        'items' => $items,
        'title' => null,
        'type' => 'ul',
        'attributes' => array('class' => array('pager')),
      )
    );
  }
}

// См. также Dash
