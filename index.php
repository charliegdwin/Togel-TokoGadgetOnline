<?php 
  include'koneksi.php';

      $logo = mysqli_query($koneksi, "SELECT * FROM `content` WHERE id = 2;");
      $lg = mysqli_fetch_object($logo);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
      <title>Togel | Online Store Website</title>
      <link rel="stylesheet" href="css/style-index.css" >
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
              <li><a href="index.php">Home</a></li>
              <li><a href="allproducts.php">Produk</a></li>
              <li><a href="tentangkami.php">Tentang Kami</a></li>
              <li><a href="akun.php">Akun</a></li>
          </ul>
        </nav>
    </div>
    <div class="row">
      <div class="col-2">
          <h1><?php echo $lg->judulh ?></h1>
          <p><?php echo $lg->deskripsih ?></p>
          <a href="allproducts.php" class="btn">Jelajahi Sekarang!</i></a>
      </div>
      <div class="col-2">
          <img src="konten/<?php echo $lg->gambarh ?>">
      </div>
    </div>
   </div>
  </div>

  <!-- Bagian featured categories -->
  <div class="small-container">
     <h2 class="title">Kategori</h2>
    <div class="categories">
      
        <div class="row">
          <?php 
          $Kategori = mysqli_query($koneksi, "SELECT * FROM tabel_kategori ORDER BY  kategori_id ASC");
          if (mysqli_num_rows($Kategori) > 0) {
            while($k = mysqli_fetch_array($Kategori)){
         ?>
        <a href="allproducts.php?kat=<?php echo $k['kategori_id'] ?>">
          <div class="col-5">
            <img src="kategori/<?php echo $k['kategori_gambar'] ?>"  >
          </div>
        </a>
      <?php }}else{ ?>
        <p>Kategori tidak ada</p>
      <?php } ?>
        </div>
    </div>
  </div>
  
  <!-- Bagian Produk Pilihan -->
  <div class="small-container">
    <h2 class="title">Produk Pilihan</h2>
    <div class="categories">
        <div class="row">
         <?php 

          $produk = mysqli_query($koneksi, "SELECT * FROM tabel_product WHERE product_status = 1 ORDER BY rand() LIMIT 4");
          if (mysqli_num_rows($produk) > 0) {
            while($p = mysqli_fetch_array($produk)){
         ?>
         <a href="detailproduk.php?id=<?php echo $p['product_id'] ?> kat=<?php echo $p['kategori_id'] ?>">
          <div class="col-4">
            <img src="produk/<?php echo $p['product_image'] ?>" class=imgproduk >
            <p class="nama"><?php echo $p['product_nama'] ?></p>
            <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
          </div>
          </a>
        <?php }}else { ?>
          <p>Produk Tidak Ada</p>
        <?php } ?>
        </div>
    </div>

    <!-- Bagian Produk Terbaru -->
    <h2 class="title">Produk Terbaru</h2>
    <div class="row">
          <?php 

          $produk = mysqli_query($koneksi, "SELECT * FROM tabel_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
          if (mysqli_num_rows($produk) > 0) {
            while($p = mysqli_fetch_array($produk)){
         ?>
         <a href="detailproduk.php?id=<?php echo $p['product_id'] ?> kat=<?php echo $p['kategori_id'] ?>">
          <div class="col-4">
            <img src="produk/<?php echo $p['product_image'] ?>" class=imgproduk >
            <p class="nama"><?php echo $p['product_nama'] ?></p>
            <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
          </div>
          </a>
        <?php }}else { ?>
          <p>Produk Tidak Ada</p>
        <?php } ?>
        </div>
    </div>
  </div>

  <!-- Offer -->
    <div class="offer">
      <div class="small-container">
        <div class="row">
          <div class="col-2">
            <img class="col-2offer" src="konten/<?php echo $lg->gambare ?>" class="offer-img">
          </div>
          <div class="col-2">
              <p>Eksklusive Tersedia Di Toko Gadget Online</p>
              <h1><?php echo $lg->judule ?></h1>
              <small><?php echo $lg->deskripsie ?> <br></small>
              <a href="<?php echo $lg->linke ?>" class="btn">Beli Sekarang &#8594;</a>
          </div>
        </div>
        
      </div>
      
    </div>

  <!-- Testimonial -->
    <div class="testimonial">
      <div class="small-container">
        <div class="row">
          <div class="col-3">
            <i class="fa-solid fa-quote-left"></i>
            <p> Harga lebih murah dibandingkan toko lain dan bergaransi panjang </p>
           

            <div class="rating">

                <!-- memanggil icon di website font awesome v6 https://fontawesome.com/icons/star?s=solid -->
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                </div>
                <img src="images/user-2.png">
                <h3>Ahmad</h3>
          </div>
          <div class="col-3">
            <i class="fa-solid fa-quote-left"></i>
            <p> Harga miring produk original mantap </p>
           

            <div class="rating">

                <!-- memanggil icon di website font awesome v6 https://fontawesome.com/icons/star?s=solid -->
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                </div>
                <img src="images/user-1.png">
                <h3>Sinta Bella</h3>
          </div>



          <div class="col-3">
            <i class="fa-solid fa-quote-left"></i>
            <p> Kualitas pengiriman barang tidak diragukan </p>
           

            <div class="rating">

                <!-- memanggil icon di website font awesome v6 https://fontawesome.com/icons/star?s=solid -->
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                </div>
                <img src="images/user-3.png">
                <h3>Clara</h3>
          </div>
        </div>
        
      </div>

      
    </div>

  <!-- Brands -->
    <h2 class="title">Brands Kami</h2>
    <div class="brands">
      <div class="small-container">
        <div class="row">
          
             <?php 
          $Kategori = mysqli_query($koneksi, "SELECT * FROM brand ORDER BY id ASC");
          if (mysqli_num_rows($Kategori) > 0) {
            while($k = mysqli_fetch_array($Kategori)){
         ?>
          <div class="col-5">
            <img src="brand/<?php echo $k['gambarbrand'] ?>"  >
          </div>
        </a>
      <?php }}else{ ?>
        <p>Kategori tidak ada</p>
      <?php } ?>
        </div>
      </div>
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
