<?php

namespace App\Core\Services\BooksServices;

use App\Core\Models\Book;

/**
 * Class UpdateService
 * @package App\Core\Services\BooksServices
 */
class UpdateService
{
    /**
     * @param int $id
     * @param array $params
     * @return bool
     */
    public static function update(int $id, array $params)
    {
        return Book::update($id, $params);
    }
}