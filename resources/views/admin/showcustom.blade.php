@extends('main')
	@section('content')

	 <table width="1200" border="1" cellpadding="5" style="margin-top: 150px;margin-left: 100px;margin-bottom: 100px;" class = 'table table-stripped'>
      <tr>
        <th scope="col">UserName</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Type</th>
        <th scope="col" colspan="3">Action</th>
      </tr>

      <?php foreach ($users as $u_key){ ?>
        <tr>
          <td align="center"><?php echo $u_key->username; ?></td>
          <td align="center"><?php echo $u_key->fname," ",$u_key->lname; ?></td>
          <td align="center"><?php echo $u_key->email; ?></td>
          <td align="center"><?php echo $u_key->contact; ?></td>
          <?php 
            if($u_key->level == 1){
            echo "<td align='center'>superadmin</td>";
            }
            else if($u_key->level == 2){
            echo "<td align='center'>admin</td>";
            }
            else{
            echo "<td align='center'>customer</td>";
            } ?>
          @if($u_key->level == 3)
          	<td width="150" align="center"><button><a style="color:white" href="{{URL::to('/cust_ord_rec/'.$u_key->id)}}">Order Records</a></button></td>
          @endif
          ?>
          @if($u_key->level == 2)
          <td width="40" align="left" ><button><a style="color:white" href="">Delete</a></button></td>
          @endif
        </tr>
      <?php }?>
    </table>

    @endsection