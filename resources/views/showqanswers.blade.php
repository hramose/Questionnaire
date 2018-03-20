@extends('layouts.app')
@section('content')
    <h1> {{$questionnairename}}</h1>



    @if(count($questionanswers) > 0)
        <ul>
            @foreach($questionanswers as $key => $v)
                <li>Question: {{$v->question_name}}</li>
                <p>Answer: {{$v->asnwer_name}}</p>
            @endforeach
        </ul>
    @else
        <span id="questionsnotfound"> Sorry, No Questions Found.</span>
    @endif
@endsection