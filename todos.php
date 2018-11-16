<?php

$method = $_SERVER['REQUEST_METHOD'];

if (!isset($_SESSION['todos'])) 
{
  $_SESSION['todos'] = array(
    array(
      'id' => 1,
      'text' => 'Buy some apples',
      'count' => 3),
    array(
      'id' => 2,
      'text' => 'Buy some bananas',
      'count' => 9),
    array(
      'id' => 3,
      'text' => 'Buy some chillis',
      'count' => 2),
    array(
      'id' => 4,
      'text' => 'Buy some dattles',
      'count' => 11)
  );
}
$todos = $_SESSION['todos'];

function getTodoCards() 
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


if ($method == 'GET') 
{
  echo getTodoCards();
}
else if ($method == 'DELETE') 
{
   
}
else 
{
  throw new Exception('Method ' . $method . ' not supported');
}

?>
