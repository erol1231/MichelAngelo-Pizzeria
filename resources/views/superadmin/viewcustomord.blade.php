@extends('main')
	@section('content')

	 <table width="1200" border="1" cellpadding="5" style="margin-top: 150px;margin-left: 90px;margin-bottom: 1000px;" class = 'table table-stripped'>
      <tr>
        <th scope="col">Product Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Total</th>
      </tr>

      <?php foreach ($order_det as $orderdetails){ ?>
        <tr>
           <td align="center"><?php echo $orderdetails->productname;?></td>
          <td align="center"><?php echo $orderdetails->quantity; ?></td>
          <td align="center"><?php echo $orderdetails->price; ?></td>
          <td align="center"><?php echo $orderdetails->total; ?></td>
      <?php }?>
      
      <?php foreach ($orders as $orders){ ?>
      <?php if($orders->status != "pending"){?>
      <tr>
        <td colspan="6" width="50" align="center" ><h2 align="center" style="color:black">Status: <?php echo $orders->status;?></h2><h2 align="center" style="color:black">Amount Paid: <?php echo $orders->amountpaid;?></h2></td>
      </tr>
      <?php }
      else if($orders->status == "pending"){?>
      <tr>
        <td colspan="6" width="50" align="center" ><h2 align="center" style="color:black">Status: <?php echo $orders->status ?></h2></td>
      </tr>
      <?php } ?>
    <?php }?>
    
    </table>

  @endsection