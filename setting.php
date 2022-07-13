<?php 
//agar jika admin langsung membuka link web dashboard, maka akan diarahkan ke halaman login dulu
	session_start();
	include 'koneksi.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

	//memasukkan update profil tadi ke dalam db diambil berdasarkan siapa yang login/session 
	
	$query = mysqli_query($koneksi, "SELECT * FROM tabel_admin WHERE admin_id = '".$_SESSION['id']."'");
	$d = mysqli_fetch_object($query);
 ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Setting | Toko Gadget Online</title>
    <link rel="stylesheet" href="css/style-setting.css">
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
          <a href="content.php">
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
          <a href="setting.php" class="active">
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
        <span class="dashboard">Setting</span>
      </div>
      
      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['para_admin']->username ?> (Admin)</span>
      </div>
    </nav>

	<div class="home-content">
		<div class="sales-boxes">
			<div class="recent-sales box">
				<h3>Update Profil</h3 >
				<form action="" method="POST">
					<input type="text" name="user" placeholder="Username" class="inputprofil" value="<?php echo $d->username ?>"required>
					<input type="text" name="nama" placeholder="Nama Panggilan" class="inputprofil" value="<?php echo $d->admin_nama ?>"required>
					<input type="number" name="nohp" placeholder="Nomor Hp" class="inputprofil" value="<?php echo $d->admin_telp ?>"required>
					<input type="text" name="email" placeholder="email" class="inputprofil" value="<?php echo $d->admin_mail ?>"required>
					<input type="text" name="alamat" placeholder="alamat" class="inputprofil" value="<?php echo $d->admin_alamat ?>"required>
					<input type="submit" name="submit" value="Update Profil" class="submitprofil">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$user		= $_POST['user'];
						$nama		= $_POST['nama'];
						$nohp		= $_POST['nohp'];
						$email	= $_POST['email'];
						$alamat	= $_POST['alamat'];

						$update = mysqli_query($koneksi, "UPDATE tabel_admin SET
												username = '".$user."',
												admin_nama = '".$nama."',
												admin_telp = '".$nohp."',
												admin_mail = '".$email."',
												admin_alamat = '".$alamat."'
												WHERE admin_id = '".$d->admin_id."'
												");
						if ($update) {
							header("refresh: 0");
							echo '<script>alert("Update Profil Berhasil!")</script>';
						}else{
							echo 'gagal'.mysqli_error($koneksi);
						}
						
					}
				 ?>
			</div>
			
			<div class="top-sales box">
				<h3>Ganti Password</h3 >
				<form action="" method="POST">
					<input type="text" name="pass1" placeholder="Password Baru" class="inputprofil" required>
					<input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="inputprofil" required>
				
					<input type="submit" name="updatepass" value="Ganti Password" class="submitprofil">
				</form>
				<?php 
					if(isset($_POST['updatepass'])){

						$pass1	= $_POST['pass1'];
						$pass2	= $_POST['pass2'];

						if ($pass2 != $pass1) {
							echo '<script>alert("GAGAL Password Tidak Sama")</script>';
						}else{
							$updatepass = mysqli_query($koneksi, "UPDATE tabel_admin SET
												password = '".md5($pass1)."'
												WHERE admin_id = '".$d->admin_id."' ");
							if ($updatepass) {
								header("refresh: 0");
								echo '<script>alert("Update Profil Berhasil!")</script>';
							}else{
								echo 'gagal'.mysqli_error($koneksi);
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