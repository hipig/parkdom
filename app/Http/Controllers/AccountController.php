<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSecurityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('account.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->fill($request->only([
            'name',
            'email',
            'timezone'
        ]));
        $user->save();

        return back()->with('success', __(':name saved successfully.', ['name' => 'Profile']));
    }

    public function security()
    {
        return view('account.security');
    }

    public function updateSecurity(UpdateSecurityRequest $request)
    {
        $user = Auth::user();
        $user->password = $request->password;
        $user->save();

        return back()->with('success', __(':name saved successfully.', ['name' => 'Security']));
    }
}
