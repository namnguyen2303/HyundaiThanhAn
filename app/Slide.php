<?php

namespace App;

use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Slide extends Model
{
    protected $fillable = [
        'image',
        'display_order',
        'is_active',
    ];

    public function getAll()
    {
        return self::orderBy('display_order', 'asc')->orderBy('id', 'desc')->get();
    }

    public static function getData()
    {
        return Cache::remember('slides', Helper::CACHE_TIME_LIVE, function () {
            return static::where('is_active', 'on')->orderBy('display_order', 'asc')->get();
        });
    }
}
