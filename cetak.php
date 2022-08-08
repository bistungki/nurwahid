<?php

define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');
$nama_dokumen='LAPORAN RENCANA PASSPORT ON CALL';
ob_start();

include 'config.php';

$no=0;
$no1=0;

$UPT_mkw = "IMIGRASI NON TPI KELAS I MANOKWARI";	
$UPT_sorong = "IMIGRASI TPI KELAS II SORONG";
$sql_mkw = mysqli_query($db, "SELECT nomor_permohonan,baca, tanggal_permohonan,jumlah_permohonan, sum(jumlah_permohonan) as jumlah, lokasi_kegiatan,kontak_person, nomor_hp FROM rencana_on_call WHERE UPT='$UPT_mkw' ORDER BY id ASC") or die(mysqli_error($db));
$sql_mkw1 = mysqli_query($db, "SELECT *FROM rencana_on_call WHERE UPT='$UPT_mkw' ORDER BY id ASC") or die(mysqli_error($db));
$sql_sorong = mysqli_query($db, "SELECT nomor_permohonan,baca, tanggal_permohonan,jumlah_permohonan, sum(jumlah_permohonan) as jumlah, lokasi_kegiatan,kontak_person, nomor_hp FROM rencana_on_call WHERE UPT='$UPT_sorong' ORDER BY id ASC") or die(mysqli_error($db));
$sql_sorong1 = mysqli_query($db, "SELECT* FROM rencana_on_call WHERE UPT='$UPT_sorong' ORDER BY id ASC") or die(mysqli_error($db));	
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
<h6 style="text-align: left;">UPT : IMIGRASI NON TPI KELAS I MANOKWARI</h6>
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
if($_SESSION['UPT']=="ADMIN"){	
				
				if(mysqli_num_rows($sql_mkw1) > 0){
				
					while($data = mysqli_fetch_array($sql_mkw)){
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
							</td>
						</tr>
						 <p>
						 <tfoot>
    <tr>
        <td font-weight:"bold">JUMLAH PERMOHONAN</td>
        <td colspan="7" style="text-align:right; font-weight:bold">'.$data['jumlah'].'</td>
    </tr>
    </tfoot>
						';
					}
				}
				{
					echo '
					<tr>
						<td colspan="8">Tidak ada data.</td>
					</tr>
					';
				}
				?>
</table> 
<h6 style="text-align: left;">UPT : IMIGRASI NON TPI KELAS I MANOKWARI</h6>
<table style="width:100%" class="table1">
		<tr>
            <th class="text-center index-clm">NO</th>
			<th>NOMOR PERMOHONAN</th>
			<th>TANGGAL PERMOHONAN</th>
			<th>JUMLAH PERMOHONAN</th>
			<th>LOKASI KEGIATAN</th>
			<th>KONTAK PERSON</th>
			<th>NOMOR HP</th>
			<th>ACTION</th>
        </tr>
		<thead>
        <tbody>
				<?php
	
				if(mysqli_num_rows($sql_sorong1) > 0){

					while($data2 = mysqli_fetch_array($sql_sorong)){	
						$no1++;
						echo '
						<tr>
						   <td>'.$no1.'</td>
							<td>'.$data['nomor_permohonan'].'</td>
							<td>'.$data['tanggal_permohonan'].'</td>
							<td>'.$data['jumlah_permohonan'].'</td>
							<td>'.$data['lokasi_kegiatan'].'</td>
							<td>'.$data['kontak_person'].'</td>
							<td>'.$data['nomor_hp'].'</td>
                          <p>
						   <tfoot>
    <tr>
        <td font-weight:"bold">JUMLAH PERMOHONAN</td>
        <td colspan="7" style="text-align:right; font-weight:bold">'.$data['jumlah'].'</td>
    </tr>
    </tfoot>
							</td>
						</tr>
						';
					
					}
				}else{
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
<? }?>






</html>