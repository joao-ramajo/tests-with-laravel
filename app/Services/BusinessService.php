<?php

namespace App\Services;

use Carbon\Carbon;

class BusinessService
{
    public function isOpen(): bool
    {
        $now = Carbon::now();

        $start = Carbon::createFromTime(9, 0, 0);
        $end = Carbon::createFromTime(18, 0, 0);

        return $now->between($start, $end);
    }
}
