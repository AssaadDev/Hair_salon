
<h1>Lista narucenih</h1><div class="centar">
        <table>
  <tr>
    <th>Ime</th>
    <th>Prezime</th>
    <th>Broj telefona</th>
    <th>Vrijeme</th>
    <th>Usluga</th>
    <th>Datum</th>
    <th>Deskripcija</th>
  </tr>
  <tr></tr>
    <?php 
    use App\Models\BookingModel;
    $userModel = new BookingModel();
    $data= $userModel->orderBy('id', 'DESC')->findAll();
    foreach ($data as $field){
        ?>
        <tr>
      <td><?=$field['fname']?></td>
      <td><?=$field['lname']?></td>
      <td><?=$field['phone_number']?></td>
      <td><?=$field['time']?></td>
      <td><?=$field['service_type']?></td>
      <td><?=$field['date']?></td>
      <td><?=$field['description']?></td>
      <td class="x"><a class="btn" href="<?php echo base_url('delete/'.$field['id']);?>"><?php echo 'Remove';?></a></td>
      </tr>
      <?php  } ?>
</table>

</div>