@extends('main')
  @section('content')

     <table width="1200" border="1" cellpadding="5" style="margin-top: 150px;margin-left: 160px;margin-bottom: 100px;" class = 'table table-stripped'>
      <tr>
        <th scope="col">ProductId</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Picture</th>
        <th scope="col">Type</th>
        <th scope="col" colspan="2">Action</th>
      </tr>

      <?php foreach ($product as $prod){ ?>

        <tr>
          <td align="center"><?php echo $prod->productid; ?></td>
          <td align="center"><?php echo $prod->productname; ?></td>
          <td align="center"><?php echo $prod->productdesc; ?></td>
          <td align="center"><?php echo $prod->productprice; ?></td>
          <td align="center"><img src="{{asset('uploads/'.$prod->productpic)}}" width="100"></td>
          <td align="center"><?php echo $prod->producttype; ?></td>
          <td width="40" align="left" ><button><a style="color:white" href="{{URL::to('/editprod/'.$prod->productid)}}">Edit</a></button></td>
          <td width="40" align="left" ><button><a style="color:white" href="{{URL::to('/deleteprod/'.$prod->productid)}}">Delete</a></button></td>
        </tr>
        <?php } ?>
      <tr>
        <?php foreach ($categories as $cat2){ ?>
          <?php $catnum = $cat2->categoryid; ?>
          <?php } ?>
        <td colspan="8" align="right"><button><a style="color:white" href="{{URL::to('/uploadprods/'.$catnum)}}">Insert New Product</a></button></td>
      </tr>
    </table><br><br><br>

   @endsection