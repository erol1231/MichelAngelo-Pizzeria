@extends('main')
	@section('content')

	<table width="1200" border="1" cellpadding="5" style="margin-top: 150px;margin-left: 100px;margin-bottom: 1000px;" class = 'table table-stripped'>
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Date</th>
        <th scope="col">Amount Paid</th>
        <th scope="col">Location</th>
        <th scope="col">Method</th>
        <th scope="col">Status</th>
        <th scope="col">Order Details</th>
      </tr>

      <?php foreach ($orders as $order){ ?>
        <?php foreach ($users as $user){ ?>
          <?php if($user->id == $order->customerid){?>
        <tr>
          <td align="center"><?php echo $order->id?></td>
          <td align="center"><?php echo $user->fname; ?> <?php echo $user->lname;?></td>
          <td align="center"><?php echo $order->date?></td>
          <td align="center"><?php echo $order->amountpaid; ?></td>
          <td align="center"><?php echo $order->location; ?></td>
          <td align="center"><?php echo $order->method; ?></td>
          <td align="center"><?php echo $order->status; ?></td>
          <td width="50" align="center" ><a style="color:white" href="{{URL::to('/vieworderdet/'.$order->id)}}"><button>View</button></a></td> 
        </tr>
        <?php } ?>
      <?php } ?>
    <?php } ?>
    </table>

    @endsection