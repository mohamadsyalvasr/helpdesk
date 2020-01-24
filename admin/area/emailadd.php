<div class="container-fluid">
   <div class="row clearfix">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="card">
               <div class="header">
                   <h2>
                       EMAIL ADDRESS
                   </h2>
                   <ul class="header-dropdown m-r--5">
                     <!-- <a href="#"><button type="button" class="btn btn-primary waves-effect">Tambah</button></a> -->
                   </ul>
               </div>
               <div class="body">
                   <div class="table-responsive">
                       <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                         <thead>
                         <tr>
                             <th>No</th>
                             <th>Name</th>
                             <th>Comment</th>
                             <!-- <th>Valid/Invalid</th> -->
                             <th>Changed</th>
                             <th>Created</th>
                         </tr>
                     </thead>
                     <tbody>
                     <?php
                         include 'config.php';
                         $tampil = $conn->query("SELECT * FROM tbemail");
                         if ($tampil->num_rows > 0){
                             $no = 0;
                             while ($data = $tampil->fetch_object()) {
                                 $no++;
                     ?>
                         <tr>
                             <td scope="row"><?= $no ?></td>
                             <td scope="row"><a href="index.php?agen=admin&edit=emailadd&id=<?= $data->id ?>"><?= $data->name ?></td>
                             <td scope="row"><?= $data->komentar ?></td>
                             <td scope="row"><?= $data->tgldibuat ?></td>
                             <td scope="row"><?= $data->tglupdate ?></td>
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
 </div>
