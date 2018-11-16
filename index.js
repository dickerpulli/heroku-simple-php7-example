(function() {
  'use strict';
  
  const errorsAlert = $('#errors').parent('div.alert');
  const errorsSpan = $('#errors');
  
  function loadTodos() {
    $.ajax({
      url: '/todos.php',
      success: function(resp) {
        $('#todo-items').html(resp);
      },
      error: function(resp) {
        showErrors(resp.status + ': ' + resp.statusText);
      }
    });
  }
  
  function showErrors(messages) {
    errorsSpan.text(messages);
    errorsAlert.show();
  }
  
  function hideErrors() {
    errorsAlert.hide();
    errorsSpan.text('');
  }

  $(document).ready(function() {
    loadTodos();
    setInterval(loadTodos, 1000);
    $('form#add-todo').submit(function(event) {
      $(this).preventDefault();
      const text = $('#text').val();
      const count = $('#count').val();
      showErrors(text + ' : ' + count);
    });
    errorsAlert.find('button.close').click(function() {
      hideErrors();
    });
  });
})();
