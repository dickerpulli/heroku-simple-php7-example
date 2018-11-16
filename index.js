(function() {
  'use strict';
  
  function loadTodos() {
    $.ajax({
      url: '/todos.php',
      success: function(resp) {
        $('todo-items').html(resp);
      },
      error: function(resp) {
        showErrors(resp.message);
      }
    });
  }
  
  function showErrors(messages) {
    $errorsAlert = $('#errors').parent('div.alert');
    $errorsSpan = $('#errors');
    $errorsSpan.text(messages);
    $errorsAlert.show();
  }
  
  function hideErrors() {
    $errorsAlert = $('#errors').parent('div.alert');
    $errorsSpan = $('#errors');
    $errorsAlert.hide();
    $errorsSpan.text('');
  }

  $(document).ready(function() {
    $('form#add-todo').submit(function(event) {
      $(this).preventDefault();
      const text = $('#text').val();
      const count = $('#count').val();
      showErrors(text + ' : ' + count);
    });
    $errorsAlert.find('button.close').click(function() {
      hideErrors();
    });
  });
})();
