@extends('main')
  @section('content')

<div class="upload" style="width:900px;height:500px">
   @if($method == "delivery")
      <?php
      foreach($users as $user){
      ?>
    
   <h1 style='color:white;margin-top: 50px;border-bottom: 10px solid orange;' align='center'>Hi {{$user->fname}} {{$user->lname}}</h1>
   <h2 style="color:white;margin-left:250px;margin-right:0px">Please specify your delivery address</h2>
   <form  action="{{URL::to('/saveorder')}}" method="post">
    {{csrf_field()}}
      <table width="400" border="0"  style="margin-left:200px" cellpadding="5">
        <tr>
          <th style="color:white;font-size: 20px;margin-left:50px">Street: </th>
          <td width="2000" style="margin-left:500px"><input type="text" name="street" width="200" required=""/></td>
        </tr>
        <tr>
          <th style="color:white;font-size: 20px;margin-left:50px">City: </th>
          <td width="2000" style="margin-left:500px"><input type="text" name="city" width="200" required=""/></td>
        </tr>
         <tr>
          <th style="color:white;font-size: 20px;margin-left:50px">Time: </th>
          <td width="2000" style="margin-left:500px"><input type="text" name="time" width="200" required=""/></td>
           <td width="2000" style="margin-left:500px"><input type="hidden" name="total" width="200" value="{{$total}}" /></td>
        </tr>
        <tr>
          <th align="center" scope="row" style="color:white">&nbsp;</th>
          <td align="left">
            <input type="submit" name="submit" value="Proceed" />
          </td>
        </tr>
      </table>
    </form>
  <?php } ?>
    @else
      <?php
      foreach($users as $user){
      ?>
    
   <h1 style='color:white;margin-top: 50px;border-bottom: 10px solid orange;' align='center'>Hi {{$user->fname}} {{$user->lname}}</h1>
   <h2 style="color:white;margin-left:250px;margin-right:0px">Please specify your pickup data</h2>
    <form action="{{URL::to('/saveorder2')}}" method="post">
      {{csrf_field()}}
      <table width="400" border="0"  style="margin-left:200px" cellpadding="5">
        <tr>
          <th style="color:white;font-size: 20px;margin-left:50px">Pickup Date: </th>
          <td width="2000" style="margin-left:500px"><input type="text" name="date" width="200" placeholder="0000-00-00(Year-Month-Day)" required="" /></td>
        </tr>
        <tr>
          <th style="color:white;font-size: 20px;margin-left:50px">Time: </th>
          <td width="2000" style="margin-left:500px"><input type="text" name="time" width="200" required=""/></td>
        </tr>
         <tr>
          <th style="color:white;font-size: 20px;margin-left:50px">Branch: </th>
          <td width="2000" style="margin-left:500px"><input type="text" name="branch" width="200" value="Pizzeria MichelAngelo Banilad Branch" required=""/></td>
          <td width="2000" style="margin-left:500px"><input type="hidden" name="total" width="200" value="{{$total}}" /></td>
        </tr>
        <tr>
          <th align="center" scope="row" style="color:white">&nbsp;</th>
          <td align="left">
            <input type="submit" name="submit" value="Proceed" />
          </td>
        </tr>
      </table>
    </form>
  <?php } ?>
    @endif
  </div>
@endsection