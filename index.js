(function() {
  'use strict';
  
  const errorsAlert = $('#errors').parent('div.alert');
  const errorsSpan = $('#errors');
  
  function loadTodos() {
    $.ajax({
      url: '/todos.php',
      success: function(resp) {
        $('#todo-items').html(resp);
        registerButtonActions();
      },
      error: function(resp) {
        showErrors(resp.status + ': ' + resp.statusText);
      }
    });
  }
  
  function deleteTodo(todoId) {
    $.ajax({
      url: '/todos.php',
      method: 'DELETE',
      data: {
        id: todoId
      },
      success: function(resp) {
        $('#todo-items').html(resp);
        registerButtonActions();
      },
      error: function(resp) {
        showErrors(resp.status + ': ' + resp.statusText);
      }
    });
  }
  
  function addTodo(text, count) {
    $.ajax({
      url: '/todos.php',
      method: 'POST',
      data: {
        text: text,
        count: text 
      },
      success: function(resp) {
        $('#todo-items').html(resp);
        registerButtonActions();
      },
      error: function(resp) {
        showErrors(resp.status + ': ' + resp.statusText);
      }
    });
  }
  
  function registerButtonActions() {
    $('button.details-button').click(function() {
      const details = $('#' + $(this).data('details-id'));
      if (details.is(':hidden')) {
        details.show();
      } else {
        details.hide();
      }
    });
    $('button.delete-button').click(function() {
      deleteTodo($(this).data('todo-id'));
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
      event.preventDefault();
      const text = $('#text').val();
      const count = $('#count').val();
      addTodo(text, count);
    });
    errorsAlert.find('button.close').click(function() {
      hideErrors();
    });
  });
})();
