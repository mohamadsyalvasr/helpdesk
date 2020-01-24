<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <a class="btn bg-blue waves-effect m-b-15" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                   aria-controls="collapseExample">
                    BALAS
                </a>
                <div class="collapse" id="collapseExample">
                  <form id="form_validation" class="form-horizontal" method="POST">
                  <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <textarea name="ckeditor" required></textarea>
                      </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <input type="file" name="txt_file" value="" placeholder="Pilih File Anda">
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                          <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="simpan">KIRIM</button>
                        </div>
                    </div>
                  </form>
                  <?php
                      if (isset($_POST['simpan'])){
                      $pesan = $_POST['ckeditor'];
                      $att = $_POST['txt_file'];
                      $kodetiket = $data->kodetiket;

                      if (empty($_POST["ckeditor"])) {
                        echo "<script>alert('Isi Balasan !');</script>";
                      } else {

                          $simpan = $conn->query("INSERT INTO tbtiketbalas (kodetiket,komentar,tglbuat,idcustomer,idagen) VALUES ('".$kodetiket."','".$pesan."',NOW(),'".$idcust."',0)");

                        // Komentar: Hapus idcustomer, dan input idagen dari SESSION

                                  if ($simpan){
                                    $update = $conn->query("UPDATE tbtiket SET tglupdate=CURRENT_TIMESTAMP,comment_status='2' WHERE kodetiket=$data->kodetiket");
                                      echo "<script>
                                              alert('Balasan Berhasil Di Buat !');
                                              window.location.href='index.php?cust=viewtiket&id=$ID';</script>";
                                  }else{
                                      echo "<script>alert('Balasan Gagal Di Buat !');</script>";
                                  }
                      }

                  }
                  ?>
                </div>
            </div>
        </div>
    </div>
</div>
