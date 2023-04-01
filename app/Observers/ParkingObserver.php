<?php

namespace App\Observers;

use App\Models\Parking;

class ParkingObserver
{
    /**
     * Handle the Parking "created" event.
     *
     * @param  \App\Models\Parking  $parking
     * @return void
     */
    public function creating(Parking $parking)
    {
        if (auth()->check())
            $parking->user_id = auth()->id();

        $parking->start_time = now();
    }
}
