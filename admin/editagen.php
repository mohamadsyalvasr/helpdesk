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
