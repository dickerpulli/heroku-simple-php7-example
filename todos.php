<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
  throw new Exception('Something bad happend!');
}

?>
