
<?php function cetak_admin(){

require_once "./mpdf_v8.0.3-master/vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();
$nama_dokumen='LAPORAN IJIN TINGGAL';
ob_start();

include 'config.php';
$sql_mkw = mysqli_query($db, "SELECT * FROM ijin_tinggal  ORDER BY id ASC") or die(mysqli_error($db));

//echo $tampil;exit;

//Menghitung jumlah data pada database				
$no=0;
$no1=0;

 ?>
<html>
<head>
 <style>
  .table1 {
    font-family: arial;
    border-collapse: collapse;
    width: 50%;
    border: 1px solid #f2f5f7;
}


.table1 tr th{
    font-weight: bold;
}

.table1, th, td {
    border: 1px solid;
    padding: 8px 20px;
    text-align: center;
}

.table1 tr:hover {
	     background-color: #f5f5f5;
}

.table1 tr:nth-child(even) {
}




 </style>
</head>
<body>
<img src="kop.png">
<h4 style="text-align: center;">PELAPORAN IJIN TINGGAL</h1>
<h6 style="text-align:left;"><?php 
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "Data per tanggal : " . date("d-m-Y ") . "| Jam : " .$jam." WIB";?> </h6>
<h6 style="text-align: left;">UPT : IMIGRASI KELAS II NON TPI MANOKWARI</h6>
 <table style="width:100%" class="table1">
<tr>
            <th class="text-center index-clm">NO</th>
			<th>NAMA PENJAMIN</th>
			<th>NAMA PEMOHON</th>
			<th>TANGGAL PERMOHONAN</th>
			<th>WARGA NEGARA</th>
			<th>NO PASSPOR</th>
			<th>JENIS PERMOHONAN</th>
			<th>STATUS</th>
			
        </tr>

				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql_mkw) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
				
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_array($sql_mkw)){
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
							<td>'.$data['status'].'</td>
                          <p>
							</td>
						</tr>
						 <p>
						';
					}
					
					
				//jika query menghasilkan nilai 0
				}
				
				?>

</table>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>

<?php }?>



<?php function cetak_penjamin(){

require_once "./mpdf_v8.0.3-master/vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();
$nama_dokumen='LAPORAN IJIN TINGGAL';
ob_start();

include 'config.php';
$sql_mkw = mysqli_query($db, "SELECT * FROM ijin_tinggal  ORDER BY id ASC") or die(mysqli_error($db));

//echo $tampil;exit;

//Menghitung jumlah data pada database				
$no=0;
$no1=0;

 ?>
<html>
<head>
 <style>
  .table1 {
    font-family: arial;
    border-collapse: collapse;
    width: 50%;
    border: 1px solid #f2f5f7;
}


.table1 tr th{
    font-weight: bold;
}

.table1, th, td {
    border: 1px solid;
    padding: 8px 20px;
    text-align: center;
}

.table1 tr:hover {
	     background-color: #f5f5f5;
}

.table1 tr:nth-child(even) {
}




 </style>
</head>
<body>
<img src="kop.png">
<h4 style="text-align: center;">PELAPORAN IJIN TINGGAL</h1>
<h6 style="text-align:left;"><?php 
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "Data per tanggal : " . date("d-m-Y ") . "| Jam : " .$jam." WIB";?> </h6>
<h6 style="text-align: left;">UPT : IMIGRASI KELAS II NON TPI MANOKWARI</h6>
 <table style="width:100%" class="table1">
<tr>
            <th class="text-center index-clm">NO</th>
			<th>NAMA PENJAMIN</th>
			<th>NAMA PEMOHON</th>
			<th>TANGGAL PERMOHONAN</th>
			<th>WARGA NEGARA</th>
			<th>NO PASSPOR</th>
			<th>JENIS PERMOHONAN</th>
			<th>STATUS</th>
			
        </tr>

				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql_mkw) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
				
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_array($sql_mkw)){
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
							<td>'.$data['status'].'</td>
                          <p>
							</td>
						</tr>
						 <p>
						';
					}
					
					
				//jika query menghasilkan nilai 0
				}
				
				?>

</table>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>

<?php }?>



<?php function cetak_dasboard(){

require_once "./mpdf_v8.0.3-master/vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();
$nama_dokumen='LAPORAN REKAPITULASI IJIN TINGGAL';
ob_start();

include 'config.php';
$menunggu = "Menunggu Konfirmasi";
$ditolak ="Ditolak";
$diterima = "Diterima";

$sql_menunggu = mysqli_query($db, "SELECT COUNT(id) as tunggu FROM ijin_tinggal WHERE status='$menunggu' ") or die(mysqli_error($db));
$data_menunggu = mysqli_fetch_array($sql_menunggu); 

$sql_tolak = mysqli_query($db, "SELECT COUNT(id) as tolak FROM ijin_tinggal WHERE status='$ditolak' ") or die(mysqli_error($db));
$data_tolak = mysqli_fetch_array($sql_tolak);

$sql_terima = mysqli_query($db, "SELECT COUNT(id) as terima FROM ijin_tinggal WHERE status='$diterima' ") or die(mysqli_error($db));
$data_terima = mysqli_fetch_array($sql_terima);

//echo $tampil;exit;

//Menghitung jumlah data pada database				
$no=0;
$no1=0;

 ?>
<html>
<head>
 <style>
  .table1 {
    font-family: arial;
    border-collapse: collapse;
    width: 50%;
    border: 1px solid #f2f5f7;
}


.table1 tr th{
    font-weight: bold;
}

.table1, th, td {
    border: 1px solid;
    padding: 8px 20px;
    text-align: center;
}

.table1 tr:hover {
	     background-color: #f5f5f5;
}

.table1 tr:nth-child(even) {
}




 </style>
</head>
<body>
<img src="kop.png">
<h4 style="text-align: center;">PELAPORAN IJIN TINGGAL</h1>
<h6 style="text-align:left;"><?php 
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "Data per tanggal : " . date("d-m-Y ") . "| Jam : " .$jam." WIB";?> </h6>
<h6 style="text-align: left;">UPT : IMIGRASI KELAS II NON TPI MANOKWARI</h6>
 <table style="width:100%" class="table1">
<tr>
			<th>STATUS</th>
			<th>JUMLAH</th>
			
        </tr>

				<?php
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
					
					
					
				//jika query menghasilkan nilai 0
				
				
				?>

</table>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>

<?php }?>