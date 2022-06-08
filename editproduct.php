<?php 
//agar jika admin langsung membuka link web dashboard, maka akan diarahkan ke halaman login dulu
  session_start();
  include 'koneksi.php';
  if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
  }

  $produk = mysqli_query($koneksi, "SELECT * FROM tabel_product WHERE product_id = '".$_GET['id']."'");
  $p = mysqli_fetch_object($produk);

 ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Produk | Toko Gadget Online</title>
    <link rel="stylesheet" href="css/style-produk.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
</head> 
<body >
  <!-- Bagian Bar Navigasi -->
  <div class="sidebar">
    <div class="logo-details">
       <img src="images/logo_long.png" width="230px">
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="kategori.php" >
            <i class='bx bx-box' ></i>
            <span class="links_name">Kategori</span>
          </a>
        </li>
        <li>
          <a href="product.php" class="active">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
          <a href="content.php" >
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Content</span>
          </a>
        </li>
        <li>
          <a href="brand.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Brand</span>
          </a>
        </li>
        <li>
          <a href="setting.php" >
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>


  <!-- Bagian Content -->
  <div class="home-section">

    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Kelola Produk</span>
      </div>
      
      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['para_admin']->username ?> (Admin)</span>
      </div>
    </nav>

  <div class="home-content">
    <div class="overview-boxes">
         <div class="box">
          <div class="right-side">
            <h3>Edit Data Produk</h3 >
        <form action="" method="POST" enctype="multipart/form-data">
          <select class="input-control" name="kategori" required>
            <option value ="">-- Pilih --</option>
            <?php 
              $kategori = mysqli_query($koneksi, "SELECT * FROM tabel_kategori ORDER BY kategori_id ASC");
              while ($r = mysqli_fetch_array($kategori)) {
              
              ?>  
              <option value="<?php echo $r['kategori_id'] ?>"<?php echo ($r['kategori_id'] == $p->kategori_id)? 'selected':''; ?>> <?php echo $r['kategori_nama'] ?></option>
              
              <?php } ?>
             
          </select>
          <select class="input-control" name="brand" required>
            <option value ="">-- Pilih Brands --</option>
            <?php 
              $kategorii = mysqli_query($koneksi, "SELECT * FROM brand ORDER BY id ASC");
              while ($ri = mysqli_fetch_array($kategorii)) {
              
              ?>  
               <option value="<?php echo $ri['id'] ?>"<?php echo ($ri['id'] == $p->brand)? 'selected':''; ?>> <?php echo $ri['namabrand'] ?></option>
              
              <?php } ?>
             
          </select>
          <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p-> product_nama ?>" required>
          <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p-> product_price ?>" required>
          <img src="produk/<?php echo $p->product_image  ?>"width="200px">
          <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
          <input type="file" name="gambar" class="input-control" >
          <textarea class="input-control" name="deskripsi" placeholder="Deskripsi Produk"><?php echo $p-> product_deskripsi ?></textarea><br>
          <input type="text" name="stok" class="input-control" value="<?php echo $p->stok ?>">
          <input type="text" name="yt" class="input-control" placeholder="Link Youtube" value="<?php echo $p->yt ?>" required>
          <select class="input-control" name="status">
            <option value="">-- Pilih --</option>
            <option value="1"<?php echo ($p->product_status == 1)? 'selected':''; ?>>Aktif</option>
            <option value="0"<?php echo ($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
          </select>
          <input type="submit" name="submit" value="Edit Kategori" class="submitprofil">
        </form>
        <?php 
        echo 'Terakhir Update ';
        echo $p->updatestok;
          if (isset($_POST['submit'])){
            echo $p->updatestok;
            //Data inputan dari form
            $kategori   = $_POST['kategori'];
            $brand      = $_POST['brand'];
            $nama       = $_POST['nama'];
            $harga      = $_POST['harga'];
            $deskripsi  = $_POST['deskripsi'];
            $stok       = $_POST['stok'];
            $yt       = $_POST['yt'];
            $status     = $_POST['status'];
            $foto       = $_POST['foto'];

            //Data gambar yang baru
              $filename = $_FILES['gambar']['name'];
              $tmp_name = $_FILES['gambar']['tmp_name'];
            

            //jika admin ganti gambar 
            if ($filename != '') {
  
              $type1    = explode('.', $filename);
              $type2    = $type1[1]; 


              $ubahnama = 'produk'.time().'.'.$type2;
              $tipe_diizinkan = array('jpg','jpeg','png','gif');


              //Validasi format file
              if (!in_array($type2, $tipe_diizinkan)) {
                //Jika format file tidak ada di dalam tipe diizinkan
                echo '<script>alert("Format File yang diizinkan hanya JPG, PNG, JPEG, GIF")</script>';
              
              }else{
                unlink('./produk/'.$foto);
                echo 'Berhasil Diupload';
                
                move_uploaded_file($tmp_name, './produk/'.$ubahnama);
                $namagambar = $ubahnama;
              }

            }else{
              //jika admin tidak ganti gambar
              $namagambar = $foto;

            }

            
            //Querry update data produk
              date_default_timezone_set("Asia/Jakarta");
              $updatestok = date("Y-m-d h:i:sa");
            $update = mysqli_query($koneksi, "UPDATE tabel_product SET
                        kategori_id       = '".$kategori."',
                        brand             = '".$brand."',
                        product_nama      = '".$nama."',
                        product_price     = '".$harga."',
                        product_deskripsi = '".$deskripsi."',
                        product_image     = '".$namagambar."',
                        stok              = '".$stok."',
                        yt                = '".$yt."',
                        updatestok        = '".$updatestok."',
                        product_status    = '".$status."'
                        WHERE product_id  = '".$p-> product_id."'
                      ");
            if ($update) {
                echo '<script>alert("Ubah Data Berhasil")</script>';
                echo '<script>window.location="product.php"</script>';
              }else{
                echo'Gagal'.mysqli_error($koneksi);
              }

          }
         ?>
          </div>
      </div>


    
      

    </div>
  </div>
  </div>

<script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
<script>
            CKEDITOR.replace( 'deskripsi' );
      </script>
</body>
</html>