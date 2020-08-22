<?php

namespace App\Database;

use App\Core\Helpers\Singleton;
use PDO;

/**
 * Class Db
 * @package App\Database
 */
class Db
{
    use Singleton;

    private PDO $connection;

    private function __construct()
    {
        $parameters = include ROOT . '/app/Config/db.php';

        $dsn = 'mysql:host=' . $parameters['host'] . ';dbname=' . $parameters['db_name'];

        $this->connection = new PDO($dsn, $parameters['user'], $parameters['password']);
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }
}