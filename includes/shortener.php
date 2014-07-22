<?php
if(isset($_POST) && !empty($_POST)) {
  require_once '../classes/Shortener.php';

  $genSelect = $_POST['genSelect'];
  $genInput = $_POST['genInput'];

  $s = new Shortener;
  if($code = $s->makeCode($genInput)) {
    echo $code;
  } else {
    //error
  }
}