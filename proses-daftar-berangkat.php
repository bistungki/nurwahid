<?php
include("config.php");
error_reporting(0);
 
session_start(); 
if($_SESSION['UPT']==""){
		header("location:index.php?pesan=gagal");
}

if($_SESSION['UPT']=="PENJAMIN"){
          
if(isset($_POST['simpan_berangkat'])){
	
	// ambil data dari formulir
	$sql = "SELECT*FROM ijin_tinggal WHERE id IN (SELECT MAX(id) FROM ijin_tinggal)";
	$hasil=mysqli_query($db,$sql);
	$data = mysqli_fetch_assoc($hasil);
	
    $id = $data['id']+1;
	$nama_penjamin = $_POST['nama_penjamin'];
	$tanggal_permohonan = $_POST['tanggal_permohonan'];
	$nama_pemohon = $_POST['nama_pemohon'];
	$warga_negara = $_POST['warga_negara'];
	$no_passpor = $_POST['no_passpor'];
	$jenis_permohonan = $_POST['jenis_permohonan'];
	$status = "Menunggu Konfirmasi";
	$ket = "Menunggu Konfirmasi";
	$email = $_SESSION['email'];
	
	$allowed_ext	= array('pdf');
	$file_name		= $_FILES['berkas']['name'];
	$file_ext		= strtolower(end(explode('.', $file_name)));
	$file_size		= $_FILES['berkas']['size'];
	$file_tmp		= $_FILES['berkas']['tmp_name'];
	//$nama           = $file_name;
	$nama           = $id.".".$file_name;
	// buat query
	
	//$sql = "INSERT INTO kapal_berangkat (id,nomor_permohonan,tanggal_permohonan,perihal,tanggal_datang,nama_kapal,jenis_kapal,jumlah_crew,jumlah_passanger,next_port,file_permohonan) VALUE ('$id','$nomor_permohonan','$tanggal_permohonan','$perihal','$tanggal_datang','$nama_kapal','$jenis_kapal','$jumlah_crew','$jumlah_passanger','$next_port','$nama')";
	//$query = mysqli_query($db, $sql);
	
	if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 26101750){
						$lokasi = 'aset/'.$nama;
						move_uploaded_file($file_tmp, $lokasi);
						$sql = "INSERT INTO ijin_tinggal(id,nama_penjamin,nama_pemohon,tanggal_permohonan,warga_negara,no_passpor,jenis_permohonan,berkas,status,email,ket) VALUE ('$id','$nama_penjamin','$nama_pemohon','$tanggal_permohonan','$warga_negara','$no_passpor','$jenis_permohonan','$nama','$status','$email','$ket')";
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
			            document.location.href = 'form-berangkat.php';
			            </script>";
					}
				}else{
					echo "<script>
			        alert( 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!')
			        document.location.href = 'form-berangkat.php';
			        </script>";
				}
			}
}


if($_SESSION['UPT']=="ADMIN"){
          
if(isset($_POST['simpan_berangkat'])){
	
	// ambil data dari formulir
	$sql = "SELECT*FROM ijin_tinggal WHERE id IN (SELECT MAX(id) FROM ijin_tinggal)";
	$hasil=mysqli_query($db,$sql);
	$data = mysqli_fetch_assoc($hasil);
	
    $id = $data['id']+1;
	$nama_penjamin = $_POST['nama_penjamin'];
	$tanggal_permohonan = $_POST['tanggal_permohonan'];
	$nama_pemohon = $_POST['nama_pemohon'];
	$warga_negara = $_POST['warga_negara'];
	$no_passpor = $_POST['no_passpor'];
	$jenis_permohonan = $_POST['jenis_permohonan'];
	$status = "Menunggu Konfirmasi";
	$email = $_SESSION['email'];
	$ket = "Menunggu Konfirmasi";
	
	$allowed_ext	= array('pdf');
	$file_name		= $_FILES['berkas']['name'];
	$file_ext		= strtolower(end(explode('.', $file_name)));
	$file_size		= $_FILES['berkas']['size'];
	$file_tmp		= $_FILES['berkas']['tmp_name'];
	//$nama           = $file_name;
	$nama           = $id.".".$file_name;
	// buat query
	
	//$sql = "INSERT INTO kapal_berangkat (id,nomor_permohonan,tanggal_permohonan,perihal,tanggal_datang,nama_kapal,jenis_kapal,jumlah_crew,jumlah_passanger,next_port,file_permohonan) VALUE ('$id','$nomor_permohonan','$tanggal_permohonan','$perihal','$tanggal_datang','$nama_kapal','$jenis_kapal','$jumlah_crew','$jumlah_passanger','$next_port','$nama')";
	//$query = mysqli_query($db, $sql);
	
	if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 26101750){
						$lokasi = 'aset/'.$nama;
						move_uploaded_file($file_tmp, $lokasi);
						$sql = "INSERT INTO ijin_tinggal(id,nama_penjamin,nama_pemohon,tanggal_permohonan,warga_negara,no_passpor,jenis_permohonan,berkas,status,email,ket) VALUE ('$id','$nama_penjamin','$nama_pemohon','$tanggal_permohonan','$warga_negara','$no_passpor','$jenis_permohonan','$nama','$status','$email','$ket')";
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
			            document.location.href = 'form-berangkat.php';
			            </script>";
					}
				}else{
					echo "<script>
			        alert( 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!')
			        document.location.href = 'form-berangkat.php';
			        </script>";
				}
			}
}






 
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style2.css">
 
  
</head>
<body>
    <div class="alert alert-warning" role="alert">
       <?php echo $_SESSION['error']?> 
    </div>
	
	</body>
</html>