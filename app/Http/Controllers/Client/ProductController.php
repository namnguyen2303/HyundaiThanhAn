<?php


namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(Request $request, $category)
    {
        $categoryID = Helper::findCategory($category);

        if (is_null($categoryID)
            || (isset($request->sortby) && !isset(Helper::SORT_BY[$request->sortby]))
            || (isset($request->perpage) && !in_array($request->perpage, [12, 21, 30]))) {
            abort(404);
            exit;
        }

        $perpage = $request->perpage ?? 12;
        $page = $request->page ?? 1;
        $sortby = $request->sortby ?? 'mac-dinh';

        /** @var Product $productCategories */
        $productCategories = Product::where('category', $categoryID)
            ->orderByRaw(Helper::SORT_BY[$sortby])->paginate($perpage);

        return view('client.products', compact('productCategories', 'perpage', 'page', 'sortby'));
    }

    public function view($slug)
    {
        $product = Cache::remember($slug, Helper::CACHE_TIME_LIVE, function () use ($slug) {
            $product = Product::where('slug', $slug)->first();
            if (!$product) {
                abort(404);
                exit;
            }
            return $product;
        });

        $productSuggest = Cache::remember($slug . '-productSuggest', Helper::CACHE_TIME_LIVE, function () use ($product) {
            return !is_null($product->product_suggestions) ? Product::whereIn('id', $product->product_suggestions)->get() : [];
        });

        $productRelated = Cache::remember($slug . '-productRelated', Helper::CACHE_TIME_LIVE, function () use ($product) {
            return !is_null($product->product_relateds) ? Product::whereIn('id', $product->product_relateds)->get() : [];
        });

        $productBestSell = Cache::remember($slug . '-productBestSell', Helper::CACHE_TIME_LIVE, function () use ($product) {
            return !is_null($product->product_best_sells) ? Product::whereIn('id', $product->product_best_sells)->get() : [];
        });

        Helper::setSEO($product, 'client.product.view');

        return view('client.product-page', compact('product', 'productBestSell', 'productRelated', 'productSuggest'));
    }
}
