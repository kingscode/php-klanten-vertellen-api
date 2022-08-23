<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Models\Reviews;

use KingsCode\KlantenVertellen\Models\Model;

class ReviewModel extends Model
{

    /**
     * ReviewModel constructor.
     *
     * @param  array                                                           $data
     * @param  \KingsCode\KlantenVertellen\Models\Reviews\ReviewContentModel[] $reviewContent
     */
    public function __construct(array $data, private array $reviewContent)
    {
        parent::__construct($data);
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @return string
     */
    public function getReviewId(): string
    {
        return $this->reviewId;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->reviewAuthor;
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
    public function getReferenceCode(): string
    {
        return $this->referenceCode;
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
    public function getUpdatedSince(): string
    {
        return $this->updatedSince;
    }

    /**
     * @return string
     */
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
