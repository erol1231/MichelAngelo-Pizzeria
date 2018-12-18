<!doctype html>
    <head>

        <title>MichelAngelo Login</title>


        <meta name="viewport" content="width= device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="food court login form a Flat Responsive Widget,Login form widgets, Sign up Web   forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />


        <link href="//fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Righteous&amp;subset=latin-ext" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{asset('css/style2.css')}}" rel="stylesheet" />
    </head>

    <body>
        <div class="wthree-form">
            <h1>Pizzeria Michelangelo</h1>
         <div class="w3l-login form">
            <!-- if there are login errors, show them here -->
          @if(count($errors)>0)
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
            </div>
          @endif
            <form action="{{URL::to('/loginme')}}" method="post">
                <div class="form-sub-w3">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="form-sub-w3">
                    <input type="password" name="password" placeholder="Password"l>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
            <label class="anim">
                    <input type="checkbox" class="checkbox">
                <span>Remember Me</span> 
            </label>
                <div class="submit-agileits">
                    <input type="submit" name="submit" value="Login">
                </div>
            <a href="{{URL::to('/register')}}">Create an Account</a>
          <h1></h1>
            </form>
        </div>
        </div>
    </body>

</html>
