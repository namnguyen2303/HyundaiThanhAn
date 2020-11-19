<?php

namespace App;

use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ConfigGeneral extends Model
{
    protected $fillable = [
        'name_web',
        'logo_web',
        'favicon',
        'email_support',
        'hotline',
        'social_facebook',
        'social_skype',
        'social_twitter',
        'social_pinterest',
        'social_linkdin',
        'social_instagram',
        'social_youtube',
        'google_analytic',
        'google_map',
        'google_webmaster',
        'google_adsense',
        'google_ads',
        'facebook_pixel',
        'facebook_auth',
        'facebook_script',
        'web_style',
        'web_script',
    ];

    public static function getData()
    {
        return Cache::remember('congfig-general', Helper::CACHE_TIME_LIVE, function () {
            return static::first();
        });
    }
}
