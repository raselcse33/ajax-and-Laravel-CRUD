<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function createContact(){
        $data['lists'] = Contact::all();
        return view('contact',$data);
    }

    public function storeContact(Request $request){
      $contact = new Contact();
      $contact->name = $request->name;
      $contact->phone = $request->phone;
      $contact->email = $request->email;
      $contact->save();
      return response()->json($contact);
    }
}
