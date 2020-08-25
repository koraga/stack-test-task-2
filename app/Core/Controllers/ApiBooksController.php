<?php

namespace App\Core\Controllers;

use App\Core\Request\Request;
use App\Core\Models\Book;
use App\Core\Services\BooksServices\DestroyService;
use App\Core\Services\BooksServices\StoreService;
use App\Core\Services\BooksServices\UpdateService;

/**
 * Class ApiBooksController
 * @package App\Core\Controllers
 */
class ApiBooksController
{
    /**
     * Display a listing of the resource.
     *
     * @return false|string
     */
    public function index()
    {
        return json_encode(Book::all(Request::getQueryParams()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return string
     */
    public function store()
    {
        $result = StoreService::store(Request::getBody());
        if (!$result) {
            http_response_code(400);
            return 'bad request';
        }
        return 'ok';
    }


    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return string
     */
    public function update(int $id)
    {
        $result = UpdateService::update($id, Request::getBody());
        if (!$result) {
            http_response_code(400);
            return 'bad request';
        }
        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string
     */
    public function destroy(int $id)
    {
        $result = DestroyService::destroy($id);
        if (!$result) {
            http_response_code(400);
            return 'bad request';
        }
        return 'ok';
    }
}