<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    public function index(Request $request)
    {
        $themes = \Theme::all();
        return view('admin.themes.index', compact('themes'));
    }
}
