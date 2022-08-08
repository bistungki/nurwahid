
<html>

<head>
  <meta charset="utf-8">
  <title>Aplikasi P2it</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style media="screen">
  body {
    background-image: url(image/bag.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  #backlogin {
    background: white;
    width: 25%;
    height: 350px;
    border: 1px solid #d2d2d2;
    border-radius: 5px;
    margin-top: 150px;
  }

  @font-face {
    src: url('font/Product Sans Regular.ttf');
    font-family: Product Sans;
  }

  @font-face {
    src: url('font/OpenSans-Light.ttf');
    font-family: OpenSans-Light;
  }

  #backlogin form {
    margin-top: 15px;
    float: left;
    padding: 5px;
  }

  #backlogin .inputa {
    width: 90%;
    margin-top: 1px;
    height: 50px;
    border: 0px;
    border-bottom: 1px solid #6a82fb;
    font-size: 16px;
    font-family: OpenSans-Light;
    background: transparent;
  }

  #backlogin .wed {
    margin-top: 40px;
    width: 45%;
    height: 40px;
    background: #6a82fb;
    border: none;
    color: white;
    font-family: product sans;
    font-size: 20px;
    border-radius: 5px;
  }

  #backlogin h1 {
    text-align: center;
    padding: 5px;
    color: #6a82fb;
    font-family: Product Sans;
  }

  #backlogin hr {
    width: 50%;
    height: 4px;
    border: none;
    background: #6a82fb;
  }
</style>



<body>
  <center>
    <div id="backlogin">
      <h1>Login P2IT</h1>
      <hr>
      <form id="login" action="cek_login.php" method="post"> 
        <input type="text" class="inputa" name="email" value="" placeholder="Masukan email">
        <input type="password" class="inputa" name="password" value="" placeholder="Masukan password"> 
		<class="inputa"><?php if (isset($_GET['gagal'])) {
		echo 
                  "<div class='alert alert-danger alert-gradient alert-dismissible fade in' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>x</span></button>
                            <strong>Username atau Passwor Salah</strong> $_GET[gagal]
</div>";  }
?>
        <input type="submit" class="wed" name="" value="Submit"> <input type="reset" class="wed" name="" value="Reset"> </form>
    </div>
	
  </center>
</body>

</html>