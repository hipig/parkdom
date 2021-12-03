<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::query()->paginate();

        return view('admin.contacts.index', compact('contacts'));
    }
}
