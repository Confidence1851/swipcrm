<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SwipCRM Activate Software</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 80vh;
                margin: 0;
            }

            .full-height {
                height: 95%;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
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
        </style>
    </head>
    <body>
            <div class="content">
                <div class="title m-b-md" style="margin-top:100px;">
                    Swip CRM System
                </div>
                <form action="{{ route('verify')}}" method="post">
                {{ csrf_field()}}
                <div class="col-md-8 col-offset-1">
                    <label for="reg"><b> Activation Key</b></label>
                    <input name="reg" type="number" style="width:300px;text-align:center;height:30px;border-radius:70px;margin-top:50px;" required>
                    <br>
                    <button type="submit" class="btn btn-primary" style="margin-top:50px;text-align:center;height:20px;color:blue;"><b> Activate</b></button>
                </div>

                </form>
            </div>
        </div>
        <footer>
         <div class="row">
            <p style="margin-top:200px;float:right;margin-right:20px"><b>{{$t}}</b></p>
         </div>
        </footer>
    </body>
</html>
