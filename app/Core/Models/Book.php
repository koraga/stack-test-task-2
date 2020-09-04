<?php

namespace App\Core\Models;

use App\Database\Db;
use PDO;

/**
 * Class Book
 * @package App\Core\Models
 */
class Book
{
    /**
     * @param array $where
     * @return array
     */
    public static function all(array $where = [])
    {
        $db = Db::getInstance()->getConnection();

        $sql = 'SELECT * FROM books';

        foreach ($where as $key => $value) {
            if ($key === array_key_first($where)) {
                $sql .= ' where ';
            }

            if ($key === array_key_last($where)) {
                $sql .= $key . '="' . $value . '"';
                break;
            }

            $sql .= $key . '="' . $value . '" and ';
        }

        $stmt = $db->prepare($sql);

        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $where[$key]);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $author
     * @param string $name
     * @param string $year
     * @return bool
     */
    public static function create(string $author, string $name, string $year)
    {
        $db = Db::getInstance()->getConnection();

        $sql = "INSERT INTO books (author, name, year) VALUES (:author, :name, :year)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':year', $year);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }


    /**
     * @param int $id
     * @param array $params
     * @return bool
     */
    public static function update(int $id, array $params)
    {

        if( is_numeric( $id ) && $id > 0 ) {
            $db = Db::getInstance()->getConnection();

            $sql = "UPDATE books SET ";

            foreach ($params as $key => $value) {
                if ($key === array_key_last($params)) {
                    $sql .= $key . '=:' . $key . ' ';
                    break;
                }
                $sql .= $key . '=:' . $key . ', ';
            }
            $sql .= "WHERE id=:id";

            $stmt = $db->prepare($sql);

            foreach ($params as $key => $value) {
                $stmt->bindParam(":$key", $params[$key]);
            }

            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        return false;
    }

    /**
     * @param int $id
     * @return bool
     */
    public static function destroy(int $id)
    {
        $db = Db::getInstance()->getConnection();
        if( is_numeric( $id ) && $id > 0 ) {
            $stmt = $db->prepare( "DELETE FROM books WHERE id =:id" );
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        return false;
    }
}