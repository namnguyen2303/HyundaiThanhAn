<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Helper;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    private $page;
    private $viewPath;

    public function __construct(Page $page)
    {
        $this->page = $page;
        $this->viewPath = Helper::BASE_PATH_ADMIN .$this->page->getTable() . DIRECTORY_SEPARATOR;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->page->getAll();

        $title = 'Danh sách Page!';

        return view($this->viewPath . __FUNCTION__, compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tạo mới Page!';

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
            $this->page->create($request->all());
            return back()->with('success', Helper::MESSAGE_CREATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $title = 'Cập nhật thông tin Page!';

        return view($this->viewPath . __FUNCTION__, compact('page', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        try {
            $critidential = $request->all();
            $critidential['is_active'] = $request->is_active ?? '';

            $page->update($critidential);
            return back()->with('success', Helper::MESSAGE_UPDATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        try {
            $page->delete();
            session()->flash('success', Helper::MESSAGE_DESTROY_SUCCESS);
        } catch (\Exception $exception) {
            session()->flash('success', Helper::MESSAGE_DESTROY_INSUCCESS);
        }
        return redirect()->route('admin.pages.index');
    }
}
