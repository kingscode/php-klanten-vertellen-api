<?php

namespace KingsCode\KlantenVertellen\API;

use KingsCode\KlantenVertellen\Models\Reviews\ProfileModel;
use KingsCode\KlantenVertellen\Config\Repository;
use KingsCode\KlantenVertellen\Models\Reviews\ReviewContentModel;
use KingsCode\KlantenVertellen\Models\Reviews\ReviewModel;

class GetReviews
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
     * This is the address of where the api calls go to (exclusive for review invites).
     *
     * @var string $url
     */
    public static $url = "https://www.klantenvertellen.nl/v1/publication/review/external?";

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
     * GetReviews constructor.
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
     * @param  int $maxReviews
     * @return \KingsCode\KlantenVertellen\Models\Reviews\ProfileModel
     */
    public function getReviews(int $maxReviews = 0): ProfileModel
    {
        return $this->load('CREATE_DATE', 'DESC', $maxReviews);
    }

    /**
     * @param  int $maxReviews
     * @return \KingsCode\KlantenVertellen\Models\Reviews\ProfileModel
     */
    public function getBestReviews(int $maxReviews = 0): ProfileModel
    {
        return $this->load('RATING', 'DESC', $maxReviews);
    }

    /**
     * @param  int $maxReviews
     * @return \KingsCode\KlantenVertellen\Models\Reviews\ProfileModel
     */
    public function getWorstReviews(int $maxReviews = 0): ProfileModel
    {
        return $this->load('RATING', 'ASC', $maxReviews);
    }

    /**
     * @param  string $orderBy
     * @param  string $sortOrder
     * @param  int    $maxReviews
     * @return \KingsCode\KlantenVertellen\Models\Reviews\ProfileModel
     */
    public function rawQueryReviews(string $orderBy, string $sortOrder, int $maxReviews = 0): ProfileModel
    {
        return $this->load($orderBy, $sortOrder, $maxReviews);
    }

    /**
     * This will load the given reviews. If maxReviews is not set, it will return 25 reviews if available.
     *
     * @param  string $orderBy
     * @param  string $sortOrder
     * @param  int    $maxReviews
     * @return ProfileModel
     */
    private function load(string $orderBy, string $sortOrder, int $maxReviews): ProfileModel
    {
        $getParameters = [
            'locationId' => $this->locationId,
            'locale'     => $this->locale,
            'orderBy'    => $orderBy,
            'sortOrder'  => $sortOrder,
            'limit'      => $maxReviews,
        ];

        $curl = curl_init(GetReviews::$url . http_build_query($getParameters));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-Publication-Api-Token: ' . $this->token,
        ]);

        $response = curl_exec($curl);

        /** @var array $data */
        $data = json_decode($response, true);
        curl_close($curl);

        return new ProfileModel($data,
            array_map(function($review) {
                return new ReviewModel($review);
                }, $data['reviews']));
    }
}

