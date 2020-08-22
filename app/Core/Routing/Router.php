<?php

namespace App\Core\Routing;

/**
 * Class Router
 * @package App\Core\Routing
 */
class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/app/Config/routes.php';
        $this->routes = include ($routesPath);
    }

    /**
     * Return request string
     * @return string
     */
    private function getURI()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    /**
     * If return result == string then echo result
     * @param $result
     */
    private function echoResult($result)
    {
        if (gettype($result) === "string")
        {
            echo $result;
        }
    }

    /**
     * get parameters
     *
     * @param string $uriPattern
     * @param string $uri
     * @return array
     */
    private function getParameters(string $uriPattern, string $uri)
    {
        $explodeUriPattern = explode('/', $uriPattern);
        $explodeUri = explode('/', $uri);

        return array_diff($explodeUri, $explodeUriPattern);
    }

    /**
     * Search Controller and Controller method
     */
    public function run()
    {
        $uri = $this->getURI();

        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$requestMethod] as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $parameters = $this->getParameters($uriPattern, $uri);
                $controllerObject = new $path[0];

                $result = call_user_func_array(array($controllerObject, $path[1]), $parameters);

                if ($result != null) {
                    $this->echoResult($result);
                    break;
                }
            }
        }
    }
}