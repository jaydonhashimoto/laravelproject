<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                background-image: url('/storage/launchpage_pics/pexels-photo-886465.jpeg');
                height: 100%; 
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                color:white;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: aqua;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            canvas {
                position: absolute;
            }
            
            .parallax1 {
                background-image: url('/storage/launchpage_pics/pexels-photo-886465.jpeg');

                height: 100%; 

                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .parallax2 {
                background-image: url('/storage/launchpage_pics/pexels-photo-630839.jpeg');

                height: 100%; 

                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .parallax3 {
                background-image: url('/storage/launchpage_pics/pexels-photo-416405.jpeg');

                height: 100%; 

                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .main {
                position: absolute;
                background-image: url('/storage/launchpage_pics/pexels-photo-886465.jpeg');
                height: 100%; 
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .jumbotron {
                background: black;
                opacity: 0.5;
                padding: 2%;
            }

            .row {
                background: black;
                opacity: 0.5;
                padding: 2%;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="flex-center position-ref full-height">
                <div class="jumbotron">
                    <div class="title m-b-md">
                        Laravel Project
                    </div> 
                    <div class="links">
                        <a class="btn btn-primary" href="/profiles">Discover</a>
                    </div> 
                </div>              
            </div>
        </div>
        <div class="row">
            <h1>Discover New Job Opportunites</h1>   
            <div class="col-md-6">
                {!!nl2br(e("Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
                esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                sunt in culpa qui officia deserunt mollit anim id est laborum."))!!}
            </div>     
        </div>   
        <div class="parallax2"></div>
        <div class="row">
            <h1>Join Affinity Groups</h1>
            <div class="col-md-6">
                {!!nl2br(e("Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
                esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                sunt in culpa qui officia deserunt mollit anim id est laborum."))!!}
            </div>          
        </div>  
        <div class="parallax3"></div>
        <div class="row">
            <h1>Contact Us</h1>
            <div class="col-md-6">
                {!!nl2br(e("Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
                esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                sunt in culpa qui officia deserunt mollit anim id est laborum."))!!}
            </div>          
        </div>  
    </body>
</html>
