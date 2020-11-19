<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Helper;
use App\Widget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WidgetController extends Controller
{
    private $widget;
    private $viewPath;

    public function __construct(Widget $widget)
    {
        $this->widget = $widget;
        $this->viewPath = Helper::BASE_PATH_ADMIN .$this->widget->getTable() . DIRECTORY_SEPARATOR;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->widget->getAll();

        $title = 'Danh sách widget!';

        return view($this->viewPath . __FUNCTION__, compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới widget!';

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
            $this->widget->create($request->all());
            return back()->with('success', Helper::MESSAGE_CREATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Widget $widget
     * @return \Illuminate\Http\Response
     */
    public function edit(Widget $widget)
    {
        $title = 'Cập nhật thông tin widget!';

        return view($this->viewPath . __FUNCTION__, compact('widget', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Widget $widget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Widget $widget)
    {
        try {
            $widget->update($request->all());
            return back()->with('success', Helper::MESSAGE_UPDATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Widget $widget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Widget $widget)
    {
        try {
            $widget->delete();
            session()->flash('success', Helper::MESSAGE_DESTROY_SUCCESS);
        } catch (\Exception $exception) {
            session()->flash('success', Helper::MESSAGE_DESTROY_INSUCCESS);
        }
        return redirect()->route('admin.widgets.index');
    }
}
