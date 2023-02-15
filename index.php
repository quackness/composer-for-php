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


// $result = $db->write_query("DELETE FROM courses;");
$result = $courses->create_course('High performance PHP', 'karolina Redden', '03/29/2016');
$result = $courses->create_course('Composer', 'John redden', '04/20/2016');
$result = $courses->create_course('HTML', 'Sam Smith', '08/20/2010');

$courses->show_courses();





// Run the file with: php -S localhost:8080
// php -S localhost:8080  to see the logs