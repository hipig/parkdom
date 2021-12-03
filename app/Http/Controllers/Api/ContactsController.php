<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->only([
            'name',
            'email',
            'content'
        ]));

        return ContactResource::make($contact);
    }
}
