<?php

namespace App\Observers;

use App\Branches;
use Illuminate\Support\Facades\Cache;

class BranchObserver
{
    /**
     * Handle the slide "created" event.
     *
     * @param  \App\Branches  $slide
     * @return void
     */
    public function created(Branches $branch)
    {
        Cache::forget('branch');
    }

    /**
     * Handle the slide "updated" event.
     *
     * @param  \App\Branches  $Branch
     * @return void
     */
    public function updated(Branch $branch)
    {
        Cache::forget('branch');
    }

    /**
     * Handle the slide "deleted" event.
     *
     * @param  \App\Branches  $slide
     * @return void
     */
    public function deleted(Branches $branch)
    {
        Cache::forget('branch');
    }

    /**
     * Handle the slide "restored" event.
     *
     * @param  \App\Branches  $slide
     * @return void
     */
    public function restored(Branches $branch)
    {
        Cache::forget('branch');
    }

    /**
     * Handle the slide "force deleted" event.
     *
     * @param  \App\Branches  $slide
     * @return void
     */
    public function forceDeleted(Branches $branch)
    {
        Cache::forget('branch');
    }
}
