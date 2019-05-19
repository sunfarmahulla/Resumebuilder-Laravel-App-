<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\language;
use DB;

class LanguageController extends Controller
{
   public function LanguageAdd(Request $request,$id)
   {
   		 $this->validate($request, [
                'user_id'   => 'unique:summery',
                
            ]);
   		      $contact = new language;

                    $contact->user_id =$id;
                    $contact->language= $request->input('language');
                    $contact->la_type = $request->input('type');
                    $contact->la_percentage = $request->input('percentage');
                    
                   if( $contact->save()==true){
			            return redirect()->back()->with('success','successfully language added');
			        }else
			        {
			          	return redirect()->back()->with('success','Fail');  
			        }
   }

   public function selectLanguage($id)
   {
   	$fetchLang = DB::select('select* from language where user_id = ?',[$id]);
        return view('language',['fetchLang'=>$fetchLang]);
   }

   public function languageUpdate(Request $request,$id)
      {
            $id1= $request->input('id');
            $subject= $request->input('language');
            $type= $request->input('type');
            $percentage= $request->input('percentage');
           

           if( $update=DB::update('update language set language = ?, la_type= ?,la_percentage= ?  where id = ?',[$subject,$type,$percentage,$id1])==true)
            {
            return redirect()->back()->with('success',"Successfully Update data");
          }else{
            return redirect()->back()->with('success',"fails");
          }

      }

      Public function deletelang($id)
      {
        $delete = DB::delete('delete from language where id = ?',[$id]);
        return redirect()->back()->with('success','Successfully delete');  
      }
}
