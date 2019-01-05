@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">                               
            <div class="panel panel-default">
                @if(count($group) > 0)
                    <div class="panel-heading">Groups</div>
                    <div class="panel-body">
                            @foreach($group as $g)
                                @if($admin)
                                    <form action="GroupController@update" method="POST">
                                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                        <input type="hidden" name="group_id" value={{$g->id}}>  
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="text" name="name" value="{{$g->name}}" class="form-control" placeholder="Group Name">
                                        <textarea class="form-control" name="description" maxlength="299" minlength="3" placeholder="Description">{{$g->description}}</textarea><br>
                                        <input type="submit" name="submit" value="Update" class="pull-right btn btn-danger">
                                    </form>
                                @else
                                    <div class="well">
                                        <h1>{{$g->name}}</h1>
                                        {{$g->description}}
                                    </div>
                                @endif
                                @if($member == 0)
                                    <form action="/addToGroup" method="POST">
                                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                        <input type="hidden" name="group_id" value={{$g->id}}>  
                                        <input type="hidden" name="user_id" value={{auth()->user()->id}}>  
                                        <input type="submit" value="Join Group" class="btn btn-primary">
                                    </form>
                                @elseif($member > 0)
                                    <form action="/removeFromGroup" method="POST">
                                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                        <input type="hidden" name="group_id" value={{$g->id}}>  
                                        <input type="hidden" name="user_id" value={{auth()->user()->id}}>    
                                        <input type="submit" value="Leave Group" class="btn btn-primary">
                                    </form>
                                @endif
                            @endforeach
                            <h4>Members Of This Group</h4>
                            @if($groupmembers != NULL)
                                @foreach($groupmembers as $gm)
                                <p><a href="viewProfile/{{$gm->user->id}}">{{$gm->user->name}}</a></p>
                                @endforeach
                            @endif
                        @else
                        <p>No Affinity Groups Available</p>
                    </div>                  
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
