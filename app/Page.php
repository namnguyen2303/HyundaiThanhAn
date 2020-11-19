<?php

namespace App;

use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Page extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'cover',
        'template',
        'views',
        'is_active',
    ];

    public function getAll()
    {
        return self::orderBy('id', 'desc')->get();
    }

    public static function getData()
    {
        return Cache::remember('pages', Helper::CACHE_TIME_LIVE, function () {
            return static::where('is_active', 'on')->orderBy('views', 'desc')->get();
        });
    }
}
