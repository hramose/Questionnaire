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
    if(Auth::check())
    {
        return view('home');
    }
    else
    {
        return view('welcome');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/result', 'QuestionController@result')->name('result');

Route::get('/questionnaire', 'QuestionnaireController@index')->name('questionnaire');

Route::get('/addQuestions', 'QuestionnaireController@viewAddQuestionform')->name('addQuestions');

Route::post('/saveQuestion', 'QuestionnaireController@saveQuestion')->name('saveQuestion');

Route::post('/editQuestionform', 'QuestionnaireController@editQuestionform')->name('editQuestionform');

Route::post('/saveEditeddata', 'QuestionnaireController@saveEditeddata')->name('saveEditeddata');

Route::post('/deleteQuestion', 'QuestionnaireController@deleteQuestion')->name('deleteQuestion');

Route::get('/addquestionnumber/{id}', 'QuestionnaireController@addquestionnumber')->name('addquestionnumber');

Route::get('/viewquestions/{id}', 'QuestionnaireController@viewquestions')->name('viewquestions');

Route::post('/savequestionnairequestion', 'QuestionController@savequestionnairequestion')->name('savequestionnairequestion');