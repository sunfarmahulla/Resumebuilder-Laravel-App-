<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use DB;

class ContactController extends Controller
{
    public function Contact_Detail(Request $request,$id)
    {
              
         $this->validate($request, [
                'first_name'   => 'required',
                
            ]);

                    $contact = new Contact;

                    $contact->user_id =$id;
                    $contact->firstName = $request->input('first_name');
                    $contact->MiddleName = $request->input('middle_name');
                    $contact->endName= $request->input('last_name');
                    $contact->email =$request->input('email');
                    $contact->Phone = $request->input('phone');
                    $contact->Address = $request->input('address');
                    $contact->state =$request->input('state');
                    $contact->city = $request->input('city');
                    $contact->zip = $request->input('zip');
                    $contact->country = $request->input('country');
                   if( $contact->save()==true){
            return redirect()->back()->with('success','successfully add contact');
        }else
        {
          return redirect()->back()->with('success','Fail');  
        }
    }
    
    public function selectContact($id)
    {
        $fetchContact = DB::select('select* from contact where user_id = ?',[$id]);
        return view('home',['fetchContact'=>$fetchContact]);
    }

    public function editContact(Request $request,$id)
        {
         
                    $contact=Contact::find($id);

                    $contact->user_id =$id;
                    $contact->firstName = $request->input('first_name');
                    $contact->MiddleName = $request->input('middle_name');
                    $contact->endName= $request->input('last_name');
                    $contact->email =$request->input('email');
                    $contact->Phone = $request->input('phone');
                    $contact->Address = $request->input('address');
                    $contact->state =$request->input('state');
                    $contact->city = $request->input('city');
                    $contact->zip = $request->input('zip');
                    $contact->country = $request->input('country');
                   if( $contact->save()==true){
                   return redirect()->back()->with('success','successfully Update Contact Details');
                    }else
                    {
                      return redirect()->back()->with('errors','Fail');  
                    } 
        }
}
