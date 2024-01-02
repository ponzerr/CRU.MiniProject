<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Group;

class ItemController extends Controller
{
    public function index(Request $request){

        // Fetch all items from the database
        $query = Item::orderBy('created_at', 'DESC');

        // Check if a search query is provided
        $searchQuery = $request->input('search');

        // Apply search filter if a query is provided
        if ($searchQuery) {
            $query->where('item_code', 'like', '%' . $searchQuery . '%')
                ->orWhere('item_desc', 'like', '%' . $searchQuery . '%')
                ->orWhere('item_group', 'like', '%' . $searchQuery . '%')
                ->orWhere('item_price', 'like', '%' . $searchQuery . '%');
        }

        // Paginate the results
        $items = $query->paginate(10); // Paginate with 10 items per page

        return view('admin.crops.item_table', compact('items'));
    }

    public function search(Request $request)
    {
        // Redirect to the index method with the search query
        return $this->index($request);
    }

    public function create(){
        
        $groups = Group::pluck('item_group_code', 'id');
        return view('admin.crops.item_create', compact('groups'));
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'item_code' => 'required|string',
            'item_desc' => 'required|string',
            'item_price' => 'required|numeric',
            'item_group' => 'required|exists:groups,id',
        ]);

        auth()->user()->items()->create($inputs);
        return redirect()->route('items.table')->with('success', 'Item created successfully!');
    }

    public function edit(Item $item){

        $groups = Group::pluck('item_group_code', 'id');
        return view('admin.crops.item_edit', ['item' => $item, 'groups' => $groups]);

    }

    public function update(Item $item, Request $request)
    {
        $inputs = $request->validate([
            'item_code' => 'required|string',
            'item_desc' => 'required|string',
            'item_price' => 'required|numeric',
            'item_group' => 'required|exists:groups,id',
        ]);

        $item->update($inputs);
        return redirect()->route('items.table')->with('success', 'Item updated successfully!');
    }


    
}
