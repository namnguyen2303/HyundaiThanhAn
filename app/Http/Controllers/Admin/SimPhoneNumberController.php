<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Helper;
use App\SimPhoneNumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SimPhoneNumberController extends Controller
{
    private $sim;
    private $viewPath;

    public function __construct(SimPhoneNumber $sim)
    {
        $this->sim = $sim;
        $this->viewPath = Helper::BASE_PATH_ADMIN .$this->sim->getTable() . DIRECTORY_SEPARATOR;
    }

    public function statistics()
    {
        $countTotalSim = $this->sim->countTotalSim();
        $countSimActive = $this->sim->countSimActive();
        $countSimTop = $this->sim->countSimTop();
        $countSimHot = $this->sim->countSimHot();
        $countSimNew = $this->sim->countSimNew();
        $top20Views = $this->sim->getTop20Views();

        $title = 'Thống kê SIM!';

        return view($this->viewPath . __FUNCTION__,
            compact('countTotalSim', 'countSimActive',
                'countSimTop', 'countSimHot', 'countSimNew',
                'top20Views', 'title'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->sim->getAll();

        $title = 'Danh sách SIM!';

        return view($this->viewPath . __FUNCTION__, compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới SIM!';

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
            $this->sim->fill($request->all());
            $this->sim->save();

            return back()->with('success', Helper::MESSAGE_CREATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SimPhoneNumber $sim
     * @return \Illuminate\Http\Response
     */
    public function edit(SimPhoneNumber $sim)
    {
        $title = 'Cập nhật thông tin SIM!';

        return view($this->viewPath . __FUNCTION__, compact('sim', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  SimPhoneNumber $sim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimPhoneNumber $sim)
    {
        try {
            $critidential = $request->all();
            $critidential['is_active'] = $request->is_active ?? '';
            $critidential['is_hot'] = $request->is_hot ?? '';
            $critidential['is_top'] = $request->is_top ?? '';
            $critidential['is_new'] = $request->is_new ?? '';

            $sim->update($critidential);
            return back()->with('success', Helper::MESSAGE_UPDATE_SUCCESS);
        } catch (\Exception $exception) {
            return back()->with('danger', $exception->getMessage());
        }
    }
}
