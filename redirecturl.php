<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once 'classes/Shortener.php';

if(isset($_GET['code'])) {
  $code = $_GET['code'];
  $s = new Shortener;

  if($url = $s->getUrl($code)) {
    header("Location: {$url}");
    die();
  }
}