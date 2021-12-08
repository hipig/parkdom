<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateLanguageRequest;
use App\ModelFilters\Admin\LanguageFilter;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function store(CreateLanguageRequest $request)
    {
        $file = File::get($request->file('language'));
        $languageData = json_decode($file);

        try {
            $language = Language::updateOrCreate(['code' => $languageData->lang_code], ['name' => $languageData->lang_name, 'direction' => $languageData->lang_direction ?? 'ltr']);
            $language->setDefault($request->filled('default'));

            Storage::disk('languages')->put($languageData->lang_code . '.json', $file);
        } catch (\Exception $e) {

        }

        return redirect()->route('admin.languages.index')->with('success', __(':name language uploaded.', ['name' => $languageData->lang_name]));
    }

    public function edit(Language $language)
    {
        return view('admin.languages.edit', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        $language->setDefault($request->filled('default'));

        return back()->with('success', __(':name saved successfully.', ['name' => $language->name . ' language']));
    }

    public function destroy(Language $language)
    {
        $language->delete();

        return back()->with('success', __('The :name has been deleted.', ['name' => 'language']));
    }

    public function download()
    {
        return response()->download(resource_path('lang/en.json'));
    }
}
