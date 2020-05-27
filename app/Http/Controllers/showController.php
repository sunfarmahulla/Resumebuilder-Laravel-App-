<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\User;
use App\education;
use App\hobbies;
use App\language;
use App\refrence;
use App\skills;
use App\summery;
use App\Contact;

class showController extends Controller
{
  public function showLanguage($id)
   {
   	
       //  $shares = DB::table('users')
       //  ->leftjoin('language', 'users.id', '=', 'language.user_id')
       //  ->leftjoin('education', 'users.id', '=', 'education.user_id')
       //  ->leftjoin('_hobbies', 'users.id', '=', '_hobbies.user_id')
       //  ->leftjoin('contact', 'users.id', '=', 'contact.user_id')
       //  ->leftjoin('professional_skills', 'users.id', '=', 'professional_skills.user_id')
       //  ->leftjoin('summery', 'users.id', '=', 'summery.user_id')
       //  ->leftjoin('refrence', 'users.id', '=', 'refrence.user_id')
       //  ->select('professional_skills.*','language.*','education.*','summery.*','contact.*','_hobbies.*','refrence.*')
       //  ->where('users.id',$id)
       //  ->get();
       // //$pdf = PDF::loadView('Preview', $shares);
       //  //return $pdf->download('invoice.pdf');
       // return view('Preview',['shares'=>$shares ]);

      $contact=Contact::where('id','=',$id)->get();
      $summary=summery::where('id','=',$id)->get();
      $skill=skills::where('id','=',$id)->get();
      $language=language::where('id','=',$id)->get();
      $education=education::where('id','=',$id)->get();
      $hobbies=hobbies::where('id','=',$id)->get();
      $refrence=refrence::where('id','=',$id)->get();

      return view('Preview',['contact'=>$contact,
        'summary'=>$summary,
        'skill'=>$skill,
        'language'=>$language,
        'education'=>$education,
        'hobbies'=>$hobbies,
        'refrence'=>$refrence]);

   }

 
   
}
