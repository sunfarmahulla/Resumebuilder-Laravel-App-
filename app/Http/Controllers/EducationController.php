<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\education;
use DB;
class EducationController extends Controller
{
    
	public function InsertEducation(Request $request, $id)
	{
		$this->validate($request, [
                'qualification'=> 'required',
                
            ]);

                    $contact = new education;

                    $contact->user_id =$id;
                    $contact->qualification= $request->input('qualification');
                    $contact->SchoolName = $request->input('school');
                    $contact->completeEdu= $request->input('completeEdu');
                    $contact->edu_year=$request->input('year');
                    $contact->edu_percentage = $request->input('percentage');
                    
                   if( $contact->save()==true){
			         return redirect()->back()->with('success','successfully add contact');
			        }else
			        {
			          return redirect()->back()->with('success','Fail');  
			        }

	}




    public function selectEducation($id)
    {
    	$fetchEducation = DB::select('select* from education where user_id = ?',[$id]);
        return view('education',['fetchEducation'=>$fetchEducation]);

    }

    public function editEducation(Request $request,$id)
    {               
                    $id11=$request->input('id12');
                    $qualification= $request->input('qualification');
                    $school = $request->input('school');
                    $completeEdu= $request->input('completeEdu');
                    $year=$request->input('year');
                    $percentage= $request->input('percentage');
                   if( $delete=DB::update('update education set qualification = ? , SchoolName = ? , completeEdu = ?, edu_year= ?, edu_percentage= ? where id = ?',[$qualification,$school,$completeEdu,$year,$percentage,$id11])==true){
                   return redirect()->back()->with('success','successfully Update Education Details');
                    }else
                    {
                      return redirect()->back()->with('success','Fail');  
                    }
    }

    public function deleteEducation(Request $request, $id)
    {
         $id1=$request->input('id');
        DB::Delete('delete from education where id = ?',[$id1]);
        return redirect()->back()->with('success','successfully delete');

    }
}
