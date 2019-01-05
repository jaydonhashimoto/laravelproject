@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">                               
            <div class="panel panel-default">
                @if(count($job) > 0)
                    <div class="panel-heading">
                        <a href="/jobs" class="btn btn-primary">Go Back</a>
                    </div>
                    <div class="panel-body">
                            @foreach($job as $j)
                                @if($jobList == 0) 
                                    <form action="/addToJobList" method="POST">
                                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"> 
                                        <input type="hidden" name="job" value={{$j->id}}>
                                        <input type="submit" value="Apply">
                                    </form>
                                @else
                                    <form action="/removeFromJobList" method="POST">
                                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"> 
                                        <input type="hidden" name="job" value={{$j->id}}>
                                        <input type="submit" value="Remove Application">
                                    </form>
                                @endif
                                <h1>{{$j->company}}</h1>
                                <p><b>Position:</b></p>
                                <p>{{$j->role}}</p><hr>
                                <p><b>Skill(s) Required:</b></p>
                                <p>{{$j->skill1}}</p><hr>
                                <p><b>Type:</b></p>
                                @if($j->type == "pt")
                                    <p>Part Time</p><hr>
                                @endif
                                @if($j->type == "ft")
                                    <p>Full Time</p><hr>
                                @endif
                                @if($j->type == "in")
                                    <p>Internship</p><hr>
                                @endif
                                <p><b>Description:</b></p>
                                <p>{{$j->description}}</p>
                            @endforeach
                            <div class="well">
                                <h3>Applicants</h3>
                                @if($applicants != NULL)
                                    @foreach($applicants as $applicant)
                                        <p><a href={{route('profiles.show', ['profile' => $applicant->user->id])}}>{{$applicant->user->name}}</a></p>
                                    @endforeach
                                @endif
                            </div>
                        @else
                        <p>Job Not Available</p>
                    </div>                  
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
