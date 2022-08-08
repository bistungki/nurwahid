 
<?php
include("config.php");
//$id= isset($_GET['id']) ? $_GET['id'] : '';
	
	// ambil data dari formulir
	$id = $_POST['id'];
	$nama_penjamin = $_POST['nama_penjamin'];
	$nama_pemohon = $_POST['nama_pemohon'];
	$tanggal_permohonan = $_POST['tanggal_permohonan'];
	$warga_negara = $_POST['warga_negara'];
	$no_passpor = $_POST['no_passpor'];
	$jenis_permohonan = $_POST['jenis_permohonan'];
	
	
	$allowed_ext	= array('pdf');
	$file_name		= $_FILES['berkas']['name'];
	$file_ext		= strtolower(end(explode('.', $file_name)));
	$file_size		= $_FILES['berkas']['size'];
	$file_tmp		= $_FILES['berkas']['tmp_name'];
	//$nama           = $file_name;
	$nama           = $id.".".$file_name;
	
	$sql1 = "select*from ijin_tinggal where id='$id'";
	$hasil=mysqli_query($db,$sql1);;
	$query1 = mysqli_fetch_assoc($hasil);
	$file = $query1['berkas'];
	if (file_exists("aset/$file")){
	unlink("aset/$file");
	
	// buat query
	if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 26101750){
						$lokasi = 'aset/'.$nama;
						move_uploaded_file($file_tmp, $lokasi);
						$sql = "update ijin_tinggal SET nama_penjamin='$nama_penjamin',nama_pemohon='$nama_pemohon',tanggal_permohonan='$tanggal_permohonan',warga_negara='$warga_negara',no_passpor='$no_passpor',jenis_permohonan='$jenis_permohonan',berkas='$nama' where id='$id'";
	$query = mysqli_query($db, $sql);
						if($query){
							header('Location: form-kapal.php?status=sukses');
						}else{
							header('Location: form-kapal.php?status=gagal');
						}
					}else{
						echo 
						"<script>
			            alert( 'Ukuran File Terlalu Besar!')
			            document.location.href = 'form-update-berangkat.php';
			            </script>";
					}
				}else{
					echo "<script>
			        alert( 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!')
			        document.location.href = 'form-update-berangkat.php';
			        </script>";
				}
 
	}
?>
 