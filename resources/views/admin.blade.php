@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">                               
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>
                    <div class="panel-body">
                        <form action="/addGroup" method="POST">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">  
                            <h1>Add an Affinity Group</h1>
                            <input type="text" name="name" class="form-control" placeholder="Group Name"><br>
                            <textarea class="form-control" name="description" maxlength="299" minlength="3" placeholder="Description"></textarea><br>
                            <input type="submit" value="Add" class="btn btn-primary">
                        </form><hr>
                        <form action="jobs" method="POST">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">  
                            <h1>Add a Job</h1>
                            <input type="text" name="company" class="form-control" placeholder="Company Name"><br>
                            <input type="text" name="role" class="form-control" placeholder="Job Position"><br>
                            <textarea class="form-control" name="description" maxlength="299" minlength="3" placeholder="Description"></textarea><br>
                            <input type="text" name="skill" class="form-control" placeholder="Required Skill"><br>
                            <select name="type">
                                <option value="pt">Part Time</option>
                                <option value="ft">Full Time</option>
                                <option value="in">Internship</option>
                            </select><br><br>
                            <input type="submit" value="Add" class="btn btn-primary">
                        </form><hr>
                        <table class="table table-striped">
                            <tr>
                                <th>All Users</th>
                                <th>Remove?</th>
                                <th>Suspend?</th>
                            <tr>
                            @foreach ($users as $user) 
                                <tr>
                                    @if ($user->name != auth()->user()->name)
                                        <td><a href={{route('profiles.show', ['profile' => $user->id])}}>{{$user->name}}</a></td>
                                        <td><a class="btn btn-danger" href="{{ url('/deleteuser', ['id' => $user->id]) }}", onclick="return deleteConfirm()">Delete</a></td>

                                        @if($suspended == NULL)
                                            <td><a class="btn btn-warning" href="{{ url('/suspenduser', ['id' => $user->id]) }}">Suspend</a></td>                              
                                        @else                               
                                            @foreach ($suspended as $s)
                                                @if($s->USER_ID != $user->id)
                                                    <td><a class="btn btn-warning" href="{{ url('/suspenduser', ['id' => $user->id]) }}">Suspend</a></td>                              
                                                @else
                                                    <td><a class="btn" href="{{ url('/unsuspenduser', ['id' => $user->id]) }}">Unsuspend</a></td>
                                                @endif
                                            @endforeach    
                                        @endif    
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
