<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\API;

use KingsCode\KlantenVertellen\Config\Repository;

class ReviewInvite
{

    /**
     * This is the address of where the api calls go to (exclusive for review invites).
     *
     * @var string $url
     */
    public static string $url = 'https://www.klantenvertellen.nl/v1/invite/external';

    /**
     * ReviewInvite constructor.
     *
     * @param  \KingsCode\KlantenVertellen\Config\Repository $config
     */
    public function __construct(private Repository $config)
    {
    }

    /**
     * @param  string $email
     * @param  string $firstName
     * @param  string $lastName
     * @param  int    $delay
     * @param  string $refCode
     * @return bool
     */
    public function sendInvite(string $email, string $firstName, string $lastName, int $delay = 0, string $refCode = null): bool
    {
        $curl = curl_init(ReviewInvite::$url);

        if ($curl === false) {
            return false;
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-Publication-Api-Token: ' . $this->config->getToken(),
            'Content-Type: application/json',
        ]);

        $postVariables = [
            'location_id'  => $this->config->getLocationId(),
            'invite_email' => $email,
            'delay'        => $delay,
            'first_name'   => $firstName,
            'last_name'    => $lastName,
            'language'     => $this->config->getLocale(),
            'ref_code'     => $refCode,
        ];

        curl_setopt($curl, CURLOPT_POST, count($postVariables));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postVariables));

        curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        return $status === 200;
    }
}
