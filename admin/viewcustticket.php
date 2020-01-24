<?php
include 'config.php';

if (isset($_GET['id'])){
    $ID = $_GET['id'];
    $query = $conn->query("SELECT tbtiket.*, tbstate.name as state,tblocked.name as locked, tbdivisi.name as divisi, tbagen.firstname as own, tbagen.username as userown FROM tbtiket,tbstate,tblocked,tbdivisi,tbagen WHERE tbtiket.idstate=tbstate.id AND tbtiket.idlock=tblocked.id AND tbtiket.penerima=tbdivisi.id AND tbtiket.idagen_owner=tbagen.id AND idcustomer = '".$ID ."' ORDER BY tgldibuat DESC");
    // $data = $query->fetch_object();

}else{
    echo "<script>alert<'Anda Belum Memilih Data !'>;history.go(-1);</script>";
}
 ?>

 <section class="content">
     <div class="container-fluid">
         <div class="block-header">
             <h2>
                 TIKET
                 <small>Lihat Tiket | <b>PT Industri Telekomunikasi Indonesia</b></small>
             </h2>
         </div>
         <!-- Lihat Tiket -->
         <div class="row clearfix">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="card">
                     <div class="header">
                         <h2>
                             TIKET
                         </h2>
                     </div>
                     <div class="body">
                         <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                 <thead>
                                     <tr>
                                       <th>No</th>
                                       <th>Tiket #</th>
                                       <th>Age</th>
                                       <th>From / Subject</th>
                                       <th>State</th>
                                       <th>Locked</th>
                                       <th>Queue</th>
                                       <th>Owner</th>
                                     </tr>
                                 </thead>
                                 <tfoot>
                                     <tr>
                                       <th>No</th>
                                       <th>Tiket #</th>
                                       <th>Age</th>
                                       <th>From / Subject</th>
                                       <th>State</th>
                                       <th>Locked</th>
                                       <th>Queue</th>
                                       <th>Owner</th>
                                     </tr>
                                 </tfoot>
                                 <tbody>
                                   <?php
                                   if ($query->num_rows > 0){
                                       $no = 0;
                                       while ($data = $query->fetch_object()) {
                                           $no++;

                                        date_default_timezone_set('Asia/Jakarta');
                                        $awal  = date_create($data->tgldibuat);
                                        $akhir = date_create(); // waktu sekarang
                                        $diff  = date_diff( $awal, $akhir );
                                   ?>

                                   <tr>
                                       <td scope="row"><input type="checkbox" id="<?php echo $no ?>" class="filled-in chk-col-pink"><label for="<?php echo $no ?>"><?php echo $no ?></label></td>
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
                                       <td scope="row"><?= $data->pengirim ?><br><?= $data->subject ?></td>
                                       <td scope="row"><?= $data->state ?></td>
                                       <td scope="row"><?= $data->locked ?></td>
                                       <td scope="row"><?= $data->divisi ?></td>
                                       <td scope="row"><?= $data->own ?><br>( <?= $data->userown ?> )</td>
                                   </tr>
                                   <?php
                                   }
                                       } else {
                                         echo "Data Kosong";
                                       }
                                    ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- #END# Lihat Tiket -->
     </div>
 </section>
