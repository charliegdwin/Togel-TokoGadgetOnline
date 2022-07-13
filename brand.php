<?php 
//agar jika admin langsung membuka link web dashboard, maka akan diarahkan ke halaman login dulu
  session_start();
  include 'koneksi.php';
  if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
  }

 ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Kategori | Toko Gadget Online</title>
    <link rel="stylesheet" href="css/style-kategori.css">
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
          <a href="pesanan.php" >
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
          <a href="brand.php" class="active">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Brand</span>
          </a>
        </li>
        <li>
          <a href="pesan.php" >
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
        <span class="dashboard">Kelola Kategori</span>
      </div>
      
      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['para_admin']->username ?> (Admin)</span>
      </div>
    </nav>

  <div class="home-content">
    <div class="sales-boxes">
      <div class="recent-sales box">
        <h3>Brands</h3 >
        
        <table border="1" cellspacing="0" class="tabelkategori">
          <thead>
            <tr>
              <th width="50px">ID</th>
              <th>Brand</th>
              <th>Gambar</th>
              <th width="400px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
              $kategori = mysqli_query($koneksi, "SELECT * FROM brand ORDER BY id ASC");
                if(mysqli_num_rows($kategori) > 0){
                while($row = mysqli_fetch_array($kategori)){
             ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['namabrand'] ?></td>
              <td><a href="brand/<?php echo $row['gambarbrand'] ?>" target="_blank"> <img src="brand/<?php echo $row['gambarbrand'] ?>" width="100px"></a></td>
              <td>
                <a href="editbrand.php?id=<?php echo $row['id'] ?>"><input type="submit" name="updatepass" value="Edit" class="btneditkategori"></a> <a href="hapusbrand.php?idb=<?php echo $row['id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')"><input type="submit" name="updatepass" value="Hapus" class="btneditkategori"></a>
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

      <div class="top-sales box">
        <h3>Tambah Brand</h3 >
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="text" name="nama" placeholder="Nama Kategori" class="inputprofil" required>
          <input type="file" name="gambar" class="input-control" required>
          <input type="submit" name="submit" value="Tambah Kategori" class="submitprofil">
        </form>
        <?php 
          if (isset($_POST['submit'])){
            $nama = ucwords($_POST['nama']);

            $filename = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];

          

            $type1    = explode('.', $filename);
            $type2    = $type1[1]; 

            $ubahnama = 'brand'.time().'.'.$type2;

            


            //Menampung tipe format data yang diizinkan untuk diupload sebagai gambar
            $tipe_diizinkan = array('jpg','jpeg','png','gif');

            //Validasi format file
            if (!in_array($type2, $tipe_diizinkan)) {
              echo '<script>alert("Format File yang diizinkan hanya JPG, PNG, JPEG, GIF")</script>';
            }else{
              //jika format file sesuai
              //proses upload file sekaligus insert ke database
              echo 'Berhasil Diupload';
              move_uploaded_file($tmp_name, './brand/'.$ubahnama);

            
            $insert = mysqli_query($koneksi, "INSERT INTO brand VALUES ( null,
                        '".$nama."',
                        '".$ubahnama."'
                    )");

            if ($insert) {
              header("refresh: 0");
              echo '<script>alert("Update Data Kategori Berhasil!")"</script>';
              echo '<script>window.location="brand.php"</script>';
            }else{
              echo 'gagal'.mysql_error($koneksi);
            }
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