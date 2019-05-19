<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

       
        <!-- Styles -->
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
             body {
                background-image:url('Images/home.jpg'); 
                background-size: cover;
                background-repeat: no-repeat;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

           
            .title {
                font-size: 84px;
            }

            .links > a {
                color: #000;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .logo{
                  margin: 0;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  -ms-transform: translate(-50%, -50%);
                  transform: translate(-50%, -50%);
            }
            .logo p{
                font-weight: bold;
                font-size:2.3vw;
                font-family: Garamond;
            }
            

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links" >
                    @auth
                        <a style="color:red" href='/home/CV/{{Auth::user()->id}}' >Home</a>
                    @else
                         <button type="button" onclick="window.location.href='{{ route('login') }}'"  class="btn btn-info">Login</button>
                         &nbsp;
                        @if (Route::has('register'))
                             <button type="button" onclick="window.location.href='{{ route('register') }}'"  class="btn btn-danger">Register</button>
                        @endif
                    @endauth
                </div>
            @endif

         </div>
            <h1 style="text-align: center; padding: 20%; color: skyblue;"><b>Welcome Fresher</b></h1>    
         <div class="logo" >
            <img src="Images/logo.png" width="30%;" height="30%;"><p>Create and show your personality with effective CV</p></img> 
            <p style="font-size: 25px;">Best Luck for your Career!</p>
            
         </div>

    

    </body>
</html>