<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\second;
use App\Thirt;
use App\Name;

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

    public function multiple()
    {
      return view('multiple');
    }

    public function insert(Request $request)
    {
      $name = $request->name;
      $des = $request->des;
      
      foreach($name as $key => $no)
      {
          $input['name'] = $name[$key];
          $input['des'] = $des[$key];
      
          Name::create($input);
      
      }
    
       return response()->json($input);
    }
}
