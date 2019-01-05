@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">                                          
            <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">Dashboard</div>
                                <div class="panel-body">
                                    @foreach ($profile as $p)
                                        <img src="/storage/user_pics/{{$p->user_pic}}" alt="..." class="img-thumbnail">
                                        <h3><b>Short Bio</b></h3>
                                        {{$p->bio}}
                                    @endforeach 
                                    <hr>
                                    <h3><b>Skills</b></h3>
                                    <table class="table table-striped">
                                        <tr>
                                            @foreach ($skills as $s)
                                            <td>{{$s->skill1}}</td>
                                            <td>{{$s->skill2}}</td>
                                            <td>{{$s->skill3}}</td>
                                            <td>{{$s->skill4}}</td>
                                            <td>{{$s->skill5}}</td>
                                            @endforeach
                                        </tr>
                                    </table>
                                    <hr> 
                                    <h3><b>Experience</b></h3>
                                        <div class="well">
                                            @foreach($experience as $ex)
                                                {{$ex->company}}<br>
                                                {{$ex->job}}<br>
                                                {{$ex->description}}<br>
                                                {{$ex->start_month}}/{{$ex->start_year}} <br>
                                                {{$ex->end_month}}/{{$ex->end_year}} <hr>
                                            @endforeach
                                            @foreach($experience2 as $ex2)
                                                {{$ex2->company}}<br>
                                                {{$ex2->job}}<br>
                                                {{$ex2->description}}<br>
                                                {{$ex2->start_month}}/{{$ex2->start_year}} <br>
                                                {{$ex2->end_month}}/{{$ex2->end_year}}
                                            @endforeach
                                        </div> 
                                        <hr>
                                    <h3><b>Education</b></h3>
                                    <div class="well">
                                        @foreach($education as $edu)
                                            {{$edu->school}}<br>
                                            {{$edu->degree}}<br>
                                            {{$edu->start_year}} - {{$edu->end_year}}
                                        @endforeach    
                                    </div>
                                    <h3><b>Saved Jobs</b></h3>
                                    <div class="well">
                                        @foreach($job as $j)
                                            <a href={{route('jobs.show', ['job' => $j->job->id])}}>{{$j->job->company}}</a>
                                            <br>
                                        @endforeach    
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>  
            </div>           
        </div>
    </div>
</div>
@endsection
