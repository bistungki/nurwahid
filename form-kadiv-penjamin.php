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
  

<?php session_start(); 
include 'config.php';
include ('function.php');
head_upt_mkw();

?>

<html>
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
					<th scope="col">STATUS</th>
					<th scope="col">JUMLAH</th>
                  </tr>
                </thead>
                <tbody>

<?php
$menunggu = "Menunggu Konfirmasi";
$ditolak ="Ditolak";
$diterima = "Diterima";

$sql_menunggu = mysqli_query($db, "SELECT COUNT(id) as tunggu FROM ijin_tinggal WHERE status='$menunggu' ") or die(mysqli_error($db));
$data_menunggu = mysqli_fetch_array($sql_menunggu); 

$sql_tolak = mysqli_query($db, "SELECT COUNT(id) as tolak FROM ijin_tinggal WHERE status='$ditolak' ") or die(mysqli_error($db));
$data_tolak = mysqli_fetch_array($sql_tolak);

$sql_terima = mysqli_query($db, "SELECT COUNT(id) as terima FROM ijin_tinggal WHERE status='$diterima' ") or die(mysqli_error($db));
$data_terima = mysqli_fetch_array($sql_terima);
						
						
						echo '
						<tr>
						    <td>MENUNGGU KONFIRMASI</td>
							<td>'.$data_menunggu['tunggu'].'</td>
						</tr>
						<tr>
						    <td>DITOLAK</td>
                            <td>'.$data_tolak['tolak'].'</td>
						</tr>
						
						<tr>
						    <td>DITERIMA</td>
							<td>'.$data_terima['terima'].'</td>
						</tr>
						';
					
					
				?>
   </tbody>
              </table>
              <!-- End Table with stripped rows -->
			  
			  <a href="cetak-dasboard.php"><button type="button" align="left" class="btn btn-primary btn-sm">Export</button></a>


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
