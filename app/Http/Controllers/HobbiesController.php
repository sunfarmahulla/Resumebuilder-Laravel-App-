<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hobbies;
use DB;
class HobbiesController extends Controller
{
    //
    public function addHobbies(Request $request, $id)
    {
    	$this->validate($request, [
                'user_id'   => 'unique:summery',
                
            ]);
   		      $contact = new hobbies;

                    $contact->user_id = $id;
                    $contact->Hobbies = $request->input('hobby');
                    
                   if( $contact->save()==true){
			            return redirect()->back()->with('success','successfully summary added');
			        }else
			        {
			          	return redirect()->back()->with('success','Fail');  
			        }
    }

    public function selectHobbies($id)
    {
    	$fetchHobby = DB::select('select* from _hobbies where user_id = ?',[$id]);
        return view('hobbies',['fetchHobby'=>$fetchHobby]);
    }

    public function editHobby( Request $request,$id)
    {
            $id= $request->input('id');

            $hobby= $request->input('hobby1');
           

            DB::connection('mysql')->update('update _hobbies set Hobbies = ?  where id = ?',[$hobby,$id]);
            
            return redirect()->back()->with('success',"Successfully Update data");


    }
}
