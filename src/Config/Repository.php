<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Config;

class Repository
{
    public function __construct(
        private string $token,
        private int $locationId,
        private string $locale,
    ) {
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getLocationId(): int
    {
        return $this->locationId;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }
}
