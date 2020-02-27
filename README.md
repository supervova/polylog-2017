# Website of the Polylog PR Agency

## Theme
/sites/all/themes/polylog2017

- Files are grouped by meaning and not by type.
- Styles are set by base component class and modifier classes. No underscores,
double underscores, double hyphens and camelCase. Only single hyphens
and chained classes:
.block-item, .block.modifier, .block-item.modifier.
- Components should be made in a way that they're reusable in different contexts.
  Avoid putting these properties in components:
    - Positioning (position, top, left, right, bottom)
    - Floats (float, clear)
    - Margins (margin)
    - Dimensions (width, height). Exception to these would be elements that have
      fixed width/heights, such as avatars and logos.
  Define positioning in container styles. The widths and positioning will be
  applied on the instanse, not the component itself. For example,
  .feed .media-object {
    max-width: 560px;
  }


--------------------------------------------------------------------------------

## Source (src) Folder
Project files are sorted from general to specific and grouped according to the levels of specificity.

1. The globally used variables, mixins and functions folder has the prefix 01-.

2. The basic styles and interface elements folders have the prefix 02-.

3. The components (groups of basic elements) folders have the prefix 03-.

4. The structures (groups of components and basic elements) folders have the prefix 04-.

5. Template folders for unique pages have the prefix p-.

6. The site sections templates folders have the prefix s-.

Principles similar to
[Atomic web design](http://bradfrost.com/blog/post/atomic-web-design/) and
[ITCSS](https://www.xfive.co/blog/itcss-scalable-maintainable-css-architecture/)

    01-common
    02-animation
    02-body
    02-button
    02-content
    02-feedback
    02-form-controls
    02-icon
    02-layout
    03-alert
    03-breadcrumb
    03-card
    03-clients
    03-collapse
    03-cta
    03-divider
    03-form
    03-jumbotron
    03-list
    03-logo
    03-media
    03-media-object
    03-meta
    03-navigation
    03-overlay
    03-page-header
    03-polylog-promo
    03-section
    03-social-options
    03-testimonial
    04-footer
    04-header
    04-list-view
    04-main-content
    04-modal
    04-sidebar
    p-404
    p-base
    p-front
    p-landing
    p-search-results
    p-user
    p-wip
    s-blog
    s-careers
    s-company
    s-projects
    s-services

    main.scss
    main.js


--------------------------------------------------------------------------------

## Folder Stuff Example

    03-jumbotron/                   # Folder of the component
        _jumbotron.scss             # Folder of the component styles
        jumbotron.js                # Component scripts
        jumbotron.md                # Optionally. The documentation build with
                                    # gulp
        jumbotron.twig              # The template include


--------------------------------------------------------------------------------

## New folders can be added to the structure.
    02-body
        code                        # Styles of highlightjs custom bundle
    02-form-controls
        autocomplete                # Other name is 'typeahead'
                                    # @see Material UI, UIkit
                                    # or http://go.shr.lc/1l2Xy2I
        slider                      # (-•--) github.com/seiyria/bootstrap-slider
                                    # @see also solutions  by MDL, Foundation
                                    # and Material UI
        switch                      # on/off switches
    02-tag                          # I.e. badges @see solution by MDL
        tag-chip                    # @see 'chip' by Material UI
    03-advertisement                # @see Semantic UI
    03-alert
        alert-snackbar              # @see solutions by MDL and Material UI
        alert-toast
    03-pull-quote
    03-btn-group
        btn-group-bottom-sheets     # Material Design add-on
    03-chart
    03-email
    03-form
        wizard
    03-media
        avatar                      # @see Material UI

    03-sticky                       # @see solutions by MaterializeCSS,
                                    # Semantic UI & UIkit
    03-navigation                   # @see also solutions 'Magellan' by
                                    # Foundation, 'Scrollspy' by MaterializeCSS
                                    # and 'Smooth scroll' by UIkit
        drilldown                   # @see solution by Foundation
        pills
        steppers                    # @see solution by Semantic UI & Material UI
        tabs                        # @see also solution by MDL
    03-overlay
        dimmer                      # @see also solution by Semantic UI
    03-tooltip-popover
    03-picker
        picker-date                 # eternicode.github.io/bootstrap-datepicker
                                    # @see also solution by Material UI & UIkit
        picker-time                 # @see solutions by Material UI & UIkit
    03-rating                       # @see solution by Semantic UI
    03-section
        scrolling.scss              # @see 'slider' by UIkit
    03-upload                       # @see solution by UIkit
    03-wysiwyg                      # @see solution 'HTML Editor' by UIkit
    04-header
        subheader                   # It's used ac container for
                                    # section title and like and share widget
                                    # on phones.
    04-list-view                    # @see list-view solution by Semantic UI,
        сomments                    # MDL and Material UI
        messaging
        people
        sortable                    # @see solution by UIkit
    04-grid-view
    themes
        _admin.scss
    04-parallax                     # @see solutions by MaterializeCSS and UIkit
    04-shopping-cart


--------------------------------------------------------------------------------

## Destination Folder Is a Root Directory of Theme

    css/
        form.css
        main.css
        p-sign-up.css
        …
    img/
        alert/
        …
        tooltip/
    js/
        form.js
        main.js
        p-sign-up.js
        …
