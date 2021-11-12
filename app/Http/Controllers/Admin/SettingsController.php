<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function editGeneral(GeneralSetting $setting)
    {
        return view('admin.settings.general', compact('setting'));
    }

    public function updateGeneral(Request $request, GeneralSetting $setting)
    {
        $setting->fill($request->only([
            'site_name',
            'site_keywords',
            'site_description'
        ]));
        $setting->save();

        return back()->with('success', '修改基础设置成功！');
    }
}
