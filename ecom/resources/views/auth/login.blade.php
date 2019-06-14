
<!DOCTYPE html>
<html>
<head>
    <title>SHATAJ SOFT :: Admin Login </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Buy And Gain, Masud Rahman">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
        
        
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- css files -->
    <link href="{{ asset('/')}}assets/login/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('/')}}assets/login/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900" rel="stylesheet">
</head>

<body>

<div class="signupform"><h1>SHATAJ Login Form</h1>
    <div class="container">
        <!-- main content -->
        <div class="agile_info">
            <div style='padding: 35px' class="w3l_form">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('/')}}assets/login/images/left.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/')}}assets/login/images/left.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/')}}assets/login/images/left.png" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="w3_info"><h2>Sign In for visit Account</h2><p>Shataj Soft :: Bangladesh Software Comany :: Call 01733919791 </p>

                <br>
                <br>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="input-group">
                        <span><i class=" fa fa-envelope" aria-hidden="true"></i></span>
                        <input type="email" name="email" placeholder="Email Address">
                    </div>
                    @if ($errors->has('email'))
                        <span class="text-dark">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
                    @endif
                    <div class="input-group">
                        <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <input id='myInput' type="Password" name="password" placeholder="Password">
                        <span><i  onclick='myFunction()' class="fa fa-eye float-right" aria-hidden="true"></i></span>
                    </div>
                   
                    @if ($errors->has('password'))
                        <span class="">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
                    @endif
                    <button class="btn btn-danger btn-block" type="submit">Sign In</button >
                </form>

            </div></div></div>

    <!-- footer -->
    <div class="footer"><p>&copy; 2019 Shataj Soft. All Rights Reserved | Design by <a href="http://shataj.com/" target="blank">SHATAJ SOFT</a></p></div></div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>




