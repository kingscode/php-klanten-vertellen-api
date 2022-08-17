<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Models;

abstract class Model
{
    public function __construct(private array $properties)
    {
    }

    public function __get($name)
    {
        return $this->properties[$name];
    }
}
