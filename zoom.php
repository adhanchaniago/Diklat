<?php
include"konmysqli.php";

echo"<link href='$PATH/$css' rel='stylesheet' type='text/css' />";
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


	$kd_kursus_dibuka=$_GET["id"];
	$sql="select * from `$tbkursus_dibuka` where `kd_kursus_dibuka`='$kd_kursus_dibuka'";
	$d=getField($conn,$sql);
				
				
			$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);///gettt
				$nama_subkursus=$d["nama_subkursus"];
				$kd_periode=getPeriode($conn,$d["kd_periode"]);
				$gelombang=$d["gelombang"];
				$tingkat=$d["tingkat"];
				
				$sifat=$d["sifat"];
				$bulan=$d["bulan"];
				$jampel=$d["jampel"];
				$siswa=$d["siswa"];
				$kelas=$d["kelas"];
				$ujian_masuk=WKT($d["ujian_masuk"]);
				$buka=WKT($d["buka"]);
				$ujian_tengah=WKT($d["ujian_tengah"]);
				$ujian_akhir=WKT($d["ujian_akhir"]);
				$tutup=WKT($d["tutup"]);
				$keterangan=$d["keterangan"];

?>
 
<h3>Info Data Kursus Dibuka</h3>
<table width="80%" >
<tr>
<th width="170"><label for="kd_kursus_dibuka">Kode Kursus Dibuka</label>
<th width="11">:<th width="272" colspan="2"><?php echo $kd_kursus_dibuka;?></th></tr>
<!------------------------------------------------------------->

<tr>
<td><label for="kd_periode">Nama Periode</label>
<td>:
<td colspan="2"><?php echo $kd_periode;?></td></tr>

<tr>
<td><label for="kd_kursus">Jenis Kursus</label>
<td>:
<td colspan="2" valign="top"><?php echo $kd_kursus;?></td></tr>

<tr><td ><label for="tingkat">Tingkat</label></td>
<td>:</td>
<td colspan="2"><?php echo $tingkat;?></td></tr>
      
<tr>
<td height="32"><label for="nama_subkursus">Nama Subkursus</label>
<td>:<td colspan="2"><?php echo $nama_subkursus;?></td></tr>

<tr>
<td><label for="gelombang">Gelombang</label>
<td>:<td colspan="2">
<?php echo $gelombang;?></td>
</tr>

<tr>
        <td><label for="sifat2">Sifat</label></td>
        <td>:</td>
        <td colspan="2"><?php echo $sifat;?></td></tr>
      

<tr>
<td>Jumlah Bulan
<td>:<td colspan="2"><?php echo $bulan;?></td></tr>

<tr>
<td ><label for="jampel">Jumlah Jam Pelajaran </label><td>:<td colspan="2">
<?php echo $jampel;?></td></tr>

<tr>
<td width="164" ><label for="siswa">Jumlah Siswa</label>
<td width="10">:<td width="322" colspan="2"><?php echo $siswa;?></td></tr>

<tr>
<td><label for="kelas">Jumlah Kelas</label>
<td>:<td colspan="2"><?php echo $kelas;?></td></tr>

<tr>
<td><label for="ujian_masuk">Ujian Masuk</label>
<td>:<td colspan="2"><?php echo $ujian_masuk;?></td></tr>

<tr>
<td ><label for="buka">Buka</label>
<td>:<td colspan="2"><?php echo $buka;?></td></tr>

<tr>
<td ><label for="ujian_tengah">Ujian Tengah</label>
<td>:<td colspan="2"><?php echo $ujian_tengah;?></td></tr>

<tr>
<td ><label for="ujian_akhir">Ujian Akhir</label>
<td>:<td colspan="2">
<?php echo $ujian_akhir;?></td></tr>

<tr>
<td ><label for="tutup">Tutup</label>
<td>:<td colspan="2">
<?php echo $tutup;?></td></tr>

<tr>
<td ><label for="keterangan">Keterangan</label>
<td>:<td colspan="2">
<?php echo $keterangan;?></td></tr>

</table>


<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Januari" || $arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari" ||$arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret" ||$arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April" ||$arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei" ||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni" ||$arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli" ||$arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus" || $arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September" || $arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober" || $arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November" || $arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember" ){$bul="11";}
	else if($arr[1]=="Desember" || $arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
	
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	
	function getKursus($conn,$kode){
$field="nama_kursus";
$sql="SELECT `$field` FROM `tb_kursus` where `kd_kursus`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
		function getPeriode($conn,$kode){
$field="nama_periode";
$sql="SELECT `$field` FROM `tb_periode` where `kd_periode`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
		function getKursusDibuka($conn,$kode){
$field="nama_subkursus"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kursus_dibuka` where `kd_kursus_dibuka`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getPendaftaran($conn,$kode){
$field="nrp"; ////////////////////////
$sql="SELECT `$field` FROM `tb_pendaftaran` where `kd_pendaftaran`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
		function getNrp($conn,$kode){
$field="nama"; ////////////////////////
$sql="SELECT `$field` FROM `tb_peserta` where `nrp`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	
	
	function getNilai($conn,$kode){
$field="materi"; ////////////////////////
$sql="SELECT `$field` FROM `tb_nilai` where `kd_nilai`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
function getKabadan($conn,$kode){
$field="nama_kabadan"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kabadan` where `kd_kabadan`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
?>
