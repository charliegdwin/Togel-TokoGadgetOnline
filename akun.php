<?php 
  session_start();
  include'koneksi.php';
  if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="loginuser.php"</script>';
  }
  error_reporting(0);
      $logo = mysqli_query($koneksi, "SELECT * FROM `content` WHERE id = 2;");
      $lg = mysqli_fetch_object($logo);

  $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '".$_SESSION['id']."'");
  $d = mysqli_fetch_object($query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
      <title> Akun | Togel Online Store Website</title>
      <link rel="stylesheet" href="css/style-akun.css" >
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- menggunakan font awesome v6 -->
      <script src="https://kit.fontawesome.com/d07b1ba8d8.js" crossorigin="anonymous"></script>

    </head>
<body> 
   <!-- Bagian Header -->
   <div class="containerh">
     <div class="navbar">
        <div class="logo">
         
            <img src="konten/<?php echo $lg->logo ?>" width="380px">
        </div>
        <nav class="navi">
          <ul>
              <li><a class="aa" href="indexuser.php">Home</a></li>
              <li><a class="aa"href="allproductsuser.php">Produk</a></li>
              <li><a class="aa"href="hubungikamiuser.php">Hubungi Kami</a></li>
              <li><a class="aa"href="akun.php">Akun</a></li>
              <li><a class="aa"href="logoutuser.php">Logout</a></li>
              <li><a href="keranjang.php" class="cart"><i class="fa-solid fa-cart-shopping" ></i></a></li>
          </ul>
        </nav>
    </div>
    
   </div>
<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
      Account settings
    </h4>

    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Ganti password</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Transaksi</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#history">Riwayat</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">
           
             
              <hr class="border-light m-0">

              <div class="card-body">
                <form action="" method="POST">
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input type="text" name="username" class="form-control mb-1" value="<?php echo $d->userid ?>">
                </div>
                <div class="form-group">
                  <label class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $d->nama ?>">
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail</label>
                  <input type="text" name="email" class="form-control mb-1" value="<?php echo $d->email ?>">
                </div>
                <div class="form-group">
                  <label class="form-label">Alamat Utama</label>
                  <input type="text" name="alamat" class="form-control" value="<?php echo $d->alamat ?>">
                </div>
                <div class="form-group">
                  <label class="form-label">No Hp</label>
                  <input type="text" name="hp" class="form-control" value="<?php echo $d->hp ?>">
                </div>
                <div class="button" >
                  <input type="submit" name="submituser" value="Save changes" >&nbsp;
              </div>
              </div>
              </form>
              
              <?php 
          if(isset($_POST['submituser'])){

            $username= $_POST['username'];
            $nama    = $_POST['nama'];
            $email   = $_POST['email'];
            $alamat  = $_POST['alamat'];
            $hp    = $_POST['hp'];

            $update = mysqli_query($koneksi, "UPDATE tb_user SET
                        userid = '".$username."',
                        nama = '".$nama."',
                        email = '".$email."',
                        alamat = '".$alamat."',
                        hp = '".$hp."'
                        WHERE id_user = '".$d->id_user."'
                        ");
            if ($update) {
              echo '<script>alert("Update Profil Berhasil!")</script>';
              echo '<script>window.location="akun.php"</script>';
              
            }else{
              echo 'gagal'.mysqli_error($koneksi);
            }
            
          }
         ?>

            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">
                <form action="" method="POST">
                <div class="form-group">
                  <label class="form-label">Password Baru</label>
                  <input type="password" name="pass1" placeholder="Password Baru" class="form-control" required>
                </div>

                <div class="form-group">
                  <label class="form-label">Ulangi Password Baru</label>
                  <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="form-control" required>
                </div>
                <div class="button" >
                  <input type="submit" name="submitpass" value="Save Password" >&nbsp;
              </div>
</form>
            <?php 
          if(isset($_POST['submitpass'])){

            $pass1  = $_POST['pass1'];
            $pass2  = $_POST['pass2'];

            if ($pass2 != $pass1) {
              echo '<script>alert("GAGAL Password Tidak Sama")</script>';
            }else{
              $updatepass = mysqli_query($koneksi, "UPDATE tb_user SET
                        password = '".md5($pass1)."'
                        WHERE id_user = '".$d->id_user."' ");
              if ($updatepass) {
                echo '<script>alert("Update Password Berhasil!")</script>';
                header("refresh: 0");
                
              }else{
                echo 'gagal'.mysqli_error($koneksi);
              }
            }
          }
         ?>
              </div>

            </div>
            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-2">

                


              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h5 class="mb-4">Transaksi Saat Ini</h5>
        
        <table border="0" cellspacing="0" class="tabelkategori">
          <thead>
            <tr>
              <th >ID Pesanan</th>
              <th>Tanggal</th>
              <th>Total</th>
              <th>Status</th>
              <th width="300px"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
              $beli = mysqli_query($koneksi, "SELECT * FROM checkout WHERE status = 'Menunggu Pembayaran' ORDER BY id_checkout DESC");
                if(mysqli_num_rows($beli) > 0){
                while($row = mysqli_fetch_array($beli)){
             ?>
            <tr>
              <td><?php echo $row['id_checkout'] ?></td>
              <td><?php echo $row['waktucheckout'] ?></td>
              <td><?php echo $row['total'] ?></td>
              <td><?php echo $row['status']?></td>
              
              <td >
                <a href="detailbeli.php?id=<?php echo $row['id_checkout'] ?>"><input type="submit" name="updatepass" value="Detail"class="btn btn-primary"></a> 
                <a href="hapusbelanja.php?id=<?php echo $row['id_checkout'] ?>"><input type="submit" name="updatepass" value="Batal" class="btn btn-danger"></a> 
                <a href="https://api.whatsapp.com/send?phone=6285815243464&text=Selesaikan%20Transaksi%20pembayaran%20sebesar%20Rp%20<?php echo number_format($row['total']) ?>%20ID%20Transaksi%20:%20<?php echo $row['id_checkout'] ?>%20ke%20Rekening%20326201012057%20Kemudian%20silahkan upload%20bukti%20pembayaran%20melalui%20whatsapp%20+62 858-1524-3464%20kami"><input type="submit" name="updatepass" target="_blank" value="Bayar" class="btn btn-success"></a> 
              </td>
            </tr>
            <?php }} else{ ?>
            <tr>
              <td colspan="4">Tidak Ada Data</td>
            </tr>
            <?php } 
            ?>
          
          </tbody>
        </table>
                

              </div>
      
            </div>

            <div class="tab-pane fade" id="history">
              <div class="card-body pb-2">

                


              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h5 class="mb-4">Transaksi Saat Ini</h5>
        
        <table border="0" cellspacing="0" class="tabelkategori">
          <thead>
            <tr>
              <th width="100px" >ID Pesanan</th>
              <th>Tanggal</th>
              <th>Total</th>
              <th>Status</th>
              <th>Resi</th>
              <th width="200px"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
              $beli1 = mysqli_query($koneksi, "SELECT * FROM checkout WHERE status = 'Pesanan Diproses' OR status = 'Pesanan Dikirim' OR status = 'Pesanan Selesai' ORDER BY id_checkout DESC");
                if(mysqli_num_rows($beli1) > 0){
                while($row1 = mysqli_fetch_array($beli1)){
             ?>
            <tr>
              <td><?php echo $row1['id_checkout'] ?></td>
              <td><?php echo $row1['waktucheckout'] ?></td>
              <td><?php echo $row1['total'] ?></td>
              <td><?php echo $row1['status']?></td>
              <td><?php echo $row1['resi']?></td>
              
              <td >
                <a href="detailbeli.php?id=<?php echo $row1['id_pembelian'] ?>"><input type="submit" name="updatepass" value="Detail"class="btn btn-primary"></a> 
                
              </td>
            </tr>
            <?php }} else{ ?>
            <tr>
              <td colspan="4">Tidak Ada Data</td>
            </tr>
            <?php } 
            ?>
          
          </tbody>
        </table>
                

              </div>
      
            </div>
            
            
          </div>
        </div>
      </div>
    </div>

    

  </div>

  <!-- Bagian Footer -->
  


</body>
</html>
