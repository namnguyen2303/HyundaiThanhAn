<?php

namespace App\Http\Controllers\Admin;

use App\Collection;
use App\Http\Controllers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CollectionController extends Controller
{
    private $collection;
    private $viewPath;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
        $this->viewPath = Helper::BASE_PATH_ADMIN .$this->collection->getTable() . DIRECTORY_SEPARATOR;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->collection->getAll();

        $title = 'Cập nhật thông tin collection!';

        return view($this->viewPath . __FUNCTION__, compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'Cập nhật thông tin collection!';

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
        $validator = Validator::make($request->all(), [
            'key_collection' => 'required|unique:collections,key_collection'
        ], [
            'unique' => 'Đã có nội dung của key ' . Helper::COLLECTION_KEY[$request->key_collection]
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors()->first('key_collection'));
        }

        try {
            $this->collection->create($request->all());
            return back()->with('success', Helper::MESSAGE_CREATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Collection $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {

        $title = 'Cập nhật thông tin collection!';

        return view($this->viewPath . __FUNCTION__, compact('collection', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Collection $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        try {
            $critidential = $request->all();
            $critidential['is_active'] = $request->is_active ?? '';

            $collection->update($critidential);
            return back()->with('success', Helper::MESSAGE_UPDATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Collection $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        try {
            $collection->delete();
            session()->flash('success', Helper::MESSAGE_DESTROY_SUCCESS);
        } catch (\Exception $exception) {
            session()->flash('success', Helper::MESSAGE_DESTROY_INSUCCESS);
        }
        return redirect()->route('admin.collections.index');
    }
}
