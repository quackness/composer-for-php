class DB {
private $handle;
private $logger;

public function __construct($logger) {
$this->handle = new PDO('sqlite:/Users/karolinadubaj/lighthouse/personal_projects/sfh/php/Composer/module4.db');;
$this->logger = $logger;
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

}