<?php

namespace App;

use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'category',
        'product_images',
        'product_best_sells',
        'product_relateds',
        'product_suggestions',
        'cover',
        'overview',
        'description',
        'content',
        'coupon',
        'cost',
        'price',
        'discount',
        'price_discount',
        'display_order',
        'views',
        'is_active',
        'is_new',
        'is_hot',
        'is_top',
        'in_day',
        'tag_title',
        'meta_keywords',
        'meta_description',
        'rel_canonical',
        'meta_author',
        'tags',
        'mass',
        'size_width_long',
        'size_height_wide',
        'number_of_sales_in_the_month',
    ];

    protected $casts = [
        'product_images' => 'array',
        'product_best_sells' => 'array',
        'product_relateds' => 'array',
        'product_suggestions' => 'array',
    ];

    public function scopeIsActive(Builder $query)
    {
        return $query->where('is_active', 'on');
    }

    public function scopeSku(Builder $query, $sku)
    {
        return $query->where('sku', $sku);
    }

    /**
     * Get all of the seos for the product.
     */
    public static function getData()
    {
        return Cache::remember('products', Helper::CACHE_TIME_LIVE, function () {
            return static::where('is_active', 'on')->orderBy('views', 'desc')->orderBy('id', 'desc')->get();
        });
    }

    public function getAll()
    {
        return self::orderBy('id', 'desc')->get();
    }

    public function countTotalProduct()
    {
        return self::count();
    }

    public function countProductActive()
    {
        return self::where('is_active', 'on')->count();
    }

    public function countProductTop()
    {
        return self::where('is_top', 'on')->count();
    }

    public function countProductHot()
    {
        return self::where('is_hot', 'on')->count();
    }

    public function countProductNew()
    {
        return self::where('is_new', 'on')->count();
    }

    public function getTop20Views()
    {
        return self::select('name', 'views', 'meta_author', 'slug')->where('is_active', 'on')->orderBy('views', 'desc')->limit(20)->get();
    }
}
