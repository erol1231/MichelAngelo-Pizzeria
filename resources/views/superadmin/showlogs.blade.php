@extends('main')
  @section('content')
<table width="1200" border="1" cellpadding="5" style="margin-top: 150px;margin-left: 100px;margin-bottom: 100px;" class = 'table table-stripped'>
      <tr>
        <th scope="col">Id</th>
         <th scope="col">Date</th>
          <th scope="col">Act</th>
      </tr>

      <?php foreach ($logs as $log){ ?>
        <tr>
          <td align="center"><?php echo $log->id; ?></td>
           <td align="center"><?php echo $log->date; ?></td>
            <td align="center"><?php echo $log->act; ?></td>
        </tr>
      <?php }?>
    </table>
  @endsection