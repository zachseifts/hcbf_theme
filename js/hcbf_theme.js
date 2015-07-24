(function($) {
  Drupal.behaviors.hcbf_theme = {
    attach: function(context, settings) {

      // Track outbound ticket sales links.
      if (typeof ga !== 'undefined') {
        $('a[data-ga-event]').each(function() {
          $(this).click(function(e) {
            ga('send', 'event', 'ticket_click', $(this).attr('data-ga-action'), $(this).attr('data-ga-label'));
          });
        });
      }
    }
  }
})(jQuery);
