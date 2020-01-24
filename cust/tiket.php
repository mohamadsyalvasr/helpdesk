<?php
include 'config.php';
$email =  $_SESSION['emailuser'];
$iduser = $_SESSION['id'];

if (isset($_GET['id'])){
    $ID = $_GET['id'];
    if ($ID <= 3) {
      $tampil = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.email as usermail, tbagen.firstname as own, tbagen.username as userown FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan, tbagen WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id AND tbtiket.idagen_owner=tbagen.id AND tbtiket.penerima = '".$ID ."' AND tbtiket.pengirim = '".$email ."' ORDER BY tglupdate DESC");
    } else if ($ID == 99) {
      $tampil = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.email as usermail, tbagen.firstname as own, tbagen.username as userown FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan, tbagen WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id AND tbtiket.idagen_owner=tbagen.id AND tbtiket.pengirim = '".$email ."' AND tbtiket.idstate=2 ORDER BY tglupdate DESC");
    } else if ($ID == 9999) {
      $tampil = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.email as usermail, tbagen.firstname as own, tbagen.username as userown FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan, tbagen WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id AND tbtiket.idagen_owner=tbagen.id AND tbtiket.pengirim = '".$email ."' AND tbtiket.idstate=3 ORDER BY tglupdate DESC");
    } else if ($ID == 999) {
      $tampil = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.email as usermail, tbagen.firstname as own, tbagen.username as userown FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan, tbagen WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id AND tbtiket.idagen_owner=tbagen.id AND tbtiket.pengirim = '".$email ."' AND tbtiket.comment_status=1 ORDER BY tglupdate DESC");
    }
}else{
    $tampil = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.email as usermail, tbagen.firstname as own, tbagen.username as userown FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan, tbagen WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id AND tbtiket.idagen_owner=tbagen.id AND tbtiket.pengirim = '".$email ."' ORDER BY tglupdate DESC");
}
 ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                MY SUPPORT TICKETS
                <small>Daftar Tiket | <b>PT Industri Telekomunikasi Indonesia</b></small>
            </h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix" id="tiketview">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div>
                          <div class="btn-group" role="group">
                          <button type="button" class="btn bg-indigo waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Antrian Tiket Lain
                              <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="index.php?cust=tiket">Lihat Semua Tiket</a></li>
                            <?php
                            $tampil2 = $conn->query("SELECT * FROM tbdivisi");
                                while ($data2 = $tampil2->fetch_object()) {
                                    echo '<li><a href="index.php?cust=tiket&id='.$data2->id.'">'.$data2->name.'</a></li>';
                                  }
                             ?>
                          </ul>
                          </div>
                        </div>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="index.php?cust=addtiket"><button type="button" class="btn btn-primary waves-effect">Buat Tiket</button></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                      <div class="row clearfix">
                        <?php
                            $opentampil = $conn->query("SELECT COUNT(*) as jumlah FROM tbtiket WHERE pengirim = '$email' AND idstate = '2'");
                            $dataopen = $opentampil->fetch_object();

                            $answtampil = $conn->query("SELECT COUNT(*) as jumlah FROM tbtiket WHERE pengirim = '$email' AND comment_status='1' AND idstate = '2'");
                            $dataansw = $answtampil->fetch_object();

                            $closetampil = $conn->query("SELECT Count(*) as jumlah FROM tbtiket WHERE pengirim = '$email' AND idstate = '3'");
                            $dataclose = $closetampil->fetch_object();
                         ?>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <a href="index.php?cust=tiket&id=99"><button class="btn bg-grey btn-lg btn-block waves-effect" type="button">OPEN <span class="badge"><?php echo $dataopen->jumlah; ?></span></button></a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <a href="index.php?cust=tiket&id=999"><button class="btn bg-grey btn-lg btn-block waves-effect" type="button">ANSWERED <span class="badge"> <?php echo $dataansw->jumlah; ?> </span></button></a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <a href="index.php?cust=tiket&id=9999"><button class="btn bg-grey btn-lg btn-block waves-effect" type="button">CLOSED <span class="badge"><?php echo $dataclose->jumlah; ?></span></button></a>
                                </div>
                            </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tabletiket">
                                <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Tiket #</th>
                                      <th>Subject</th>
                                      <th>State</th>
                                      <th>Departement</th>
                                      <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>No</th>
                                      <th>Tiket #</th>
                                      <th>Subject</th>
                                      <th>Status</th>
                                      <th>Departement</th>
                                      <th>Last Updated</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php
                                      if ($tampil->num_rows > 0){
                                          $no = 0;
                                          while ($data = $tampil->fetch_object()) {
                                              $no++;

                                       date_default_timezone_set('Asia/Jakarta');
                                       $awal  = date_create($data->tgldibuat);
                                       $akhir = date_create(); // waktu sekarang
                                       $diff  = date_diff( $awal, $akhir );
                                  ?>

                                  <tr>
                                      <td scope="row"><?php echo $no ?></label></td>
                                      <td scope="row"><a href="index.php?cust=viewtiket&id=<?php echo $data->id; ?>"><?= $data->kodetiket ?></a> <?php
                                      if ($data->idpriority == 5) {
                                        echo '<span class="label bg-red">Very High</span>';
                                      } else if ($data->idpriority == 4) {
                                        echo '<span class="label bg-orange">High</span>';
                                      } else if ($data->idpriority == 3) {
                                        echo '<span class="label bg-green">Normal</span>';
                                      } else if ($data->idpriority == 2) {
                                        echo '<span class="label bg-blue">Low</span>';
                                      } else if ($data->idpriority == 1) {
                                        echo '<span class="label bg-light-blue">Very Low</span>';
                                      }
                                       ?></td>
                                      <td scope="row"><?= $data->subject ?></td>
                                      <td scope="row">
                                        <?php
                                        if ($data->idstate == 4) {
                                          echo '<span class="label bg-orange">'.$data->state.'</span>';
                                        } else if ($data->idstate == 3) {
                                          echo '<span class="label bg-grey">'.$data->state.'</span>';
                                        } else if ($data->idstate == 2) {
                                          echo '<span class="label bg-green">'.$data->state.'</span>';
                                        } else if ($data->idstate == 1) {
                                          echo '<span class="label bg-light-green">'.$data->state.'</span>';
                                        }
                                         ?>
                                      </td>
                                      <td scope="row"><?= $data->divisi ?></td>
                                      <td scope="row"><?= $data->tglupdate ?></td>
                                  </tr>
                                  <?php
                                          }
                                      }else{
                                          echo '
                                          <tr>
                                              <td colspan="9">Data Kosong</td>
                                          </tr>';
                                          }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>
