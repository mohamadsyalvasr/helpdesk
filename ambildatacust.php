<?php
  include 'config.php';

  $data = $conn->query("SELECT * from tbpelanggan where email = '".$_POST['emailpelanggan']."'");
  $data = $data->fetch_object();
  echo json_encode(array(
      'idcust' => $data->id,
      'nama' => $data->firstname)
    );
?>
