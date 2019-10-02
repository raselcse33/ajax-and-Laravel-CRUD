<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\second;
use App\Thirt;

class ContactController extends Controller
{
    public function createContact(){
       
        return view('contact');
    }

    public function storeContact(Request $request){
      $contact = new Contact();
      $contact->name = $request->name;
      $contact->phone = $request->phone;
      $contact->email = $request->email;
      $contact->save();
      return response()->json($contact);
    }

    public function result($id){
      $datas = [];
      
       $all = second::Where('first_id',$id)->get();
       foreach($all as $list){
         $d = [];

         $ref_id = $list->ref_code;
         $v = Thirt::Where('ref_code',$ref_id)->get();
         $d['ref_code'] = $ref_id;
         $d['coutn'] = count($v);
         $datas[] = $d;
        
       }
      
      return view('result', compact('datas'));
    }
}
