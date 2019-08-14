<?php 
	$mediacss = 'a4.css';
	include_once('header.php');
	isset($_GET['module'])    ? $module     = $_GET['module']     : $module     = NULL;
	isset($_GET['parameter']) ? $parameter  = $_GET['parameter']  : $parameter  = NULL;
	isset($_GET['action'])    ? $action     = $_GET['action']     : $action     = NULL;
	$tabel 				= 't_spg';
	$field 				= 'id_surat';
	$tabel2 			= 't_teks';
	$field2 			= 'jenis';	
	$object_data 	= array();
	$object_data2	= $generates->read_fetch($tabel2,$field2,$parameter2='spg');  
	$jprm 				= explode(",",$parameter);
	for($i=0;$i<count($jprm);$i++): $object_data[$i]	= $generates->read_all_param($tabel,$field, (int) $jprm[$i]);	endfor;
	for($i=0;$i<count($jprm);$i++):
?>
  <div class='content'>    
    <div class='kop_surat'>
		<div class="main-content">
      <?php   
				$nm_ctr = $generates->read_fetch($tabel='t_konter',$field='kd_konter',$object_data[$i][0]['kd_konter']);
				$t			= $generates->tgl_indo(date('d m Y', strtotime($object_data[$i][0]['tgl_surat'])));
				$tgs		= $generates->tgl_indo(date('d m Y', strtotime($object_data[$i][0]['tgl_tugas'])));							
        echo "
          <p class='text-right'>". ucfirst($data['kota']) . ", " . $t . "</p>
					<br />
          <div class='text-left row'>
						<table class='table no-wrap tb-head'>
							<tr>
								<td style='width:15%'> Perihal</td>
								<td style='width:2%'> : </td>
								<td style='width:1%'> </td>
								<td style='width:82%'>Penempatan Tugas SPG Vicci (Little-v / Oxigen / Eureka)</td>
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
          </div>
        ";           
				echo "<p><br>"  . $object_data2['header'] . "</p>";  					
        echo "
          <div style='padding:30px 15px'>
            <table class='table table-condensed no-wrap'>
              <tr>
                <td style='width:30%'>Nama</td>
                <td style='width:1%'>:</td>
                <td style='width:69%'>" . strtoupper($object_data[$i][0]['nm_spg']) . "</td>
              </tr>
              <tr>
                <td style='width:30%'>Konter Penempatan</td>
                <td style='width:1%'>:</td>
                <td style='width:69%'>" . strtoupper($nm_ctr['nama_konter']) . "</td>
              </tr>
              <tr>
                <td style='width:30%'>Tempat &amp; Tanggal Lahir</td>
                <td style='width:1%'>:</td>
                <td style='width:69%'>" . strtoupper($object_data[$i][0]['ttl']) . "</td>
              </tr>
              <tr>
                <td style='width:30%'>Alamat</td>
                <td style='width:1%'>:</td>
                <td style='width:69%'>" . strtoupper($object_data[$i][0]['alamat_spg']) . "</td>
              </tr>  
              <tr>
                <td style='width:30%'>No. Handphone</td>
                <td style='width:1%'>:</td>
                <td style='width:69%'>" . strtoupper($object_data[$i][0]['no_hp']) . "</td>
              </tr>
              <tr>
                <td style='width:30%'>No. Rek BCA</td>
                <td style='width:1%'>:</td>
                <td style='width:69%'>" . strtoupper($object_data[$i][0]['rek_bca']) . "</td>
              </tr>
              <tr>
                <td style='width:30%'>Atas Nama</td>
                <td style='width:1%'>:</td>
                <td style='width:69%'>" . strtoupper($object_data[$i][0]['bca_an']) . "</td>
              </tr>
            </table>
          </div>
        ";					
        echo "<p>Untuk kami tugaskan di counter tas VICCI mulai tanggal "  . $tgs . ".</p>";
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
	include_once ("footer.php");
?>