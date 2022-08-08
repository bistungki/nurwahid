<!doctype html>

		

<?php
session_start(); 
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
      <h1>Update Keberangkatan Kapal Asing</h1>
    </div><!-- End Page Title -->


<?php include('config.php'); ?>
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$sql = mysqli_query($db, "SELECT * FROM ijin_tinggal WHERE id='$id'") or die(mysqli_error($db));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($sql) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($sql);
			}
		}
		?>
	
	<form action="update_berangkat.php" method="POST" enctype="multipart/form-data" >
		<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
	<div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Penjamin</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_penjamin" value="<?= $data['nama_penjamin'] ?>"required/>
                  </div>
                </div>


	<div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Penjamin</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_pemohon" value="<?= $data['nama_pemohon'] ?>"required/>
                  </div>
                </div>
			
			<div class="row mb-3">
			<label for="tanggal_permohonan" class="col-sm-2 col-form-label">Tanggal Permohonan </label>
			<div class="col-sm-10">
			<label><input type="date" class="form-control" name="tanggal_permohonan" value="<?= $data['tanggal_permohonan'] ?>"required/>
			</div>
			</div>
			
			<div class="row mb-3">
			<label for="nama_kapal" class="col-sm-2 col-form-label">Warga Negara </label>
			<div class="col-sm-10">
			<input type="text" class="form-control" name="warga_negara" value="<?= $data['warga_negara'] ?>"required/>
			</div>
			</div>
			
			<div class="row mb-3">
			<label for="nama_kapal" class="col-sm-2 col-form-label">Nomor Passpor </label>
			<div class="col-sm-10">
			<input type="text" class="form-control" name="no_passpor" value="<?= $data['no_passpor'] ?>"required/>
			</div>
			</div>
			
			<div class="row mb-3">
			<label for="jenis_kapal" class="col-sm-2 col-form-label">Jenis Permohonan</label>
			<div class="col-sm-10">
	<select class="form-control" name="jenis_permohonan" required/>
	<?php $jenis = $data['jenis_permohonan']; ?>
	<option <?=($jenis=='ITK')?'selected="selected"':''?>>ITK</option>
	<option <?=($jenis=='ITAP')?'selected="selected"':''?>>ITAP</option>
	<option <?=($jenis=='Itas Baru 6 Bulan')?'selected="selected"':''?>>Itas Baru 6 Bulan</option>
	<option <?=($jenis=='Itas Baru 1 Tahun')?'selected="selected"':''?>>Itas Baru 1 Tahun</option>
	<option <?=($jenis=='Itas Baru 2 Tahun')?'selected="selected"':''?>>Itas Baru 2 Tahun</option>
	<option <?=($jenis=='Itas Perpanjangan 6 Bulan')?'selected="selected"':''?>>Itas Perpanjangan 6 Bulan</option>
	<option <?=($jenis=='Itas Perpanjangan 1 Tahun')?'selected="selected"':''?>>Itas Perpanjangan 1 Tahun</option>
	<option <?=($jenis=='Itas Perpanjangan 2 Tahun')?'selected="selected"':''?>>Itas Perpanjangan 2 Tahun</option>
	
</select>
			</div>
			</div>
			
			<div class="row mb-3">
			<label for="berkas">Pilih File (Maks:25Mb): </label>
			<div class="row-cols-auto">
			<input type="file" name="berkas"  required/><?= $data['berkas'] ?>
			</div>
			</div>
	
	
<a href="update_berangkat.php" button type="button" align="left" class="btn btn-success btn-xs">Simpan</button></a></a>
		</p>
		
		</fieldset>
	
	</form>

	
</main>