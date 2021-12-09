<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DomainSettingRequest;
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

        return back()->with('success', __(':name setting saved successfully.', ['name' => __('General')]));
    }

    public function editDomain(DomainSetting $setting)
    {
        return view('admin.settings.domain', compact('setting'));
    }

    public function updateDomain(DomainSettingRequest $request, DomainSetting $setting)
    {
        $setting->fill($request->only([
            'currency',
            'allow_offer',
            'min_price',
            'buy_links',
        ]));
        $setting->save();

        return back()->with('success', __(':name setting saved successfully.', ['name' => __('Domain')]));
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

        return back()->with('success', __(':name setting saved successfully.', ['name' => __('Offer')]));
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

        return back()->with('success', __(':name setting saved successfully.', ['name' => __('Mail')]));
    }

    public function sendTestMail(MailTestSendRequest $request)
    {
        $email = $request->email;

        Mail::to($email)->send(new TestSend());

        return back()->with('success', __('The test email sent successfully, please enter the :email mailbox to view', ['email' => $email]));
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

        return back()->with('success', __(':name setting saved successfully.', ['name' => __('Social')]));
    }
}
