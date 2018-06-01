<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));

?>


<?php
if(isset($_SESSION["ckd_periode"])){
	$kd_periode=$_SESSION["ckd_periode"];
	$kd_kursus=$_SESSION["ckd_kursus"];
	$kd_kursus_dibuka=$_SESSION["ckd_kursus_dibuka"];
	$hari=$_SESSION["chari"];
}
		?>
        
        
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    
  <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
  
<script type="text/javascript">
var xmlHttp

function showNrp(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getNrp.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SC1 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SC1() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 } 
}


function showKursus(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getKursus.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SCKursus 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SCKursus() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHintKursus").innerHTML=xmlHttp.responseText 
 } 
}



function showKursusDibuka(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getKursusDibuka.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SCKursusDibuka 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SCKursusDibuka() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHintKursusDibuka").innerHTML=xmlHttp.responseText 
 } 
}

function GetXmlHttpObject(){
var xmlHttp=null;
try{xmlHttp=new XMLHttpRequest();}
catch (e){
	try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}
 	catch (e){xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}
 }
return xmlHttp;
}
</script>

  
<script type="text/javascript"> 
function PRINT(){ 
win=window.open('jadwal/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<div id="accordion">

 
 <?php
  $sqlv="select distinct(kd_kursus_dibuka) from `$tbjadwal` order by `kd_jadwal` desc";
  	$arrv=getData($conn,$sqlv);
		foreach($arrv as $dv) {							
				$kd_kursus_dibuka=$dv["kd_kursus_dibuka"];
				$NKD= getKursusDibuka($conn,$dv["kd_kursus_dibuka"]);
			
			?>
  <h3>Data Jadwal <?php echo $NKD;?></h3>
  <div>

Data jadwal: 
| <a href="jadwal/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

 <table width="1086" class="table table-striped table-bordered table-hover">
     <thead> 
     <tr bgcolor="#cccccc">
    <th width="3%"><center>No</th>
    <th width="30%"><center>Jadwal </th><th width="50" > Kegiatan</th>
    <th width="15%"><center>Modul </th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tbjadwal` where kd_kursus_dibuka='$kd_kursus_dibuka' order by `kd_jadwal` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$kd_jadwal=$d["kd_jadwal"];
				$kd_periode= getPeriode($conn,$d["kd_periode"]);
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);
			    $kkb= getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
				$hari=$d["hari"];
				$tanggal=WKT($d["tanggal"]);
				$waktu=$d["waktu"];
				$pertemuan_ke=$d["pertemuan_ke"];
				$jumlah=$d["jumlah"];
				$dari=$d["dari"];
				$mata_pelajaran=$d["mata_pelajaran"];
				$tema=$d["tema"];
				$guru=$d["guru"];
				$tempat=$d["tempat"];
				$modul=$d["modul"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>Periode : $kd_periode
				<br>Waktu: $hari, $tanggal 
				<br>$waktu - Pertemuan ke: $pertemuan_ke</br>
				Mata pelajaran : $mata_pelajaran </td>
				<td>Instruktur: $guru <br>
				Tema : $tema<br>
				Tempat : $tempat </td><td> <a href='downloadget.php?file=$modul' title='$modul'>Download</a>
				</td>
				
				
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data jadwal belum tersedia...</blink></td></tr>";}
?>
</tbody>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=jadwal'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=jadwal'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=jadwal'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>

</div>
<?php
		}//LOOP
		?>
</div>
