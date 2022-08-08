
<?php function cetak_kanwil(){

define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');
$nama_dokumen='LAPORAN RENCANA PASSPORT ON CALL';
ob_start();

include 'config.php';

$no=0;
$no1=0;

$UPT_mkw = "IMIGRASI KELAS II NON TPI MANOKWARI";	
$UPT_sorong = "IMIGRASI KELAS II TPI SORONG";
$sql_mkw = mysqli_query($db, "SELECT sum(jumlah_permohonan) as jumlah FROM rencana_on_call WHERE UPT='$UPT_mkw' ORDER BY id ASC") or die(mysqli_error($db));
$sql_mkw1 = mysqli_query($db, "SELECT *FROM rencana_on_call WHERE UPT='$UPT_mkw' ORDER BY id ASC") or die(mysqli_error($db));
$sql_sorong = mysqli_query($db, "SELECT sum(jumlah_permohonan) as jumlah FROM rencana_on_call WHERE UPT='$UPT_sorong' ORDER BY id ASC") or die(mysqli_error($db));
$sql_sorong1 = mysqli_query($db, "SELECT* FROM rencana_on_call WHERE UPT='$UPT_sorong' ORDER BY id ASC") or die(mysqli_error($db));
$data5 = mysqli_fetch_array($sql_mkw);
$data6 = mysqli_fetch_array($sql_sorong);
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

.tombol_foot{
    background: #35A9DB;
    color: #fff;
	font-weight: bold;
}

</style>

</head>
<body>
<img src="kop.png">
<h4 style="text-align: center;">LAPORAN RENCANA PASSPORT ON-CALL</h1>
<h6 style="text-align:left;"><?php 
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "Data per tanggal : " . date("d-m-Y ") . "| Jam : " .$jam." WIB";?> </h6>
<h6 style="text-align: left;">UPT : IMIGRASI KELAS II NON TPI MANOKWARI</h6>

<table style="width:100%" class="table1">          
            
			<tr>
            <th class="text-center index-clm">NO</th>
			<th>NOMOR PERMOHONAN</th>
			<th>TANGGAL PERMOHONAN</th>
			<th>JUMLAH PERMOHONAN</th>
			<th>LOKASI KEGIATAN</th>
			<th>KONTAK PERSON</th>
			<th>NOMOR HP</th>
			
        </tr>
				<?php
				if(mysqli_num_rows($sql_mkw1) > 0){
					while($data = mysqli_fetch_array($sql_mkw1)){
						$no++; 
						echo '
						<tr>
						    <td>'.$no.'</td>
							<td>'.$data['nomor_permohonan'].'</td>
							<td>'.$data['tanggal_permohonan'].'</td>
							<td>'.$data['jumlah_permohonan'].'</td>
							<td>'.$data['lokasi_kegiatan'].'</td>
							<td>'.$data['kontak_person'].'</td>
							<td>'.$data['nomor_hp'].'</td>
                           <p>
					
						';
						
						
					}
					echo '
					<tfoot>
    <tr>
        <td font-weight:"bold">JUMLAH PERMOHONAN</td>
        <td colspan="7" style="text-align:right; font-weight:bold">'.$data5['jumlah'].'</td>
    </tr>
    </tfoot>';
					}
				else
				{
					echo '
					<tr>
						<td colspan="8">Tidak ada data.</td>
					</tr>
					';
				}
				?>
</table> 
<h6 style="text-align: left;">UPT : IMIGRASI KELAS II TPI SORONG</h6>
<table style="width:100%" class="table1">
		<tr>
            <th class="text-center index-clm">NO</th>
			<th>NOMOR PERMOHONAN</th>
			<th>TANGGAL PERMOHONAN</th>
			<th>JUMLAH PERMOHONAN</th>
			<th>LOKASI KEGIATAN</th>
			<th>KONTAK PERSON</th>
			<th>NOMOR HP</th>

        </tr>
		<thead>
        <tbody>
				<?php
				if(mysqli_num_rows($sql_sorong1) > 0){
					while($data2 = mysqli_fetch_array($sql_sorong1)){	
						$no1++;
						echo '
						<tr>
						   <td>'.$no1.'</td>
							<td>'.$data2['nomor_permohonan'].'</td>
							<td>'.$data2['tanggal_permohonan'].'</td>
							<td>'.$data2['jumlah_permohonan'].'</td>
							<td>'.$data2['lokasi_kegiatan'].'</td>
							<td>'.$data2['kontak_person'].'</td>
							<td>'.$data2['nomor_hp'].'</td>
                           <p>
					
						';
						
						
					}
					echo '
					<tfoot>
    <tr>
        <td font-weight:"bold">JUMLAH PERMOHONAN</td>
        <td colspan="7" style="text-align:right; font-weight:bold">'.$data6['jumlah'].'</td>
    </tr>
    </tfoot>';
					}
				else{
					echo '
					<tr>
						<td colspan="8">Tidak ada data.</td>
					</tr>
					';
				}

				?>
</table> 
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



<?php function cetak_manokwari(){

define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');
$nama_dokumen='LAPORAN RENCANA PASSPORT ON CALL';
ob_start();

include 'config.php';

$no=0;
$no1=0;

$UPT_mkw = "IMIGRASI KELAS II NON TPI MANOKWARI";	
$UPT_sorong = "IMIGRASI KELAS II TPI SORONG";
$sql_mkw = mysqli_query($db, "SELECT sum(jumlah_permohonan) as jumlah FROM rencana_on_call WHERE UPT='$UPT_mkw' ORDER BY id ASC") or die(mysqli_error($db));
$sql_mkw1 = mysqli_query($db, "SELECT *FROM rencana_on_call WHERE UPT='$UPT_mkw' ORDER BY id ASC") or die(mysqli_error($db));
$sql_sorong = mysqli_query($db, "SELECT sum(jumlah_permohonan) as jumlah FROM rencana_on_call WHERE UPT='$UPT_sorong' ORDER BY id ASC") or die(mysqli_error($db));
$sql_sorong1 = mysqli_query($db, "SELECT* FROM rencana_on_call WHERE UPT='$UPT_sorong' ORDER BY id ASC") or die(mysqli_error($db));
$data5 = mysqli_fetch_array($sql_mkw);
$data6 = mysqli_fetch_array($sql_sorong);
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

.tombol_foot{
    background: #35A9DB;
    color: #fff;
	font-weight: bold;
}

</style>

</head>
<body>
<img src="kop.png">
<h4 style="text-align: center;">LAPORAN RENCANA PASSPORT ON-CALL</h1>
<h6 style="text-align:left;"><?php 
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "Data per tanggal : " . date("d-m-Y ") . "| Jam : " .$jam." WIB";?> </h6>
<h6 style="text-align: left;">UPT : IMIGRASI KELAS II NON TPI MANOKWARI</h6>
<?php 
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "Data per tanggal : " . date("d-m-Y ") . "| Jam : " .$jam." WIB";?> 

<table style="width:100%" class="table1">
            
            <tr>
            <th class="text-center index-clm">NO</th>
			<th>NOMOR PERMOHONAN</th>
			<th>TANGGAL PERMOHONAN</th>
			<th>JUMLAH PERMOHONAN</th>
			<th>LOKASI KEGIATAN</th>
			<th>KONTAK PERSON</th>
			<th>NOMOR HP</th>
			
        </tr>
				<?php
				if(mysqli_num_rows($sql_mkw1) > 0){
					while($data = mysqli_fetch_array($sql_mkw1)){
						$no++; 
						echo '
						<tr>
						    <td>'.$no.'</td>
							<td>'.$data['nomor_permohonan'].'</td>
							<td>'.$data['tanggal_permohonan'].'</td>
							<td>'.$data['jumlah_permohonan'].'</td>
							<td>'.$data['lokasi_kegiatan'].'</td>
							<td>'.$data['kontak_person'].'</td>
							<td>'.$data['nomor_hp'].'</td>
                           <p>
					
						';
						
						
					}
					echo '
					<tfoot>
    <tr>
        <td font-weight:"bold">JUMLAH PERMOHONAN</td>
        <td colspan="7" style="text-align:right; font-weight:bold">'.$data5['jumlah'].'</td>
    </tr>
    </tfoot>';
					}
				else
				{
					echo '
					<tr>
						<td colspan="8">Tidak ada data.</td>
					</tr>
					';
				}
				?>
</table> 
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


<?php function cetak_sorong(){

define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');
$nama_dokumen='LAPORAN RENCANA PASSPORT ON CALL';
ob_start();

include 'config.php';

$no=0;
$no1=0;

$UPT_mkw = "IMIGRASI KELAS II NON TPI MANOKWARI";	
$UPT_sorong = "IMIGRASI KELAS II TPI SORONG";
$sql_mkw = mysqli_query($db, "SELECT sum(jumlah_permohonan) as jumlah FROM rencana_on_call WHERE UPT='$UPT_mkw' ORDER BY id ASC") or die(mysqli_error($db));
$sql_mkw1 = mysqli_query($db, "SELECT *FROM rencana_on_call WHERE UPT='$UPT_mkw' ORDER BY id ASC") or die(mysqli_error($db));
$sql_sorong = mysqli_query($db, "SELECT sum(jumlah_permohonan) as jumlah FROM rencana_on_call WHERE UPT='$UPT_sorong' ORDER BY id ASC") or die(mysqli_error($db));
$sql_sorong1 = mysqli_query($db, "SELECT* FROM rencana_on_call WHERE UPT='$UPT_sorong' ORDER BY id ASC") or die(mysqli_error($db));
$data5 = mysqli_fetch_array($sql_mkw);
$data6 = mysqli_fetch_array($sql_sorong);
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

.tombol_foot{
    background: #35A9DB;
    color: #fff;
	font-weight: bold;
}

</style>

</head>
<body>
<img src="kop.png">
<h4 style="text-align: center;">LAPORAN RENCANA PASSPORT ON-CALL</h1>
<h6 style="text-align:left;"><?php 
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "Data per tanggal : " . date("d-m-Y ") . "| Jam : " .$jam." WIB";?> </h6>
<h6 style="text-align: left;">UPT : IMIGRASI KELAS II TPI SORONG</h6>
<table style="width:100%" class="table1">
		<tr>
            <th class="text-center index-clm">NO</th>
			<th>NOMOR PERMOHONAN</th>
			<th>TANGGAL PERMOHONAN</th>
			<th>JUMLAH PERMOHONAN</th>
			<th>LOKASI KEGIATAN</th>
			<th>KONTAK PERSON</th>
			<th>NOMOR HP</th>
        </tr>
		<thead>
        <tbody>
				<?php
				if(mysqli_num_rows($sql_sorong1) > 0){
					while($data2 = mysqli_fetch_array($sql_sorong1)){	
						$no1++;
						echo '
						<tr>
						   <td>'.$no1.'</td>
							<td>'.$data2['nomor_permohonan'].'</td>
							<td>'.$data2['tanggal_permohonan'].'</td>
							<td>'.$data2['jumlah_permohonan'].'</td>
							<td>'.$data2['lokasi_kegiatan'].'</td>
							<td>'.$data2['kontak_person'].'</td>
							<td>'.$data2['nomor_hp'].'</td>
                           <p>
					
						';
						
						
					}
					echo '
					<tfoot>
    <tr>
        <td font-weight:"bold">JUMLAH PERMOHONAN</td>
        <td colspan="7" style="text-align:right; font-weight:bold">'.$data6['jumlah'].'</td>
    </tr>
    </tfoot>';
					}
			else{
					echo '
					<tr>
						<td colspan="8">Tidak ada data.</td>
					</tr>
					';
				}

				?>
</table> 
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