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

<?php 
 
include 'config.php';
 
error_reporting(0);
 
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

if (isset($_POST['cancel'])) {
	header('Location: form-kapal.php');
}

$email = $_SESSION['email'];


if (isset($_POST['submit'])) {
    $password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);
 
    if ($password == $cpassword) {
            $sql = "UPDATE user SET password='$password' WHERE email='$email'";
            $result = mysqli_query($db, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>

<main id="main" class="main">
<div class="pagetitle">
      <h1>Ganti Password</h1>
    </div><!-- End Page Title -->
	<form action="ganti_password.php" method="POST" enctype="multipart/form-data">
	<div class="row mb-3">
	<label for="nama_kapal" class="col-sm-2 col-form-label">Password Baru / New Password :</label>
	<div class="col-sm-10">
	<input type="password" class="form-control" name="password"required/>
	</div>
	</div>
	
	<div class="row mb-3">
	<label for="nama_kapal" class="col-sm-2 col-form-label">Konfirmasi Password /Confirm Password :</label>
	<div class="col-sm-10">
	<input type="password" class="form-control" name="cpassword"required/>
	</div>
	</div>
	
<input type="submit" value="Ubah" class="btn btn-primary" name="submit" />
<input type="submit" value="Cancel" class="btn btn-primary" name="cancel" />


		</p>
		
		</fieldset>
	
	</form>
 
 
</body>
</html>

