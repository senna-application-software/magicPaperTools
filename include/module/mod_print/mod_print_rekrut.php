<?php 
	$mediacss = 'a4.css';
	include_once "header.php";
	isset($_GET['module'])    ? $module     = $_GET['module']     : $module     = NULL;
	isset($_GET['parameter']) ? $parameter  = $_GET['parameter']  : $parameter  = NULL;
	isset($_GET['action'])    ? $action     = $_GET['action']     : $action     = NULL;	
	$tabel 				= 't_konter';
	$field 				= 'kd_konter';
	$tabel2 			= 't_teks';
	$field2 			= 'jenis';
	$object_data 	= array();
	$object_data2	= $generates->read_fetch($tabel2,$field2,$parameter2='rekrut');
	$jprm 				= explode(",",$parameter);
	for($i=0;$i<count($jprm);$i++): $object_data[$i]	= $generates->read_all_param($tabel,$field, $jprm[$i]);	endfor;
	for($i=0;$i<count($jprm);$i++):
?>
  <div class='content'>    
	 <div class='kop_surat'>
		<div class="main-content">
			<?php 
				$nm_ctr = $generates->read_fetch($tabel='t_konter',$field='kd_konter',$object_data[$i][0]['kd_konter']);			
				$t			= $generates->tgl_indo(date('d m Y')); 
        echo "
          <p class='text-right'>". ucfirst($data['kota']) . ", " . $t . "</p>
					<br />
          <div class='text-left row'>
						<table class='table no-wrap tb-head'>
							<tr>
								<td style='width:15%'> Perihal</td>
								<td style='width:2%'> : </td>
								<td style='width:1%'> </td>
								<td style='width:82%'>Permohonan Rekrut SPG/B Baru</td>
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
        echo "Kepada Yth., <br />";
        echo 'TOKO ' . strtoupper($nm_ctr['nama_konter']) . '<br />DI ';
        echo strtoupper($nm_ctr['alamat_1']) . '<br />';
        echo strtoupper($nm_ctr['alamat_2']) . ' ' . $nm_ctr['alamat_3'] . ' - ';
        echo strtoupper($nm_ctr['Kota']);
        echo "<br/><br/><br/><br/><br/><br/><br/>";
        echo "<p>";
				echo "<br>" . $object_data2['header'] . "</p>";
        echo "<ol>" . $object_data2['body']   . "</ol>";
        echo "<p>"  . $object_data2['footer'] . "</p>";
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
	include_once "footer.php";
?>