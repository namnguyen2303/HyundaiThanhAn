<?php

namespace App\Observers;

use App\SimPhoneNumber;
use Illuminate\Support\Facades\Cache;

class SimPhoneNumberObserver
{
    /**
     * Handle the sim phone number "created" event.
     *
     * @param  \App\SimPhoneNumber  $simPhoneNumber
     * @return void
     */
    public function created(SimPhoneNumber $simPhoneNumber)
    {
        Cache::forget('sim-phone-number');
    }

    /**
     * Handle the sim phone number "updated" event.
     *
     * @param  \App\SimPhoneNumber  $simPhoneNumber
     * @return void
     */
    public function updated(SimPhoneNumber $simPhoneNumber)
    {
        Cache::forget('sim-phone-number');
    }

    /**
     * Handle the sim phone number "deleted" event.
     *
     * @param  \App\SimPhoneNumber  $simPhoneNumber
     * @return void
     */
    public function deleted(SimPhoneNumber $simPhoneNumber)
    {
        Cache::forget('sim-phone-number');
    }

    /**
     * Handle the sim phone number "restored" event.
     *
     * @param  \App\SimPhoneNumber  $simPhoneNumber
     * @return void
     */
    public function restored(SimPhoneNumber $simPhoneNumber)
    {
        Cache::forget('sim-phone-number');
    }

    /**
     * Handle the sim phone number "force deleted" event.
     *
     * @param  \App\SimPhoneNumber  $simPhoneNumber
     * @return void
     */
    public function forceDeleted(SimPhoneNumber $simPhoneNumber)
    {
        Cache::forget('sim-phone-number');
    }
}
