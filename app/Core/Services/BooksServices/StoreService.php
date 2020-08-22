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
        return Book::create($array['author'], $array['name'], $array['year']);
    }
}