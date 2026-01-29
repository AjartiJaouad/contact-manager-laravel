<?php

namespace App\Http\Controllers;

use App\Modesls\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('group')->get();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $groups = Group::all();

        return view('contacts.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'group_id' => 'required|exists:groups,id',

        ]);
     
    }
}
