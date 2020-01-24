<?php
include 'config.php';
if (isset($_GET['id'])){
        $NIP = $_GET['id'];
        $query = $conn->query("SELECT tbagen.*, tbroles.name as roles, tbdivisi.name as divisi FROM tbagen,tbroles,tbdivisi WHERE tbagen.idroles=tbroles.id AND tbagen.iddivisi=tbdivisi.id AND tbagen.id = '".$NIP ."'");
        $data = $query->fetch_object();
    }else{
        echo "<script>alert<'Anda Belum Memilih Data !');history.go(-1);</script>";
    }
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php
    include 'halaman/titleicon.php';
    ?>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php
    include 'halaman/topbar.php';
    // <!-- #Top Bar -->
    // <!-- Side Bar -->
    include 'halaman/sidebar.php';
     ?>
    <!-- #END Side Bar -->
    <section class="content">
        <div class="container-fluid">
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT AGEN
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
                                              <input type="number" name="txt_nip" class="form-control" value="<?php echo $data->nip; ?>" required="required" readonly required>
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
                                                <input type="text" name="txt_pengguna" class="form-control" value="<?php echo $data->username; ?>" required="required" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$">
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
                                                <input type="password" name="txt_katasandi" class="form-control" placeholder="Masukan Kata Sandi" value="<?php echo $data->password; ?>" required="required">
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
                                                <input type="text" name="txt_namapertama" class="form-control" value="<?php echo $data->firstname; ?>"  required="required">
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
                                                <input type="text" name="txt_namaterakhir" class="form-control" value="<?php echo $data->lastname; ?>" required="required">
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
                                                <input type="number" name="txt_telepon" class="form-control" value="<?php echo $data->telepon; ?>" required="required">
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
                                                <input type="email" name="txt_email" class="form-control" value="<?php echo $data->email; ?>" required="required">
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
                                        <label for="password_2">Roles</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select class="form-control show-tick" name="txt_roles" required>
                                                    <?php echo "<option value=$data->idroles>$data->roles</option>"; ?>
                                                    <?php
                                                    $query2 = $conn->query("SELECT * FROM tbroles WHERE id != $data->idroles");
                                                    while ($data2 = $query2->fetch_object()) {
                                                    echo "<option value=$data2->id>$data2->name</option>";
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
                                              <select class="form-control show-tick" name="txt_division" required>
                                                    <?php echo "<option value=$data->iddivisi>$data->divisi</option>"; ?>
                                                    <?php
                                                    $query2 = $conn->query("SELECT * FROM tbdivisi WHERE id != $data->iddivisi");
                                                    while ($data2 = $query2->fetch_object()) {
                                                    echo "<option value=$data2->id>$data2->name</option>";
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
                                                <input type="text" name="txt_produkname" class="form-control" placeholder="Masukan Produk Name" value="<?php echo $data->namaproduk; ?>" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <a href="index.php?agen=agen"><button type="button" class="btn btn-primary m-t-15 waves-effect" name="batal">BATAL</button></a>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="edit">SIMPAN</button>
                                    </div>
                                </div>
                            </form>
                            <?php
            if (isset($_POST['edit'])){
                if (isset($_POST['txt_sah'])){
                    $pengguna = $_POST['txt_pengguna'];
                    $katasandi = md5($_POST['txt_katasandi']);
                    $namapertama = $_POST['txt_namapertama'];
                    $namaterakhir = $_POST['txt_namaterakhir'];
                    $nip = $_POST['txt_nip'];
                    $telepon = $_POST['txt_telepon'];
                    $email = $_POST['txt_email'];
                    $sah = $_POST['txt_sah'];
                    $division = $_POST['txt_division'];
                    $produkname = $_POST['txt_produkname'];
                    $roles = $_POST['txt_roles'];

                $rubahdata = $conn->query("UPDATE tbagen SET username = '".$pengguna."', password = '".$katasandi."', firstname = '".$namapertama."', lastname = '".$namaterakhir."', nip = '".$nip."', telepon = '".$telepon."', email = '".$email."', valid = '".$sah."', iddivisi = '".$division."', namaproduk = '".$produkname."', idroles = '".$roles."', tglupdate = NOW() WHERE id = '".$_GET['id']."'");

                if ($rubahdata){
                    echo "<script>alert('Data Agen Berhasil di Edit!');window.location.href='index.php?agen=agen';</script>";
                }else{
                    echo "<script>alert('Data Agen Gagal di Edit!');</script>";
                }
            }
        }
        ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Ckeditor -->
    <script src="//cdn.ckeditor.com/4.10.0/basic/ckeditor.js"></script>
    <script>
			CKEDITOR.replace( 'ckeditor' );
		</script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
