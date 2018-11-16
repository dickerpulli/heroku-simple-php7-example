(function() {
  'use strict';
  
  function loadTodos() {
    $.ajax({
      url: '',
      success: function() {
      },
      error: function() {
      }
    });
  }

  $(document).ready(function() {
    $errorsAlert = $('#errors').parent('div.alert');
    $errorsSpan = $('#errors');
    $('form#add-todo').submit(function(event) {
      $(this).preventDefault();
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
