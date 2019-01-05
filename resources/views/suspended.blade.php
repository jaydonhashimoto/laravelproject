@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Account Suspended</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>Your account has been suspended.</p>
                    <p>Please contact support if you feel that
                    this is incorrect</p>
                    <br/>
                    <p>Support: (123)456-7891</p>
                    <p>Email: support@email.com</p>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
