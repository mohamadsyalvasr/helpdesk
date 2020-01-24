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
                                TAMBAH PELANGGAN
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">
                              <div class="row clearfix">
                                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                      <label for="password_2">Firstname</label>
                                  </div>
                                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                      <div class="form-group">
                                          <div class="form-line">
                                              <input type="text" name="txt_firstname" class="form-control" placeholder="First Name" required="required">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row clearfix">
                                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                      <label for="password_2">Lastname</label>
                                  </div>
                                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                      <div class="form-group">
                                          <div class="form-line">
                                              <input type="text" name="txt_lastname" class="form-control" placeholder="Last Name" required="required">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Username</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="txt_username" class="form-control" placeholder="Username" required="required" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="txt_password" class="form-control" placeholder="Masukan Kata Sandi" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
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
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">CustomerID</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="txt_customerid" class="form-control" placeholder="Masukan ID Konsumen" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Phone</label>
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
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Company Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select class="form-control show-tick" required="" name="txt_companyname">
                                                  <option value="0" selected disabled>- Pilih -</option>
                                                  <?php
                                                  $query = $conn->query("SELECT * FROM tbcompany");
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
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">FAX</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="txt_fax" class="form-control" placeholder="Masukan FAX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Comment</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="txt_comment" class="form-control" placeholder="Komentar" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
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
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <a href="index.php"> <button type="button" class="btn btn-primary m-t-15 waves-effect">KEMBALI</button></a>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="simpan">SIMPAN</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                                if (isset($_POST['simpan'])){
                                    if (isset($_POST['txt_sah'])){
                                        $v_username = $_POST['txt_username'];
                                        $v_password = md5($_POST['txt_password']);
                                        $v_firstname = $_POST['txt_firstname'];
                                        $v_lastname = $_POST['txt_lastname'];
                                        $v_customerid = $_POST['txt_customerid'];
                                        $v_telepon = $_POST['txt_telepon'];
                                        $v_email = $_POST['txt_email'];
                                        $v_sah = $_POST['txt_sah'];
                                        $v_fax = $_POST['txt_fax'];
                                        $v_comment = $_POST['txt_comment'];
                                        $v_company = $_POST['txt_companyname'];

                                    $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbpelanggan WHERE username='$v_username' or email='$v_email' or idcustomer='$v_customerid'"));


                                    if ($cek > 0){
                                    echo "<script>window.alert('Username atau NIP Sudah Terdaftar')
                                    window.location='add_cust.php'</script>";
                                    }else {

                                        $simpan = $conn->query("INSERT INTO tbpelanggan (idcustomer, firstname, lastname, username, password, email, telepon, idcompany, fax, komentar, valid, tgldibuat, tglupdate) VALUES ('".$v_customerid."', '".$v_firstname."','".$v_lastname."', '".$v_username."', '".$v_password."', '".$v_email."', '".$v_telepon."', '".$v_company."', '".$v_fax."', '".$v_comment."', '".$v_sah."',NOW(),NOW())");

                                        if ($simpan){
                                            echo "<script>
                                                    alert('Data Customer Berhasil Di Simpan !');
                                                    window.location.href='index.php?agen=cust';</script>";
                                        }else{
                                            echo "<script>alert('Data Customer Gagal Di Simpan !');</script>";
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
