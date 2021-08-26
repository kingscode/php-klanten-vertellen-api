<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Models;

abstract class Model
{
    /**
     * @var array $properties
     */
    private $properties;

    /**
     * Review constructor.
     *
     * @param  mixed $data
     */
    public function __construct(array $data)
    {
        $this->properties = $data;
    }

    /**
     * @return mixed
     */
    public function __get($name)
    {
        return $this->properties[$name];
    }
}