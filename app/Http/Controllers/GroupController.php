<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Http\Controllers;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $group = new Group();
        $group->name = $request->name;
        $group->save();

        return redirect()->route('groups.index');
    }
}
