<?php
  $str = "msyalvasr@gmail.com,msyalvasr@gmail.com,msyalvasr@gmail.com,msyalvasr@gmail.com";
  $kirimcc = (explode(",",$str));
  $jml = count($kirimcc);

  for ($i=0; $i < $jml; $i++) {
    echo '$mail->addCC('.$kirimcc[$i].');<br>';
  }
?>
