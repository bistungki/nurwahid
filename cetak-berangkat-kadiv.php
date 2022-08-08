<?php
session_start(); 
if($_SESSION['UPT']=""){
		header("location:index.php?pesan=gagal");
}


 if($_SESSION['UPT']="ADMIN"){
include ('function-cetak-kapal.php');
cetak_admin();
}


if($_SESSION['UPT']="PENJAMIN"){
include ('function-cetak-kapal.php');
cetak_penjamin();
}


?>






