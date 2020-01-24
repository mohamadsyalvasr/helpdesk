<div class="login-box">
    <div class="logo">
        <center><img src="images/logo-white.png" alt=""></center><br>
        <!-- <a href="javascript:void(0);">HELP DESK <b>INTI</b></a> -->
        <small>PT Industri Telekomunikasi Indonesia</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST">
                <div class="msg">Masuk Untuk Memulai Sesi Anda</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="txt_user" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="txt_password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <!-- <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Remember Me</label> -->
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit" name="btlogin">MASUK</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="body">
        <form id="forgot_password" method="POST">
            <div>
                <center>Lupa Kata Sandi ?</center>
                <br><br>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">email</i>
                </span>
                <div class="form-line">
                    <input type="email" class="form-control" name="forgotemail" placeholder="Email" required autofocus>
                </div>
            </div>

            <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="forgot_password">LUPA KATA SANDI</button>
        </form>
    </div>
</div>

<?php
if (isset($_GET['pesan'])) {
  echo "$_GET[pesan]";
}

//untuk mengambil koneksi
include 'config.php';
//untuk mengecek adanya pengiriman post dari btlogin
if (isset($_POST['btlogin'])) {
  //mengambil nilai post dari txt_user
  $user=$_POST['txt_user'];
  //mengambil nilai post dari txt_password
  $pass=md5($_POST['txt_password']);
  //query untuk mengambil data dari tblogin
  $QueryLogin=$conn->query("SELECT * from tbagen WHERE username='$user' and password='$pass'");
  //untuk mengambil data dari table login disimpan ke variable $row
  $row=$QueryLogin->fetch_object();
  //jika data lebih dari 0 / data pelanggan yang login terdaftar
  if ($QueryLogin->num_rows >0) {
    //memulai session di php
    session_start();
    //membuat session di php dan mengisinya dari field table
    $_SESSION['id']=$row->id;
    $_SESSION['username']=$row->username;
    $_SESSION['emailuser']=$row->email;
    // $_SESSION['apppassword'] = $row->apppassword;
    $_SESSION['leveluser']=$row->idroles;
    $_SESSION['firstname']=$row->firstname;
    $_SESSION['lastname']=$row->lastname;
    $_SESSION['account']=$row->account;
    $_SESSION['divisi']=$row->iddivisi;
    //mereload halaman ke home.php
    echo "<script>alert('Selamat Datang ". $row->username."');window.location='index.php?agen=home'</script>";
  } else {
    //memulai session di php
    session_start();
    //menghancurkan session
    session_destroy();
    //mereload data ke index.php dengan mengirimkan pesan di url yang nantinya akan ditangkap
    echo "<script>alert('Anda Gagal Login');window.location='sign-in.php'</script>";
    //menutup query login
    $QueryLogin->close();
  }
}
 ?>

 <!-- Untuk Form Forgot Password -->
 <?php
   if (isset($_POST['forgot_password'])) {
     require_once('config/PHPMailer/PHPMailerAutoload.php');
     $email = $_POST['forgotemail'];

     function create_random($length)
     {
         $data = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTU1234567890';
         $string = '';
         for($i = 0; $i < $length; $i++) {
             $pos = rand(0, strlen($data)-1);
             $string .= $data{$pos};
         }
         return $string;
     }

     $password = create_random(8);
     $date = date_create();
     $tgl = $date->format('Y-m-d H:i:s');

     $tampil = $conn->query("SELECT * FROM tbagen WHERE email='$email'");
     if ($tampil->num_rows > 0) {
       $data = $tampil->fetch_object();

       $rubahdata = $conn->query("UPDATE tbagen SET password = '".$password."', tglupdate='$tgl' WHERE email='$email'");

       if ($rubahdata){
         //mail php
         $mail = new PHPMailer;

         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'callserviceinti@gmail.com';
         $mail->Password = 'kmhlpxbdzmqirxrx';
         // $mail->Username = $_SESSION['emailuser'];
         // $mail->Password = $_SESSION['apppassword'];
         $mail->SMTPSecure = 'tls';
         $mail->Port = 587;

         $mail->setFrom('no-reply@gmail.com', 'Call Service INTI');
         $mail->addReplyTo('no-reply@gmail.com', 'Call Service INTI');
         $mail->addAddress($email, $data->username);

         // Subjek email
         $mail->Subject = 'Account Reset';
         // Mengatur format email ke HTML
         $mail->isHTML(true);
         // Konten/isi email
         // $mail->addAttachment('lmp/file1.pdf');
         // $mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png');

         $mail->Body = '

           Your account has been reseted! <br>
           You can login with the following credentials. <br>
           <br>
           ------------------------<br>
           Username: '.$data->username.'<br>
           Password: '.$password.'<br>
           ------------------------<br>
           <br>

           ';
         if (!$mail->send()) {
             echo "Mailer Error: " . $mail->ErrorInfo;
         } else {

           echo "<script>
                   alert('Akun Anda telah direset, silakan cek email Anda');
                   window.location.href='login.php?p=agen';</script>";
         }
       }
     } else {
       echo "<script>window.alert('Email Belum Terdaftar')
       window.location='login.php?p=agen'</script>";
     }
   }
  ?>
