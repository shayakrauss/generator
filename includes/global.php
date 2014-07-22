<?php

if(isset($_POST) && !empty($_POST)) {
  $genSelect = $_POST['genSelect'];
  $genInput = $_POST['genInput'];

  switch ($genSelect) {
    case 'base64_encode':
      echo base64_encode($genInput);
      break;
    case 'base64_decode':
      echo base64_decode($genInput);
      break;
  }
}