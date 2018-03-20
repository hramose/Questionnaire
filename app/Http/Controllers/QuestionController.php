<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\User;
use App\Question;
use Auth;
use Illuminate\Support\Facades\Validator;
class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function result()
    {
        return view('result');
    }
    public function savequestionnairequestion(Request $request)
    {
        $id = $request->id;
        $question = $request->question;
        $answer = $request->answer;
        Question::create([
            'questionnaire_id' => $id,
            'question_name' => $question,
            'asnwer_name' => $answer
        ]);

        $questionnaire = Questionnaire::find($id);
        $questionnaire->increment('numberofquestions');
        $questionnaire->save();
        return response()->json(['success'=>'Saved, Successfull!']);

    }

}
