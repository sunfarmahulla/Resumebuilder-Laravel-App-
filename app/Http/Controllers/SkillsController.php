<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skills;
use DB;

class SkillsController extends Controller
{
    //
    public function skillAdded(Request $request, $id){

     $this->validate($request, [
                'user_id'   => 'unique:summery',
                
            ]);
   		      $contact = new skills;

                    $contact->user_id =$id;
                    $contact->subject= $request->input('subject');
                    $contact->sk_type = $request->input('type');
                    $contact->sk_percentage = $request->input('percentage');
                    
                   if( $contact->save()==true){
			            return redirect()->back()->with('success','successfully skills added');
			        }else
			        {
			          	return redirect()->back()->with('success','Fail');  
			        }
    }
      
      public function ShowSkills($id)
      {

    	$fetchSkills = DB::select('select* from professional_skills where user_id = ?',[$id]);
        return view('skills',['fetchSkills'=>$fetchSkills]);
      }        

      public function skillUpdate(Request $request,$id)
      {
            $id1= $request->input('id');
            $subject= $request->input('subject');
            $type= $request->input('type');
            $percentage= $request->input('percentage');
           

           if( $update=DB::update('update professional_skills set subject = ?,sk_type= ?,sk_percentage= ?  where id = ?',[$subject,$type,$percentage,$id1])==true)
            {
            return redirect()->back()->with('success',"Successfully Update data");
          }else{
            return redirect()->back()->with('success',"fails");
          }

      }

      Public function deleteSkills($id)
      {
        $delete = DB::delete('delete from professional_skills where id = ?',[$id]);
        return redirect()->back()->with('success','Successfully delete');  
      }
}
