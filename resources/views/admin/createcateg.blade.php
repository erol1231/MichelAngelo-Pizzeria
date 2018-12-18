@extends('main')
@section('content')

<div class="upload">
      <h3>Add new category</h3>
    <div class="login-form">

  <form action="{{URL::to('/uploadcategnow')}}" method="post" enctype="multipart/form-data">
  	{{csrf_field()}}
  <div>
    <label for="categoryid">Category Id</label>
    <input type="text" class="form-control" name="categoryid"  id="categoryid">
  </div>

  <div>
    <label for="categoryname">Category Name</label>
    <input type="text" class="form-control" name="categoryname"  id="categoryname">
  </div>
  
    <label for="categorypic">Select Image*:</label>
    <input type="file"  class="form-control" name="file"  id="categorypic">
    
    <br><br><button type="submit"  name="submit" class="btn btn-success">Submit</button>
  </div>
</form>
</div>
</div>

@endsection