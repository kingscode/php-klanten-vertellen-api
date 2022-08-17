<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Models\Reviews;

use KingsCode\KlantenVertellen\Models\Model;

class ProfileModel extends Model
{
    /**
     * @param  \KingsCode\KlantenVertellen\Models\Reviews\ReviewModel[] $reviews
     */
    public function __construct(array $data, private array $reviews)
    {
        parent::__construct($data);
    }

    public function getLocationId(): int
    {
        return $this->locationId;
    }

    public function getUniqueId(): int
    {
        return $this->uniqueId;
    }

    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getHouseNumber(): string
    {
        return $this->housNumber;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getAverageRating(): string
    {
        return $this->averageRating;
    }

    public function getReviewAmount(): int
    {
        return $this->numberReviews;
    }

    public function getFiveStarsAmount(): int
    {
        return $this->fiveStars;
    }

    public function getFourStarsAmount(): int
    {
        return $this->fourStars;
    }

    public function getThreeStarsAmount(): int
    {
        return $this->threeStars;
    }

    public function getTwoStarsAmount(): int
    {
        return $this->twoStars;
    }

    public function getOneStarsAmount(): int
    {
        return $this->oneStars;
    }

    public function getViewReviewUrl(): string
    {
        return $this->viewReviewUrl;
    }

    public function getCreateReviewUrl(): string
    {
        return $this->createReviewUrl;
    }

    public function getCanonicalName(): string
    {
        return $this->canonicalName;
    }

    public function getLocationName(): string
    {
        return $this->locationName;
    }

    public function getUpdatedSince(): string
    {
        return $this->updatedSince;
    }

    public function getDateSince(): string
    {
        return $this->dateSince;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getCrmId(): int
    {
        return $this->crmId;
    }

    public function getLocationActive(): string
    {
        return $this->locationActive;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function getLocationGroupId(): int
    {
        return $this->locationGroupId;
    }

    public function getNumberOfInvites(): int
    {
        return $this->numberOfInvites;
    }

    public function getNumberOfUsedInvites(): int
    {
        return $this->numberOfUsedInvites;
    }

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
