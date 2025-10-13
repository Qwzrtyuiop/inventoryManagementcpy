<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Log;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->paginate(12);
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'stock'       => 'required|integer',
            'information' => 'nullable|string',
        ]);

        $item = Item::create($data);

        $batchId = now()->timestamp . rand(1000, 9999);

        Log::create([
            'item_id'            => $item->id,
            'item_name_snapshot' => $item->name,
            'action'             => 'Item created',
            'quantity'           => $item->stock,
            'batch_id'           => $batchId,
        ]);

        return redirect()->route('items.index')->with('success', 'Item created.');
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'stock'       => 'required|integer',
            'information' => 'nullable|string',
        ]);

        $oldStock       = $item->stock;
        $oldName        = $item->name;
        $oldCategoryId  = $item->category_id;
        $oldInformation = $item->information;

        $item->update($data);

        $batchId = now()->timestamp . rand(1000, 9999);

        $changesLogged = false;

        if ((int)$oldStock !== (int)$item->stock) {
            Log::create([
                'item_id'            => $item->id,
                'item_name_snapshot' => $item->name,
                'action'             => "Stock changed from {$oldStock} to {$item->stock}",
                'quantity'           => $item->stock - $oldStock,
                'batch_id'           => $batchId,
            ]);
            $changesLogged = true;
        }

        if ($oldName !== $item->name) {
            Log::create([
                'item_id'            => $item->id,
                'item_name_snapshot' => $item->name,
                'action'             => "Name changed from '{$oldName}' to '{$item->name}'",
                'quantity'           => 0,
                'batch_id'           => $batchId,
            ]);
            $changesLogged = true;
        }

        if ($oldCategoryId !== $item->category_id) {
            $oldCategory = Category::find($oldCategoryId);
            $newCategory = Category::find($item->category_id);
            if ($oldCategory && $newCategory && $oldCategory->name !== $newCategory->name) {
                Log::create([
                    'item_id'            => $item->id,
                    'item_name_snapshot' => $item->name,
                    'action'             => "Category changed from '{$oldCategory->name}' to '{$newCategory->name}'",
                    'quantity'           => 0,
                    'batch_id'           => $batchId,
                ]);
                $changesLogged = true;
            }
        }

        if ($oldInformation !== $item->information) {
            Log::create([
                'item_id'            => $item->id,
                'item_name_snapshot' => $item->name,
                'action'             => "Information changed",
                'quantity'           => 0,
                'batch_id'           => $batchId,
            ]);
            $changesLogged = true;
        }

        if (!$changesLogged) {
            Log::create([
                'item_id'            => $item->id,
                'item_name_snapshot' => $item->name,
                'action'             => "No changes",
                'quantity'           => 0,
                'batch_id'           => $batchId,
            ]);
        }

        return redirect()->route('items.index')->with('success', 'Item updated.');
    }

    public function destroy(Item $item)
    {
        $batchId = now()->timestamp . rand(1000, 9999);

        Log::create([
            'item_id'            => $item->id,
            'item_name_snapshot' => $item->name,
            'action'             => 'Item removed',
            'batch_id'           => $batchId,
            'quantity'           => 0,
        ]);

        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted.');
    }
}
