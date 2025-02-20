<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }


    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        // Validasi input, menambahkan deskripsi
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'nullable|string',  // Validasi untuk description
        ], [
            'name.required' => 'Name is required.',
            'price.required' => 'Price is required.',
            'price.integer' => 'Price must be a number.',
            'description.string' => 'Description must be a valid string.',
        ]);

        // Simpan item termasuk deskripsi
        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        // Validasi input saat update, menambahkan deskripsi
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'nullable|string',  // Validasi untuk description
        ], [
            'name.required' => 'Name is required.',
            'price.required' => 'Price is required.',
            'price.integer' => 'Price must be a number.',
            'description.string' => 'Description must be a valid string.',
        ]);

        // Update item termasuk deskripsi
        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
