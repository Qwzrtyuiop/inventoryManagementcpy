<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(12);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($data);

        $batchId = now()->timestamp . rand(1000, 9999);

        Log::create([
            'item_id'            => null,
            'item_name_snapshot' => $category->name,
            'action'             => "Category created: '{$category->name}'",
            'batch_id'           => $batchId,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $oldName = $category->name;

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($data);

        $batchId = now()->timestamp . rand(1000, 9999);

        if ($oldName !== $category->name) {
            Log::create([
                'item_id'            => null,
                'item_name_snapshot' => $category->name,
                'action'             => "Category renamed from '{$oldName}' to '{$category->name}'",
                'batch_id'           => $batchId,
            ]);
        }

        return redirect()->route('categories.index')->with('success', 'Category updated.');
    }

    public function destroy(Category $category)
    {
        $batchId = now()->timestamp . rand(1000, 9999);

        Log::create([
            'item_id'            => null,
            'item_name_snapshot' => $category->name,
            'action'             => "Category deleted: '{$category->name}'",
            'batch_id'           => $batchId,
        ]);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted.');
    }
}
