<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data jadwal:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>No</td>
    
    <th width="20%"><center>Sub Kursus</td>
    <th width="10%"><center>Hari</td>
    <th width="5%"><center>Waktu</td>
 
    <th width="5%"><center>Mata Pelajaran</td>
    <th width="5%"><center>Tema</td>
    <th width="5%"><center>Guru</td>
    >
  </tr>
<?php  
  $sql="select * from `tb_jadwal` order by `kd_jadwal` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				
				$kd_kursus_dibuka=getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
				$hari=$d["hari"];
				$waktu=$d["waktu"];
				
				$mata_pelajaran=$d["mata_pelajaran"];
				$tema=$d["tema"];
				$guru=$d["guru"];
				
				
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				
				<td>$kd_kursus_dibuka</td>
				<td>$hari</td>
				<td>$waktu</td>
				
				<td>$mata_pelajaran</td>
				<td>$tema</td>
				<td>$guru</td>
				
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				
				<td>$kd_kursus_dibuka</td>
				<td>$hari</td>
				<td>$waktu</td>
				
				<td>$mata_pelajaran</td>
				<td>$tema</td>
				<td>$guru</td>
				
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data jadwal belum tersedia...</blink></td></tr>";}
		
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


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
