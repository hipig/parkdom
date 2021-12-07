<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageRequest;
use App\ModelFilters\Admin\LanguageFilter;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function index(Request $request)
    {
        $languages = Language::filter($request->all(), LanguageFilter::class)->latest()->paginate();
        return view('admin.languages.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(LanguageRequest $request)
    {
        try {
            $language = Language::create($request->only([
                'name',
                'code',
                'direction',
            ]));
            $language->setDefault($request->filled('default'));


        } catch (\Exception $e) {

        }

        return redirect()->route('admin.languages.index')->with('success', '语言添加成功！');
    }
}
