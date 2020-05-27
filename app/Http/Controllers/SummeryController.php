<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\summery;
use DB;

class SummeryController extends Controller
{
    public function summeryDetails(Request $request,$id)
   {

            $this->validate($request, [
                'user_id'   => 'unique:summery', 'max:500',
                
            ]);
   		      $contact = new summery;

                    $contact->user_id =$id;
                    $contact->summery  = $request->input('Sum');
                    
                   if( $contact->save()==true){
			            return redirect()->back()->with('success','successfully summary added');
			        }else
			        {
			          	return redirect()->back()->with('success','Fail');  
			        }
              //return view('summery');

   }

   public function selectSummery($id)
   {
    $fetchSummery = DB::select('select* from summery where user_id = ?',[$id]);
        return view('summery',['fetchSummery'=>$fetchSummery]);
   }

   public function updateSummary( Request $request,$id)
   {
                    $contact=summery::find($id);

                    $contact->user_id =$id;
                    $contact->summery = $request->input('Summ');
                      if( $contact->save()==true){
                   return redirect()->back()->with('success','successfully Update Contact Details');
                    }else
                    {
                      return redirect()->back()->with('errors','Fail');  
                    } 
   }
}
