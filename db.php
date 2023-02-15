class DB {
  private $handle;
  private $logger;

  public function __construct($logger) {
    $this->handle = new PDO('sqlite:/Users/karolinadubaj/lighthouse/personal_projects/sfh/php/Composer/module4.db');;
    $this->logger = $logger;
  }

}