@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Thank you for logging in.</p>
                        <p>Click on <strong>Questionnaire</strong> to continue.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
