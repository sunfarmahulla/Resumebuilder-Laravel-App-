<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\refrence;
use DB;

class RefrenceController extends Controller
{
    //

    public function InsertRefrence(Request $request, $id)
    {
    	 $this->validate($request, [
                'name'   => 'required',
                
            ]);

                    $contact = new refrence;

                    $contact->user_id =$id;
                    $contact->ref_name = $request->input('name');
                    $contact->relationship = $request->input('relationship');
                    $contact->ref_phone= $request->input('phone');
                    $contact->company =$request->input('CompanyName');
                    $contact->ref_email = $request->input('email');
                    $contact->ref_address = $request->input('address');
			        if( $contact->save()==true){
			            return redirect()->back()->with('success','successfully add Refrence');
			        }else
			        {
			          return redirect()->back()->with('success','Fail');  
			        }
    }

    public function showRefrence($id)
    {
    	$fetchLang = DB::select('select* from refrence where user_id = ?',[$id]);
        return view('refrence',['fetchLang'=>$fetchLang]);
    }

    public function editRefrence(Request $request, $id)
    {
                    $id11=$request->input('id');
                    $name= $request->input('name');
                    $relationship= $request->input('relationship');
                    $phone= $request->input('phone');
                    $company=$request->input('CompanyName');
                    $email= $request->input('email');
                    $address= $request->input('address');

                   if( $update=DB::update('update refrence set ref_name = ? , relationship = ? , ref_phone = ?,company= ?,ref_email= ?,ref_address=? where id = ?',[$name,$relationship,$phone,$company,$email,$address,$id11])==true){
                   return redirect()->back()->with('success','successfully Update  Details');
                    }else
                    {
                      return redirect()->back()->with('success','Fail');  
                    }

    }
}
