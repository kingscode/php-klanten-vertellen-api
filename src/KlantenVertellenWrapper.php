<?php

namespace KingsCode\KlantenVertellen;

use KingsCode\KlantenVertellen\API\GetReviews;
use KingsCode\KlantenVertellen\API\ReviewInvite;

class KlantenVertellenWrapper
{
    /**
     * @var \KingsCode\KlantenVertellen\API\GetReviews $reviewGetter
     */
    protected $reviewGetter;

    /**
     * @var \KingsCode\KlantenVertellen\API\ReviewInvite $reviewInviter
     */
    protected $reviewInviter;

    /**
     * ApiWrapper constructor.
     *
     * @param  \KingsCode\KlantenVertellen\API\GetReviews   $reviewGetter
     * @param  \KingsCode\KlantenVertellen\API\ReviewInvite $reviewInviter
     */
    public function __construct(GetReviews $reviewGetter, ReviewInvite $reviewInviter)
    {
        $this->reviewGetter = $reviewGetter;
        $this->reviewInviter = $reviewInviter;
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

