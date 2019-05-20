<?php

namespace KingsCode\KlantenVertellen\Models;

class Model
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
