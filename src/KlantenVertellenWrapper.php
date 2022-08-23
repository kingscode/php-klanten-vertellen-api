<?php

namespace KingsCode\KlantenVertellen;

use KingsCode\KlantenVertellen\API\GetReviews;
use KingsCode\KlantenVertellen\API\ReviewInvite;

class KlantenVertellenWrapper
{

    /**
     * ApiWrapper constructor.
     *
     * @param  \KingsCode\KlantenVertellen\API\GetReviews   $reviewGetter
     * @param  \KingsCode\KlantenVertellen\API\ReviewInvite $reviewInviter
     */
    public function __construct(protected GetReviews $reviewGetter,protected ReviewInvite $reviewInviter)
    {
    }

    /**
     * @return \KingsCode\KlantenVertellen\API\GetReviews
     */
    public function reviews(): GetReviews
    {
        return $this->reviewGetter;
    }

    /**
     * @return \KingsCode\KlantenVertellen\API\ReviewInvite
     */
    public function inviter(): ReviewInvite
    {
        return $this->reviewInviter;
    }
}

