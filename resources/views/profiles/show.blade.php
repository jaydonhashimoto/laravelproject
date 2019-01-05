@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @foreach ($profile as $p){{$p->user->name}}@endforeach
                    <a class="btn btn-primary pull-right" href="/profiles">Go Back</a><br>
                    @foreach ($profile as $p){{$p->user->email}}@endforeach
                </div>               
                <div class="panel-body">
                    <img src="/storage/user_pics/{{$profile[0]->user_pic}}" alt="..." class="img-thumbnail">
                    <h3><b>Short Bio</b></h3>
                    <div class="well">
                        {{$profile[0]->bio}}
                    </div>
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
                    <h3><b>Experience</b></h3>                
                    <div class="well">
                        {{$experience[0]->company}}<br>
                        {{$experience[0]->job}}<br>
                        {{$experience[0]->description}}<br>
                        Start Date: {{$experience[0]->start_month}}/{{$experience[0]->start_year}} <br>
                        End Date: {{$experience[0]->end_month}}/{{$experience[0]->end_year}} 
                        <hr>
                        {{$experience2[0]->company}}<br>
                        {{$experience2[0]->job}}<br>
                        {{$experience2[0]->description}}<br>
                        Start Date: {{$experience2[0]->start_month}}/{{$experience2[0]->start_year}} <br>
                        End Date: {{$experience2[0]->end_month}}/{{$experience2[0]->end_year}}
                    </div> 
                        <hr>
                    <h3><b>Education</b></h3>
                        <div class="well">
                            {{$education[0]->school}}<br>
                            {{$education[0]->degree}}<br>
                            {{$education[0]->start_year}} - {{$education[0]->end_year}}
                        </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
