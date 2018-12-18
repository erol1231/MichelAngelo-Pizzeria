<!DOCTYPE html>
<html>
<head>
<title>MichelAngelo Register</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="food court login form a Flat Responsive Widget,Login form widgets, Sign up Web   forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<link href="{{asset('css/style2.css')}}" rel="stylesheet" type="text/css" media="all" />
<!--online fonts-->
<link href="{{asset('fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,latin-ext,vietnamese')}}" rel="stylesheet">
<link href="{{asset('fonts.googleapis.com/css?family=Righteous&amp;subset=latin-ext')}}" rel="stylesheet">
<!--//online fonts-->
</head>
<body>
  <div class="wthree-form" style="height:1000px">
      <h1>Pizzeria MichelAngelo</h1>
    <div class="w3l-login form">
      <form action="{{URL::to('/registerme')}}" method="post">
        <div class="form-sub-w3">
          <h2>Firstname</h2>
          <input type="text" name="fname" placeholder="Firstname" required=""/>
          <h2>Lastname</h2>
          <input type="text" name="lname" placeholder="Lastname" required=""/>
          <h2>Username</h2>
          <input type="text" name="user" placeholder="Username" required=""/>
          <h2>Password</h2>
          <input type="password" name="pass" placeholder="Password" required=""/>
          <h2>Email</h2>
          <input type="text" name="email" placeholder="Email" required=""/>
          <h2>Contact#</h2>
          <input type="text" name="number" placeholder="Contact#" required=""/>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
        <div class="submit-agileits">
          <input type="submit" name="submit" value="Create">
        </div>
          <h1></h1>
       </form>
    </div>
  </div>
</body>
</html>