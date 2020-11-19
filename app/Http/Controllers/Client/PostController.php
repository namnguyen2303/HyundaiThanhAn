<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Helper;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $topViews = Cache::remember('getTop20Views', Helper::CACHE_TIME_LIVE, function () {
            return Post::getTop20Views();
        });
        $posts = Post::where('is_active', 'on')->paginate(12);
        return view('client.index', compact('topViews', 'posts'));
    }
    public function news(){
        return view('client.posts');
    }
    public function contacts(){
        return view('client.contact');
    }
    public function introduce(){
        return view('client.overview');
    }
    public function detail($slug)
    {
        $post = Cache::remember($slug, Helper::CACHE_TIME_LIVE, function () use ($slug) {
            $post = Post::where('slug', $slug)->first();
            if (!$post) {
                abort(404);
                exit;
            }
            return $post;
        });

        $postRelated = Post::where('id', '<>', $post->id)->orderBy(DB::raw('RAND()'))->limit(4)->get();

        return view('client.post-page', compact('post', 'postRelated'));
    }
}
