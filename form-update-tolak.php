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
      <h1>Notice Penolakan</h1>
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
	
	<form action="update-admin-tolak.php" method="POST" enctype="multipart/form-data" >
		<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
	<div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Alasan Penolakan</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="ket"required/>
                  </div>
                </div>
	
<a href="update-admin-tolak.php"><button button type="button" align="left" class="btn btn-success btn-xs">Simpan</button></a>
		</p>
		
		</fieldset>
	
	</form>

	
</main>