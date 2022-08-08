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
include ('function.php');
head();	

if (isset($_POST['cancel'])) {
	header('Location: form-kapal.php');
}

 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $UPT = $_POST['UPT'];
    $password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);
	$status = ($_POST['status']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($db, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO user (email, UPT, password)
                    VALUES ('$email', '$UPT', '$password')";
            $result = mysqli_query($db, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $_POST['UPT'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>

<main id="main" class="main">
<div class="pagetitle">
      <h1>Silahkan Registrasi</h1>
    </div><!-- End Page Title -->
	<form action="register.php" method="POST" enctype="multipart/form-data">
	<div class="row mb-3">
	<label for="jenis_kapal" class="col-sm-2 col-form-label">LEVEL :</label>
	<div class="col-sm-10">
	<select class="form-control" name="UPT" required/>
	<option value="ADMIN ">ADMIN</option>
	<option value="PENJAMIN">PENJAMIN</option>
    </select>
	</div>
	</div>
	
	<div class="row mb-3">
	<label for="nama_kapal" class="col-sm-2 col-form-label">EMAIL :</label>
	<div class="col-sm-10">
	<input type="email" class="form-control" name="email"required/>
	</div>
	</div>
	
	<div class="row mb-3">
	<label for="nama_kapal" class="col-sm-2 col-form-label">PASSWORD :</label>
	<div class="col-sm-10">
	<input type="password" class="form-control" name="password"required/>
	</div>
	</div>
	
	<div class="row mb-3">
	<label for="nama_kapal" class="col-sm-2 col-form-label">CONFIRM PASSWORD :</label>
	<div class="col-sm-10">
	<input type="password" class="form-control" name="cpassword"required/>
	</div>
	</div>
	
<input type="submit" value="Register" class="btn btn-primary" name="submit" />
<input type="submit" value="Cancel" class="btn btn-primary" name="cancel" />


		</p>
		
		</fieldset>
	
	</form>
 
 
</body>
</html>


 

