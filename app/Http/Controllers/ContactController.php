<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('group')->paginate(10);

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

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('sccesess', 'contact ajouté avec succés');
    }

    public function edit(Contact $contact)
    {
        $groups = Group::all();

        return view('contacts.edit', compact('contact', 'groups'));
    }

    public function update(Request $request, $contact)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'group_id' => 'required|exists:groups,id',
        ]);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact mis à jour avec succès !');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact supprimé avec succès !');
    }
}
