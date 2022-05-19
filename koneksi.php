<?php

$host="localhost";
$username="root";
$password="";
$database="togel";

$koneksi=mysqli_connect($host, $username, $password, $database);
if(!$koneksi){
			echo "<SCRIPT type='text/javascript'>
		    alert('BERHASIL SAMBUNGAN');
            window.location.replace(\"../fr_posisi.php\");
            </SCRIPT>";
}

?>