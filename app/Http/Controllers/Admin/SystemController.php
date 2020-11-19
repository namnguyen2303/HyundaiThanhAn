<?php

namespace App\Http\Controllers\Admin;

use App\ConfigGeneral;
use App\ConfigSeoPage;
use App\Http\Controllers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SystemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function configSeoPage(Request $request)
    {
        if ($request->post()) {

            $cridential = $request->all();
            unset($cridential['_token']);
            unset($cridential['page']);

            /** @var ConfigSeoPage $model */
            try {
                ConfigSeoPage::where(['page' => $request->page])->update($cridential);
                session()->flash('success', Helper::MESSAGE_UPDATE_SUCCESS);
            } catch (\Exception $exception) {
                session()->flash('danger', $exception->getMessage());
            }

            Cache::forget('congfig-general');
            return back();
        }

        // $title = 'Cấu hình SEO Page!';

        $data = ConfigSeoPage::getData();

        if (!$data->count()) {
            $data = function () {
                $temp = [];
                foreach (array_keys(Helper::seoPages()) as $seoPage) {
                    $temp[] = [
                        'page' => $seoPage
                    ];
                }
                return $temp;
            };

            ConfigSeoPage::insert($data());
        }

        return view('admin.system.configSeoPage', compact('data', 'title'));
    }

    public function ajaxLoadDataSEOPage($page)
    {
        $data = ConfigSeoPage::where('page', $page)->first();
        return response()->json($data);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function configGeneral(Request $request)
    {
        // $title = 'Cấu hình chung!';

        /** @var ConfigGeneral $model */
        $model = ConfigGeneral::firstOrCreate(['id' => 1]);

        if ($request->post()) {
            $model->fill($request->all());

            $flag = $model->save();

            Cache::forget('config-seo-page');

            if ($flag) {
                session()->flash('success', Helper::MESSAGE_UPDATE_SUCCESS);
            } else {
                session()->flash('danger', $exception->getMessage());
            }
        }

        return view('admin.system.configGeneral', compact('model', 'title'));
    }
}
