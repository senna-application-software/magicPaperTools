<?php 
	$mediacss = 'a4.css';
	include_once('header.php');
	isset($_GET['module'])    ? $module     = $_GET['module']     : $module     = NULL;
	isset($_GET['parameter']) ? $parameter  = $_GET['parameter']  : $parameter  = NULL;
	isset($_GET['action'])    ? $action     = $_GET['action']     : $action     = NULL;
	$tabel 				= 't_tat';
	$field 				= 'id_surat';
	$tabel2			 	= 't_teks';
	$field2				= 'jenis';
	$object_data 	= array();
	$object_data2	= $generates->read_fetch($tabel2,$field2,$parameter2='tat');  
	$jprm 				= explode(",",$parameter);
	for($i=0;$i<count($jprm);$i++): $object_data[$i]	= $generates->read_all_param($tabel,$field, (int) $jprm[$i]);	endfor;
	for($i=0;$i<count($jprm);$i++):
?>
<div class='content'>    
	<div class='kop_surat'>
		<div class="main-content">
      <?php
				$nm_ctr 	= $generates->read_fetch($tabel='t_konter',$field='kd_konter',$object_data[$i][0]['kd_konter']);
				$nm_ctr2 	= $generates->read_fetch($tabel='t_konter',$field='kd_konter',$object_data[$i][0]['kd_tujuan']);
				$t				= $generates->tgl_indo(date('d m Y', strtotime($object_data[$i][0]['tgl_surat'])));
				echo "
          <p class='text-right'>". ucfirst($data['kota']) . ", " . $t . "</p>
					<br />
          <div class='text-left row'>
						<table class='table no-wrap tb-head'>
							<tr>
								<td style='width:15%'> Perihal</td>
								<td style='width:2%'> : </td>
								<td style='width:1%'> </td>
								<td style='width:82%'>Informasi transfer barang</td>
							</tr>		
							<tr>
								<td style='width:15%'> Lampiran</td>
								<td style='width:2%'> : </td>
								<td style='width:1%'> - </td>
								<td style='width:82%'> Lembar</td>
							</tr>
						</table>
           </div>
           <br />
					 <br />
        ";
				echo "Kepada Yth., SPV Tas<br />";
        echo strtoupper($nm_ctr['nama_konter']) . '<br />di Tempat';
				// HEADER SURAT TUGAS DAN NOMOR SURAT 
        echo "
          <div class='text-center'>
            <h4 class='page-header'>SURAT TUGAS</h4>
            <h5>No: " . strtoupper($object_data[$i][0]['no_surat']) . "</h5>
          </div>";		
				// paragraf 1
				echo "<br/>";
				$objects	= $generates->read_all_param($tabel2,$field2,$parameter2='tat');  				
				// paragraf 1
        echo "<p>"; 
        echo "<br />" . $object_data2['header'] . " konter " . ucfirst($nm_ctr['nama_konter']) . ", "; 
        echo $object_data2['body'] . strtoupper($object_data[$i][0]['ekspedisi']) . " untuk mengambil barang yang dimaksud.";  
				echo "</p>";
				echo "<br />";				
				// paragraf 2
        echo "<p>"; 
				echo "Barang yang akan diambil dikonter tersebut di atas adalah sebanyak <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> koli, untuk selanjutnya dikirim ke toko ";
				echo strtoupper($nm_ctr2['nama_konter']);
				echo " yang beralamat di " . strtoupper($nm_ctr2['alamat_1']) ." - " . strtoupper($nm_ctr2['Kota']) . ".";
				echo "</p>";
				// footer
				echo "<p>"  . $object_data2['footer'] . "</p>";
				
				echo "<div class='row col-xs-6'><hr/><p class='cp'>Contact Person: " . strtoupper($object_data[$i][0]['nm_kontak'] ." / " .$object_data[$i][0]['no_hp']) . "</p></div>";
				echo "<div class='container_cap_ttd'>";
				echo "<img class='cap' src='../../image/cap.png' />";
				echo "<img class='ttd' src='../../image/ttd.png' />";
				echo "</div>";					
			?>		
		</div> 
		</div> 
  </div>
	<br/>
	<div class="page-break"></div>
<?php 
	endfor;
	include_once ("footer.php");
?>