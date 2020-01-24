<div class="login-box">
        <div class="logo">
            <center><img src="images/logo-white.png" alt=""></center><br>
            <!-- <a href="javascript:void(0);"><b>CUSTOMER</b></a> -->
            <small>PT Industri Telekomunikasi Indonesia (Persero)</small>
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
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
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

        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Lupa Kata Sandi ?
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

        <div class="card">
                <div class="body">
                    <form id="sign_up" method="POST">
                      <div class="msg">Registrasi Akun</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <!-- <i class="material-icons">person</i> -->
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="regfirstname" placeholder="Firstname" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="regusername" placeholder="Username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                            <div class="form-line">
                                <input type="email" class="form-control" name="regemail" placeholder="Email Address" required>
                            </div>
                        </div>
                        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="signup">DAFTAR</button>
                    </form>
                </div>
            </div>
    </div>

<!-- Untuk Form Login -->
    <?php
if (isset($_GET['pesan'])) {
  echo "$_GET[pesan]";
}

include 'config.php';
if (isset($_POST['btlogin'])) {
  $user=$_POST['username'];
  $pass=md5($_POST['password']);
  $QueryLogin=$conn->query("SELECT * from tbpelanggan WHERE username='$user' and password='$pass'");
  $row=$QueryLogin->fetch_object();
  if ($QueryLogin->num_rows >0) {
    $QueryCheck=$conn->query("SELECT * from tbpelanggan WHERE username='$user' and password='$pass' and valid=1");
    $row=$QueryCheck->fetch_object();
    if ($QueryCheck->num_rows >0) {
      session_start();
      $_SESSION['id']=$row->id;
      $_SESSION['username']=$row->username;
      $_SESSION['firstname']=$row->firstname;
      $_SESSION['lastname']=$row->lastname;
      $_SESSION['account']=$row->account;
      $_SESSION['emailuser']=$row->email;
      echo "<script>alert('Selamat Datang ". $row->username."');window.location='index.php?cust=home'</script>";
    } else {
      session_start();
      session_destroy();
      echo "<script>alert('Aktifasi Email Anda Terlebih Dahulu');window.location='login.php?p=customer'</script>";
      $QueryCheck->close();
    }
  } else {
    session_start();
    session_destroy();
    echo "<script>alert('Anda Gagal Login');window.location='login.php?p=customer'</script>";
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

    $tampil = $conn->query("SELECT * FROM tbpelanggan WHERE email='$email'");
    if ($tampil->num_rows > 0) {
      $data = $tampil->fetch_object();

      $rubahdata = $conn->query("UPDATE tbpelanggan SET password = '".$password."', tglupdate='$tgl' WHERE email='$email'");

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
                  window.location.href='login.php?p=customer';</script>";
        }
      }
    } else {
      echo "<script>window.alert('Email Belum Terdaftar')
      window.location='login.php?p=customer'</script>";
    }
  }
 ?>

<!-- Untuk Form Registrasi -->
 <?php
    if (isset($_POST['signup'])){
          require_once('config/PHPMailer/PHPMailerAutoload.php');
          $hash = md5( rand(0,1000) );

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
          $customerid = rand(1000,5000);
          $username = mysqli_real_escape_string($conn,$_POST['regusername']);
          $email = mysqli_real_escape_string($conn,$_POST['regemail']);
          $firstname = mysqli_real_escape_string($conn,$_POST['regfirstname']);

          $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbpelanggan WHERE username='$username'"));


        if ($cek > 0){
        echo "<script>window.alert('Username Sudah Terdaftar')
        window.location='customer.php'</script>";
        }else {

            $simpan = $conn->query("INSERT INTO tbpelanggan (firstname,username,password,email,idcustomer,hash,tgldibuat,tglupdate) VALUES ('".$firstname."','".$username."','".md5($password)."','".$email."','".$customerid."','".$hash."',NOW(),NOW())");

            if ($simpan){
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
              $mail->addAddress($email, $username);

              // Subjek email
              $mail->Subject = 'Signup | Verification';
              // Mengatur format email ke HTML
              $mail->isHTML(true);
              // Konten/isi email
              // $mail->addAttachment('lmp/file1.pdf');
              // $mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png');

              $mail->Body = '

                Thanks for signing up! <br>
                Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below. <br>
<br>
                ------------------------<br>
                Username: '.$username.'<br>
                Password: '.$password.'<br>
                ------------------------<br>
<br>
                Please click this link to activate your account:<br>
                http://localhost/helpdesk/login.php?p=verify&email='.$email.'&hash='.$hash.'

                ';
              if (!$mail->send()) {
                  echo "Mailer Error: " . $mail->ErrorInfo;
              } else {

                echo "<script>
                        alert('Akun Anda telah dibuat, silakan verifikasi dengan mengklik tautan aktivasi yang telah dikirimkan ke email Anda');
                        window.location.href='login.php?p=customer';</script>";
              }
            }else{
                echo "<script>alert('Data Anda Gagal Di Buat !');</script>";
            }
        }
}
?>
