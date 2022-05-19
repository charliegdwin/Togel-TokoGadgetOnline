<?php 
    session_start();
    include 'koneksi.php';
                 ?>
<!doctype html>
<html>
<head>
        <title></title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrasi | Toko Gadget Online </title>
        <link rel="stylesheet" type="text/css" href="css/style.css"> 
        <!--baris 13-16 link code font ambil digoogle-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&family=Quicksand&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  
    </head>
    <body id="bg-registrasi">
        <div class="box-registrasi">
        <h1>Registrasi Toko Gadget Online</h1>
        <form action="" method="POST" >        
            <table>
                <tr>
                    <td width="120">Username</td>
                    <td><input type="text" name="userid" class="input-controlfrom" required></td>
                </tr>
                <tr>
                    <td width="120">Nama Lengkap</td>
                    <td><input type="text" name="nama" class="input-controlfrom" required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" class="input-controlfrom" required></td>
                </tr>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" class="input-controlfrom" required></td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td><input type="text" name="hp" class="input-controlfrom" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" class="input-controlfrom" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Registrasi" class="tombolregistrasi"></td>
                </tr>
            </table>
        </form>
        <?php 
        
            if (isset($_POST['submit'])) {
                $validasi=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_user WHERE userid='$_POST[userid]'"));
                  if ($validasi > 0) {
                      echo '<script language="javascript">
                            alert ("Username Sudah Digunakan Silahkan Masukkan Username lainnya");
                            window.location="form.php";
                            </script>';
                       exit();
                  }
                  else {
                    $password=md5($_POST['password']);
                    $userid  = $_POST['userid'];
                    $nama    = $_POST['nama'];
                    $alamat  = $_POST['alamat'];
                    $email   = $_POST['email'];
                    $hp      = $_POST['hp'];
                      mysqli_query($koneksi, "INSERT INTO tb_user (userid, nama, alamat, email, hp, password) 
                      VALUES ('$userid', '$nama', '$alamat', '$email', '$hp', '$password')");
                    
                      echo '<script language="javascript">
                                      alert ("Registrasi Berhasil!");
                                      window.location="login.php";
                                      </script>';
                                      exit();
                }

          /*$validasi=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_user WHERE userid='$_POST[userid]'"));
          if ($validasi > 0) {
              echo '<script language="javascript">
                    alert ("Username Sudah Digunakan");
                    window.location="form.php";
                    </script>';
               exit();
          }else {
          $password=md5('$_POST[password]');
          mysqli_query($koneksi, "INSERT INTO tb_user (userid, nama, alamat, email, hp, password) 
          VALUES ('$_POST[userid]', '$_POST[nama]', '$_POST[alamat]', '$_POST[email]', '$_POST[hp]', '$password')");
                    echo '<script language="javascript">
                          alert ("Registrasi Berhasil!");
                          window.location="form.php";
                          </script>';
                          exit();
                }*/
            }
        ?>
        </div>  


    </body>
    </html>
