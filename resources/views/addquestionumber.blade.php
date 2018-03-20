@extends('layouts.app')

@section('content')

    <h1>Add Questions</h1>


    <input type="hidden" id="idofquestion" value="{{$id}}">
    <div id="Questionbox" class="form-group">
        <div class="col-md-12">
            <label for="questiontype">Question Type</label>
            <select id="typeofquestion">
                <option value="" selected></option>
                <option value="text">Text</option>
                <option value="mcq">Multiple Choice Questions</option>
            </select>
        </div>
        <div id="questionanswer">
            <div class="col-md-12">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question">
            </div>
            <div class="col-md-12">
                <label for="answer">Answer</label>
                <input type="text" class="form-control" id="answer">
            </div>
            <div class="col-md-12">
                <button type="button" class="btn btn-success" id="savebtnqa">Save Questions</button>
            </div>
        </div>

        <div id="mcqsoptions">
            <div class="col-md-12">
            <label for="questionformcq">Question</label>
                <input type="text" class="form-control" id="questionformcqid">
            </div>
            <div class="col-md-12">
                <label for="choice1">Choice 1</label>
                <input type="text" id="choiceone" class="form-control" placeholder="Enter Choice">
                <input type="radio" id="correctchoice1" value="choiceone" name="correctchoice">&nbsp;Correct?
            </div>
            <div class="col-md-12">
                <label for="choice2">Choice 2</label>
                <input type="text" id="choicetwo" class="form-control" placeholder="Enter Choice">
                <input type="radio" name="correctchoice" value="choicetwo" id="correctchoice2">&nbsp;Correct?
            </div>
            <div class="col-md-12">
                <label for="choice3">Choice 3</label>
                <input type="text" id="choicethree" class="form-control" placeholder="Enter Choice">
                <input type="radio" name="correctchoice" value="choicethree" id="correctchoice3">&nbsp;Correct?
            </div>
            <div class="col-md-12">
                <button type="button" class="btn btn-success" id="savebtnmcq">Save Questions</button>
            </div>
        </div>
    </div>









@endsection