<?php
include 'config.php';
if (isset($_GET['id'])){
    $ID = $_GET['id'];
    $query = $conn->query("SELECT tbpelanggan.*,tbcompany.name as company FROM tbpelanggan,tbcompany WHERE tbpelanggan.idcompany=tbcompany.id AND tbpelanggan.id = '".$ID ."'");
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
                             INFO PELANGGAN :: <?= $data->firstname ?> <?= $data->lastname ?>
                         </h2>
                     </div>
                     <div class="body">
                           <div class="row clearfix">
                             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                               <label for="email_address_2">Firstname</label><br>
                               <label for="email_address_2">Lastname</label><br>
                               <label for="email_address_2">Username</label><br>
                               <label for="email_address_2">Password</label><br>
                               <label for="email_address_2">Email</label><br>
                               <label for="email_address_2">CustomerID</label><br>
                               <label for="email_address_2">Phone</label><br>
                               <label for="email_address_2">Company Name</label><br>
                               <label for="email_address_2">FAX</label><br>
                               <label for="email_address_2">Comment</label><br>
                             </div>
                             <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                               <?php echo '<label for="email_address_2"> : '.$data->firstname.'</label>' ?><br>
                               <?php echo '<label for="email_address_2"> : '.$data->lastname.'</label>' ?><br>
                               <?php echo '<label for="email_address_2"> : '.$data->username.'</label>' ?><br>
                               <?php echo '<label for="email_address_2"> : ************</label>' ?><br>
                               <?php echo '<label for="email_address_2"> : '.$data->email.'</label>' ?><br>
                               <?php echo '<label for="email_address_2"> : '.$data->idcustomer.'</label>' ?><br>
                               <?php echo '<label for="email_address_2"> : '.$data->telepon.'</label>' ?><br>
                               <?php echo '<label for="email_address_2"> : '.$data->company.'</label>' ?><br>
                               <?php echo '<label for="email_address_2"> : '.$data->fax.'</label>' ?><br>
                               <?php echo '<label for="email_address_2"> : '.$data->komentar.'</label>' ?><br>
                             </div>
                             </div>
                             <div class="row clearfix">
                                 <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                     <a href="index.php?agen=cust"> <button type="button" class="btn btn-primary m-t-15 waves-effect">KEMBALI</button></a>
                                 </div>
                             </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- #END# Horizontal Layout -->
