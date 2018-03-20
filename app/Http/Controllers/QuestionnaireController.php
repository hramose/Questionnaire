<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Questionnaire::all();

        return view('questionnaire', ['result' => $data]);
    }
    public function viewAddQuestionform()
    {
        return view('viewform');
    }
    public function saveQuestion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'questionname' => 'required|string|max:150',
            'numberofquestions' => 'required',
            'duration' => 'required|string',
            'resumeable' => 'required'
        ]);
        if ($validator->passes()) {
            Questionnaire::create([
                'user_id' => Auth::user()->id,
                'name' => $request->questionname,
                'numberofquestions' => $request->numberofquestions,
                'duration' => $request->duration,
                'resumeable' => $request->resumeable
            ]);
            return Auth::user()->questionnaires;
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
    public function editQuestionform(Request $request)
    {
            $id = $request->id;
            $details = Questionnaire::find($id);
            return $details;
    }
    public function deleteQuestion(Request $request)
    {
        $id = $request->id;
        $Question = Questionnaire::find($id);
        $Question->is_deleted = 1;
        $Question->save();

    }
    public function saveEditeddata(Request $request)
    {
        $QuestionnaireId = $request->QuestionnaireId;
        $editedduration = $request->editedduration;
        $durationinedit = $request->durationinedit;
        $duration = $editedduration.' '.$durationinedit;


        $Questionnaire = Questionnaire::find($QuestionnaireId);
        $Questionnaire->name = $request->editedname;
        $Questionnaire->numberofquestions  = $request->editednumber;
        $Questionnaire->duration = $duration;
        $Questionnaire->resumeable = $request->canresumedit;
        $Questionnaire->published = $request->published;
        $Questionnaire->save();

        return response()->json(['success'=>'Saved, Successfull!']);
    }
    public function addquestionnumber(Request $request){
        $id = $request->id;
        return view('addquestionumber',['id' => $id]);
    }
    public function viewquestions(Request $request)
    {
        $questionnaireid = $request->id;
        $data = Questionnaire::find($questionnaireid);
        $questionnairename = $data->name;
        $result = Questionnaire::find($questionnaireid)->questions;
        return view('showqanswers', ['questionanswers' => $result, 'questionnairename' => $questionnairename]);

    }
}
