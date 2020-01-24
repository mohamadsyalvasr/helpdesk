<?php
include 'config.php';
 ?>

<section class="content">
        <div class="container-fluid">
            <!-- <div class="block-header">
                <h2>
                    AGEN
                    <small>Daftar Agen</small>
                </h2>
            </div> -->
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                AGEN
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              <a href="index.php?agen=addagen"><button type="button" class="btn btn-primary waves-effect">Tambah Agen</button></a>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                  <thead>
                                  <tr>
                                      <th>Nama</th>
                                      <th>NIP</th>
                                      <th>Divisi</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Valid</th>
                                      <th>OPERATION</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php
                                  $tampil = $conn->query("SELECT tbagen.*,tbdivisi.name as divisi FROM tbagen,tbdivisi WHERE tbagen.iddivisi=tbdivisi.id");
                                  if ($tampil->num_rows > 0){
                                      $no = 0;
                                      while ($data = $tampil->fetch_object()) {
                                          $no++;

                                  if ($data->valid == 1) {
                                    $Sah = "Sah";
                                  } else if ($data->valid == 2) {
                                    $Sah = "Tidak Sah";
                                  } else if ($data->valid == 3) {
                                    $Sah = "Tidak Sah - Sementara";
                                  }
                              ?>
                                  <tr>
                                      <td scope="row"><?= $data->firstname ?> <?= $data->lastname ?></td>
                                      <td scope="row"><?= $data->nip ?></td>
                                      <td scope="row"><?= $data->divisi ?></td>
                                      <td scope="row"><?= $data->email ?></td>
                                      <td scope="row"><?= $data->telepon ?></td>
                                      <td scope="row"><?= $Sah ?></td>
                                      <td colspan="2" scope="row">
                                      <a href="index.php?agen=editagen&id=<?php echo $data->id; ?>">Edit</a>
                                      <a href="form_hapus_agen.php?id=<?php echo $data->id; ?>">Hapus</a>
                                      </td>
                                  </tr>
                              <?php
                          }
                      }else{
                          echo '
                          <tr>
                              <td colspan="6">Data Kosong</td>
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
            <!-- #END# Basic Examples -->
        </div>
    </section>
