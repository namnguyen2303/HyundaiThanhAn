<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Helper;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    private $slide;
    private $viewPath;

    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
        $this->viewPath = Helper::BASE_PATH_ADMIN .$this->slide->getTable() . DIRECTORY_SEPARATOR;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->slide->getAll();
        // dd($data);
        $title = 'Danh sách slide!';
        return view($this->viewPath . __FUNCTION__, compact('data', 'title'));
        // return view('client.index', compact('data', 'title'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới slide!';

        return view($this->viewPath . __FUNCTION__, compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->slide->create($request->all());
            return back()->with('success', Helper::MESSAGE_CREATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slide $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        $title = 'Cập nhật thông tin slide!';

        return view($this->viewPath . __FUNCTION__, compact('slide', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Slide $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        try {
            $critidential = $request->all();
            $critidential['is_active'] = $request->is_active ?? '';

            $slide->update($critidential);
            return back()->with('success', Helper::MESSAGE_UPDATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slide $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        try {
            $slide->delete();
            session()->flash('success', Helper::MESSAGE_DESTROY_SUCCESS);
        } catch (\Exception $exception) {
            session()->flash('success', Helper::MESSAGE_DESTROY_INSUCCESS);
        }
        return redirect()->route('admin.slides.index');
    }
}
