<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\API;

use KingsCode\KlantenVertellen\Config\Repository;
use KingsCode\KlantenVertellen\Models\Reviews\ProfileModel;
use KingsCode\KlantenVertellen\Models\Reviews\ReviewContentModel;
use KingsCode\KlantenVertellen\Models\Reviews\ReviewModel;
use function array_map;

class GetReviews
{
    /**
     * This is the address of where the api calls go to (exclusive for review invites).
     */
    public static string $url = 'https://www.klantenvertellen.nl/v1/publication/review/external';

    public function __construct(private Repository $config)
    {
    }

    public function getReviews(int $maxReviews = 25): ProfileModel
    {
        return $this->load('CREATE_DATE', 'DESC', $maxReviews);
    }

    public function getBestReviews(int $maxReviews = 25): ProfileModel
    {
        return $this->load('RATING', 'DESC', $maxReviews);
    }

    public function getWorstReviews(int $maxReviews = 25): ProfileModel
    {
        return $this->load('RATING', 'ASC', $maxReviews);
    }

    public function rawQueryReviews(string $orderBy, string $sortOrder, int $maxReviews = 25): ProfileModel
    {
        return $this->load($orderBy, $sortOrder, $maxReviews);
    }

    /**
     * This will load the given reviews. If maxReviews is not set, it will return 25 reviews if available.
     */
    private function load(string $orderBy, string $sortOrder, int $maxReviews): ProfileModel
    {
        $getParameters = [
            'locationId' => $this->config->getLocationId(),
            'locale'     => $this->config->getLocale(),
            'orderBy'    => $orderBy,
            'sortOrder'  => $sortOrder,
            'limit'      => $maxReviews,
        ];

        $curl = curl_init(GetReviews::$url . '?' . http_build_query($getParameters));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-Publication-Api-Token: ' . $this->config->getToken(),
        ]);

        $response = curl_exec($curl);

        /** @var array $data */
        $data = json_decode($response, true);
        curl_close($curl);

        return $this->mapIntoModels($data);
    }

    private function mapIntoModels(array $data): ProfileModel
    {
        $reviewModels = array_map(function ($review) {
            $reviewContent = array_map(function ($reviewContent) {
                return new ReviewContentModel($reviewContent);
            }, $review['reviewContent']);

            return new ReviewModel($review, $reviewContent);
        }, $data['reviews']);

        return new ProfileModel($data, $reviewModels);
    }
}
