(function() {
  'use strict';

  $(document).ready(function() {
    $errorsAlert = $('#errors').parent('div.alert');
    $errorsSpan = $('#errors');
    $('form#add-todo').submit(function(event) {
      event.preventDefault();
      const text = $('#text').val();
      const count = $('#count').val();
      $errorsSpan.text(text + ' : ' + count);
      $errorsAlert.show();
    });
    $errorsAlert.find('button.close').click(function() {
      $errorsAlert.hide();
      $errorsSpan.text('');
    });
  });
})();
