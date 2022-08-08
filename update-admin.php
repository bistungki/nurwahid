
<?php
include("config.php");
$id= isset($_GET['id']) ? $_GET['id'] : '';

	// buat query
	$sql1 = "select*from kapal_berangkat where id='$id'";
	$hasil=mysqli_query($db,$sql1);;
	$query1 = mysqli_fetch_assoc($hasil);
	$file = $query1['file_permohonan'];
	if (file_exists("aset/$file")){
	unlink("aset/$file");
	

	$sql = "delete from kapal_berangkat where id='$id'";
	$query = mysqli_query($db, $sql);
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: form-kapal.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: form-kapal.php?status=gagal');
	}
	 
?>
