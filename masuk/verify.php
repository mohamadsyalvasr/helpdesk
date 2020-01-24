<div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Verifikasi Akun</b></a>
            <small>PT Industri Telekomunikasi Indonesia (Persero)</small>
        </div>
        <div class="card">
            <div class="body">
                <?php
                mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to database server(localhost) with username and password.
                mysql_select_db("helpdesk") or die(mysql_error()); // Select registration database.
                  if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
                      // Verify data
                      $email = mysql_escape_string($_GET['email']); // Set email variable
                      $hash = mysql_escape_string($_GET['hash']);

                      $search = mysql_query("SELECT email, hash, valid FROM tbpelanggan WHERE email='".$email."' AND hash='".$hash."' AND valid='0'") or die(mysql_error());
                      $match  = mysql_num_rows($search);

                      if($match > 0){
                            // We have a match, activate the account
                            mysql_query("UPDATE tbpelanggan SET valid='1' WHERE email='".$email."' AND hash='".$hash."' AND valid='0'") or die(mysql_error());
                            echo 'Your account has been activated, you can now login';
                        }else{
                            // No match -> invalid url or account has already been activated.
                            echo 'The url is either invalid or you already have activated your account. <br><br> <a href="pages/customer.php"><button class="btn btn-block btn-lg bg-pink waves-effect">SIGN IN</button></a>';
                        }
                  }else{
                      // Invalid approach
                      echo 'Invalid approach, please use the link that has been send to your email.';
                  }

                 ?>
            </div>
        </div>
    </div>
