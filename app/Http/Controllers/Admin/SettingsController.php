<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MailSettingRequest;
use App\Http\Requests\Admin\MailTestSendRequest;
use App\Http\Requests\Admin\OfferSettingRequest;
use App\Mail\TestSend;
use App\Settings\ContactSetting;
use App\Settings\DomainSetting;
use App\Settings\GeneralSetting;
use App\Settings\MailSetting;
use App\Settings\OfferSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        dd($request->all());
        $setting->fill($request->only([
            'currency',
            'allow_offer',
            'min_price'
        ]));
        $setting->save();

        return back()->with('success', '修改域名设置成功！');
    }

    public function editOffer(OfferSetting $setting, MailSetting $mailSetting)
    {
        $disableInput = empty($mailSetting->username ?? $mailSetting->address );
        return view('admin.settings.offer', compact('setting', 'disableInput'));
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

        return back()->with('success', '修改邮箱设置成功！');
    }

    public function sendTestMail(MailTestSendRequest $request)
    {
        $email = $request->email;

        Mail::to($email)->send(new TestSend());

        return back()->with('success', "发送测试邮件成功，请进入 {$email} 邮箱内查看");
    }

    public function editContact(ContactSetting $setting)
    {
        return view('admin.settings.contact', compact('setting'));
    }

    public function updateContact(Request $request, ContactSetting $setting)
    {
        $setting->fill($request->only([
            'phone',
            'email',
            'facebook',
            'twitter',
            'vk',
            'skype',
            'whatsapp',
        ]));
        $setting->save();

        return back()->with('success', '修改联系方式设置成功！');
    }
}
