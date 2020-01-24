<?php
include 'config.php';
 ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                DASHBOARD
                <small>Selamat Datang Di HELPDESK | <b>PT Industri Telekomunikasi Indonesia</b></small>
            </h2>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">NEW TASKS</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">NEW TICKETS</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">NEW COMMENTS</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">NEW VISITORS</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Peningkatan Tiket
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                              <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Tiket #</th>
                                    <th>From / Subject</th>
                                    <th>Age</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                    <th>No</th>
                                    <th>Tiket #</th>
                                    <th>From / Subject</th>
                                    <th>Age</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                <?php
                                    $tampil = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.email as usermail FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id AND tbtiket.idsla != 0 ORDER BY tbtiket.tgldibuat DESC");
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
                                    <td scope="row"><?php echo $no ?></td>
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
                                    <td scope="row"><?= $data->pengirim ?><br><?= $data->subject ?></td>
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
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Tiket Baru
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                              <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Tiket #</th>
                                    <th>From / Subject</th>
                                    <th>Age</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                    <th>No</th>
                                    <th>Tiket #</th>
                                    <th>From / Subject</th>
                                    <th>Age</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                <?php
                                    $tampil = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.email as usermail FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id ORDER BY tbtiket.tgldibuat DESC");
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
                                    <td scope="row"><?php echo $no ?></td>
                                    <td scope="row"><a href="viewticket.php?id=<?php echo $data->id; ?>"><?= $data->kodetiket ?></a> <?php
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
                                    <td scope="row"><?= $data->pengirim ?><br><?= $data->subject ?></td>
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
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Tiket Yang Terbuka / Membutuhkan Jawaban
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                              <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Tiket #</th>
                                    <th>From / Subject</th>
                                    <th>Age</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                    <th>No</th>
                                    <th>Tiket #</th>
                                    <th>From / Subject</th>
                                    <th>Age</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                <?php
                                    $tampil = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbpelanggan.email as usermail FROM tbtiket,tbstate,tblocked,tbdivisi,tbpelanggan WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idcustomer=tbpelanggan.id ORDER BY tbtiket.idpriority DESC, tbtiket.tgldibuat ASC");
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
                                    <td scope="row"><?php echo $no ?></td>
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
                                    <td scope="row"><?= $data->pengirim ?><br><?= $data->subject ?></td>
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
