<?php

namespace App\Core\View;

/**
 * Class View
 * @package App\Core\View
 */
class View
{
    /**
     * @param string $name
     * @return string
     */
    protected function resolvePath(string $name)
    {
        return trim(join('/', explode('.', $name)), '/');
    }

    /**
     * Make a view.
     *
     * @param string $name
     * @param array  $data
     *
     * @return mixed
     */
    public function make(string $name, array $data = [])
    {
        $path = $this->resolvePath($name);

        extract($data);

        require ROOT . "/app/Views/{$path}.php";

        return $this;
    }
}