<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Helper;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;   
use Illuminate\Support\Facades\DB;

class OverviewController extends Controller
{

    public function detail($slugs)
    {
        $post = Cache::remember($slugs, Helper::CACHE_TIME_LIVE, function () use ($slugs) {
            $post = Post::where('slug', $slugs)->first();
            if (!$post) {
                abort(404);
                exit;
            }
            return $post;
        });

        $postRelated = Post::where('id', '<>', $post->id)->orderBy(DB::raw('RAND()'))->limit(4)->get();

        return view('client.overview', compact('post', 'postRelated'));
    }
  
}
