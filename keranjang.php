<?php 
  session_start();
  include'koneksi.php';
  if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="loginuser.php"</script>';
  }




      $logo = mysqli_query($koneksi, "SELECT * FROM `content` WHERE id = 2;");
      $lg = mysqli_fetch_object($logo);

      $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '".$_SESSION['id']."'");
      $d = mysqli_fetch_object($query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
      <title>Togel | Online Store Website</title>
      <link rel="stylesheet" href="css/style-keranjang.css" >
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- menggunakan font awesome v6 -->
      <script src="https://kit.fontawesome.com/d07b1ba8d8.js" crossorigin="anonymous"></script>

    </head>
<body> 
   <!-- Bagian Header -->
   <div class="header">

   <div class="container">
     <div class="navbar">
        <div class="logo">
         
            <img src="konten/<?php echo $lg->logo ?>" width="380px">
        </div>
        <nav class="nav">
          <ul>
               <li><a href="indexuser.php">Home</a></li>
              <li><a href="allproductsuser.php">Produk</a></li>
              <li><a href="hubungikamiuser.php">Hubungi Kami</a></li>
              <li><a href="akun.php">Akun</a></li>
              <li><a href="logoutuser.php">Logout</a></li>
              <li><a href="keranjang.php" class="cart"><i class="fa-solid fa-cart-shopping" ></i></a></li>
          </ul>
        </nav>
    </div>
   
   </div>
  </div>

  <!-- Bagian Keranjang -->


  <div class="small-container cart-page">
    <table>
      <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th></th>
        
      </tr>
      </thead>
      <tbody>
        <?php 


            $produk = mysqli_query($koneksi, "SELECT * FROM tabel_product LEFT JOIN cart USING (product_id) WHERE iduser = '".$_SESSION['para_user']->id_user."' ");
          if (mysqli_num_rows($produk) > 0) {
            while($p = mysqli_fetch_array($produk)){
             
             ?>
      <tr>
          <td><a href="produk/<?php echo $p['image'] ?>" target="_blank"> <img src="produk/<?php echo $p['product_image'] ?>" ></td>
          <td>Rp. <?php echo number_format($p['product_price']) ?></td>
          <td><?php echo $p['jumlah'] ?></td>
          
          <td>Rp. <?php echo number_format($p['subtotal']) ?></td>
          <td>
                <a href="hapuskeranjang.php?idp=<?php echo $p['idcart'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')"><input type="submit" name="updatepass" value="Hapus" class="btnhapusproduk"></a>
          </td>
          
        
      </tr>
      <?php }}
            else{ ?>
              <tr>
                <td colspan="4">Tidak ada data</td>
              </tr>

            <?php }
            
            ?>
      </tbody>
  </table>

 <div class="total-price">
    <table>
      <tr>
        <?php 
        $subtot = mysqli_query($koneksi, "SELECT  SUM(subtotal) as jumlah from cart WHERE iduser = '".$_SESSION['para_user']->id_user."'");
        $total = mysqli_fetch_object($subtot);
            ?>
        <td>Subtotal</td>
        <td>Rp. <?php echo number_format($total->jumlah) ?></td>
      </tr>
      <tr>
        
        <td>Biaya Ongkir Kemanapun</td>
        <td>Rp 20,000</td>
      </tr>
      <tr>
        <?php 
        $tj = $total->jumlah; 
        $tot = $tj + 20000;?>
        <td>Total Belanja</td>
        <td>Rp.<?php echo number_format($tot) 
      ?></td>
      </tr>
    </table>
    
    
   </div>
  <h3 class="h3form">Form Checkout</h3 >
  <form action="" method="POST" enctype="multipart/form-data">
    <label >Nama <br></label>
    <input type="text" name="nama" class="input-control" value="<?php echo $d->nama ?>" required><br>
    <label >Nomor Hp / Whatsapp <br></label>
    <input type="text" name="hp" class="input-control" value="<?php echo $d->hp ?>" required><br>
    <label >Alamat <br></label>
    <input type="text" name="alamat" class="input-control" value="<?php echo $d->alamat ?>" required><br>
    <label >Detail Alamat (Contoh : Blok/Patokan) <br></label>
    <input type="text" name="dalamat" class="input-control" placeholder="Opsional" ><br>
    <input type="submit" name="checkout" value="Checkout" class="submitprofili">
  </form>

  <?php
  // $produk = mysqli_query($koneksi, "SELECT * FROM tabel_product LEFT JOIN cart USING (product_id) WHERE iduser = '".$_SESSION['para_user']->id_user."' ");
  //         if (mysqli_num_rows($produk) > 0) {
  //           while($p = mysqli_fetch_array($produk)){
  //              print_r($p['product_nama']);
  //            }
  //       }
            
          if (isset($_POST['checkout'])){
          if ($total != '') {
            $nama     = $_POST['nama'];
            $hp       = $_POST['hp'];
            $alamat   = $_POST['alamat'];
            $dalamat  = $_POST['dalamat'];
            $idout    = $_SESSION['para_user']->id_user;
            $status   = "Menunggu Pembayaran"; 


              date_default_timezone_set("Asia/Jakarta");
              $waktucheckout = date("Y-m-d h:i:sa");

              //menyimpan pembelian/checkout
              $insert = mysqli_query($koneksi, "INSERT INTO checkout VALUES(
                    null,
                    '".$idout."',
                    '".$nama."',
                    '".$hp."',
                    '".$alamat."',
                    '".$dalamat."',
                    '".$waktucheckout."',
                    '".$status."',
                    '".$tot."',
                    null
                    
                )");
              $usr = 0;
              $last_id = mysqli_insert_id($koneksi);
              //mengupdate data pembelian/checkout
              $update = mysqli_query($koneksi, "UPDATE cart SET
                        idcheckout       = '".$last_id."',
                        iduser            = '".$usr."'
                        
                        WHERE iduser  = '".$_SESSION['id']."'
                      ");


          //     $get_id = mysqli_query($koneksi,"SELECT * FROM checkout ORDER BY id_checkout DESC LIMIT 1");
          //     $idcheckout;
          //     $itemharga;
          //     $itemid;
          //     while ($idcekout = mysqli_fetch_array($get_id)) {
          //       $idcheckout = $idcekout["id_checkout"];
          //     }

          //     $produku = mysqli_query($koneksi, "SELECT * FROM tabel_product LEFT JOIN cart USING (product_id) WHERE iduser = '".$_SESSION['para_user']->id_user."' ");
          //     while($prdk = mysqli_fetch_array($produku)){
          //         $itemharga = $prdk["product_price"];
          //      }
              

          //     $cart = mysqli_query($koneksi, "SELECT * FROM cart WHERE iduser = '".$_SESSION['para_user']->id_user."' ");
              
          //      while($crt = mysqli_fetch_array($cart)){
          //         $itemid = $crt["idcart"];
          //      }

          //      echo $idcheckout." ";
          //      echo $itemharga." ";
          //      echo $itemid." ";
              

              

          // if (mysqli_num_rows($produk) > 0) {
          //   while($p = mysqli_fetch_array($produk)){
          //       $save_product = mysqli_query($koneksi, "INSERT INTO detail_checkout VALUES(
          //           null,
          //           '".$idcheckout."',
          //           '".$itemid."',
          //           '".$itemharga."'
                    
          //       )");

          //       // if ($save_product) {
          //       // echo '<script>alert("Checkout Berhasil")</script>';
          //       // echo '<script>window.location="keranjang.php"</script>';
          //       // } else {
          //       //   echo'Gagal'.mysqli_error($koneksi);
          //       // }
          //    }
          // }

             

              // menyimpan cek out
            if ($update) {
              echo '<script>alert("checkout Berhasil!!! Silahkan Menuju Akun->Transaksi untuk pembayaran")</script>';
                echo '<script>window.location="keranjang.php"</script>';
                echo "New record created successfully. Last inserted ID is: " . $last_id;
              }else{
                echo'Gagal'.mysqli_error($koneksi);
              }
              
            }

          }

         ?>

</div>


  <!-- Bagian Footer -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col-1">
          <h3>Kunjungi Alamat Toko Kami</h3>
          <p><?php echo $lg->alamat ?></p>
          <h4><?php echo $lg->haribuka ?></h4>
          <h4><?php echo $lg->jambuka ?> </h4>
        </div>
        <div class="footer-col-2">
          <img src="konten/<?php echo $lg->logo ?>">
          <p>Online Store Paling Terpercaya!</p>
        </div>

          <div class="footer-col-3">
          <h3>Social Media</h3>
          <ul>
            <li><a href="<?php echo $lg->facebook ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a><a  href="<?php echo $lg->instagram ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a><a  href="<?php echo $lg->youtube ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
            <li></li>
            <li></li>
          </ul>
        </div>
      </div>
      <p class="copyright">Copyright 2022 - Softech Inc.</p>
    </div>
  </div>


</body>
</html>
