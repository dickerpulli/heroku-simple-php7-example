(function() {
  'use strict';

  $(document).ready(function() {
    $('form#add-todo').submit(function(event) {
      event.preventDefault();
      const text = $('#text').val();
      const count = $('#count').val();
      $('#errors').text(text + ' : ' + count);
    });
  });
})();
