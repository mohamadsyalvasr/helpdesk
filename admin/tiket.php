<?php
include 'config.php';

if (isset($_GET['id'])){
    $ID = $_GET['id'];
    $tampil = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.email as usermail, tbagen.firstname as own, tbagen.username as userown FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan, tbagen WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id AND tbtiket.idagen_owner=tbagen.id AND tbtiket.penerima = '".$ID ."' ORDER BY tglupdate DESC");
}else{
    $tampil = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.email as usermail, tbagen.firstname as own, tbagen.username as userown FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan, tbagen WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id AND tbtiket.idagen_owner=tbagen.id ORDER BY tglupdate DESC");
}
 ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                TIKET
                <small>Daftar Tiket | <b>PT Industri Telekomunikasi Indonesia</b></small>
            </h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
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
                            <li><a href="index.php?agen=tiket">Lihat Semua Tiket</a></li>
                            <?php
                            $tampil2 = $conn->query("SELECT * FROM tbdivisi");
                                while ($data2 = $tampil2->fetch_object()) {
                                    echo '<li><a href="index.php?agen=tiket&id='.$data2->id.'">'.$data2->name.'</a></li>';
                                  }
                             ?>
                          </ul>
                          </div>
                        </div>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="index.php?agen=addtiket"><button type="button" class="btn btn-primary waves-effect">Buat Tiket</button></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Tiket #</th>
                                      <th>Age</th>
                                      <th>From / Subject</th>
                                      <th>State</th>
                                      <th>Queue</th>
                                      <th>Owner</th>
                                      <th>Customer</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>No</th>
                                      <th>Tiket #</th>
                                      <th>Age</th>
                                      <th>From / Subject</th>
                                      <th>Status</th>
                                      <th>Queue</th>
                                      <th>Owner</th>
                                      <th>Customer</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php
                                      if ($tampil->num_rows > 0){
                                          $no = 0;
                                          while ($data = $tampil->fetch_object()) {
                                              $no++;

                                       date_default_timezone_set('Asia/Jakarta');
                                       $awal  = date_create($data->tglupdate);
                                       $akhir = date_create(); // waktu sekarang
                                       $diff  = date_diff( $awal, $akhir );
                                  ?>

                                  <tr>
                                      <td scope="row"><input type="checkbox" name="pilih[]" value=<?= $data->id ?> id="<?php echo $no ?>" class="filled-in chk-col-pink"><label for="<?php echo $no ?>"><?php echo $no ?></label></td>
                                      <td scope="row"><a href="index.php?agen=viewtiket&id=<?php echo $data->id; ?>"><?= $data->kodetiket ?></a> <?php
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
                                      <td scope="row"><?php
                                      if ($diff->i < 1 && $diff->h < 1) {
                                        echo "Baru Saja";
                                      } else {
                                        if ($diff->y > 0) {
                                          echo $diff->y .' Tahun ';
                                        }
                                        if ($diff->m > 0) {
                                          echo $diff->m . ' Bulan ';
                                        }
                                        if ($diff->d > 0 && $diff->y < 1) {
                                          echo $diff->d . ' Hari ';
                                        }
                                        if ($diff->h > 0 && $diff->m < 1) {
                                          echo $diff->h . ' Jam ';
                                        }
                                        if ($diff->i > 0 && $diff->d < 1) {
                                          echo $diff->i .' Menit ';
                                        }
                                      }

                                      ?>
                                      </td>
                                      <td scope="row"><?= $data->pengirim ?><br><?= $data->subject ?></td>
                                      <td scope="row"><?php
                                      if ($data->idstate == 4) {
                                        echo '<span class="label bg-orange">'.$data->state.'</span>';
                                      } else if ($data->idstate == 3) {
                                        echo '<span class="label bg-grey">'.$data->state.'</span>';
                                      } else if ($data->idstate == 2) {
                                        echo '<span class="label bg-green">'.$data->state.'</span>';
                                      } else if ($data->idstate == 1) {
                                        echo '<span class="label bg-light-green">'.$data->state.'</span>';
                                      }
                                       ?></td>
                                      <td scope="row"><?= $data->divisi ?></td>
                                      <td scope="row"><?= $data->own?><br>( <?= $data->userown?> )</td>
                                      <td scope="row"><a href="index.php?agen=viewcustticket&id=<?php echo$data->idcustomer; ?>"><?= $data->usermail?></a></td>
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
