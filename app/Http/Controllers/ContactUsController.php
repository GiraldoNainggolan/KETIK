<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        return view('Pages.contact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'YourName' => 'required|string',
            'YourEmail' => 'nullable|email',
            'YourMessage' => 'nullable|string',
        ]);
    
        ContactUs::create($validatedData);
    
        return redirect()->back()->with('success', 'Data berhasil dikirim');
    }

    public function index_admin(){
        $messages = ContactUs::paginate(10);

        return view('admin.contact.index', [
            'messages' => $messages,
        ]);
    }

    public function destroy(ContactUs $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index');
    }
}
