<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Helper;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $product;
    private $viewPath;

    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->viewPath = Helper::BASE_PATH_ADMIN .$this->product->getTable() . DIRECTORY_SEPARATOR;
    }

    public function statistics()
    {
        $countTotalProduct = $this->product->countTotalProduct();
        $countProductActive = $this->product->countProductActive();
        $countProductTop = $this->product->countProductTop();
        $countProductHot = $this->product->countProductHot();
        $countProductNew = $this->product->countProductNew();
        $top20Views = $this->product->getTop20Views();

        $title = 'Thống kê bài viết!';

        return view($this->viewPath . __FUNCTION__,
            compact('countTotalProduct', 'countProductActive',
                'countProductTop', 'countProductHot', 'countProductNew',
                'top20Views', 'title'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = $this->product->getAll();

        $title = 'Danh sách sản phẩm!';

        // return view($this->viewPath . __FUNCTION__, compact('data', 'title'));
        return view('client.index', compact('data1', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productsAdmin = Product::select('id', 'name')->pluck('name', 'id')->all();

        $title = 'Thêm mới sản phẩm!';

        $product = null;
        if (session()->has('product')) {
            $product = session()->get('product');
        }

        return view($this->viewPath . __FUNCTION__, compact('productsAdmin', 'title', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->product->fill($request->all());
            $this->product->save();

            session()->put('product', $this->product);

            return back()->with('success', Helper::MESSAGE_CREATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productsAdmin = Product::select('id', 'name')->where('id', '<>', $product->id)->pluck('name', 'id')->all();

        $title = 'Cập nhật thông tin sản phẩm!';

        return view($this->viewPath . __FUNCTION__, compact('product', 'productsAdmin', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $critidential = $request->all();
            $critidential['is_active'] = $request->is_active ?? '';
            $critidential['is_hot'] = $request->is_hot ?? '';
            $critidential['is_top'] = $request->is_top ?? '';
            $critidential['is_new'] = $request->is_new ?? '';

            $product->update($critidential);
            return back()->with('success', Helper::MESSAGE_UPDATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            session()->flash('success', Helper::MESSAGE_DESTROY_SUCCESS);
        } catch (\Exception $exception) {
            session()->flash('success', Helper::MESSAGE_DESTROY_INSUCCESS);
        }
        return redirect()->route('admin.products.index');
    }
}
