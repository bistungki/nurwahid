<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <meta content="" name="description">
  <meta content="" name="keywords">
  
   <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
 <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


<?php
session_start(); 
if($_SESSION['UPT']==""){
		header("location:index.php?pesan=gagal");
}

include 'config.php';

$no=0;
$no1=0;

if($_SESSION['UPT']=="ADMIN"){
include ('function.php');
head();
$sql = mysqli_query($db, "SELECT * FROM ijin_tinggal  ORDER BY id ASC") or die(mysqli_error($db));	

}

if($_SESSION['UPT']=="PENJAMIN"){
include ('function.php');
head_upt_mkw();
$UPT = "IMIGRASI KELAS II NON TPI MANOKWARI";
$email = $_SESSION['email'];
//$sql = mysqli_query($db, "SELECT * FROM ijin_tinggai WHERE UPT='$UPT' ORDER BY id ASC") or die(mysqli_error($db));
$sql = mysqli_query($db, "SELECT * FROM ijin_tinggal where email ='$email' ORDER BY id ASC") or die(mysqli_error($db));	
}


?>
</head>

<body>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Pelayanan Pemeriksaan Persyaratan Ijin Tinggal</h1>
     
    </div><!-- End Page Title -->

  
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
  
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <tr class="table-info">
					<th scope="col">No</th>
					<th scope="col">NAMA PENJAMIN</th>
					<th scope="col">NAMA PEMOHON</th>
					<th scope="col">TANGGAL PERMOHONAN</th>
					<th scope="col">WARGA NEGARA</th>
					<th scope="col">NO PASSPOR</th>
					<th scope="col">JENIS PERMOHONAN</th>
					<th scope="col">BERKAS</th>
					<th scope="col">STATUS</th>
					<th scope="col">ACTION</th>
                  </tr>
				  

        
				  
                </thead>
                <tbody>

				<?php
				
				if($_SESSION['UPT']=="ADMIN"){
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
				
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_array($sql)){
						$kalimat = preg_replace("/[^a-zA-Z]/", "", $data['berkas']);
						$result = substr($kalimat,0,-3);
						$no++; 
						//menampilkan data perulangan
                       echo '
						<tr>
						    <td>'.$no.'</td>
							<td>'.$data['nama_penjamin'].'</td>
							<td>'.$data['nama_pemohon'].'</td>
							<td>'.date('d-m-Y',strtotime($data['tanggal_permohonan'])).'</td>
							<td>'.$data['warga_negara'].'</td>
							<td>'.$data['no_passpor'].'</td>
							<td>'.$data['jenis_permohonan'].'</td>
							<td><a href="aset/'.$data['berkas'].'">'.$result.'</a></td> 
							<td>'.$data['ket'].'</td>
							<td>
							
								<a href="update-admin-terima.php?id='.$data['id'].'"> <button type="button" align="left" class="btn btn-info btn-xs">Terima</button></a> 
								<a href="form-update-tolak.php?id='.$data['id'].'"> <button type="button" align="left" class="btn btn-danger btn-xs">Tolak</button></a>
								<a href="form-update-berangkat.php?id='.$data['id'].'"> <button type="button" align="left" class="btn btn-warning btn-xs">Edit</button></a> 
								<a href="delete_berangkat.php?id='.$data['id'].'"> <button type="button" align="left" class="btn btn-success btn-xs">Delete</button></a>
                          <p>
							</td>
						</tr>
						 <p>
						
                   	';
					
					}
					
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="11">Tidak ada data.</td>
					</tr>
					';
				}
				}
				
				if($_SESSION['UPT']=="PENJAMIN"){

				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
				
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_array($sql)){
						$no++; 
						$kalimat = preg_replace("/[^a-zA-Z]/", "", $data['berkas']);
						$result = substr($kalimat,0,-3);
						//menampilkan data perulangan
						echo '
						<tr>
						    <td>'.$no.'</td>
							<td>'.$data['nama_penjamin'].'</td>
							<td>'.$data['nama_pemohon'].'</td>
							<td>'.date('d-m-Y',strtotime($data['tanggal_permohonan'])).'</td>
							<td>'.$data['warga_negara'].'</td>
							<td>'.$data['no_passpor'].'</td>
							<td>'.$data['jenis_permohonan'].'</td>
							<td><a href="aset/'.$data['berkas'].'">'.$result.'</a></td> 
							<td>'.$data['ket'].'</td>
							<td>

								<a href="form-update-berangkat.php?id='.$data['id'].'"> <button type="button" align="left" class="btn btn-warning btn-xs">Edit</button></a> 
								<a href="delete_berangkat.php?id='.$data['id'].'"> <button type="button" align="left" class="btn btn-success btn-xs">Delete</button></a>
                          <p>
							</td>
						</tr>
						 <p>
						';
					
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="11">Tidak ada data.</td>
					</tr>
					';
				}
}
				
				
				?> 
                </tbody>
              </table>
 
			  
			  
              <!-- End Table with stripped rows -->
<a href="cetak-berangkat-kadiv.php"><button type="button" align="left" class="btn btn-primary btn-sm">Export</button></a>


            </div>
          </div>

        </div>
      </div>

<?php 
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "Data per tanggal : " . date("d-m-Y ") . "| Jam : " .$jam." WIB";?>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
	  </main><!-- End #main -->

	
<!-- ======= Footer ======= -->

<?php
footer();
?>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>