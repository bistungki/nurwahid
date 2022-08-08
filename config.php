<?php
$envfile = 'C:\xampp\htdocs\p2it\.env';
use DevCoder\DotEnv;
if (file_exists($envfile)) {
    define('ENV_CONFIG', 'env.php');
    require_once ENV_CONFIG;
    (new DotEnv($envfile))->load();
}

$server = getenv("MYSQL_HOST");
$user =  getenv("MYSQL_USER");
$password =  getenv("MYSQL_PASSWORD");
$nama_database =  getenv("MYSQL_DATABASE");
$port =  getenv("MYSQL_PORT");

$db = mysqli_connect($server, $user, $password, $nama_database, $port);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>
