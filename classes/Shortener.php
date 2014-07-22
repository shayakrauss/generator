<?php

class Shortener {
  protected $db;

  public function __construct() {
    $this->db = new mysqli('localhost', 'root', '', 'generator');
  }

  protected function generateCode($num) {
    return base_convert($num, 10, 36);
  }

  public function makeCode($url) {
    $url = trim($url);

    if(!filter_var($url, FILTER_VALIDATE_URL)) {
      return 'test';
    }

    $url = $this->db->escape_string($url);

    if(!$this->db->query("INSERT INTO short_urls (long_url) VALUES ('{$url}')")) {
      return $this->db->error;
    }

    $insert_id = $this->db->insert_id;

    $code = $this->generateCode($insert_id);

    $this->db->query("UPDATE short_urls SET short_url = '{$code}' WHERE id = '{$insert_id}'");

    return $code;
  }

  public function getUrl($code) {
    $code = $this->db->escape_string($code);

    $code = $this->db->query("SELECT long_url FROM short_urls WHERE short_url = '$code'");

    if($code->num_rows) {
      return $code->fetch_object()->long_url;
    }

    return '';
  }
}