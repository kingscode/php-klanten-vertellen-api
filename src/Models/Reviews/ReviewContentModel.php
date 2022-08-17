<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen\Models\Reviews;

use KingsCode\KlantenVertellen\Models\Model;

class ReviewContentModel extends Model
{
    public function getAnswerToQuestion(): string
    {
        return $this->rating;
    }

    public function getQuestionGroup(): string
    {
        return $this->questionGroup;
    }

    public function getQuestionType(): string
    {
        return $this->questionType;
    }

    public function getOrder(): string
    {
        return $this->order;
    }

    public function getQuestionTranslation(): string
    {
        return $this->questionTranslation;
    }
}
