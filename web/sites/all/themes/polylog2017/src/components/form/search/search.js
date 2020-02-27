/**
 * -----------------------------------------------------------------------------
 * Reset button
 * -----------------------------------------------------------------------------
 *
 * Show reset button after first letter has been inputed
 *
 * @todo Replace jQuery toggle w/ add/removeClass 'open'
 */

jQuery(document).ready(function($) {

  var form  = $('.header .search.form');
  var input = $('.search-input');
  var reset = $('.search-reset');

  // Show form
  $('.search-toggler').on('click', function(e) {
    e.preventDefault();
    form.addClass('open');
  });

  // Hide form
  $('.search-cancel').on('click', function(e) {
    e.preventDefault();
    form.removeClass('open');
  });

  // Toggle reset button
  input.on('focus input', function() { // .keyup(function()
    if(($(this).val().length) > 0) {
      reset.addClass('open'); // .hide();
    } else {
      reset.removeClass('open'); // .open();
    }
  });

  // Clear input
  input.on('click', function() {
    input.val('');
    reset.removeClass('open');
  });

  // Change placeholder text
  if (window.matchMedia('(max-width: 575px)').matches) {
    input.attr('placeholder', 'Поиск');
  } else if (window.matchMedia('(min-width: 576px) and (max-width: 991px)').matches) {
    input.attr('placeholder', 'Поиск: PR, event-менеджмент');
  }
});
