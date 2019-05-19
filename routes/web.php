<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('payment-status',array('as'=>'payment.status','uses'=>'PaymentController@paymentInfo'));
Route::get('payment',array('as'=>'payment','uses'=>'PaymentController@payment'));
Route::get('payment-cancel', function () {
    return 'Payment has been canceled';
});

Auth::routes();

Route::get('/home/CV/{id}', 'HomeController@index')->name('home/CV/{id}');
//contact detils-->
Route::post('/Contact_action/CV/{id}','ContactController@Contact_Detail');
Route::get('/home/CV/{id}','ContactController@selectContact');

Route::post('/contact_update_action/CV/{id}','ContactController@editContact');

//summery
Route::get('/summery/CV/{id}',function(){
	 return view('summery');
});

Route::post('/summery_action/CV/{id}','SummeryController@summeryDetails');
Route::get('/summery/CV/{id}','SummeryController@selectSummery');
Route::post('/summery_update/CV/{id}','SummeryController@updateSummary');

//education
Route::get('/education_preview/CV/{id}', function(){

	return view('education');
});
Route::post('/Education_action_insert/CV/{id}','EducationController@InsertEducation');
Route::get('/education_preview/CV/{id}','EducationController@selectEducation');
Route::post('/Education_update/CV/{id}','EducationController@editEducation');
Route::post('/Education_delete/CV/{id}','EducationController@deleteEducation');

//hobbies
Route::get('/preview/cv/{id}', function(){

	return view('hobbies');
});
Route::post('/Hobbies_action/CV/{id}','HobbiesController@addHobbies');
Route::get('/preview/cv/{id}','HobbiesController@selectHobbies');
Route::post('/hobby_update/CV/{id}','HobbiesController@editHobby');
//skills
Route::get('/skills/CV/{id}', function(){

	return view('skills');
});
Route::post('/skills_insert_action/CV/{id}','SkillsController@skillAdded');
Route::get('/skills/CV/{id}','SkillsController@ShowSkills');
Route::post('/skills_update/CV/{id}','SkillsController@skillUpdate');
Route::post('/delete_skills/cv/{id}','SkillsController@deleteSkills');
//language
Route::get('/language_action/CV/{id}', function(){

	return view('language');
});
Route::post('/language_insert_action/CV/{id}','LanguageController@LanguageAdd');
Route::get('/language_action/CV/{id}','LanguageController@selectLanguage');
Route::post('/language_update/CV/{id}','LanguageController@languageUpdate');
Route::post('/delete_language/cv/{id}','LanguageController@deletelang');

//refrence
Route::get('/refrence/CV/{id}', function(){

	return view('refrence');
});
Route::post('/Refrence_action_insert/CV/{id}','RefrenceController@InsertRefrence');
Route::get('/refrence/CV/{id}','RefrenceController@showRefrence');
Route::post('/refrence_update/CV/{id}','RefrenceController@editRefrence');

//Preview
Route::get('/Preview/all_pages/CV/{id}', function(){

	return view('Preview');
});

Route::get('/Preview/all_pages/CV/{id}','showController@showLanguage');
//Route::get('/Preview_CV/{id}','showController@showEduction');
//Route::get('/Preview/all_pages/CV/{id}','showController@ShowHobbies');
Route::get('/Pdf','PdfController@index');