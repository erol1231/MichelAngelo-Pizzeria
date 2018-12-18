@extends('main')
  @section('content')

  <div class="upload">
  <br><h1 align="center" style="color:white">Edit</h1>
    
        @foreach($product as $prod)

  <form action="{{URL::to('/editprodnow')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
      <table width="400" border="0" cellpadding="5">
        <tr>
          <th width="213" align="right" scope="row" style="color:white">Name</th><br>
          <td width="161"><input type="text" name="productname" size="20" value="<?php echo $prod->productname; ?>" /></td>
        </tr>
        <tr>
          <th align="right" scope="row" style="color:white">Description</th>
          <td><textarea name="productdesc" rows="5" cols="20"><?php echo $prod->productdesc; ?></textarea></td>
        </tr>
        <tr>
          <th align="right" scope="row" style="color:white">Price </th>
          <td><input type="text" name="productprice" size="20" value="<?php echo $prod->productprice; ?>" /></td>
        </tr>
        <tr>
          <th align="right" scope="row" style="color:white">Picture</th>
          <td><img src="{{asset('uploads/'.$prod->productpic)}}" width="100"></td>
        </tr>
        <tr>
          <td><td><label for="productpic">Name</label><input type="file" name="file" class="form-control"  id="productpic" value="<?php echo $prod->productpic;?>"></td></td>
        </tr>
        <tr>
          <th align="right" scope="row" style="color:white">&nbsp;</th>
          <td>
            <input type="hidden" name="productid" value="<?php echo $prod->productid; ?>" />
            <input type="hidden" name="producttype" value="<?php echo $prod->producttype; ?>" />
            <input type="submit" name="submit" value="Update" />
          </td>
        </tr>
      </table>
    </form>
    @endforeach
</div>
</div>

  @endsection