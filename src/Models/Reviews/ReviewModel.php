<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Models\Reviews;

use KingsCode\KlantenVertellen\Models\Model;

class ReviewModel extends Model
{
    /**
     * @param  \KingsCode\KlantenVertellen\Models\Reviews\ReviewContentModel[] $reviewContent
     */
    public function __construct(array $data, private array $reviewContent)
    {
        parent::__construct($data);
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getReviewId(): string
    {
        return $this->reviewId;
    }

    public function getAuthor(): string
    {
        return $this->reviewAuthor;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getReferenceCode(): string
    {
        return $this->referenceCode;
    }

    public function getDateSince(): string
    {
        return $this->dateSince;
    }

    public function getUpdatedSince(): string
    {
        return $this->updatedSince;
    }

    public function reviewLanguage(): string
    {
        return $this->reviewLanguage;
    }

    /**
     * @return \KingsCode\KlantenVertellen\Models\Reviews\ReviewContentModel[]
     */
    public function getReviewContent(): array
    {
        return $this->reviewContent;
    }
}
