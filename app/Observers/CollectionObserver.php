<?php

namespace App\Observers;

use App\Collection;
use Illuminate\Support\Facades\Cache;

class CollectionObserver
{
    /**
     * Handle the collection "created" event.
     *
     * @param  \App\Collection  $collection
     * @return void
     */
    public function created(Collection $collection)
    {
        Cache::forget('collections');
    }

    /**
     * Handle the collection "updated" event.
     *
     * @param  \App\Collection  $collection
     * @return void
     */
    public function updated(Collection $collection)
    {
        Cache::forget('collections');
    }

    /**
     * Handle the collection "deleted" event.
     *
     * @param  \App\Collection  $collection
     * @return void
     */
    public function deleted(Collection $collection)
    {
        Cache::forget('collections');
    }

    /**
     * Handle the collection "restored" event.
     *
     * @param  \App\Collection  $collection
     * @return void
     */
    public function restored(Collection $collection)
    {
        Cache::forget('collections');
    }

    /**
     * Handle the collection "force deleted" event.
     *
     * @param  \App\Collection  $collection
     * @return void
     */
    public function forceDeleted(Collection $collection)
    {
        Cache::forget('collections');
    }
}
