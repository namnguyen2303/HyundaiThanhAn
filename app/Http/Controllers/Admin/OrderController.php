<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Helper;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    private $order;
    private $viewPath;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->viewPath = Helper::BASE_PATH_ADMIN .$this->order->getTable() . DIRECTORY_SEPARATOR;
    }

    public function statistics()
    {
        $title = 'Thống kê đơn hàng!';

        return view($this->viewPath . __FUNCTION__, compact( 'title'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->order->getAll();

        $title = 'Danh sách đơn hàng!';

        return view($this->viewPath . __FUNCTION__, compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'Tạo mới đơn hàng!';

        return view($this->viewPath . __FUNCTION__, compact('title'));
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
            $this->order->create($request->all());
            return back()->with('success', Helper::MESSAGE_CREATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {

        $title = 'Cập nhật thông tin đơn hàng!';

        return view($this->viewPath . __FUNCTION__, compact('order', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        try {
            $order->update($request->all());
            return back()->with('success', Helper::MESSAGE_UPDATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }
}
