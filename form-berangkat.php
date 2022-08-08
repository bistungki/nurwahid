<!doctype html>
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
if($_SESSION['UPT']==""){
		header("location:index.php?pesan=gagal");
}

if($_SESSION['UPT']=="ADMIN"){
include ('function.php');
head();	
}

if($_SESSION['UPT']=="PENJAMIN"){
include ('function.php');
head_upt_mkw();
}
?>

<main id="main" class="main">
<div class="pagetitle">
      <h1>Pelayanan Pemeriksaan Persyaratan Ijin Tinggal</h1>
    </div><!-- End Page Title -->
	<form action="proses-daftar-berangkat.php" method="POST" enctype="multipart/form-data">
		<div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Penjamin / Name Of Guarantor :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_penjamin" required/>
                  </div>
                </div>


			<div class="row mb-3">
			<label for="perihal"class="col-sm-2 col-form-label">Nama Pemohon / Name Of Applicant :</label>
			<div class="col-sm-10">
			 <input type="text" class="form-control" name="nama_pemohon"required/>
			</div>
			</div>
			
			<div class="row mb-3">
			<label for="tanggal_permohonan" class="col-sm-2 col-form-label">Tanggal Permohonan / Application Date :</label>
			<div class="col-sm-10">
			<label><input type="date" class="form-control" name="tanggal_permohonan" required/></label>
			</div>
			</div>
			
			<div class="row mb-3">
			<label for="nama_kapal" class="col-sm-2 col-form-label">Warga Negara / Citizen :</label>
			<div class="col-sm-10">
			<input type="text" class="form-control" name="warga_negara"required/>
			</div>
			</div>
			
			<div class="row mb-3">
			<label for="nama_kapal" class="col-sm-2 col-form-label">Nomor Passpor / Passport Number :</label>
			<div class="col-sm-10">
			<input type="text" class="form-control" name="no_passpor"required/>
			</div>
			</div>
			
			<div class="row mb-3">
			<label for="jenis_kapal" class="col-sm-2 col-form-label">Jenis Permohonan / Type of Application :</label>
			<div class="col-sm-10">
	<select class="form-control" name="jenis_permohonan" required/>
	<option value="ITK ">ITK</option>
	<option value="ITAP">ITAP</option>
	<option value="Itas Baru 6 Bulan">Itas Baru 6 Bulan</option>
	<option value="Itas Baru 1 Tahun">Itas Baru 1 Tahun</option>
	<option value="Itas Baru 2 Tahun">Itas Baru 2 Tahun</option>
	<option value="Itas Perpanjangan 6 Bulan">Itas Perpanjangan 6 Bulan</option>
	<option value="Itas Perpanjangan 1 Tahun">Itas Perpanjangan 1 Tahun</option>
	<option value="Itas Perpanjangan 2 Tahun">Itas Perpanjangan 2 Tahun</option>
</select>
			</div>
			</div>
			
			<div class="row mb-3">
			<label for="berkas">Pilih File / Select File (Maks:25Mb): </label>
			<input type="file" name="berkas">
			</div>

			<input type="submit" value="SIMPAN" class="btn btn-primary" name="simpan_berangkat" />
		</p>
		
		</fieldset>
	
	</form>

	
</main>
