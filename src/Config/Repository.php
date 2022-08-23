<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Config;

class Repository
{

    /**
     * Repository constructor.
     *
     * @param  string $token
     * @param  int    $locationId
     * @param  string $locale
     */
    public function __construct(
        private string $token,
        private int $locationId,
        private string $locale
    ) {
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return int
     */
    public function getLocationId(): int
    {
        return $this->locationId;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }
}
