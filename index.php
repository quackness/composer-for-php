<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/db.php';
require __DIR__ . '/courses.php';


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('query_log');
$log->pushHandler(new StreamHandler('logs/query.log', Logger::DEBUG));

$db = new DB($log);
$courses = new Courses($db);


// $myPDO = new PDO('sqlite:/Users/karolinadubaj/lighthouse/personal_projects/sfh/php/Composer/module4.db');

// $result = $myPDO->query("create table courses (
//   name text,
//   author text,
//   create_date date
// )");
$result = $db->write_query("DELETE FROM courses;");
$result = $courses->create_course('High performance PHP', 'karolina Redden', '03/29/2016');
$result = $courses->create_course('Composer', 'John redden', '04/20/2016');
$result = $courses->create_course('HTML', 'Sam Smith', '08/20/2010');

$courses->show_courses();

// $courses = $db->read_query("select * from courses;");

// // echo var_dump($courses);

// // foreach ($courses as $key => $value) {
// //   echo var_dump($value);
// // }
// foreach ($courses as $course) {
//   print($course['name'] . "</br>" );
// }



// Run the file with: php -S localhost:8080
// php -S localhost:8080  to see the logs