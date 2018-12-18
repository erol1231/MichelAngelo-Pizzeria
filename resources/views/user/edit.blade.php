@extends('main')
  @section('content')
<div class="upload">
  <br><h1 align="center" style="color:white">Edit your account</h1>
    
    <?php
      foreach($user as $users){
      ?>
      
      <form action="{{URL::to('/updateuser')}}" method="post">
        {{csrf_field()}}
      <table width="400" border="0" cellpadding="5">
        <tr>
          <th width="213" align="right" scope="row" style="color:white">My Firstname</th><br>
          <td width="161"><input type="text" name="fname" size="20" value="<?php echo $users->fname; ?>" /></td>
        </tr>
         <tr>
          <th width="213" align="right" scope="row" style="color:white">My Lastname</th><br>
          <td width="161"><input type="text" name="lname" size="20" value="<?php echo $users->lname; ?>" /></td>
        </tr>
         <tr>
          <th width="213" align="right" scope="row" style="color:white">My Contact</th><br>
          <td width="161"><input type="text" name="contact" size="20" value="<?php echo $users->contact; ?>" /></td>
        </tr>
        <tr>
          <th align="right" scope="row" style="color:white">&nbsp;</th>
          <td>
            <input type="hidden" name="id" value="<?php echo $users->id; ?>" />
            <input type="submit" name="submit" value="Update" />
          </td>
        </tr>
      </table>
    </form>
  <?php } ?>
</div>
</div>
@endsection
