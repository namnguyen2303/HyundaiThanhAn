<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Helper;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    private $post;
    private $viewPath;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->viewPath = Helper::BASE_PATH_ADMIN .$this->post->getTable() . DIRECTORY_SEPARATOR;
    }

    public function statistics()
    {
        $countTotalPost = $this->post->countTotalPost();
        $countPostActive = $this->post->countPostActive();
        $countPostTop = $this->post->countPostTop();
        $countPostHot = $this->post->countPostHot();
        $countPostNew = $this->post->countPostNew();
        $top20Views = $this->post->getTop20Views();

        $title = 'Thống kê bài viết!';

        return view($this->viewPath . __FUNCTION__,
            compact('countTotalPost', 'countPostActive',
                'countPostTop', 'countPostHot', 'countPostNew',
                'top20Views', 'title'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->post->getAll();

        $title = 'Danh sách bài viết!';

        return view($this->viewPath . __FUNCTION__, compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới bài viết!';

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
            $this->post->create($request->all());
            return back()->with('success', Helper::MESSAGE_CREATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $title = 'Cập nhật thông tin bài viết!';

        return view($this->viewPath . __FUNCTION__, compact('post', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        try {

            $critidential = $request->all();
            $critidential['is_active'] = $request->is_active ?? '';
            $critidential['is_hot'] = $request->is_hot ?? '';
            $critidential['is_top'] = $request->is_top ?? '';
            $critidential['is_new'] = $request->is_new ?? '';

            $post->update($critidential);
            return back()->with('success', Helper::MESSAGE_UPDATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            session()->flash('success', Helper::MESSAGE_DESTROY_SUCCESS);
        } catch (\Exception $exception) {
            session()->flash('success', Helper::MESSAGE_DESTROY_INSUCCESS);
        }
        return redirect()->route('admin.posts.index');
    }
}
