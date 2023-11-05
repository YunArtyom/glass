<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function contactsPage(): View
    {
        return view('pages/contact/contacts')->with(['contacts' => Contact::all()]);
    }

    public function editContactPage(Request $request): View
    {
        return view('pages/contact/edit-contact')->with(['contact' => Contact::find($request->id)]);
    }

    public function editContact(ContactFormRequest $request): RedirectResponse
    {
        Contact::query()->where('key', '=', $request->key)->update(['value' => $request->value]);
        return redirect()->route('contactsPage')->with(['contacts' => Contact::all()]);
    }
}
