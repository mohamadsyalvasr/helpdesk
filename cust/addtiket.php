<?php
include 'config.php';

$iduser = $_SESSION['id'];
$emailuser = $_SESSION['emailuser'];
 ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Buat Tiket</h2>
        </div>

<?php
$today=date("Ymd");
$tampil = $conn->query("SELECT max(kodetiket) AS last FROM tbtiket WHERE kodetiket LIKE '$today%'");
$data = $tampil->fetch_object();
$lastNoTransaksi = $data->last;
if ($lastNoTransaksi >= '00000000') {
  $nextNoTransaksi = $lastNoTransaksi;
} else if ($lastNoTransaksi != '00000000') {
  $nextNoTransaksi = '00000000';
}
$lastNoUrut =substr($nextNoTransaksi, -8);
$lastNoUrut++;
$id_Order = $today. sprintf("%08s", $lastNoUrut);
?>

        <!-- CKEditor -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <b>TIKET #<?php echo $id_Order; ?></b>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                      <form id="form_newticket" class="form-horizontal" method="POST">
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                  <label for="email_address_2">To</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                    <div>
                                    <select class="form-control show-tick" data-live-search="true" name="txt_toemail" required>
                                        <option value="" selected disabled>- Pilih -</option>
                                        <?php
                                        $query = $conn->query("SELECT * FROM tbdivisi WHERE valid=1");
                                        while ($data = $query->fetch_object()) {
                                        echo "<option value=$data->id>$data->name</option>";
                                        }
                                         ?>
                                    </select>
                                  </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                  <label for="password_2">Service</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                    <div>
                                      <select class="form-control show-tick" data-live-search="true" name="txt_service">
                                            <option value="" selected disabled>- Pilih -</option>
                                            <?php
                                            $query = $conn->query("SELECT * FROM tbservice WHERE valid=1");
                                            while ($data = $query->fetch_object()) {
                                            echo "<option value=$data->id>$data->name</option>";
                                            }
                                             ?>
                                      </select>
                                  </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                  <label for="password_2">SLA</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                    <div>
                                      <select class="form-control show-tick" data-live-search="true" name="txt_sla">
                                            <option value="" selected disabled>- Pilih -</option>
                                            <?php
                                            $query = $conn->query("SELECT * FROM tbsla WHERE valid=1");
                                            while ($data = $query->fetch_object()) {
                                            echo "<option value=$data->id>$data->name</option>";
                                            }
                                             ?>
                                      </select>
                                  </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                  <label for="email_address_2">Subject</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" id="subject" class="form-control" placeholder="" name="txt_subject" required>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                  <label for="email_address_2">Text</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                    <textarea id="ckeditor" name="txt_textcomment" required></textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                  <label for="email_address_2">Attachment</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div>
                                          <input type="file" name="txt_file" value="" placeholder="Pilih File Anda">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                  <label for="password_2">Priority</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                    <div>
                                      <select class="form-control show-tick" name="txt_priority">
                                          <option value="" selected disabled>- Pilih -</option>
                                          <?php
                                          $query = $conn->query("SELECT * FROM tbpriority ORDER BY id DESC");
                                          while ($data = $query->fetch_object()) {
                                          echo "<option value=$data->id>$data->id - $data->name</option>";
                                          }
                                           ?>
                                      </select>
                                  </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <a href="tiket.php"> <button type="button" class="btn btn-primary m-t-15 waves-effect">BATAL</button></a>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="simpan">BUAT TIKET</button>
                                </div>
                              </div>
                          </form>
                          <?php
                              if (isset($_POST['simpan'])){
                                require_once('config/PHPMailer/PHPMailerAutoload.php');

                                  $from = $emailuser;
                                  $to = $_POST['txt_toemail'];
                                  $cc = '-';
                                  $bcc = '-';
                                  $service = $_POST['txt_service'];
                                  $sla = $_POST['txt_sla'];
                                  $owner = '1';
                                  $respon = '1';
                                  $sign = '0';
                                  $crypt = '0';
                                  $subject = $_POST['txt_subject'];
                                  // $option = $_POST['txt_options'];
                                  $pesan = $_POST['txt_textcomment'];
                                  $signature = '1';
                                  $att = $_POST['txt_file'];
                                  $customer = $iduser;
                                  $state = (!empty($_POST['txt_state'])) ? $_POST['txt_state'] : '2';
                                  // $idlock = $_POST['txt_lock'];
                                  // $pdate = $_POST['txt_pendingdate'];
                                  $priority =(!empty($_POST['txt_priority'])) ? $_POST['txt_priority'] : '3' ;

                                  //autonumber
                                  $today=date("Ymd");
                                  $tampil = $conn->query("SELECT max(kodetiket) AS last FROM tbtiket WHERE kodetiket LIKE '$today%'");
                                  $data = $tampil->fetch_object();
                                  $lastNoTransaksi = $data->last;
                                  if ($lastNoTransaksi >= '00000000') {
                                    $nextNoTransaksi = $lastNoTransaksi;
                                  } else if ($lastNoTransaksi != '00000000') {
                                    $nextNoTransaksi = '00000000';
                                  }
                                  $lastNoUrut =substr($nextNoTransaksi, -8);
                                  $lastNoUrut++;
                                  $id_Order = $today. sprintf("%08s", $lastNoUrut);

                                  $simpan = $conn->query("INSERT INTO tbtiket (kodetiket,pengirim,penerima,cc,bcc,idservice,idsla,idagen_owner,idagen_respon,idsign,idcrypt,subject,pesan,idsignature,idattachment,idcustomer,idstate,idlock,tgldibuat,tglupdate,idpriority) VALUES ('".$id_Order."','".$from."','".$to."','".$cc."','".$bcc."','".$service."','".$sla."','".$owner."','".$respon."','".$sign."','".$crypt."','".$subject."','".$pesan."','".$signature."',0,'".$customer."','".$state."',1,NOW(),NOW(),'".$priority."')");

                                  if ($simpan){
                                    $tampil = $conn->query("SELECT tbtiket.id, tbsignature.pesan FROM tbtiket, tbsignature WHERE tbtiket.idsignature=tbsignature.id AND kodetiket=$id_Order");
                                    $data = $tampil->fetch_object();
                                    //mail php
                                    $mail = new PHPMailer;

                                    $mail->isSMTP();
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->SMTPAuth = true;
                                    $mail->Username = 'callserviceinti@gmail.com';
                                    $mail->Password = 'kmhlpxbdzmqirxrx';
                                    // $mail->Username = $_SESSION['emailuser'];
                                    // $mail->Password = $_SESSION['apppassword'];
                                    $mail->SMTPSecure = 'tls';
                                    $mail->Port = 587;

                                    $mail->setFrom('no-reply@gmail.com', 'Call Service INTI');
                                    $mail->addReplyTo('no-reply@gmail.com', 'Call Service INTI');
                                    // $mail->setFrom($_SESSION['emailuser'], $_SESSION['username']);
                                    // $mail->addReplyTo($_SESSION['emailuser'], $_SESSION['username']);
                                    // $mail->addAddress($from, 'You');
                                    $mail->addAddress('msyalva@gmail.com', 'You');

                                    // $kirimcc = (explode(",",$cc));
                                    // $jumlcc = count($kirimcc);
                                    // while ($kirimcc <= $jumlcc) {
                                    //   echo '$mail->addCC('.$kirimcc.')';
                                    // }

                                    // $kirimbcc = (explode(",",$bcc));
                                    // $jumlbcc = count($kirimbcc);
                                    // while ($kirimbcc <= $jumlbcc) {
                                    //   echo '$mail->addBCC('.$kirimbcc.')';
                                    // }

                                    // $mail->addCC('cc@contoh.com');
                                    // $mail->addBCC('bcc@contoh.com');

                                    // Subjek email
                                    $mail->Subject = $subject;
                                    // Mengatur format email ke HTML
                                    $mail->isHTML(true);
                                    // Konten/isi email
                                    // $mail->addAttachment('lmp/file1.pdf');
                                    // $mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png');

                                    $mail->Body = '

                                      Dear Client, <br>
                                       <br>
                                      Tiket Anda berhasil dibuat. <br>
                                       <br>
                                      -------------------------------------------- <br>
                                      No Tiket #'.$id_Order.' <br>
                                      Lihat Tiket : http://localhost/helpdesk/index.php?cust=viewtiket&id='.$data->id.' <br>
                                      --------------------------------------------
                                       <br>
                                       '.$data->pesan.'


                                      ';
                                    if (!$mail->send()) {
                                        echo "Mailer Error: " . $mail->ErrorInfo;
                                    } else {
                                      echo "<script>
                                                alert('Tiket Anda Berhasil Di Buat !');
                                                window.location.href='index.php?cust=tiket';</script>";
                                    }
                                }else{
                                  echo "<script>alert('Tiket Gagal Di Buat !');</script>";
                                }




                                              // $headers = 'From: '.$from.'\r\n';
                                              // if (mail('adianshorii@gmail.com, ramdanim435@gmail.com', 'Percobaan', 'Test', $headers)){
                                              //   echo "<script>
                                              //           alert('Tiket Berhasil Di Buat !');
                                              //           window.location.href='tiket.php';</script>";
                                              // }else{
                                              //   echo "<script>alert('Tiket Gagal Di Buat !');</script>";
                                              // }

                              }
                          ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# CKEditor -->
    </div>
</section>
