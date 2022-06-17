<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        Category::create($data);
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $item = Category::findOrFail($id);
        return view('pages.category.edit', [
            'item' => $item
        ]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();

        $item = Category::findOrFail($id);
        $item->update($data);
        return redirect()->route('category.index');
    }
    public function destroy($id)
    {
        $item = Category::findOrFail($id);

        $item->delete();
        return redirect()->route('category.index');
    }
}
