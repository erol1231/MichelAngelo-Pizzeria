@extends('main')
@section('content')

<div class="upload">
  <br><h1 align="center" style="color:white">Edit</h1>
    <?php
      foreach($category as $cat2){
      ?>
  
  <form action="{{URL::to('/editcategnow')}}" method="post" enctype="multipart/form-data">
  	{{csrf_field()}}
      <table width="400" border="0" cellpadding="5">
        <tr>
          <th width="213" align="right" scope="row" style="color:white">Name</th><br>
          <td width="161"><input type="text" name="categoryname" size="20" value="<?php echo $cat2->categoryname; ?>" /></td>
          <td width="161"><input type="hidden" name="categoryid" size="20" value="<?php echo $cat2->categoryid; ?>" /></td>
        </tr>
        <tr>
          <th align="right" scope="row" style="color:white">Picture</th>
          <td><img src="{{asset('uploads/'.$cat2->categorypic)}}" width="100"></td>
        </tr>
        <tr>
          <td><td><label for="categorypic"></label><input type="file" name="file" class="form-control"  id="categorypic"></td></td>
        </tr>
        <tr>
          <th align="right" scope="row" style="color:white">&nbsp;</th>
          <td>
            <input type="hidden" name="categoryid" value="<?php echo $cat2->categoryid; ?>" />
            <input type="submit" name="submit" value="Update" />
          </td>
        </tr>
      </table>
    </form>
  <?php } ?>
</div>
</div>

@endsection