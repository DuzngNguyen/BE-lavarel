<?php

namespace TrungPhuNA\Admin\Http\Controllers\Setting;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Admin\Http\Requests\AdminSlideRequest;
use TrungPhuNA\Setting\Entities\SettingSlide;

class AdminSlideController extends Controller
{
    public function index()
    {
        $slides = SettingSlide::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'slides' => $slides
        ];

        return view('admin::pages.setting.slide.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.setting.slide.create');
    }

    public function store(AdminSlideRequest $request)
    {
        try {

            $data = $request->except('_token');
            if ($request->s_banner) {
                $image = upload_image('s_banner');
                if ($image['code'] == 1)
                    $data['s_banner'] = $image['name'];
            }
            $slide = SettingSlide::create($data);

            return redirect()->route('get_admin.slide.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $slide    = SettingSlide::find($id);
        $viewData = [
            'slide' => $slide
        ];

        return view('admin::pages.setting.slide.update', $viewData);
    }

    public function update(AdminSlideRequest $request, $id)
    {
        try {

            $data = $request->except('_token');
            if ($request->s_banner) {
                $image = upload_image('s_banner');
                if ($image['code'] == 1)
                    $data['s_banner'] = $image['name'];
            }
            $slide = SettingSlide::find($id)->update($data);

            return redirect()->route('get_admin.slide.index');
        } catch (\Exception $exception) {
            Log::error("[Error: ] Line - " . $exception->getLine() . " Messages: " . $exception->getMessage());
        }

        return redirect()->back();

    }


    public function delete($id)
    {

    }
}
