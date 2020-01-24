<?php
include 'config.php';
 ?>

<section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PELANGGAN
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              <a href="index.php?agen=addcust"><button type="button" class="btn btn-primary waves-effect">Tambah Pelanggan</button></a>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Company Name</th>
                                          <th>Email</th>
                                          <th>Phone</th>
                                          <th>Description</th>
                                          <th>Operation</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                      $tampil = $conn->query("SELECT tbpelanggan.*, tbcompany.name as company FROM tbpelanggan, tbcompany WHERE tbpelanggan.idcompany=tbcompany.id");
                                      if ($tampil->num_rows > 0){
                                          $no = 0;
                                          while ($data = $tampil->fetch_object()) {
                                              $no++;

                                  ?>
                                      <tr>
                                          <td scope="row"> <a href="index.php?agen=viewcustomer&id=<?php echo $data->id; ?>"><?= $data->firstname ?> <?= $data->lastname ?></a></td>
                                          <td scope="row"><?= $data->company ?></td>
                                          <td scope="row"><?= $data->email ?></td>
                                          <td scope="row"><?= $data->telepon ?></td>
                                          <td scope="row"><?= $data->komentar ?></td>
                                          <td colspan="2" scope="row">
                                          <a href="edit_cust.php?id=<?php echo $data->id; ?>">Edit</a>
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
