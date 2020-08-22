<?php

namespace App\Core\Services\BooksServices;

use App\Core\Models\Book;

/**
 * Class DestroyService
 * @package App\Core\Services\BooksServices
 */
class DestroyService
{
    /**
     * @param int $id
     * @return bool
     */
    public static function destroy(int $id)
    {
        return Book::destroy($id);
    }
}