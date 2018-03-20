@extends('layouts.app')


@section('content')

    <div class="form-group">
        <h1>Create </h1>
        <div class="col-md-12">
            <label>Questionnaire</label>
            <input type="text" id="questionname" name="questionname" placeholder="Enter Questionnaire Name" class="form-control">
        </div>
        <div class="col-md-12">
            <label>Number of Questions? </label>
            <input type="text" id="numberofquestions" name="numberofquestions" placeholder="Number of Questions" class="form-control">
        </div>
        <br/>
        <div class="col-md-12">
            <label>Duration</label>
            <input type="text" id="duration" placeholder="Enter Duration">
            <select id="durationin">
                <option value="" selected></option>
                <option value="minutes">Minutes</option>
                <option value="hours">Hours</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="canresume">Can Resume?</label>
            <input type="radio" name="canresume" value="1"> Yes
            <input type="radio" name="canresume" value="0"> No
        </div>
        <button type="submit" class="btn btn-success" id="saveform">Save</button>
    </div>





@endsection