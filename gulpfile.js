/**
 * -----------------------------------------------------------------------------
 * 🎛 COMMON PLUGINS AND SETTINGS
 * -----------------------------------------------------------------------------
 */
// #region

/**
 * ☝️🧐 Uncss shows better results when styles are checked against special pages
 * containing all interface and text components.
 */

const browserSync = require('browser-sync').create();
const gulp        = require('gulp');
const changed     = require('gulp-changed');
const gulpif      = require('gulp-if');
const plumber     = require('gulp-plumber');
const rename      = require('gulp-rename');
const size        = require('gulp-size');
const sourcemaps  = require('gulp-sourcemaps');
const yargs       = require('yargs').alias('p', 'production');

// Look for the --p flag
const PRODUCTION  = !!(yargs.argv.production);

// Config
const config = {
  src: './web/sites/all/themes/polylog2017/src',
  dest: './web/a',
};

const settings = {
  server: {
    html: {
      server: {
        baseDir: './web/',
      },
      port: 9000,
      notify: false,
    },
    php: {
      files: ['./web/sites/all/themes/polylog2017/templates/**/*.php'],
      proxy: 'https://polylog.dev',
    },
  },
  css: {
    src: `${config.src}/main.scss`,
    srcWIP: [
      `${config.src}/pages/wip/head-styles-front.scss`,
      `${config.src}/pages/wip/head-styles.scss`,
    ],
    srcCJK: `${config.src}/cjk.scss`,
    watch: `${config.src}/**/*.scss`,
    tmp: `${config.src}/css/`,
    dest: `${config.dest}/css/`,

    autoprefixer: {
      browsers: [
        '> 1%',
        'last 2 versions',
      ],
    },

    uncss: {
      html: [`${config.src}/pages/wip/uncss/*.html`],
      ignore: [

        // Bootstrap & Magnific Popup
        /* eslint-disable max-len */
        /\w\.in/, /(#|\.)navbar(-[a-zA-Z]+)?/, /(#|\.)modal(-[a-zA-Z]+)?/, /(#|\.)dropdown(-[a-zA-Z]+)?/, /(#|\.)carousel(-[a-zA-Z]+)?/, /(#|\.)(open)/, /\.fade/, /\.collaps/, /\.in/, /\.mfp/,

        // Custom
        /#user-login .captcha/, /#views-exposed-form-projects-page/, /\.breadcrumb-item/, /\.d-lg-block/, /\.edit-captcha-response/, /\.form-submit/, /\.form-wrapper/, /\.has-icon.event::before/, /\.has-outstanding-article-body .article-body/, /\.has-rail/, /\.hidden/, /\.hlaquo-h1/, /\.media-wrapper.has-lg-img/, /\.metric.fluid/, /\.metric.wide/, /\.mosaic.fits-to-container/, /\.mosaic.outstanding/, /\.page-header-map-wrapper/, /\.page-header-prelorer/, /\.pager-first/, /\.pager-last/, /\.pager-previous/, /\.pic-deputy.col-md-3/, /\.play-it/, /\.rail/, /\.search-cancel/, /\.search-headline/, /\.search-reset/, /\.search-toggler/, /\.sec-illustrated-l img/, /\.sec-illustrated-r img/, /\.section-news/, /\.slaquo-h1/, /\.snuggled-right/, /\.vk/, /\.vr-friendly/, /div.left/, /figure.small-portrait/, /iframe/, /img.left/, /li:nth-child(n+6)/, /\.mt-lg-18/, /\.pb-lg-16/, /\.pb-42/, /\.pt-36/, /\.pt-18/, /\.pt-33/, /\.pt-lg-0/, /\.pt-lg-14/, /\.pt-lg-67/, /\.pt-lg-67/,
        /* eslint-enable max-len */
      ],
    },
  },
  html: {
    src: [
      `${config.src}/**/*.pug`,
      `!${config.src}/**/_*.pug`,
      `!${config.src}/pages/base/*.pug`,
    ],
    srcTwig: `${config.src}/**/_*.twig`,
    watch: {
      twig: `${config.src}/**/*.twig`,
      html: `${config.src}/pages/wip/_txt.html`,
    },
    lint: `${config.src}/pages/wip/index.html`,
    lintConfig: './.htmlhintrc',
    psi: `${config.src}/p-front/front-page.html`,
    dest: `${config.src}`,
  },
  img: {
    content: `${config.src}/img/**/*.{jpg,png,gif,svg,webp}`,
    graphics: [
      `${config.src}/**/*.{jpg,png,gif,svg,webp}`,
      `!${config.src}/**/data-*.svg`,
      `!${config.src}/**/_*.svg`,
      `!${config.src}/base/icon/sprite*{,/**}`,
      `!${config.src}/_labs/**/*`,
      `!${config.src}/pages/wip/*`,
      `!${config.src}/img/**/*`,
    ],
    watch: [
      `${config.src}/**/*.{jpg,png,gif,svg,webp}`,
      `!${config.src}/**/data-*.svg`,
      `!${config.src}/**/_*.svg`,
      `!${config.src}/base/icon/sprite*{,/**}`,
      `!${config.src}/_labs/**/*`,
      `!${config.src}/pages/wip/*`,
    ],
    dest: `${config.dest}/img`,
  },
  js: {
    src: [
      `${config.src}/base/content/link/link.js`,
      `${config.src}/components/media/carousel/carousel.js`,
      `${config.src}/components/media/gallery/legacy.js`,
      `${config.src}/components/media/media.js`,
      `${config.src}/components/nav/navbar/navbar.js`,
      `${config.src}/components/social-tools/social-tools.js`,
      `${config.src}/components/form/form.js`,
      `${config.src}/components/form/search/search.js`,
      `${config.src}/components/list-view/list-view.js`,
      `${config.src}/components/modal/modal.js`,
      `${config.src}/components/footer/footer.js`,
      `${config.src}/main.js`,
    ],
    srcVendor: [
      `${config.src}/js/jquery.mobile.custom.js`,
      './node_modules/bootstrap/js/dist/util.js',
      './node_modules/bootstrap/js/dist/alert.js',
      './node_modules/bootstrap/js/dist/button.js',
      './node_modules/bootstrap/js/dist/carousel.js',
      './node_modules/bootstrap/js/dist/collapse.js',
      './node_modules/bootstrap/js/dist/dropdown.js',
      './node_modules/bootstrap/js/dist/modal.js',
      './node_modules/magnific-popup/dist/jquery.magnific-popup.js',
      './node_modules/jquery-sticky/jquery.sticky.js',
      './node_modules/is-in-viewport/lib/isInViewport.js',
      './web/misc/drupal.js',
      './web/sites/all/modules/contrib/webform/js/webform.js',
    ],
    dest: `${config.dest}/js`,
  },
  sprite: {
    main: {
      src: `${config.src}/base/icon/sprite/*.svg`,
      dest: `${config.src}/base/icon/`,
      options: {
        shape: {
          spacing: {
            padding: 4,
          },
        },
        mode: {
          css: {
            sprite: '../icon.svg',
            bust: false,
            render: {
              scss: {
                dest: '../_icon.scss',
                template: `${config.src}/base/icon/_icon-template.mustache`,
              },
            },
          },
        },
      },
    },
  },
  spriteCJK: {
    src: `${config.src}/base/icon/sprite/cjk/*.svg`,
    dest: `${config.src}/base/icon`,
    options: {
      mode: {
        symbol: {
          dest: '.', // Mode specific output directory
          sprite: 'icons-cjk.svg', // Sprite path and name
          prefix: '.', // Prefix for CSS selectors
          dimensions: '', // Suffix for dimension CSS selectors
          example: true, // Create an HTML example document
        },
      },
      svg: {
        xmlDeclaration: false, // strip out the XML attribute
        doctypeDeclaration: false, // don't include the !DOCTYPE declaration
      },
    },
  },
};
// #endregion

/**
 * -----------------------------------------------------------------------------
 * 🛠 UTILITIES
 * -----------------------------------------------------------------------------
 */
// #region

// CLEAN
const del = require('del');

function clean() {
  return del([
    `${settings.css.dest}/**/*`,
    `${settings.js.dest}/**/*`,
  ]);
}

function cleanSrc() {
  return del([`${config.src}/**/*.css`]);
}
// #endregion

/**
 * -----------------------------------------------------------------------------
 * 📰 MARKUP
 * -----------------------------------------------------------------------------
 */
// #region

// TWIG
const prettify = require('gulp-jsbeautifier');
const twig     = require('gulp-twig');

function twigCompile() {
  return gulp.src(settings.html.srcTwig)
    .pipe(plumber())
    .pipe(twig({
      base: config.src,
    }))
    .pipe(prettify({
      html: {
        indent_size: 2,
        max_preserve_newlines: 0,
        wrap_line_length: 0,
        unformatted: ['a', 'abbr', 'br', 'small', 'span', 'strong', 'svg'],
      },
    }))
    .pipe(rename((opt) => {
      opt.basename = opt.basename.replace(/^_/, ''); // eslint-disable-line no-param-reassign
      return opt;
    }))
    .pipe(gulp.dest(config.src));
}

// PUG
// const pug = require('gulp-pug');

// function pugCompile() {
//   return gulp.src(settings.html.src)
//     .pipe(plumber())
//     .pipe(pug({
//       doctype: 'html',
//       pretty: true,
//       basedir: config.src,
//     }))
//     .pipe(size({ title: 'html' }))
//     .pipe(gulp.dest(settings.html.dest));
// }
// #endregion

/**
 * -----------------------------------------------------------------------------
 * 💾 SCRIPTS
 * -----------------------------------------------------------------------------
 */
// #region

const babel  = require('gulp-babel');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

// Common scripts function
const jsTasks = (src, file, compiler) => gulp.src(src)
  .pipe(plumber())
  .pipe(changed(settings.js.dest))
  .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
  .pipe(gulpif(compiler, babel({ presets: ['@babel/preset-env'] })))
  .pipe(concat(`${file}.js`))
  .pipe(uglify())
  .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
  .pipe(size({ title: `scripts: ${file}` }))
  .pipe(gulp.dest(settings.js.dest))
  .pipe(browserSync.stream());

// Plugins
function jsPlugins(done) {
  jsTasks(
    settings.js.srcVendor, // src
    'plugins', // file
  );
  done();
}

// Main
function jsMain(done) {
  jsTasks(
    settings.js.src, // src
    'main', // file
    true,
  );
  done();
}

// SCRIPTS BUILD
const js = gulp.series(
  jsMain,
  jsPlugins,
);

// #endregion

/**
 * -----------------------------------------------------------------------------
 * 🖼 IMAGES
 * -----------------------------------------------------------------------------
 */
// #region

const imagemin    = require('gulp-imagemin');
const imageminGIF = require('imagemin-gifsicle');
const imageminJPG = require('imagemin-mozjpeg');
const imageminPNG = require('imagemin-pngquant');
const imageminSVG = require('imagemin-svgo');

// Common images function
const imgTasks = (src, subtitle, changePaths = false) => gulp.src(src)
  .pipe(changed(settings.img.dest))
  .pipe(
    imagemin(
      [
        imageminGIF({
          interlaced: true,
          optimizationLevel: 3,
        }),
        imageminJPG({ quality: 85 }),
        imageminPNG([0.8, 0.9]),
        imageminSVG({
          plugins: [
            { removeViewBox: false },
            { cleanupIDs: false },
          ],
        }),
      ],
      { verbose: true },
    ),
  )
  .pipe(
    gulpif(
      changePaths,
      rename((path) => {
        /* eslint-disable no-param-reassign */
        path.dirname = path.dirname.replace('base', '');
        path.dirname = path.dirname.replace('structures', '');
        path.dirname = path.dirname.replace('hero', 'jumbotron');
        path.dirname = path.dirname.replace('components', '');
        path.dirname = path.dirname.replace('card/polylog-promo', 'polylog-promo');
        path.dirname = path.dirname.replace('pages', '');
        path.dirname = path.dirname.replace('front', 'p-front');
        path.dirname = path.dirname.replace('careers', 's-careers');
        path.dirname = path.dirname.replace('company', 's-company');
        path.dirname = path.dirname.replace('projects', 's-projects');
        path.dirname = path.dirname.replace('services', 's-services');
        /* eslint-enable no-param-reassign */
      }),
    ),
  )
  .pipe(gulp.dest(settings.img.dest))
  .pipe(size({ title: `images: ${subtitle}` }));

// Graphics ⚠️ Does not work
// function imgGraphics(done) {
//   imgTasks(
//     settings.img.graphics, // src
//     'graphics', // subtitle
//     true,
//   );
//   done();
// }

function imgContent(done) {
  imgTasks(
    settings.img.content, // src
    'content', // subtitle
  );
  done();
}


function imgGraphics() {
  return gulp.src(settings.img.graphics)
    .pipe(changed(settings.img.dest))
    .pipe(
      imagemin(
        [
          imageminGIF({
            interlaced: true,
            optimizationLevel: 3,
          }),
          imageminJPG({ quality: 85 }),
          imageminPNG([0.8, 0.9]),
          imageminSVG({
            plugins: [
              { removeViewBox: false },
              { cleanupIDs: false },
            ],
          }),
        ],
        { verbose: true },
      ),
    )
    .pipe(rename((path) => {
      /* eslint-disable no-param-reassign */
      path.dirname = path.dirname.replace('base', '');
      path.dirname = path.dirname.replace('structures', '');
      path.dirname = path.dirname.replace('hero', 'jumbotron');
      path.dirname = path.dirname.replace('components', '');
      path.dirname = path.dirname.replace('card/polylog-promo', 'polylog-promo');
      path.dirname = path.dirname.replace('pages', '');
      path.dirname = path.dirname.replace('front', 'p-front');
      path.dirname = path.dirname.replace('careers', 's-careers');
      path.dirname = path.dirname.replace('company', 's-company');
      path.dirname = path.dirname.replace('projects', 's-projects');
      path.dirname = path.dirname.replace('services', 's-services');
      /* eslint-enable no-param-reassign */
    }))
    .pipe(gulp.dest(settings.img.dest))
    .pipe(size({ title: 'graphics' }));
}

// OPTIMIZE
const img = gulp.parallel(
  imgGraphics,
  imgContent,
);

// #endregion

/**
 * -----------------------------------------------------------------------------
 * 🎨 STYLES
 * -----------------------------------------------------------------------------
 */
// #region

const autoprefixer = require('gulp-autoprefixer');
const cleanCSS     = require('gulp-clean-css');
const sass         = require('gulp-sass');
const unCSS        = require('gulp-uncss');

// COMMON STYLES FUNCTION
const cssTasks = (src, subtitle, uncssHTML, dest, link = true) => gulp.src(src)
  .pipe(plumber())
  // .pipe(changed(settings.css.dest))
  .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
  .pipe(sass({
    precision: 4,
    includePaths: ['.'],
  }).on('error', sass.logError))
  .pipe(autoprefixer({ cascade: false }))
  .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
  .pipe(gulp.dest(settings.css.tmp))
  .pipe(
    gulpif(
      PRODUCTION,
      gulpif(link, unCSS({

        // In case of an error, try to add the array brackets
        html: uncssHTML,

        // CSS Selectors for UnCSS to ignore
        ignore: [

          // Bootstrap & Magnific Popup
          /* eslint-disable max-len */
          /\w\.in/, /(#|\.)navbar(-[a-zA-Z]+)?/, /(#|\.)modal(-[a-zA-Z]+)?/, /(#|\.)dropdown(-[a-zA-Z]+)?/, /(#|\.)carousel(-[a-zA-Z]+)?/, /(#|\.)(open)/, /\.fade/, /\.collaps/, /\.in/, /\.mfp/,

          // Custom
          /#user-login .captcha/, /#views-exposed-form-projects-page/, /\.breadcrumb-item/, /\.d-lg-block/, /\.edit-captcha-response/, /\.form-submit/, /\.form-wrapper/, /\.has-icon.event::before/, /\.has-outstanding-article-body .article-body/, /\.has-rail/, /\.hidden/, /\.hlaquo-h1/, /\.media-wrapper.has-lg-img/, /\.metric.fluid/, /\.metric.wide/, /\.mosaic.fits-to-container/, /\.mosaic.outstanding/, /\.page-header-map-wrapper/, /\.page-header-prelorer/, /\.pager-first/, /\.pager-last/, /\.pager-previous/, /\.pic-deputy.col-md-3/, /\.play-it/, /\.rail/, /\.search-cancel/, /\.search-headline/, /\.search-reset/, /\.search-toggler/, /\.sec-illustrated-l img/, /\.sec-illustrated-r img/, /\.section-news/, /\.slaquo-h1/, /\.snuggled-right/, /\.vk/, /\.vr-friendly/, /div.left/, /figure.small-portrait/, /iframe/, /img.left/, /li:nth-child(n+6)/, /\.mt-lg-18/, /\.pb-lg-16/, /\.pb-42/, /\.pt-36/, /\.pt-18/, /\.pt-33/, /\.pt-lg-0/, /\.pt-lg-14/, /\.pt-lg-67/, /\.pt-lg-67/,
          /* eslint-enable max-len */
        ],
      })),
    ),
  )
  .pipe(gulpif(PRODUCTION, cleanCSS({ level: { 1: { specialComments: 0 } } })))
  .pipe(size({ title: `styles: ${subtitle}` }))
  .pipe(gulp.dest(dest))
  .pipe(browserSync.stream());

// MAIN
function cssMain(done) {
  cssTasks(
    settings.css.src, // src
    'main', // subtitle
    // uncssHTML; use array syntax for normal results
    [`${config.src}/pages/wip/uncss/*.html`],
    settings.css.dest,
  );
  done();
}

// CJK
function cssCJK(done) {
  cssTasks(
    settings.css.srcCJK, // src
    'CJK', // subtitle
    [ // UnCSS
      `${config.src}/pages/front/zh.html`,
      `${config.src}/pages/front/ja.html`,
    ],
    settings.css.dest,
  );
  done();
}

function cssHead(done) {
  cssTasks(
    settings.css.srcWIP, // src
    'head', // subtitle
    '', // uncss
    settings.css.tmp,
    false,
  );
  done();
}

// SCRIPTS BUILD
const css = gulp.parallel(
  cssMain,
  cssCJK,
  cssHead,
);
// #endregion

/**
 * -----------------------------------------------------------------------------
 * ❤️ SVG SPRITES
 * -----------------------------------------------------------------------------
 */
// #region

const svgSprite = require('gulp-svg-sprite');

function svg() {
  return gulp.src(settings.sprite.main.src)
    .pipe(svgSprite(settings.sprite.main.options))
    .pipe(size({ title: 'Main sprite' }))
    .pipe(gulp.dest(settings.sprite.main.dest));
}

// CJK
function svgCJK() {
  return gulp.src(settings.spriteCJK.src)
    .pipe(svgSprite(settings.spriteCJK.options))
    .pipe(size({ title: 'CJK sprite' }))
    .pipe(gulp.dest(settings.spriteCJK.dest));
}

const sprite = gulp.series(
  svg,
  cssMain,
  imgGraphics,
);

// #endregion

/**
 * -----------------------------------------------------------------------------
 * 📶 SERVER
 * -----------------------------------------------------------------------------
 */
// #region

// const { reload } = browserSync;
function reload(done) {
  browserSync.reload();
  done();
}

// WATCHERS
function watch() {
  gulp.watch(settings.css.watch, gulp.series(cssMain, cssCJK));
  gulp.watch(settings.css.srcWIP, gulp.series(cssHead));
  gulp.watch(settings.js.src, gulp.series(jsMain));
  // Don't use arrays here
  gulp.watch(settings.img.watch, gulp.series(img, reload));
  gulp.watch(settings.html.watch.twig, gulp.series(twigCompile, reload));
  gulp.watch(settings.html.watch.html, gulp.series(reload));
}

function server(done) {
  browserSync.init(settings.server.html);
  done();
  watch();
}
// #endregion

/**
 * -----------------------------------------------------------------------------
 * 🏗️ DEFAULT TASK
 * -----------------------------------------------------------------------------
 */
// #region
const build = gulp.series(
  clean,
  svg,
  img,
  gulp.parallel(cssMain, js),
);
// #endregion

/**
 * -----------------------------------------------------------------------------
 * ☑️ TASKS
 * -----------------------------------------------------------------------------
 */

/* eslint-disable no-multi-spaces */

exports.cleanSrc    = cleanSrc;
exports.clean       = clean;
exports.imgg        = imgGraphics;
exports.img         = img;
// exports.pug         = pugCompile;
exports.twig        = twigCompile;
exports.spriteCJK   = svgCJK;
exports.sprite      = sprite;
exports.js          = js;
exports.css         = css;
exports.w           = watch;
exports.s           = server;
exports.default     = build;
