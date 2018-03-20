@extends('layouts.app')

@section('content')
    <div class="heading">
        <h1> Questionnaire </h1>
        <a href="{{url('addQuestions')}}">Click here to add Questionnaire.</a>
    </div>


    @if(count($result) == 0)
        <div class="nodatafound">
            <h1>Sorry, no data found.</h1>
        </div>
    @else
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Number of Questions</th>
                <th>Duration</th>
                <th>Resumeable</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
            @foreach($result as $res => $v)
                @if($v->is_deleted == 0 && $v->published == 1)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td><a href="{{url('viewquestions/'.$v->id)}}">{{$v->name}}</a></td>
                        <td>{{$v->numberofquestions}} &nbsp;|&nbsp; <a href="{{url('addquestionnumber/'.$v->id)}}">Add</a></td>
                        <td>{{$v->duration}}</td>
                        <td>@if($v->resumeable == 1) Yes. @else No. @endif</td>
                        <td>@if($v->published == 1) Yes. @else No. @endif</td>
                        <td><a href="javascript:;" data-toggle="modal" data-target="#editform" onclick="editthis({{$v->id}})">Edit</a> | <a href="#" style="color: red" onclick="deletethis({{$v->id}})"> Delete</a> </td>
                    </tr>
                @endif
            @endforeach
        </table>
    @endif

    <div id="editform" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Edit Question</h2>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Question Name: </label>
                            <input type="text" id="editedname" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label>Number of questions: </label>
                            <input type="text" id="editednumber" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label>Duration? </label>
                            <input type="text" id="editedduration" class="form-control">
                            <select id="durationinedit">
                                <option value="" selected></option>
                                <option value="minutes">Minutes</option>
                                <option value="hours">Hours</option>
                            </select>
                        </div>
                        <input type="hidden" id="editid">
                        <div class="col-md-12">
                            <label for="canresume">Can Resume?</label>
                            <input type="radio" name="canresumeedit" value="1" class="canresume"> Yes
                            <input type="radio" name="canresumeedit" value="0" class="canresume"> No
                        </div>
                        <div class="col-md-12">
                            <label>Published? </label>
                            <input type="radio" name="publishededit" value="1" class="published"> Yes
                            <input type="radio" name="publishededit" value="0" class="published"> No
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="buttom" class="btn btn-success" id="updatequestionnaire">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>





@endsection