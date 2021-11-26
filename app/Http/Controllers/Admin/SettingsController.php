<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MailSettingRequest;
use App\Http\Requests\Admin\OfferSettingRequest;
use App\Settings\DomainSetting;
use App\Settings\GeneralSetting;
use App\Settings\MailSetting;
use App\Settings\OfferSetting;
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

    public function editDomain(DomainSetting $setting)
    {
        return view('admin.settings.domain', compact('setting'));
    }

    public function updateDomain(Request $request, DomainSetting $setting)
    {
        $setting->fill($request->only([
            'currency',
            'allow_offer',
            'min_price'
        ]));
        $setting->save();

        return back()->with('success', '修改域名设置成功！');
    }

    public function editOffer(OfferSetting $setting)
    {
        return view('admin.settings.offer', compact('setting'));
    }

    public function updateOffer(OfferSettingRequest $request, OfferSetting $setting)
    {
        $setting->fill($request->only([
            'captcha',
            'is_notify',
            'notify_email'
        ]));
        $setting->save();

        return back()->with('success', '修改报价设置成功！');
    }

    public function editMail(MailSetting $setting)
    {
        return view('admin.settings.mail', compact('setting'));
    }

    public function updateMail(MailSettingRequest $request, MailSetting $setting)
    {
        $setting->fill($request->only([
            'host',
            'port',
            'encryption',
            'username',
            'password',
            'address',
            'name',
        ]));
        $setting->save();

        return back()->with('success', '修改报价设置成功！');
    }
}
