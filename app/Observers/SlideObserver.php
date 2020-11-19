<?php

namespace App\Observers;

use App\Slide;
use Illuminate\Support\Facades\Cache;

class SlideObserver
{
    /**
     * Handle the slide "created" event.
     *
     * @param  \App\Slide  $slide
     * @return void
     */
    public function created(Slide $slide)
    {
        Cache::forget('slides');
    }

    /**
     * Handle the slide "updated" event.
     *
     * @param  \App\Slide  $slide
     * @return void
     */
    public function updated(Slide $slide)
    {
        Cache::forget('slides');
    }

    /**
     * Handle the slide "deleted" event.
     *
     * @param  \App\Slide  $slide
     * @return void
     */
    public function deleted(Slide $slide)
    {
        Cache::forget('slides');
    }

    /**
     * Handle the slide "restored" event.
     *
     * @param  \App\Slide  $slide
     * @return void
     */
    public function restored(Slide $slide)
    {
        Cache::forget('slides');
    }

    /**
     * Handle the slide "force deleted" event.
     *
     * @param  \App\Slide  $slide
     * @return void
     */
    public function forceDeleted(Slide $slide)
    {
        Cache::forget('slides');
    }
}
