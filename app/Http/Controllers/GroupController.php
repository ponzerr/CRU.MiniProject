<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;

class GroupController extends Controller
{
    public function index(){
        $groups = Group::all(); // Fetch all items from the database

        return view('admin.crops.groups.item_group_table', ['groups' => $groups]);
    }
    
    public function create(){
        return view('admin.crops.groups.item_group_create');
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'item_group_code' => 'required|string',
            'item_group_desc' => 'required|string',
        ]);

        $group = auth()->user()->groups()->create($inputs);
        return redirect()->route('items_group.table')->with('success', 'Item created successfully!');
    }

    public function edit(Group $group){

        return view('admin.crops.groups.item_group_edit', compact('group'));
        
    }

    public function update(Group $group, Request $request)
    {
        $inputs = $request->validate([
            'item_group_code' => 'required|string',
            'item_group_desc' => 'required|string',
        ]);

        $group->update($inputs);
        return redirect()->route('items_group.table')->with('success', 'Group updated successfully!');
    }

}
