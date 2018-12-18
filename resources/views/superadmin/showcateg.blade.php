@extends('main')
  @section('content')
<table width="1200" border="1" cellpadding="5" style="margin-top: 150px;margin-left: 150px;margin-bottom: 100px;" class = 'table table-stripped'>
      <tr>
          <th scope="col" colspan="5"><h2 style="color:gray">Categories</h2s></th>
     </tr>
      <tr>
        <th scope="col">Name</th>
         <th scope="col">Picture</th>
        <th scope="col" colspan="3">Action</th>
      </tr>

      <?php foreach ($category as $catg){ ?>
        <tr>
          <td align="center"><?php echo $catg->categoryname; ?></td>
          <td align="center"><img src="{{asset('uploads/'.$catg->categorypic)}}" width="100"></td>
          <td width="40" align="left" ><button><a style="color:white" href="{{URL::to('/showsomeprod/'.$catg->categoryid)}}">View</a></button></td>
          <td width="40" align="left" ><button><a style="color:white" href="{{URL::to('/editcateg/'.$catg->categoryid)}}">Edit</a></button></td>
          <td width="40" align="left" ><button><a style="color:white" href="{{URL::to('deletecateg/'.$catg->categoryid)}}">Delete</a></button></td>
        </tr>
         <?php }?>
        <td colspan="8" align="right"><button><a style="color:white" href="{{URL::to('/insert_categ')}}">Insert New Category</a></button></td>
      </tr> 
    </table>

@endsection