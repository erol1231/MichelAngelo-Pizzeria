@extends('main')
	@section('content')

		<div class="upload">
  <br><h1 align="center" style="color:white">Edit</h1>
  <div style="color:red">
      <?php echo validation_errors(); ?>
      <?php if(isset($error)){print $error;}?>
    </div>
    <?php
      foreach($category_list2 as $cat2){
      ?>
  <?php echo form_open_multipart('category/update/'.$cat2->categoryid.'/'.$cat2->categoryname.'');?>

      <table width="400" border="0" cellpadding="5">
        <tr>
          <th width="213" align="right" scope="row" style="color:white">Name</th><br>
          <td width="161"><input type="text" name="categoryname" size="20" value="<?php echo $cat2->categoryname; ?>" /></td>
        </tr>
        <tr>
          <th align="right" scope="row" style="color:white">Picture</th>
          <td><img src="<?=base_url().'assets/uploads/'.$cat2->categorypic;?>" width="100"></td>
        </tr>
        <tr>
          <td><td><label for="categorypic">Name</label><input type="file" name="categorypic" class="form-control"  id="categorypic"></td></td>
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