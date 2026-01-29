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

    
}
