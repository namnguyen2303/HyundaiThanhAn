<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Helper;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        // $slide = $Slide::all()->toArray();
        // dd($slide);
        $slides = Slide::where('is_active', 'on')->paginate(12);

        return view('client.index', compact('slides'));
    }
  
}
