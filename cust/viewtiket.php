<?php
include 'config.php';
$idcust = $_SESSION['id'];

if (isset($_GET['id'])){
    $ID = $_GET['id'];
    $query = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.firstname as userfirst, tbpelanggan.lastname as userlast, tbpriority.name as priority, tbagen.username as agen, tbagen.firstname as agenfirst, tbagen.lastname as agenlast FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan,tbpriority,tbagen WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id AND tbtiket.idpriority=tbpriority.id AND tbtiket.idagen_owner=tbagen.id AND tbtiket.id = '".$ID ."'");
    $data = $query->fetch_object();
}else{
    echo "<script>alert<'Anda Belum Memilih Data !'>;history.go(-1);</script>";
}

$divisi = $data->penerima;
$query2 = $conn->query("SELECT name FROM tbdivisi WHERE id = '".$divisi ."'");
$data2 = $query2->fetch_object();
 ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    TIKET
                    <small>Lihat Tiket | <b>PT Industri Telekomunikasi Indonesia</b></small>
                </h2>
            </div>
            <!-- Lihat Tiket -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <a class="btn bg-blue waves-effect m-b-15" role="button" data-toggle="collapse" href="#collapseDetail" aria-expanded="false"
                               aria-controls="collapseDetail">
                                DETAIL
                            </a>
                            <div class="collapse" id="collapseDetail">
                            <div class="body">
                              <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                  <label for="email_address_2">State</label><br>
                                  <label for="email_address_2">Locked</label><br>
                                  <label for="email_address_2">Priority</label><br>
                                  <label for="email_address_2">Departement</label><br>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                                  <?php echo '<label for="email_address_2"> : '.$data->state.'</label>' ?><br>
                                  <?php echo '<label for="email_address_2"> : '.$data->locked.'</label>' ?><br>
                                  <?php echo '<label for="email_address_2"> : '.$data->priority.'</label>' ?><br>
                                  <?php echo '<label for="email_address_2"> : '.$data2->name.'</label>' ?><br>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                      <?php
                      if ($data->idpriority == 5) {
                        echo '<div class="header bg-red">';
                      } else if ($data->idpriority == 4) {
                        echo '<div class="header bg-orange">';
                      } else if ($data->idpriority == 3) {
                        echo '<div class="header bg-green">';
                      } else if ($data->idpriority == 2) {
                        echo '<div class="header bg-blue">';
                      } else if ($data->idpriority == 1) {
                        echo '<div class="header bg-light-blue">';
                      }
                       ?>
                            <h2>
                                <b>LIHAT TIKET #<?= $data->kodetiket ?></b><br>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                  <label for="email_address_2">To</label><br>
                                  <label for="email_address_2">Subject</label><br>
                                  <label for="email_address_2">Created</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <?php echo '<label for="email_address_2"> : '.$data2->name.'</label>' ?><br>
                                <?php echo '<label for="email_address_2"> : '.$data->subject.'</label>' ?><br>
                                <?php echo '<label for="email_address_2"> : '.$data->tgldibuat.'</label>' ?><br>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <?php echo $data->pesan ?>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Lihat Tiket -->
            <!-- Balas Komentar -->
            <?php
            if ($data->idstate != 3) {
              include 'reply.php';
            }
             ?>
            <!-- #END# Komentar -->
            <!-- Tampil Komentar -->
            <?php
                $tampil3 = $conn->query("SELECT * FROM tbtiketbalas WHERE kodetiket=$data->kodetiket ORDER BY tglbuat DESC");
                    while ($data3 = $tampil3->fetch_object()) {

                      $day = date('l', strtotime($data3->tglbuat));
                      $date = date('d F Y h:i:s', strtotime($data3->tglbuat));
             ?>
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="card">
                       <?php
                       if ($data3->idcustomer != 0) {
                       ?>
                        <div class="header bg-grey">
                          <h2>
                            <?= $data->userfirst ?> <?= $data->userlast ?>
                          </h2>
                          <small><?php echo $day.', '.$date ?></small>
                      <?php } else if ($data3->idagen != 0) {
                        ?>
                        <div class="header bg-blue-grey">
                          <h2>
                            <?= $data->agenfirst ?> <?= $data->agenlast ?> <span class="label bg-indigo">Staff</span>
                          </h2>
                          <small><?php echo $day.', '.$date ?></small>
                      <?php } ?>
                       </div>
                         <div class="body">
                               <div class="row clearfix">
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <?php echo $data3->komentar;  ?>
                                   </div>
                                 </div>
                             </div>
                     </div>
                 </div>
             </div>
            <?php
          }
             ?>
            <!-- #END# Tampil Komentar-->
        </div>
    </section>
