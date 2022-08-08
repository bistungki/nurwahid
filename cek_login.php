<?php 

 
session_start();
include 'config.php';

	$email = $_POST['email'];
    $password = $_POST['password'];
	
    $sql = mysqli_query($db,"SELECT * FROM user WHERE email='$email' AND password='$password'");
	$cek = mysqli_num_rows($sql);

	 if ($cek > 0) {
       $data = mysqli_fetch_assoc($sql);
	   
	   if($data['UPT']=="ADMIN"){
		   $_SESSION['UPT'] = "ADMIN";
		   $_SESSION['email'] = $data['email'];
		   header("Location:form-kadiv.php");
		   
	   }
	   else if($data['UPT']=="PENJAMIN"){
		   $_SESSION['UPT'] = "PENJAMIN";
		   $_SESSION['email'] = $data['email'];
		   header("Location:form-kadiv-penjamin.php");
		   
	   }
		
		
	 }
	 else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
		header("location:index.php?gagal");
    }

//hapus

?>