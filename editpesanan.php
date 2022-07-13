<?php 
//agar jika admin langsung membuka link web dashboard, maka akan diarahkan ke halaman login dulu
  session_start();
  include 'koneksi.php';
  if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
  }

  $produk = mysqli_query($koneksi, "SELECT * FROM checkout WHERE id_checkout = '".$_GET['id']."'");
  $p = mysqli_fetch_object($produk);

 ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Edit Pesanan | Toko Gadget Online</title>
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
          <a href="pesanan.php" class="active">
            <i class='bx bx-task' ></i>
            <span class="links_name">Pesanan</span>
          </a>
        </li>
        <li>
          <a href="kategori.php" >
            <i class='bx bx-box' ></i>
            <span class="links_name">Kategori</span>
          </a>
        </li>
        <li>
          <a href="product.php">
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
          <a href="pesan.php">
            <i class='bx bx-message-square-detail'></i>
            <span class="links_name">Message </span>
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
            <h3>Edit Data Pesanan</h3 >
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="text" name="resi" class="input-control" placeholder="Resi Pengiriman" value="<?php echo $p->resi ?>" >

          <select class="input-control" name="status">
            <option value="">-- Pilih --</option>
            <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
            <option value="Pesanan Diproses">Pesanan Diproses</option>
            <option value="Pesanan DiKirim">Pesanan Dikirim</option>
            <option value="Pesanan Selesai">Pesanan Selesai</option>
          </select>
          <input type="submit" name="submit" value="Edit Kategori" class="submitprofil">
        </form>
        <?php 
       
          if (isset($_POST['submit'])){
            //Data inputan dari form
            
            $status     = $_POST['status'];
            $resi       = $_POST['resi'];
            $update = mysqli_query($koneksi, "UPDATE checkout SET
                      
                        status    = '".$status."',
                        resi    = '".$resi."' 
                        WHERE id_checkout  = '".$p-> id_checkout."'
                      ");
            if ($update) {
                echo '<script>alert("Ubah Data Berhasil")</script>';
                echo '<script>window.location="pesanan.php"</script>';
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