<?php

namespace App\Core\Request;

/**
 * Class Request
 * @package App\Core\Request
 */
class Request
{
    /**
     * @return array
     */
    public static function getQueryParams()
    {
        return $_GET;
    }

    /**
     * @return mixed
     */
    public static function getBody()
    {
        return json_decode(file_get_contents('php://input'), true);
    }
}