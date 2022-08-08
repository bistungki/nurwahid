
<?php
include("config.php");
$id= isset($_GET['id']) ? $_GET['id'] : '';

	// buat query
	$sql1 = "select*from ijin_tinggal where id='$id'";
	$hasil=mysqli_query($db,$sql1);;
	$query1 = mysqli_fetch_assoc($hasil);
	$status = "Diterima";
	$ket = "Diterima";
	

$sql = "update ijin_tinggal SET status='$status', ket='$ket' where id='$id'";
	
	$query = mysqli_query($db, $sql);
		if($query){
							header('Location: form-kapal.php?status=sukses');
						}else{
							header('Location: form-kapal.php?status=gagal');
						}
	 
?>
