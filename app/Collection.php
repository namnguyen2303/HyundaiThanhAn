<?php

namespace App;

use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Collection extends Model
{
    protected $fillable = [
        'key_collection',
        'link',
        'image',
        'display_order',
        'is_active',
    ];

    public function getAll()
    {
        return self::orderBy('id', 'desc')->get();
    }

    public static function getData()
    {
        return Cache::remember('collections', Helper::CACHE_TIME_LIVE, function () {
            return static::where('is_active', 'on')->orderBy('display_order', 'asc')->get();
        });
    }
}
