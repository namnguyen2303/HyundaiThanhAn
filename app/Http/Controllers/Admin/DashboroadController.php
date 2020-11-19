<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Analytics\Period;
use Illuminate\Support\Collection;
use Analytics;
class DashboroadController extends Controller
{
    public function index()
    {
       // $analyticsData = \Analytics::fetchVisitorsAndPageViews(Period::days(7));

        return view('admin.dashboard');
    }
}
