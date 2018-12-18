@extends('main')
	@section('content')

<div class="upload">
    <div class="login-form">
    <form action="{{URL::to('/createadminnow')}}" method="post">
    	{{csrf_field()}}
  <div>
    <label for="productid">Firstname</label>
    <input type="text" class="form-control" name="fname" id="fname" required="">
  </div>

  <div>
    <label for="productname">Lastname</label>
    <input type="text" class="form-control" name="lname"  id="productname" required="">
  </div>
  
  <div>
    <label for="productname">Username</label>
    <input type="text" class="form-control" name="user"  id="user" required="">
  </div>

  <div>
    <label for="productname">Password</label>
    <input type="password" class="form-control" name="pass" id="pass" required="">
  </div>

  <div>
    <label for="productname">Email</label>
    <input type="text" class="form-control" name="email"  id="email" required="">
  </div>

  <div>
    <label for="productname">Contact</label>
    <input type="text" class="form-control" name="number"  id="number" required="">
  </div>

    <br><br><button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>
</div>
</div>

	@endsection