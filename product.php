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
      
      <div class="box2">
          <div class="right-side">
            <?php 


            $jumlahsmartwatch = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM `tabel_product` WHERE kategori_id = 13;");
            $js = mysqli_fetch_object($jumlahsmartwatch);
 ?>
            <div class="box-topic">Smartwatch</div>
            <div class="number"><?php echo $js->jumlah ?> </div>

          </div>
        </div>
        <div class="box2">
          <div class="right-side">
            <?php 

            $jumlahsmartphone = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM `tabel_product` WHERE kategori_id = 16;");
            $jsm = mysqli_fetch_object($jumlahsmartphone);
 ?>
            <div class="box-topic">Smartphone</div>
            <div class="number"><?php echo $jsm->jumlah ?> </div>
            
          </div>
        </div>
        <div class="box2">
          <div class="right-side">
            <?php 

            $jumlahlaptop = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM `tabel_product` WHERE kategori_id = 25;");
            $jl = mysqli_fetch_object($jumlahlaptop);
 ?>
            <div class="box-topic">Laptop</div>
            <div class="number"><?php echo $jl->jumlah ?> </div>
            
          </div>
        </div>
        <div class="box2">
          <div class="right-side">
            <?php 

            $jumlahtablet = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM `tabel_product` WHERE kategori_id = 27;");
            $jt = mysqli_fetch_object($jumlahtablet);
 ?>
            <div class="box-topic">Tablet</div>
            <div class="number"><?php echo $jt->jumlah ?> </div>
            
          </div>
        </div>
        <div class="box2">
          <div class="right-side">
             <?php 

            $jumlahkamera = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM `tabel_product` WHERE kategori_id = 28;");
            $jk = mysqli_fetch_object($jumlahkamera);
 ?>
            <div class="box-topic">Kamera</div>
            <div class="number"><?php echo $jk->jumlah ?> </div>
            
          </div>
        </div>
        <div class="box2">
          <div class="right-side">
            <?php 
            $jumlahproduk = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM `tabel_product`;");
            $jp = mysqli_fetch_object($jumlahproduk);

            ?>

            <div class="box-topic">Total Produk</div>
            <div class="number"><?php echo $jp->jumlah ?> </div>

          </div>
        </div>

         <div class="box">
          <div class="right-side">
            <h3>Tambah Data Produk</h3 >
        <form action="" method="POST" enctype="multipart/form-data">
          <select class="input-control" name="kategori" required>
            <option value ="">-- Pilih Kategori --</option>
            <?php 
              $kategori = mysqli_query($koneksi, "SELECT * FROM tabel_kategori ORDER BY kategori_id ASC");
              while ($r = mysqli_fetch_array($kategori)) {
              
              ?>  
              <option value="<?php echo $r['kategori_id'] ?>"> <?php echo $r['kategori_nama'] ?></option>
              
              <?php } ?>
             
          </select>
          <select class="input-control" name="brand" required>
            <option value ="">-- Pilih Brands --</option>
            <?php 
              $kategorii = mysqli_query($koneksi, "SELECT * FROM brand ORDER BY id ASC");
              while ($ri = mysqli_fetch_array($kategorii)) {
              
              ?>  
              <option value="<?php echo $ri['id'] ?>"> <?php echo $ri['namabrand'] ?></option>
              
              <?php } ?>
             
          </select>
          <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
          <input type="text" name="harga" class="input-control" placeholder="Harga" required>
          <input type="file" name="gambar" class="input-control" required>
          <textarea class="input-control" name="deskripsi" placeholder="Deskripsi Produk"></textarea><br>
          <input type="text" name="stok" class="input-control" placeholder="Stok" required>
          <input type="text" name="yt" class="input-control" placeholder="Link Youtube" required>
          <select class="input-control" name="status">
            <option value="">-- Status Pemasaran Produk --</option>
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
          </select>
          <input type="submit" name="submit" value="Tambah Produk" class="submitprofil">
        </form>
        <?php 
          if (isset($_POST['submit'])){
            //print_r($_FILES['gambar']);
            //Menampung Inputan form
            $kategori   = $_POST['kategori'];
            $brand      = $_POST['brand'];
            $nama       = $_POST['nama'];
            $harga      = $_POST['harga'];
            $deskripsi  = $_POST['deskripsi'];
            $stok       = $_POST['stok'];
            $yt       = $_POST['yt'];
            $status     = $_POST['status'];

            //Menampung data file yang diupload
            $filename   = $_FILES['gambar']['name'];
            $tmp_name   = $_FILES['gambar']['tmp_name'];

            $type1      = explode('.', $filename);
            $type2      = $type1[1]; 

            $ubahnama   = 'produk'.time().'.'.$type2;

            //Menampung tipe format data yang diizinkan untuk diupload sebagai gambar
            $tipe_diizinkan = array('jpg','jpeg','png','gif');

            //Validasi format file
            if (!in_array($type2, $tipe_diizinkan)) {
              echo '<script>alert("Format File yang diizinkan hanya JPG, PNG, JPEG, GIF")</script>';

            }
            elseif ($stok != '') {
              echo 'Berhasil Diupload';
              move_uploaded_file($tmp_name, './produk/'.$ubahnama);

              date_default_timezone_set("Asia/Jakarta");
              $updatestok = date("Y-m-d h:i:sa");

              $insert = mysqli_query($koneksi, "INSERT INTO tabel_product VALUES(
                
                    null,
                    '".$kategori."',
                    '".$brand."',
                    '".$nama."',
                    '".$harga."',
                    '".$deskripsi."',
                    '".$ubahnama."',
                    '".$stok."',
                    '".$yt."',
                    '".$updatestok."',
                    '".$status."',
                    null
                )");
          
              if ($insert) {
                echo '<script>alert("Tambah Data Berhasil")</script>';
                echo '<script>window.location="product.php"</script>';
              }else{
                echo'Gagal'.mysqli_error($koneksi);
              }
            }

          }
         ?>
          </div>
        </div>
        
          </div>
        </div>
        
        
      </div>


    <div class="sales-boxes">
      <div class="recent-sales box">
        <table cellspacing="0" class="tabelkategori">
          <thead>
            <tr>
              <th width="50px">ID</th>
              <th>Kategori</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Gambar</th>
              <th>Stok</th>
              <th>Update</th>
              <th>Status</th>
              <th width="220px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
              $produk = mysqli_query($koneksi, "SELECT * FROM tabel_product LEFT JOIN tabel_kategori USING (kategori_id) ORDER BY product_id ASC");
              if (mysqli_num_rows($produk) > 0) {
          
                while($row = mysqli_fetch_array($produk)){
             ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $row['kategori_nama'] ?></td>
              <td><?php echo $row['product_nama'] ?></td>
              <td>Rp. <?php echo number_format($row['product_price']) ?></td>
              <td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="produk/<?php echo $row['product_image'] ?>" width="100px"></a></td>
              <td><?php echo $row['stok'] ?></td>
              <td><?php echo $row['updatestok'] ?></td>
              
              <td><?php echo ($row['product_status'] == 0)? 'Stok Habis':'Stok Tersedia'; ?></td>
              <td>
                <a href="editproduct.php?id=<?php echo $row['product_id'] ?>"><input type="submit" name="updatepass" value="Edit" class="btneditproduk"></a> <a href="hapusproduk.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')"><input type="submit" name="updatepass" value="Hapus" class="btnhapusproduk"></a>
              </td>
            </tr>
            <?php }}
            else{ ?>
              <tr>
                <td colspan="9">Tidak ada data</td>
              </tr>

            <?php }
            ?>
          </tbody>
        </table>
        
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