<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('query_log');
$log->pushHandler(new StreamHandler('logs/query.log', Logger::DEBUG));


$myPDO = new PDO('sqlite:/Users/karolinadubaj/lighthouse/personal_projects/sfh/php/Composer/module4.db');

// $result = $myPDO->query("create table courses (
//   name text,
//   author text,
//   create_date date
// )");
$result = write_query($myPDO, "DELETE FROM courses;", $log);
$result = write_query($myPDO, "insert into courses (name, author, create_date) values ('High performance PHP', 'karolina Redden', '03/29/2016')", $log);
$result = write_query($myPDO, "insert into courses (name, author, create_date) values ('Composer', 'John redden', '04/20/2016')", $log);
$result = write_query($myPDO, "insert into courses (name, author, create_date) values ('HTML', 'Sam Smith', '08/20/2010')", $log);

$courses = read_query($myPDO, "select * from courses;", $log);

// echo var_dump($courses);

// foreach ($courses as $key => $value) {
//   echo var_dump($value);
// }
foreach ($courses as $course) {
  print($course['name'] . "</br>" );
}

function read_query($db_handle, $query, $logger)
{
  $result = $db_handle->query($query);
  $logger->info('Read query executed', ['query' => $query]);
  return $result;
}
function write_query($db_handle, $query, $logger)
{
  $result = $db_handle->query($query);
  $logger->notice('Write query executed', ['query' => $query]);
  return $result;
}

// Run the file with: php -S localhost:8080
//could not make php -S localhost:8080  get working 