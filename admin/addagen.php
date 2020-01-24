<?php
include 'config.php';
 ?>

<section class="content">
        <div class="container-fluid">
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH AGEN
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">
                              <div class="row clearfix">
                                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                      <label for="password_2">NIP</label>
                                  </div>
                                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                      <div class="form-group">
                                          <div class="form-line">
                                              <input type="number" name="txt_nip" class="form-control" placeholder="Masukan NIP" required="required">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                        <label for="email_address_2">Username</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="txt_pengguna" class="form-control" placeholder="Username (Min. 8 Karakter)" required="required" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                        <label for="password_2">Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="txt_katasandi" class="form-control" placeholder="Masukan Kata Sandi (Min. 8 Karakter)" minlength="8" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                        <label for="password_2">Firstname</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="txt_namapertama" class="form-control" placeholder="First Name" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                        <label for="password_2">Lastname</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="txt_namaterakhir" class="form-control" placeholder="Last Name" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                        <label for="password_2">Telepon</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="txt_telepon" class="form-control" placeholder="Masukan No Telepon" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                        <label for="password_2">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="txt_email" class="form-control" placeholder="Masukan Email" required="required">
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
                                                    <option value="1">Sah</option>
                                                    <option value="2">Tidak Sah</option>
                                                    <option value="3">Tidak Sah - Sementara</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                        <label for="password_2">Roles</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select class="form-control show-tick" name="txt_roles" required>
                                                    <option value="" selected disabled>- Pilih -</option>
                                                    <?php
                                                    $query = $conn->query("SELECT * FROM tbroles");
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
                                        <label for="password_2">Group</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select class="form-control show-tick" name="txt_grup" required>
                                                    <option value="" selected disabled>- Pilih -</option>
                                                    <?php
                                                    $query = $conn->query("SELECT * FROM tbgrup");
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
                                        <label for="password_2">Division</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select class="form-control show-tick" name="txt_divisi" required>
                                                    <option value="" selected disabled>- Pilih -</option>
                                                    <?php
                                                    $query = $conn->query("SELECT * FROM tbdivisi ORDER BY id DESC");
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
                                        <label for="password_2">Produk Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="txt_produkname" class="form-control" placeholder="Masukan Produk Name" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <a href="index.php?agen=agen"> <button type="button" class="btn btn-primary m-t-15 waves-effect">KEMBALI</button></a>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="simpan">SIMPAN</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                                if (isset($_POST['simpan'])){
                                    if (isset($_POST['txt_sah'])){
                                        $v_pengguna = $_POST['txt_pengguna'];
                                        $v_katasandi = md5($_POST['txt_katasandi']);
                                        $v_namapertama = $_POST['txt_namapertama'];
                                        $v_namaterakhir = $_POST['txt_namaterakhir'];
                                        $v_nip = $_POST['txt_nip'];
                                        $v_telepon = $_POST['txt_telepon'];
                                        $v_email = $_POST['txt_email'];
                                        $v_sah = $_POST['txt_sah'];
                                        $v_division = $_POST['txt_divisi'];
                                        $v_produkname = $_POST['txt_produkname'];
                                        $v_roles = $_POST['txt_roles'];
                                        $v_grup = $_POST['txt_grup'];

                                    $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbagen WHERE nip='$v_nip' or email='$v_email' or username='$v_pengguna'"));


                                    if ($cek > 0){
                                    echo "<script>window.alert('Username atau NIP Sudah Terdaftar');
                                    window.location='add_agen.php'</script>";
                                    }else {

                                        $simpan = $conn->query("INSERT INTO tbagen (username,password,firstname,lastname,nip,telepon,email,valid,iddivisi,namaproduk,idroles,idgroup,tgldibuat,tglupdate) VALUES ('".$v_pengguna."','".$v_katasandi."','".$v_namapertama."','".$v_namaterakhir."','".$v_nip."','".$v_telepon."','".$v_email."','".$v_sah."','".$v_division."','".$v_produkname."','".$v_roles."','".$v_grup."',NOW(),NOW())");

                                        if ($simpan){
                                            echo "<script>
                                                    alert('Data Agen Berhasil Di Simpan !');
                                                    window.location.href='index.php?agen=agen';</script>";
                                        }else{
                                            echo "<script>alert('Data Agen Gagal Di Simpan !');</script>";
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
