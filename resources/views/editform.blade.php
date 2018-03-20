@extends('layouts.app')


@section('content')

    <div class="form-group">
        <h1>Create </h1>
        <div class="col-md-12">
            <label>Questionnaire</label>
            <input type="text" id="questionname" name="questionname" value="{{$id}}" class="form-control">
        </div>
        <div class="col-md-12">
            <label>Duration</label>
            <input type="text" id="duration" value="{{$duration}}">
            <select id="durationin">
                <option value="" selected></option>
                <option value="minutes">Minutes</option>
                <option value="hours">Hours</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="canresume">Can Resume?</label>
            <input type="checkbox" name="canresume" value="1" class="canresume"> Yes
            <input type="checkbox" name="canresume" value="0" class="canresume"> No
        </div>
        <button type="submit" class="btn btn-success" id="saveform">Save</button>
    </div>



@endsection