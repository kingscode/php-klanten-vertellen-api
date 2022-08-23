<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Models;

abstract class Model
{

    /**
     * Review constructor.
     *
     * @param  mixed $properties
     */
    public function __construct(private array $properties)
    {
    }

    /**
     * @return mixed
     */
    public function __get($name)
    {
        return $this->properties[$name];
    }
}
