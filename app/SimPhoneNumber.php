<?php

namespace App;

use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SimPhoneNumber extends Model
{
    protected $fillable = [
        'phone_number',
        'cost',
        'display_order',
        'content',
        'cover',
        'price',
        'telco',
        'views',
        'status',
        'is_active',
        'is_hot',
        'is_top',
        'is_new',
    ];

    public static function getData()
    {
        return Cache::remember('sim-phone-number', Helper::CACHE_TIME_LIVE, function () {
            return static::where('is_active', 'on')->orderBy('views', 'desc')->get();
        });
    }

    public function getAll()
    {
        return self::all();
    }

    public function countTotalSim()
    {
        return self::count();
    }

    public function countSimActive()
    {
        return self::where('is_active', 'on')->count();
    }

    public function countSimTop()
    {
        return self::where('is_top', 'on')->count();
    }

    public function countSimHot()
    {
        return self::where('is_hot', 'on')->count();
    }

    public function countSimNew()
    {
        return self::where('is_new', 'on')->count();
    }

    public function getTop20Views()
    {
        return self::select('phone_number', 'views', 'telco', 'slug')->where('is_active', 'on')->orderBy('views', 'desc')->limit(20)->get();
    }
}
