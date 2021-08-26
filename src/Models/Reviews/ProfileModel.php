<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Models\Reviews;

use KingsCode\KlantenVertellen\Models\Model;

class ProfileModel extends Model
{

    /**
     * @var array|\KingsCode\KlantenVertellen\Models\Reviews\ReviewModel[] $reviews
     */
    private $reviews;

    /**
     * ProfileModel constructor.
     *
     * @param  array                                                    $data
     * @param  \KingsCode\KlantenVertellen\Models\Reviews\ReviewModel[] $reviews
     */
    public function __construct(array $data, array $reviews)
    {
        parent::__construct($data);

        $this->reviews = $reviews;
    }

    /**
     * @return int
     */
    public function getLocationId(): int
    {
        return $this->locationId;
    }

    /**
     * @return int
     */
    public function getUniqueId(): int
    {
        return $this->uniqueId;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->housNumber;
    }

    /**
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->postCode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getAverageRating(): string
    {
        return $this->averageRating;
    }

    /**
     * @return int
     */
    public function getReviewAmount(): int
    {
        return $this->numberReviews;
    }

    /**
     * @return int
     */
    public function getFiveStarsAmount(): int
    {
        return $this->fiveStars;
    }

    /**
     * @return int
     */
    public function getFourStarsAmount(): int
    {
        return $this->fourStars;
    }

    /**
     * @return int
     */
    public function getThreeStarsAmount(): int
    {
        return $this->threeStars;
    }

    /**
     * @return int
     */
    public function getTwoStarsAmount(): int
    {
        return $this->twoStars;
    }

    /**
     * @return int
     */
    public function getOneStarsAmount(): int
    {
        return $this->oneStars;
    }

    /**
     * @return string
     */
    public function getViewReviewUrl(): string
    {
        return $this->viewReviewUrl;
    }

    /**
     * @return string
     */
    public function getCreateReviewUrl(): string
    {
        return $this->createReviewUrl;
    }

    /**
     * @return string
     */
    public function getCanonicalName(): string
    {
        return $this->canonicalName;
    }

    /**
     * @return string
     */
    public function getLocationName(): string
    {
        return $this->locationName;
    }

    /**
     * @return string
     */
    public function getUpdatedSince(): string
    {
        return $this->updatedSince;
    }

    /**
     * @return string
     */
    public function getDateSince(): string
    {
        return $this->dateSince;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return int
     */
    public function getCrmId(): int
    {
        return $this->crmId;
    }

    /**
     * @return string
     */
    public function getLocationActive(): string
    {
        return $this->locationActive;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @return int
     */
    public function getLocationGroupId(): int
    {
        return $this->locationGroupId;
    }

    /**
     * @return int
     */
    public function getNumberOfInvites(): int
    {
        return $this->numberOfInvites;
    }

    /**
     * @return int
     */
    public function getNumberOfUsedInvites(): int
    {
        return $this->numberOfUsedInvites;
    }

    /**
     * @return int
     */
    public function getExternalId(): int
    {
        return $this->externalId;
    }

    /**
     * @return \KingsCode\KlantenVertellen\Models\Reviews\ReviewModel[] array
     */
    public function getReviews(): array
    {
        return $this->reviews;
    }
}