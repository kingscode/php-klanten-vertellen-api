<?php

declare(strict_types=1);

namespace KingsCode\KlantenVertellen;

class KlantenVertellenWrapperFactory
{

    public function create($token, $locationId, $locale)
    {
        $repository = new Repository($token, $locationId, $locale);
        return new KlantenVertellenWrapper(new GetReviews($repository), new ReviewInvite($repository));
    }

}