<?php

namespace KingsCode\KlantenVertellen;

use KingsCode\KlantenVertellen\API\GetReviews;
use KingsCode\KlantenVertellen\API\ReviewInvite;

class KlantenVertellenWrapper
{
    public function __construct(
        protected GetReviews $reviewGetter,
        protected ReviewInvite $reviewInviter,
    ) {
    }

    public function reviews(): GetReviews
    {
        return $this->reviewGetter;
    }

    public function inviter(): ReviewInvite
    {
        return $this->reviewInviter;
    }
}
