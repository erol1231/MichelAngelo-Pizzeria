@extends('main')
 @section('content')
 <?php $deliver = "delivery";
 		$pickup = "pickup";
 ?>
<div class="upload" style="width:900px;height:500px">
   <h1 style='color:white;margin-top:50px;border-bottom: 10px solid orange' align='center'>Choose a method...</h1>
   <a href="{{URL::to('/deliver/'.$total)}}"><button style="margin-left:350px;margin-bottom:0px;width:200px;height:100px" type="button" class="btn btn-default">Delivery</button><br><h2 style="margin-left:430px;color:white">or</h2>
   <a href="{{URL::to('/pickup/'.$total)}}"><button style="margin-left:350px;margin-bottom:200px;width:200px;height:100px" type="button" class="btn btn-default">Pick-up</button></a>
 </div>
 @endsection