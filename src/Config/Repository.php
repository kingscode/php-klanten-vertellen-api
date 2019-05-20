<?php

namespace KingsCode\KlantenVertellen\Config;

class Repository
{
    /**
     * @var string $token
     */
    private $token;

    /**
     * @var int $locationId
     */
    private $locationId;

    /**
     * @var string $locale
     */
    private $locale;

    /**
     * Repository constructor.
     *
     * @param  string $token
     * @param  int    $locationId
     * @param  string $locale
     */
    public function __construct(string $token, int $locationId, string $locale)
    {
        $this->token = $token;
        $this->locationId = $locationId;
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
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
