@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($profileCount != 0)
                    Update
                    <form action="/updateProfile" method="post" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">  
                        <h3>Short Bio</h3>
                        <input class="form-control" type="text" name="bio" minlength="2" maxlength="70" placeholder="Biography (70 characters)" value="{{$profile[0]->bio}}">
                        <h3>Skills</h3>
                        <div class="row">
                                <div class="col-lg-6">
                                  <div class="input-group">
                                    <div class="input-group-btn">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Skills <span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                        <li><input class="form-control" type="text" name="skill1" minlength="2" maxlength="20" placeholder="Skill 1" value="{{$skills[0]->skill1}}"></li>
                                        <li><input class="form-control" type="text" name="skill2" minlength="2" maxlength="20" placeholder="Skill 2" value="{{$skills[0]->skill2}}"></li>
                                        <li><input class="form-control" type="text" name="skill3" minlength="2" maxlength="20" placeholder="Skill 3" value="{{$skills[0]->skill3}}"></li>
                                        <li><input class="form-control" type="text" name="skill4" minlength="2" maxlength="20" placeholder="Skill 4" value="{{$skills[0]->skill4}}"></li>
                                        <li><input class="form-control" type="text" name="skill5" minlength="2" maxlength="20" placeholder="Skill 5" value="{{$skills[0]->skill5}}"></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div> 
                        </div>
                        <h3>Experience</h3>
                        <input class="form-control" type="text" name="company" minlength="2" maxlength="30" value="{{$experience[0]->company}}" placeholder="Company">
                        <input class="form-control" type="text" name="job" minlength="2" maxlength="30" value="{{$experience[0]->job}}" placeholder="Job">
                        <textarea class="form-control" name="description" cols="99" rows="5" maxlength="500" minlength="3" placeholder="Description">{{$experience[0]->description}}</textarea>
                        <h5>Employment Duration</h5>
                            <select name="start_month">
                            <option value="{{$experience[0]->start_month}}">{{$experience[0]->start_month}}</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>                       
                            <input class="form-control" cols="4" type="text" name="start_year" minlength="2" maxlength="4" value="{{$experience[0]->start_year}}" placeholder="Start Year">
                            <select name="end_month">
                                <option value="{{$experience[0]->end_month}}">{{$experience[0]->end_month}}</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>   
                            <input class="form-control" type="text" name="end_year" minlength="2" maxlength="30" value="{{$experience[0]->end_year}}" placeholder="End Year">
                                <p>   
                                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        2nd Job
                                    </a>
                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-block">
                                            <input class="form-control" type="text" name="company2" minlength="2" maxlength="30" value="{{$experience2[0]->company}}" placeholder="Company">
                                            <input class="form-control" type="text" name="job2" minlength="2" maxlength="30" value="{{$experience2[0]->job}}" placeholder="Job">
                                            <textarea class="form-control" name="description2" cols="99" rows="5" maxlength="500" minlength="3" placeholder="Description">{{$experience2[0]->description}}</textarea>
                                            <h5>Employment Duration</h5>
                                                <select name="start_month2">
                                                    <option value={{$experience2[0]->start_month}}>{{$experience2[0]->start_month}}</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>                       
                                                <input class="form-control" cols="4" type="text" name="start_year2" minlength="2" maxlength="4" value="{{$experience2[0]->start_year}}" placeholder="Start Year">
                                                <select name="end_month2">
                                                    <option value={{$experience2[0]->end_month}}>{{$experience2[0]->end_month}}</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>   
                                            <input class="form-control" type="text" name="end_year2" minlength="2" maxlength="30" value="{{$experience2[0]->end_year}}" placeholder="End Year">
                                    </div>
                                </div>
                        <h3>Education</h3>
                        <input class="form-control" type="text" name="school" minlength="2" maxlength="30" value="{{$education[0]->school}}" placeholder="School">
                        <input class="form-control" type="text" name="degree" minlength="2" maxlength="30" value="{{$education[0]->degree}}" placeholder="Field of Study">
                        <input class="form-control" type="text" name="school_start_year" minlength="2" maxlength="4" value="{{$education[0]->start_year}}" placeholder="Start Year">
                        <input class="form-control" type="text" name="school_end_year" minlength="2" maxlength="4" value="{{$education[0]->end_year}}" placeholder="End Year">
                        <br/>                        
                        <input type="file" name="user_pic"><br>

                        <input type="submit" name="submit" value="Submit"/>
                    </form>
                    @endif
                    @if($profileCount == 0)
                    Insert
                    <form action="/editProf" method="post" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                        <h3>Short Bio</h3>
                        <input class="form-control" type="text" name="bio" minlength="2" maxlength="70" placeholder="Biography (70 characters)">
                        <h3>Skills</h3>
                        <div class="row">
                                <div class="col-lg-6">
                                  <div class="input-group">
                                    <div class="input-group-btn">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Skills <span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                        <li><input class="form-control" type="text" name="skill1" minlength="2" maxlength="20" placeholder="Skill 1"></li>
                                        <li><input class="form-control" type="text" name="skill2" minlength="2" maxlength="20" placeholder="Skill 2"></li>
                                        <li><input class="form-control" type="text" name="skill3" minlength="2" maxlength="20" placeholder="Skill 3"></li>
                                        <li><input class="form-control" type="text" name="skill4" minlength="2" maxlength="20" placeholder="Skill 4"></li>
                                        <li><input class="form-control" type="text" name="skill5" minlength="2" maxlength="20" placeholder="Skill 5"></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div> 
                        </div>
                    
                        <h3>Experience</h3>
                        <input class="form-control" type="text" name="company" minlength="2" maxlength="30" placeholder="Company">
                        <input class="form-control" type="text" name="job" minlength="2" maxlength="30" placeholder="Job">
                        <textarea class="form-control" name="description" cols="99" rows="5" maxlength="500" minlength="3" placeholder="Description"></textarea>
                        <h5>Employment Duration</h5>
                            <select name="start_month">
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>                       
                            <input class="form-control" cols="4" type="text" name="start_year" minlength="2" maxlength="4" placeholder="Start Year">
                            <select name="end_month">
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>   
                            <input class="form-control" type="text" name="end_year" minlength="2" maxlength="30" placeholder="End Year">
                                <p>   
                                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Add Another Job
                                    </a>
                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-block">
                                            <input class="form-control" type="text" name="company2" minlength="2" maxlength="30" placeholder="Company">
                                            <input class="form-control" type="text" name="job2" minlength="2" maxlength="30" placeholder="Job">
                                            <textarea class="form-control" name="description2" cols="99" rows="5" maxlength="500" minlength="3" placeholder="Description"></textarea>
                                            <h5>Employment Duration</h5>
                                                <select name="start_month2">
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>                       
                                                <input class="form-control" cols="4" type="text" name="start_year2" minlength="2" maxlength="4" placeholder="Start Year">
                                                <select name="end_month2">
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>   
                                                <input class="form-control" type="text" name="end_year2" minlength="2" maxlength="30" placeholder="End Year">
                                    </div>
                                </div>

                        <h3>Education</h3>
                        <input class="form-control" type="text" name="school" minlength="2" maxlength="30" placeholder="School">
                        <input class="form-control" type="text" name="degree" minlength="2" maxlength="30" placeholder="Field of Study">
                        <input class="form-control" type="text" name="school_start_year" minlength="2" maxlength="4" placeholder="Start Year">
                        <input class="form-control" type="text" name="school_end_year" minlength="2" maxlength="4" placeholder="End Year">
                        <br/>
                        <input type="file" name="user_pic"><br>

                        <input type="submit" name="submit" class="pull-right" value="Submit"/>
                    </form>
                   @endif
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
