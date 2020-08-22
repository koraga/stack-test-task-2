<?php

namespace App\Core\Services\BooksServices;

use App\Core\Models\Book;

/**
 * Class StoreService
 * @package App\Core\Services\BooksServices
 */
class StoreService
{
    /**
     * @param array $array
     * @return bool
     */
    public static function store(array $array)
    {
        if (!(isset($array['author']) && isset($array['name']) && isset($array['year']))) {
            return false;
        }
        return Book::create($array['author'], $array['name'], $array['year']);
    }
}