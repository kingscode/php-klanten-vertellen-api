<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Models\Reviews;

use KingsCode\KlantenVertellen\Models\Model;

class ReviewContentModel extends Model
{
    /**
     * @return string
     */
    public function getAnswerToQuestion(): string
    {
        return $this->rating;
    }

    /**
     * @return string
     */
    public function getQuestionGroup(): string
    {
        return $this->questionGroup;
    }

    /**
     * @return string
     */
    public function getQuestionType(): string
    {
        return $this->questionType;
    }

    /**
     * @return string
     */
    public function getOrder(): string
    {
        return $this->order;
    }

    /**
     * @return string
     */
    public function getQuestionTranslation(): string
    {
        return $this->questionTranslation;
    }
}
