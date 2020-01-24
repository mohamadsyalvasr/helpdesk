<?php
    include 'config.php';
    if (isset($_GET['id'])){
        $ID = $_GET['id'];
        $query = $conn->query("SELECT * FROM tbsalutation WHERE id = '".$ID ."'");
        $data = $query->fetch_object();
    }else{
        echo "<script>alert<'Anda Belum Memilih Data !');history.go(-1);</script>";
    }
?>
  <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT SIGNATURE
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">
                              <div class="row clearfix">
                                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                      <label for="password_2">Nama</label>
                                  </div>
                                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                      <div class="form-group">
                                          <div class="form-line">
                                              <input type="text" name="txt_name" class="form-control" value="<?php echo $data->name; ?>" required="required">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                        <label for="password_2">Sah</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="txt_sah">
                                                    <option <?php if ($data->valid == 1) {
                                                      echo "selected";
                                                    } ?> value="1" >Sah</option>
                                                    <option <?php if ($data->valid == 2) {
                                                      echo "selected";
                                                    } ?> value="2">Tidak Sah</option>
                                                    <option <?php if ($data->valid == 3) {
                                                      echo "selected";
                                                    } ?> value="3">Tidak Sah - Sementara</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                        <label for="password_2">Comment</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="txt_comment" class="form-control" value="<?php echo $data->komentar; ?>" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                        <label for="email_address_2">Salutation</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                          <textarea id="ckeditor" name="txt_textcomment"><?php echo $data->pesan; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <a href="index.php?agen=admin&view=salut"><button type="button" class="btn btn-primary m-t-15 waves-effect" name="batal">BATAL</button></a>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="edit">SIMPAN</button>
                                    </div>
                                </div>
                            </form>
                            <?php
            if (isset($_POST['edit'])){
                if (isset($_POST['txt_sah'])){
                  $name = $_POST['txt_name'];
                  $comment = $_POST['txt_comment'];
                  $sah = $_POST['txt_sah'];
                  $pesan = $_POST['txt_textcomment'];

                $rubahdata = $conn->query("UPDATE tbsalutation SET name = '".$name."', komentar = '".$comment."', valid = '".$sah."', pesan = '".$pesan."', tglupdate = NOW() WHERE id = '".$_GET['id']."'");

                if ($rubahdata){
                    echo "<script>alert('Data Salam Berhasil di Edit!');window.location.href='index.php?agen=admin&view=salut';</script>";
                }else{
                    echo "<script>alert('Data Salam Gagal di Edit!');</script>";
                }
            }
        }
        ?>
                        </div>
                    </div>
                </div>
            </div>
</div>
