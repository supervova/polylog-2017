<?php
/**
 * @file
 * Returns the HTML for a node.
 * It is a template for the blog, tutorial and news content types
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */

  // Hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_css_head']);
  hide($content['field_figure']); // Video
  hide($content['field_blog']);
  hide($content['field_additional_javascript']);
  hide($content['field_images']); // Mosaic / images
  hide($content['field_source_url']);
  hide($content['field_source']);

  $image = render($content['field_image']);
  $images = render($content['field_images']);
  $video = render($content['field_figure']);

  // Extract lead from body
  $full_body = $node->body['und']['0']['value'];
  $content_array = preg_split('/(<\s*p\s*\/?>)|(<\s*br\s*\/?>)|(\s\s+)|(<\s*\/p‌​\s*\/?>)/', $full_body, 2, PREG_SPLIT_NO_EMPTY);

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
        <?php print polylog2017_strip($content_array[0]); ?>
      </p>
      <time class="meta-date" itemprop="datePublished" datetime="<?php print format_date($node->created, 'custom', 'Y-m-d'); ?>"><i><?php print format_date($node->created, 'custom', 'd'); ?></i> <?php print format_date($node->created, 'custom', 'M Y'); ?></time>
    </div>
  </article>

<?php else: ?>

  <main class="container">

    <article class="article" itemscope itemtype="https://schema.org/Article">

      <header class="article-eyebrow meta">

        <?php // Blog; @todo: check links
          if ($node->type == 'blog'): ?>
          <a class="meta-link section back" href="/ru/pr-blog" itemprop="articleSection">Блог&nbsp;— Идеи и&nbsp;опыт</a>

          <?php // Blog tags
            if (!empty($content['field_blog'])): ?>
            <span class="meta-tags ml-1s" itemprop="keywords">
              <?php print render($content['field_blog']); ?>
            </span>
          <?php endif; ?>

        <?php // Tutorial
          elseif ($node->type == 'tutorial'): ?>
          <?php /* <a class="meta-link section back" href="/ru/pr-tutorials" itemprop="articleSection">Видеолекции</a> */ ?>
          <h2 class="tutorial-eyebrow" itemprop="articleSection">Видеолекции</h2>

        <?php // News
          elseif ($node->type == 'news'):
            if ($node->language == 'en'): ?>
              <a class="meta-link section back" href="/en/company/arj" itemprop="articleSection">News Archive</a>
            <?php else:  ?>
              <a class="meta-link section back" href="/ru/company/arj" itemprop="articleSection">Архив новостей</a>
            <?php endif; ?>
        <?php endif; ?>
      </header>

      <h1 class="article-headline" itemprop="headline">
        <?php print polylog2017_bb2html($title); ?>
      </h1>

      <?php // Main image
        if ($image) {
          print $image;
        }
      ?>

      <?php // Video on tutorials
        if ($video) {
          print $video;
        }
      ?>

      <?php // Mosaic / images on news
        if ($images) {
          print $images;
        }
      ?>

      <div class="article-body" itemprop="articleBody">
        <?php // Social media buttons
          if ($social_addon):
            print render($social_addon);
          endif;
        ?>
        <?php print render($content); ?>
      </div>

      <footer class="article-footer meta">
        <time class="meta-date" itemprop="datePublished" datetime="<?php print format_date($node->created, 'custom', 'Y-m-d'); ?>"><i><?php print format_date($node->created, 'custom', 'd'); ?></i> <?php print format_date($node->created, 'custom', 'M Y'); ?></time>
        <?php // Source
          if ($node->type == 'blog' && !empty($content['field_source'])): ?>
          <cite class="meta-src">
            <span class="hidden-sm-down">По материалам </span>
            <a href="<?php print render($content['field_source_url']); ?>" target="_blank"><?php print render($content['field_source']); ?></a>
          </cite>
        <?php endif; ?>
        <meta itemprop="author" content="PR-агентство «Полилог»">
        <meta itemprop="publisher" content="PR-агентство «Полилог»">
      </footer>

      <?php // Comments in the blog or tutorial
        if ($node->type == 'blog' || $node->type == 'tutorial'): ?>
        <section class="comments">

          <h2 class="sr-only">Комментарии</h2>

          <div id="disqus_thread"></div>

          <script>
            var disqus_config = function () {
              this.page.url = window.location.href;
            };

            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = '//polylog-pr.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
          </script>

          <script type="text/javascript">
              var disqus_shortname = 'polylog-pr';
              (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
              })();
          </script>

        </section>
      <?php endif; ?>
    </article>

    <?php // Related articles in the blog or tutorial
      if ($node->type == 'blog' || $node->type == 'tutorial'): ?>
    <?php
    /*
      <aside class="article-related container tiles">

      <div class="row">

        <div class="col-sm-6 col-lg-3">
          <a class="tile related-case poster link" href="#todo">
            <div class="tile-body">

              <h3 class="tile-eyebrow">
                Из нашего опыта
              </h3>

              <h2 class="tile-link">
                День города Москвы 2016: PR-сопровождение и&nbsp;аккредитация СМИ
              </h2>

              <svg class="icon forward" aria-hidden="true"><use xlink:href="#icon-forward" /></svg>

            </div>
          </a>
        </div>

        <div class="col-sm-6 col-lg-3">
          <a class="tile first-related-article poster link" href="#todo">
            <div class="tile-body">

              <h3 class="tile-eyebrow">
                Также по теме
              </h3>

              <h2 class="tile-link">
                Всем спасибо, все на&nbsp;собрание
              </h2>

              <svg class="icon forward" aria-hidden="true"><use xlink:href="#icon-forward" /></svg>

            </div>
          </a>
        </div>

        <div class="col-sm-6 col-lg-3 hidden-lg-down">
          <a class="tile second-related-article poster link" href="#todo">
            <div class="tile-body">

              <span class="tile-eyebrow">
                …
              </span>

              <h2 class="tile-link">
                Европейский подход  к&nbsp;информированию аудитории: какую стратегию  выберете&nbsp;вы?
              </h2>

              <svg class="icon forward" aria-hidden="true"><use xlink:href="#icon-forward" /></svg>

            </div>
          </a>
        </div>

        <div class="col-sm-6 col-lg-3 hidden-lg-down">
          <a class="tile third-related-article poster link" href="#todo">
            <div class="tile-body">

              <span class="tile-eyebrow">
                …
              </span>

              <h2 class="tile-link">
                B2B? B2C? B2C2B!
              </h2>

              <svg class="icon forward" aria-hidden="true"><use xlink:href="#icon-forward" /></svg>

            </div>
          </a>
        </div>

      </div>

    </aside>
     */
    ?>
    <?php endif; ?>

  </main>
<?php endif; // full page ?>
