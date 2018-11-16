<?php

session_start();

function getTodoCards($todos) 
{
  $todoCards = '';
  foreach($todos as $index => $todo) {
    $todoCards = $todoCards . '
    <div class="mb-2 card">
      <div class="card-body">
        <div class="container">
          <div class="align-items-center justify-content-between row">
            <div class="col">' . $todo['text'] . ' : ' . $todo['count'] . '</div>
            <div class="col">
              <button type="button" class="btn-danger float-right btn btn-primary delete-button" data-todo-id="' . $todo['id']. '">Delete</button>
              <button type="button" class="float-right mr-1 btn btn-primary details-button" data-details-id="details_' . $todo['id']. '">Details</button>
              <div id="details_' . $todo['id'] . '" class="float-right" style="display: none">Buy the cheepest ones</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    ';
  }
  return $todoCards;
}
  
function getTodos() {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://simple-react-example.herokuapp.com/todos');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
  $json = curl_exec($ch);
  curl_close($ch);
  return json_decode($json);
}

function deleteTodo($id)
{
  $todos = getTodos();
  $newTodos = array();
  foreach($todos as $index => $todo) {
    if ($todo['id'] != $id) 
    {
      $newTodos[] = $todo;
    }
  }
  $_SESSION['todos'] = $newTodos;
  return $newTodos;
}

function addTodo($text, $count)
{
  $todos = getTodos();
  $todos[] = array(
    'id' => uniqid(),
    'text' => $text,
    'count' => $count);
  $_SESSION['todos'] = $todos;
  return $todos;
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') 
{
  $todos = getTodos();
  echo getTodoCards($todos);
}
else if ($method == 'DELETE') 
{
  parse_str(file_get_contents("php://input"), $post_vars);
  $todos = deleteTodo($post_vars['id']);
  echo getTodoCards($todos);
}
else if ($method == 'POST') 
{
  parse_str(file_get_contents("php://input"), $post_vars);
  $todos = addTodo($post_vars['text'], $post_vars['count']);
  echo getTodoCards($todos);
}
else 
{
  throw new Exception('Method ' . $method . ' not supported');
}

?>
