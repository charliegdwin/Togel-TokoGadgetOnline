<?php 
//agar jika admin langsung membuka web dashboard, maka akan diarahkan ke halaman login dulu
	session_start();
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Toko Gadget Online</title>
	<link rel="stylesheet" type="text/css" href="css/styledashboard.css"> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head> 
<body >
	<!-- Bagian Header -->
	<header>
		<div class="container">
		<h1><a href="dashboard.php">Selamat Datang Di Toko Gadget Online</a></h1>
		<ul>
			<li><a href="">home</a></li>
			<li><a href="">home</a></li>
			<li><a href="login.php">login</a></li>
			<li><a href="logout.php">logout</a></li>
		</ul>
	</div>
	</header>

	<!-- Bagian Content -->
	<div class="section">
		<div class="container">
			
			<div class="boxdashboard">
				<h3>Dashboard</h3>
				<h4>Selamat Datang <?php echo $_SESSION['para_user']->nama ?> </h4>
			</div>
			<div class ="boxcontent">
				<table>
					<tr>
						<td><button class="button button1">Tambah Gadget</button>&emsp;</td>
						<td><button class="button button2">Hapus Gadget</button></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>