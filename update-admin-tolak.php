
<?php
include("config.php");
//$id= isset($_GET['id']) ? $_GET['id'] : '';
	
	// ambil data dari formulir
	$id = $_POST['id'];
	$status = "Ditolak";
	$ket = $_POST['ket'];
	

$sql = "update ijin_tinggal SET status='$status', ket='$ket' where id='$id'";
	$query = mysqli_query($db, $sql);
		if($query){
							header('Location: form-kapal.php?status=sukses');
						}else{
							header('Location: form-kapal.php?status=gagal');
						}
	 
?>
