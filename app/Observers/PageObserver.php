<?php

namespace App\Observers;

use App\Page;
use Illuminate\Support\Facades\Cache;

class PageObserver
{
    /**
     * Handle the page "created" event.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function created(Page $page)
    {
        Cache::forget('pages');
    }

    /**
     * Handle the page "updated" event.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function updated(Page $page)
    {
        Cache::forget('pages');
    }

    /**
     * Handle the page "deleted" event.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function deleted(Page $page)
    {
        Cache::forget('pages');
    }

    /**
     * Handle the page "restored" event.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function restored(Page $page)
    {
        Cache::forget('pages');
    }

    /**
     * Handle the page "force deleted" event.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function forceDeleted(Page $page)
    {
        Cache::forget('pages');
    }
}
