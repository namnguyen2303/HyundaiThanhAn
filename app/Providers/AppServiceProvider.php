<?php

namespace App\Providers;

use App\Collection;
use App\ConfigGeneral;
use App\ConfigSeoPage;
use App\Observers\CollectionObserver;
use App\Observers\PageObserver;
use App\Observers\PostObserver;
use App\Observers\ProductObserver;
use App\Observers\SimPhoneNumberObserver;
use App\Observers\SlideObserver;
use App\Observers\BranchObserver;
use App\Page;
use App\Post;
use App\Product;
use App\SimPhoneNumber;
use App\Slide;
use App\Branches;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //\URL::forceScheme('https');
        
        Schema::defaultStringLength(191);

        Collection::observe(CollectionObserver::class);
        Page::observe(PageObserver::class);
        Post::observe(PostObserver::class);
        Product::observe(ProductObserver::class);
        SimPhoneNumber::observe(SimPhoneNumberObserver::class);
        Slide::observe(SlideObserver::class);
        Branches::observe(BranchObserver::class);

        view()->share('system', ConfigGeneral::getData());
        view()->share('seoPage', ConfigSeoPage::getData());
        view()->share('collections', Collection::getData());
        view()->share('posts', Post::getData());
        view()->share('products', Product::getData());
        view()->share('slides', Slide::getData());
        view()->share('branches', Branches::getData());
        view()->share('branchesParent', Branches::getBranchParent());
        view()->share('branchesChild', Branches::getBranchChild());
    }
}
