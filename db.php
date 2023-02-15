<?php

class DB {
private $handle;
private $logger;

public function __construct($logger) {
$this->handle = new PDO('sqlite:/Users/karolinadubaj/lighthouse/personal_projects/sfh/php/Composer/module4.db');;
$this->logger = $logger;
}

public function read_query($query)
{
  $result = $this->handle->query($query);
  $this->logger->info('Read query executed', ['query' => $query]);
  return $result;
}
public function write_query($query)
{
  $result = $this->handle->query($query);
  $this->logger->notice('Write query executed', ['query' => $query]);
  return $result;
}

}