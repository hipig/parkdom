<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = Auth::user();
        $user->fill($request->only('name'));

        if ($request->has('password')) {
            $user->password = $request->input('password');
        }
        $user->save();

        return back()->with('success', '更新个人资料成功！');
    }
}
