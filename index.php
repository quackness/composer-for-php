<?php
$myPDO = new PDO('sqlite:/Users/karolinadubaj/lighthouse/personal_projects/sfh/php/Composer/module4.db');

// $result = $myPDO->query("create table courses (
//   name text,
//   author text,
//   create_date date
// )");

$result = $myPDO->query("insert into courses (name, author, create_date) values ('High performance PHP', 'karolina Redden', '03/29/2016')");

$courses = $myPDO->query("select * from courses;");

// echo var_dump($courses);

// foreach ($courses as $key => $value) {
//   echo var_dump($value);
// }
foreach ($courses as $course) {
  print($course['author']);
}

function read_query($db_handle, $query, $logger) {
  $result = $db_handle->query($query);
  return $result;
}
function write_query($db_handle, $query, $logger) {
  $result = $db_handle->query($query);
  return $result;
}
