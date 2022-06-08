<?php 
session_start();
include 'koneksi.php';
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style-login.css">
    <title>Login | Toko Gadget Online</title>
</head>
<body>
 
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login Admin
            </p>
            <img class="logo" src="images/logo_long.png">
            <div class="input-group">
                <input type="text" name="user" placeholder="Username" class="input-control" required>
            </div>
            <div class="input-group">
                <input type="password" name="pass" placeholder="Password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
        </form>
        <?php 
        if (isset($_POST['submit'])) {

            //mysqli_real_escape_string($koneksi agar sql tidak rusak ketika dimasukkan karakter seperti tanda kutip bintang dll
            $user = mysqli_real_escape_string($koneksi, $_POST['user']);
            $pass = mysqli_real_escape_string($koneksi, $_POST['pass']);
         
            $cek = mysqli_query($koneksi, "SELECT * FROM tabel_admin WHERE username = '".$user."' AND password = '".md5($pass)."'");
            //mencocokkan apabila user dan password sama dengan yang ada didatabase maka akan keluar angka 1 jika tidak ada maka 0
            if( mysqli_num_rows($cek) > 0){
                            $d = mysqli_fetch_object($cek);
                            $_SESSION['status_login'] = true;
                            $_SESSION['para_admin'] = $d;
                            $_SESSION['id'] = $d->admin_id;
                            echo '<script>window.location="dashboard.php"</script>';
                        }else{
                            echo '<script>alert("Username dan Password Salah!")</script>';
                        }
}
 ?>
    </div>
</body>
</html>
