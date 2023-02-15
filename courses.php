<?php

class Courses {
  private $db;
  public function __construct($db) {
    $this->db = $db;
  }

  public function create_course($name, $author, $create_date) {
    $this->db->write_query("insert into courses (name, author, create_date) values ('$name', '$author', '$create_date')");

  }

}