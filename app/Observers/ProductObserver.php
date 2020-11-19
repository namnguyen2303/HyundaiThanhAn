<?php

namespace App\Observers;

use App\Product;
use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        Cache::forget($product->slug . '-productSuggest');
        Cache::forget($product->slug . '-productRelated');
        Cache::forget($product->slug . '-productBestSell');
        Cache::forget('products');
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        Cache::forget($product->slug . '-productSuggest');
        Cache::forget($product->slug . '-productRelated');
        Cache::forget($product->slug . '-productBestSell');
        Cache::forget('products');
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        Cache::forget($product->slug . '-productSuggest');
        Cache::forget($product->slug . '-productRelated');
        Cache::forget($product->slug . '-productBestSell');
        Cache::forget('products');
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        Cache::forget($product->slug . '-productSuggest');
        Cache::forget($product->slug . '-productRelated');
        Cache::forget($product->slug . '-productBestSell');
        Cache::forget('products');
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        Cache::forget($product->slug . '-productSuggest');
        Cache::forget($product->slug . '-productRelated');
        Cache::forget($product->slug . '-productBestSell');
        Cache::forget('products');
    }
}
