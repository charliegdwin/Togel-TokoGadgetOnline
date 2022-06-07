<?php 
//agar jika admin langsung membuka link web dashboard, maka akan diarahkan ke halaman login dulu
  session_start();
  include 'koneksi.php';
  if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
  }

  $kategori = mysqli_query($koneksi, "SELECT * FROM tabel_kategori WHERE kategori_id = '".$_GET['id']."'");
  if(mysqli_num_rows($kategori) == 0){
    echo '<script>window.location="kategori.php"</script>';
  }
  $k = mysqli_fetch_object($kategori);
 ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Edit Kategori | Toko Gadget Online</title>
    <link rel="stylesheet" href="css/style-editkategori.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a href="kategori.php" class="active">
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
        <span class="dashboard">Kelola Kategori</span>
      </div>
      
      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['para_admin']->username ?> (Admin)</span>
      </div>
    </nav>

  <div class="home-content">
    <div class="sales-boxes">
      

      <div class="top-sales box">
        <h3>Edit Data Kategori</h3 >
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="text" name="nama" placeholder="Nama Kategori" class="inputprofil" value="<?php echo $k-> kategori_nama ?>"required>
          <img src="kategori/<?php echo $k->kategori_gambar ?>" width="200px">
          <input type="hidden" name="foto" value="<?php echo $k->kategori_gambar ?>">
          <input type="file" name="gambar" class="input-control" >
          <input type="submit" name="submit" value="Edit Kategori" class="submitprofil">
        </form>
        <?php 
          if (isset($_POST['submit'])){
            $nama = ucwords($_POST['nama']);
            $foto = $_POST['foto'];

            $filename = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];

            //jika admin ganti gambar 
            if ($filename != '') {
  
              $type1    = explode('.', $filename);
              $type2    = $type1[1]; 

              $ubahnama = 'kategori'.time().'.'.$type2;
              $tipe_diizinkan = array('jpg','jpeg','png','gif');

              //Validasi format file
              if (!in_array($type2, $tipe_diizinkan)) {
                //Jika format file tidak ada di dalam tipe diizinkan
                echo '<script>alert("Format File yang diizinkan hanya JPG, PNG, JPEG, GIF")</script>';
              
              }else{
                unlink('./kategori/'.$foto);
                echo 'Berhasil Diupload';
                move_uploaded_file($tmp_name, './kategori/'.$ubahnama);
                $namagambar = $ubahnama;
              }

            }else{
              //jika admin tidak ganti gambar
              $namagambar = $foto;

            }

            $update = mysqli_query($koneksi, "UPDATE tabel_kategori SET
                        kategori_nama = '".$nama."',
                        kategori_gambar = '".$namagambar."'
                        WHERE kategori_id = '".$k->kategori_id."' 
                        ");

            if ($update) {
              echo '<script>alert("Edit Data Kategori Berhasil!")"</script>';
              echo '<script>window.location="kategori.php"</script>';
            }else{
              echo 'gagal'.mysql_error($koneksi);
            }
          }
         ?>
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

</body>
</html>