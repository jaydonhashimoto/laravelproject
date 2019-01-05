@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="/filterUsers" method="POST">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">  
                        <div class="row">                       
                            <div class="col-lg-6 pull-right">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="skill" placeholder="Search by skills">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <h3>People</h3>
                    @if(count($profiles) >= 1)
                    <?php
                        $numCols = 3;
                        $itemCount = 0;
                    ?>
                        <div class="row" style="padding: 2%">
                            @foreach($profiles as $profile)
                                <div class="col-md-4" style="padding: 2%">
                                    <div class="card" style="width: 18rem;">
                                        <img style="width: 100%" class="card-img-top" src="/storage/user_pics/{{$profile->user_pic}}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$profile->user->name}}</h5>
                                            <p class="card-text">{{$profile->bio}}</p>
                                            <a href="profiles/{{$profile->user->id}}" class="btn btn-primary">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    $itemCount++; 
                                    if($itemCount % $numCols == 0)
                                        echo '</div><div class="row" style="padding: 2%">';
                                ?>
                            @endforeach
                        </div>
                    @else
                        <p>No Profiles Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection