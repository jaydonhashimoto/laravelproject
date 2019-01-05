@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">                               
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="/filterJobs" method="POST">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">  
                        <div class="row">                       
                            <div class="col-lg-6 pull-right">
                                <select name="type">
                                    <option value="pt">Part Time</option>
                                    <option value="ft">Full Time</option>
                                    <option value="in">Internship</option>
                                </select>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="key" placeholder="Search via skills">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                    <div class="panel-body">
                        @if(count($jobs) > 0)
                            @foreach($jobs as $job)
                                <div class="well">
                                    <a href="/jobs/{{$job->id}}"><h3>{{$job->company}}</h3></a>
                                    <p><small>Position: {{$job->role}}</small></p>
                                </div>
                            @endforeach
                            {{$jobs->links()}}
                        @else
                            <p>No Jobs Available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
