<?php

namespace KingsCode\KlantenVertellen;

use KingsCode\KlantenVertellen\API\GetReviews;
use KingsCode\KlantenVertellen\API\ReviewInvite;
use KingsCode\KlantenVertellen\Config\Repository;

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
     * @param  \KingsCode\KlantenVertellen\Config\Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->reviewGetter = new GetReviews($repository);
        $this->reviewInviter = new ReviewInvite($repository);
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

