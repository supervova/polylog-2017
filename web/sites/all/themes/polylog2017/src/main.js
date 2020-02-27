// Specifying globals for ESLint

/**
 * -----------------------------------------------------------------------------
 * VARIOUS UTILITIES
 * -----------------------------------------------------------------------------
 *
 * Avoid `console` errors.
 * IE10 Viewport Hack.
 * Attach FastClick object to body.
 *
 */

/* --------------------------------------------------------------------------
   Avoid `console` errors in browsers that lack a console
   -------------------------------------------------------------------------- */

(() => {
  let method;
  const noop = function() {};
  const methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  let {length} = methods;
  // eslint-disable-next-line no-multi-assign
  const console = (window.console = window.console || {});

  // eslint-disable-next-line no-plusplus
  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
})();

/* --------------------------------------------------------------------------
   IE10 Viewport Hack for Surface/Desktop Windows 8 Bug
   -------------------------------------------------------------------------- */

/**
 * Copyright 2014-2015 Twitter, Inc.
 * http://getbootstrap.com/getting-started/#support-ie10-width
 * Script needs additional CSS
 * http://getbootstrap.com/getting-started/#support-ie10-width
 */

(() => {
  if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    const msViewportStyle = document.createElement('style');
    msViewportStyle.appendChild(
      document.createTextNode(
        '@-ms-viewport{width:auto!important}'
      )
    );
    document.querySelector('head').appendChild(msViewportStyle);
  }
})();


/* --------------------------------------------------------------------------
   Init
   -------------------------------------------------------------------------- */

/**
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 */

(($) => {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  const polylog = {
    // All pages
    'common': {
      init() {
        // JavaScript to be fired on all pages
        // FastClick
        // FastClick.attach(document.body);
      },
      finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  const UTIL = {
    fire(func, funcname, args) {
      let fire;
      const namespace = polylog;
      // eslint-disable-next-line no-param-reassign
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(
        document.body.className.replace(/-/g, '_').split(/\s+/),
        (i, classnm) => {
          UTIL.fire(classnm);
          UTIL.fire(classnm, 'finalize');
        }
      );

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
