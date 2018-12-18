  @extends('main')
    @section('content')

  <div class="upload" style="width:900px;height:500px">
      <?php
      foreach($user as $users){
      ?>
    
   <h1 style='color:white;margin-top: 50px;border-bottom: 10px solid orange;' align='center'>Hi <?php echo $users->fname?> <?php echo $users->lname?>!</h1>
   <form action="{{URL::to('/change_pass')}}" method="post">
     {{csrf_field()}}
      <table width="400" border="0"  style="margin-left:200px" cellpadding="5">
        <tr>
          <th style="color:white;font-size: 15px;margin-left:500px;margin-right:1000px">Enter your new password: </th>
          <td width="2000" style="margin-left:500px"><input type="password" name="newpassword" width="200"/></td>
        </tr>
        <tr>
          <th align="center" scope="row" style="color:white">&nbsp;</th>
          <td align="left">
            <input type="submit" name="submit" value="Change" />
          </td>
        </tr>
      </table>
    </form>
  <?php } ?>
  </div>
  </div>

  @endsection
