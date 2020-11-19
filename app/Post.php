<?php

namespace App;

use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'cover',
        'overview',
        'description',
        'content',
        'display_order',
        'views',
        'is_active',
        'is_new',
        'is_hot',
        'is_top',
        'tag_title',
        'meta_keywords',
        'meta_description',
        'rel_canonical',
        'meta_author',
        'tags',
        'type',
    ];

    public static function getData()
    {
        return Cache::remember('posts', Helper::CACHE_TIME_LIVE, function () {
            return static::where('is_active', 'on')->orderBy('views', 'desc')->get();
        });
    }

    public static function getAll()
    {
        return static::orderBy('id', 'desc')->get();
    }

    public static function countTotalPost()
    {
        return static::count();
    }

    public static function countPostActive()
    {
        return static::where('is_active', 'on')->count();
    }

    public static function countPostTop()
    {
        return static::where('is_top', 'on')->count();
    }

    public static function countPostHot()
    {
        return static::where('is_hot', 'on')->count();
    }

    public static function countPostNew()
    {
        return static::where('is_new', 'on')->count();
    }

    public static function getTop20Views()
    {
        return static::select('name', 'views', 'meta_author', 'slug')->where('is_active', 'on')->orderBy('views', 'desc')->limit(20)->get();
    }
}
