@extends('main')
  @section('content')

       <div class="upload">
  <?php foreach ($categories as $cat2){ ?>
    <?php  $catnum = $cat2->categoryid;?>
      <h3>Add new <?php echo $cat2->categoryname;?></h3>
    <div class="login-form">
    <?php } ?>
   <form action="{{URL::to('/uploadprodsnow')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
  <div>
    <label for="productid">Product Id</label>
    <input type="text" class="form-control" name="productid"  id="productid">
  </div>

  <div>
    <label for="productname">Name</label>
    <input type="text" class="form-control" name="productname"  id="productname">
  </div>
  
  <div>
    <label for="productdesc">Description</label>
    <textarea name="productdesc" class="form-control" id="productdesc"></textarea>
  </div>
  <div>
    <label for="productprice">Price</label>
    <input type="text" class="form-control" name="productprice"  id="productprice">
    <input type="hidden" class="form-control" name="producttype" value="<?php echo $catnum; ?>" id="productprice">
  </div>

    <label for="productpic">Select Image*:</label>
    <input type="file" name="file" class="form-control"  id="productpic">
    
    <br><br><button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>
</div>
</div>

  @endsection