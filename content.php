<?php 
//agar jika admin langsung membuka link web dashboard, maka akan diarahkan ke halaman login dulu
  session_start();
  include 'koneksi.php';
  if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
  }

  //memasukkan update profil tadi ke dalam db diambil berdasarkan siapa yang login/session 
  
  $query = mysqli_query($koneksi, "SELECT * FROM content WHERE id = 2");
  $c = mysqli_fetch_object($query);

 ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Content | Toko Gadget Online</title>
    <link rel="stylesheet" href="css/style-content.css">
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
          <a href="kategori.php">
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
          <a href="content.php" class="active">
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
        <span class="dashboard">Content</span>
      </div>
      
      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['para_admin']->username ?> (Admin)</span>
      </div>
    </nav>

  <div class="home-content">
    

    <div class="sales-boxes">
      <div class="recent-sales box">
        <h3>Logo</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <img src="konten/<?php echo $c->logo ?>" width="200px">
          <input type="hidden" name="fotologo" value="<?php echo $c->logo ?>">
          <input type="file" name="gambarlogo" class="input-control" >
          <input type="submit" name="submitlogo" value="Edit Logo" class="submitprofil">
        </form>
        <?php 
          if (isset($_POST['submitlogo'])){
              $fotologo     = $_POST['fotologo'];

              $filename = $_FILES['gambarlogo']['name'];
              $tmp_name = $_FILES['gambarlogo']['tmp_name'];

              //jika admin ganti gambar 
              if ($filename != '') {
    
                $type1    = explode('.', $filename);
                $type2    = $type1[1]; 

                $ubahnama = 'konten'.time().'.'.$type2;
                $tipe_diizinkan = array('jpg','jpeg','png','gif');

                //Validasi format file
                if (!in_array($type2, $tipe_diizinkan)) {
                  //Jika format file tidak ada di dalam tipe diizinkan
                  echo '<script>alert("Format File yang diizinkan hanya JPG, PNG, JPEG, GIF")</script>';
                
                }else{
                  unlink('./konten/'.$fotologo);
                  echo 'Berhasil Diupload';
                  move_uploaded_file($tmp_name, './konten/'.$ubahnama);
                  $namagambar = $ubahnama;
                }

              }else{
                //jika admin tidak ganti gambar
                $namagambar = $fotologo;

              }

              $update = mysqli_query($koneksi, "UPDATE content SET
                          logo = '".$namagambar."'
                          WHERE id = '".$c->id."' 
                          ");

              if ($update) {
                header("refresh: 0");
                echo '<script>alert("Update Header Berhasil!")</script>';
              }else{
                echo 'gagal'.mysql_error($koneksi);
              }
            }
           ?>
      </div>
      
      <div class="recent-sales box">
       <h3>Header</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="text" name="judulheader" placeholder="Judul Header" class="inputprofil" value="<?php echo $c-> judulh ?>"required>
          <input type="text" name="deskripsiheader" placeholder="Judul Header" class="inputprofil" value="<?php echo $c-> deskripsih ?>"required>
          <img src="konten/<?php echo $c->gambarh ?>" width="200px">
          <input type="hidden" name="fotoheader" value="<?php echo $c->gambarh ?>">
          <input type="file" name="gambarheader" class="input-control" >
          <input type="submit" name="submit" value="Edit Header" class="submitprofil">
        </form>
        <?php 
          if (isset($_POST['submit'])){
              $judulheader     = ucwords($_POST['judulheader']);
              $deskripsiheader = ucwords($_POST['deskripsiheader']);
              $fotoheader     = $_POST['fotoheader'];

              $filename = $_FILES['gambarheader']['name'];
              $tmp_name = $_FILES['gambarheader']['tmp_name'];

              //jika admin ganti gambar 
              if ($filename != '') {
    
                $type1    = explode('.', $filename);
                $type2    = $type1[1]; 

                $ubahnama = 'konten'.time().'.'.$type2;
                $tipe_diizinkan = array('jpg','jpeg','png','gif');

                //Validasi format file
                if (!in_array($type2, $tipe_diizinkan)) {
                  //Jika format file tidak ada di dalam tipe diizinkan
                  echo '<script>alert("Format File yang diizinkan hanya JPG, PNG, JPEG, GIF")</script>';
                
                }else{
                  unlink('./konten/'.$fotoheader);
                  echo 'Berhasil Diupload';
                  move_uploaded_file($tmp_name, './konten/'.$ubahnama);
                  $namagambar = $ubahnama;
                }

              }else{
                //jika admin tidak ganti gambar
                $namagambar = $fotoheader;

              }

              $update = mysqli_query($koneksi, "UPDATE content SET
                          judulh = '".$judulheader."',
                          deskripsih = '".$deskripsiheader."',
                          gambarh = '".$namagambar."'
                          WHERE id = '".$c->id."' 
                          ");

              if ($update) {
                header("refresh: 0");
                echo '<script>alert("Update Header Berhasil!")</script>';
              }else{
                echo 'gagal'.mysql_error($koneksi);
              }
            }
           ?>

      </div>
      

    </div>


    <div class="sales-boxes">
      <div class="recent-sales box">
        <h3>Produk Exclusive</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="text" name="judulex" placeholder="Judul Produk" class="inputprofil" value="<?php echo $c->judule ?>"required>
          <input type="text" name="deskripsiex" placeholder="Deskripsi Produk" class="inputprofil" value="<?php echo $c->deskripsie ?>"required>
          <input type="text" name="linke" placeholder="Link Produk" class="inputprofil" value="<?php echo $c->linke ?>"required>
          <img src="konten/<?php echo $c->gambare ?>" width="200px">
          <input type="hidden" name="fotoex" value="<?php echo $c->gambare ?>">
          <input type="file" name="gambarex" class="input-control" >
          <input type="submit" name="submitex" value="Edit Produk Exclusive" class="submitprofil">
        </form>
        <?php 
          if (isset($_POST['submitex'])){
              $judulex    = ucwords($_POST['judulex']);
              $deskripsiex = ucwords($_POST['deskripsiex']);
              $linke = ucwords($_POST['linke']);
              $fotoex    = $_POST['fotoex'];

              $filename = $_FILES['gambarex']['name'];
              $tmp_name = $_FILES['gambarex']['tmp_name'];

              //jika admin ganti gambar 
              if ($filename != '') {
    
                $type1    = explode('.', $filename);
                $type2    = $type1[1]; 

                $ubahnama = 'konten'.time().'.'.$type2;
                $tipe_diizinkan = array('jpg','jpeg','png','gif');

                //Validasi format file
                if (!in_array($type2, $tipe_diizinkan)) {
                  //Jika format file tidak ada di dalam tipe diizinkan
                  echo '<script>alert("Format File yang diizinkan hanya JPG, PNG, JPEG, GIF")</script>';
                
                }else{
                  unlink('./konten/'.$fotoex);
                  echo 'Berhasil Diupload';
                  move_uploaded_file($tmp_name, './konten/'.$ubahnama);
                  $namagambarex = $ubahnama;
                }

              }else{
                //jika admin tidak ganti gambar
                $namagambarex = $fotoex;

              }

              $update = mysqli_query($koneksi, "UPDATE content SET
                          judule = '".$judulex."',
                          deskripsie = '".$deskripsiex."',
                          linke = '".$linke."',
                          gambare = '".$namagambarex."'
                          WHERE id = '".$c->id."' 
                          ");

              if ($update) {
                echo '<script>alert("Update Produk Exclusive Berhasil!")</script>';
                echo '<script>window.location="content.php"</script>';
              }else{
                echo 'gagal'.mysql_error($koneksi);
              }
            }
           ?>
      </div>
      
      <div class="recent-sales box">
        <h3>Footer</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="text" name="alamat" placeholder="Alamat Toko" class="inputprofil" value="<?php echo $c->alamat ?>"required>
          <input type="text" name="haribuka" placeholder="Hari Buka" class="inputprofil" value="<?php echo $c->haribuka ?>"required>
          <input type="text" name="jambuka" placeholder="Jam Buka" class="inputprofil" value="<?php echo $c->jambuka ?>"required>
          <input type="text" name="facebook" placeholder="Facebook" class="inputprofil" value="<?php echo $c->facebook ?>"required>
          <input type="text" name="instagram" placeholder="Instagram" class="inputprofil" value="<?php echo $c->instagram ?>"required>
          <input type="text" name="youtube" placeholder="Twiter" class="inputprofil" value="<?php echo $c->youtube ?>"required>
          <input type="submit" name="submitfot" value="Edit Footer" class="submitprofil">
        </form>
        <?php 
          if (isset($_POST['submitfot'])){
              $alamat    = ucwords($_POST['alamat']);
              $haribuka = ucwords($_POST['haribuka']);
              $jambuka = ucwords($_POST['jambuka']);
              $facebook = ucwords($_POST['facebook']);
              $instagram = ucwords($_POST['instagram']);
              $youtube = ucwords($_POST['youtube']);
              

              $update = mysqli_query($koneksi, "UPDATE content SET
                          alamat = '".$alamat."',
                          haribuka = '".$haribuka."',
                          jambuka = '".$jambuka."',
                          facebook = '".$facebook."',
                          instagram = '".$instagram."',
                          youtube = '".$youtube."'
                          WHERE id = '".$c->id."' 
                          ");

              if ($update) {
                echo '<script>alert("Update Footer Berhasil!")</script>';
                echo '<script>window.location="content.php"</script>';
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