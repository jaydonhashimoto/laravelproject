@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">                               
            <div class="panel panel-default">
                <div class="panel-heading">Groups</div>
                    <div class="panel-body">
                        @if(count($groups) > 0)
                            @foreach($groups as $group)
                                <div class="well">
                                    <a href="/groups/{{$group->id}}"><h3>{{$group->name}}</h3></a>
                                </div>
                            @endforeach
                        @else
                            <p>No Affinity Groups Available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
