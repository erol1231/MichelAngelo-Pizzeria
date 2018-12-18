@extends('main')
  @section('content')
<div class="upload" style="width:900px;height:900px">
   <h1 style='color:white;margin-top:50px;margin-bottom:50px;border-bottom: 10px solid orange;' align='center'>Success! <i class="fa fa-check"></i></h1>
   <?php foreach($orders as $order){
    foreach($user as $users){
    echo "<h3 style='margin-left:600px'>Date: $order->date</h3>";
    echo "<h3 style='margin-left:600px'>Completing Time: $order->time</h3>";
    echo "<h3 style='margin-left:100px;color:white'>Name: $users->fname $users->lname</h2>";
    echo "<h3 style='margin-left:100px;color:white'>Address: $order->location</h2>";
    echo "<h3 style='margin-left:100px;color:white'>Items:</h3>";
    foreach($orddetail as $order2){
      
      echo "<h2 style='margin-left:100px;color:white'>$order2->productname X$order2->quantity<h2>";
      }
        echo "<h3 style='margin-left:600px;'>Total: $order->amountpaid</h3>";
        echo "<h2 style='border-bottom: 10px solid orange'></h2>";
      }
    }?>
    <div align="center" style="font-size: 10px;border-bottom: 10px solid orange">
      Thank you for choosing Pizzeria MichelAngelo<br>
      Feel free to print this reciept<br>
      NOTE: Expect a phone call confirmation before the delivery
   </div>
 </div>
 @endsection 