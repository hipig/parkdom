<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DomainCategoryRequest;
use App\ModelFilters\Admin\DomainCategoryFilter;
use App\Models\DomainCategory;
use Illuminate\Http\Request;

class DomainCategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = DomainCategory::filter($request->all(), DomainCategoryFilter::class)->paginate();

        return view('admin.domain-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.domain-categories.create');
    }

    public function store(DomainCategoryRequest $request)
    {
        DomainCategory::create($request->only([
            'name',
            'icon',
            'status'
        ]));

        return redirect()->route('admin.domainCategories.index')->with('success', '域名分类添加成功！');
    }

    public function edit(DomainCategory $category)
    {
        return view('admin.domain-categories.edit', compact('category'));
    }

    public function update(DomainCategoryRequest $request, DomainCategory $category)
    {
        $category->fill($request->only([
            'name',
            'icon',
            'status'
        ]));
        $category->save();

        return back()->with('success', '域名分类编辑成功！');
    }

    public function destroy(DomainCategory $category)
    {
        $category->delete();

        return back()->with('success', '币种删除成功！');
    }
}
