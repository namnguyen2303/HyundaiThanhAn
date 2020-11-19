<?php

namespace App;

use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ConfigSeoPage extends Model
{
    protected $fillable = [
        'page',
        'tag_title',
        'meta_keywords',
        'meta_description',
        'rel_canonical',
        'meta_author',
        'tags',
    ];

    public function getAll()
    {
        return self::orderBy('id', 'desc')->get();
    }

    public static function getData()
    {
        return Cache::remember('config-seo-page', Helper::CACHE_TIME_LIVE, function () {
            return static::all();
        });
    }
}
