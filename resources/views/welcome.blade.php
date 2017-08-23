<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #8b0000;
                color: #f1ecec;
                font-family: 'Raleway', sans-serif;
                font-weight: 400;
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
            }

            .title {
                font-size: 60px;
            }

            .sub-title {
                font-size: 30px;
            }
            
            .btn-transparent {
                color: #e2e7ea;
                background-color: transparent;
                border-color: #e2e7ea;
            }

            .btn-transparent:hover {
                background: white;
                color: black;
                border-color: black;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                    
                <div class="title m-b-md">
                    Sistem Loker
                </div>

                <div class="sub-title m-b-md">
                    Universitas Bakrie
                </div>

                <a href="/login" class="btn btn-primary btn-block">
                    Login
                </a>
            </div>
        </div>
    </body>
</html>
