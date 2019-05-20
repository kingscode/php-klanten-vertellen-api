<?php

namespace KingsCode\KlantenVertellen\API;

/*
 * This class sends a POST request to the klantenvertellen.nl endpoint. Which results in klantenvertellen sending
 * a mail to the target email address which asks if you would want to review 'X' company.
 */

use KingsCode\KlantenVertellen\Config\Repository;

class ReviewInvite
{
    /**
     * Your api-token, this is needed for authenticated requests.
     * Change this variable accordingly.
     *
     * You can get your api-token from: My Account -> Invite -> Extra Options
     *
     * @var string $token
     */
    private $token;

    /**
     *
     * ID for the location for which the invite should be sent. The ID to your review page can be found
     * under: My account -> Invite -> Extra Options.
     * (ex: https://www.klantenvertellen.nl/invite-link/XXXXXXX/yourcompany.nl?lang=en)
     *
     * @var int $locationId
     */
    private $locationId;

    /**
     * Either 'nl', 'de' or 'en'
     *
     * @var string $locale
     */
    private $locale;

    /**
     * This is the address of where the api calls go to (exclusive for review invites).
     *
     * @var string $url
     */
    public static $url = "https://www.klantenvertellen.nl/v1/invite/external";

    /**
     * ReviewInvite constructor.
     *
     * @param  \KingsCode\KlantenVertellen\Config\Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->token = $repository->getToken();
        $this->locationId = $repository->getLocationId();
        $this->locale = $repository->getLocale();
    }

    /**
     * @param  string $email
     * @param  string $firstName
     * @param  string $lastName
     * @param  int    $delay
     * @param  int    $refCode
     * @return bool
     */
    public function sendInvite(string $email, string $firstName, string $lastName, int $delay = 0, int $refCode = 0): bool
    {
        $curl = curl_init(ReviewInvite::$url);

        if ($curl === false) {
            return false;
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-Publication-Api-Token: ' . $this->token,
            'Content-Type: application/json',
        ]);

        $postVariables = [
            'location_id'  => $this->locationId,
            'invite_email' => $email,
            'delay'        => $delay,
            'first_name'   => $firstName,
            'last_name'    => $lastName,
            'language'     => $this->locale,
            'ref_code'     => $refCode,
        ];

        curl_setopt($curl, CURLOPT_POST, count($postVariables));

        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postVariables));

        curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return $status == 200;
    }
}
