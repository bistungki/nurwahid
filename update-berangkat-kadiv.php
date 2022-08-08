 
<?php
include("config.php");


			$baca="sudah dibaca";
			$status="belum dibaca";
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$sql = mysqli_query($db, "update kapal_berangkat SET baca='$baca' where baca='$status'") or die(mysqli_error($db));
			
			//jika hasil query = 0 maka muncul pesan error
			
			if($ql){
							header('Location: form-kapal-kadiv.php?status=sukses');
						}else{
							header('Location: form-kapal-kadiv.php?status=gagal');
						}


					
	
?>
 