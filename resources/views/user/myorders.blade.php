@extends('main')
  @section('content')
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
<div class="upload" style="width:1200px;">
  <br><h1 align="center" style="color:white;border-bottom: 10px solid orange">My Orders.</h1><br><br>
                <!--Item-->
                
                  @if(session('cart'))
                  <table class="items-list col-lg-12 col-md-12 table-hover">
                  <tbody>
                  <tr style="color:white">
                  <td>&nbsp;</td> 
                  <td align="center">Product</td>
                  <td style="padding-right:100px" align="center">Quantity</td>
                  <td>Price</td>
                  <td align="center">Delete?</td>
                  </tr>
                  <?php
                      $total = 0;
                      $all = "all";
                  ?>
                  
                  @foreach(session('cart') as $key => $data) 
                     <?php 
                           $subtotal = $data['price'] * $data['quantity'];
                           $total = $total + $subtotal; 
                      ?>
                    @foreach($product as $prod) 
                      @if($prod->productid == $data['id'])
                        {{$origprice = $prod->productprice}}
                      @endif
                    @endforeach
                <?php
                  $price = $origprice;
                  $single = $price - 40;
                  $family = $price + 150;
                  ?>
                <tr class="item first rowid{{$data['rowid']}}">
                  <td class="" align="center">
                     <img style="width:500px;margin-right:100px;margin-bottom:10px" src="{{asset('uploads/'.$data['image'])}}" style="margin-left: 0px">
                  </td>
                  <td class="name" align="center" style="color:white;font-size: 30px;padding-right: 100px;padding-left: 100px">{{$data['name']}}<br><span class="price{{$data['rowid']}}">{{$price}}</span>
                  </td>
                  <td class="qnt-count" style="padding-right:100px;" align="center">
                    <input type="number" value="{{ $data['quantity'] }}" class="form-control quantity" />
                    <button class="btn btn-info btn-sm update-cart" data-id="{{ $key }}"><i class="fa fa-refresh"></i></button>
                  </td>
                  <td class="total" style="padding-right:100px" align="center"><span class="subtotal subtotal{{$data['rowid']}}">{{$subtotal}}</span></td>
                  <td class="delete"><button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $key }}"><i class="fa fa-trash-o"></i></button></td>
                </tr>

                  @endforeach

            
               
                <tr class="item">
                  <td class="thumb" colspan="4" align="right">&nbsp;</td>
                  <td style="color:white" class="">Total<span class="grandtotal">{{$total}}</span> </td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
            <button style="margin-left: 400px" class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $all }}">Clear Order</button>
             <a href="{{URL::to('/method/'.$total)}}"><button type="button" class="btn btn-primary" style="width:300px;">Place Order</button></a>
             
              @else 
                 <h1 style="color:white" align="center">You have no orders yet!</h1>
                 <a href="{{route('home')}}"><button style='margin-left:480px;margin-bottom:400px;width:200px;height:100px' type='button' class='btn btn-default'>Order now!</button></a>
          @endif
</div>
@endsection