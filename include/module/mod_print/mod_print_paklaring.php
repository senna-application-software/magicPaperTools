<?php 
	$mediacss = 'a4.css';
	include_once('header.php');
	isset($_GET['module'])    ? $module     = $_GET['module']     : $module     = NULL;
	isset($_GET['parameter']) ? $parameter  = $_GET['parameter']  : $parameter  = NULL;
	isset($_GET['action'])    ? $action     = $_GET['action']     : $action     = NULL;
	$tabel 				= 'paklaring';
	$field 				= 'id_surat';
	$tabel2 			= 't_teks';
	$field2 			= 'jenis';	
	$object_data 	= array();
	$object_data2	= $generates->read_fetch($tabel2,$field2,$parameter2='pak');  
	$jprm 				= explode(",",$parameter);
	for($i=0;$i<count($jprm);$i++): $object_data[$i]	= $generates->read_all_param($tabel,$field, (int) $jprm[$i]);	endfor;
	for($i=0;$i<count($jprm);$i++):
?>
  <div class='content'>    
    <div class='kop_surat'>
		<div class="main-content">
      <?php   	
				// HEADER SURAT TUGAS DAN NOMOR SURAT 
        echo "
          <div class='text-center'>
            <h4 class='page-header'>SURAT KETERANGAN</h4>
            <h5>No: " . strtoupper($object_data[$i][0]['no_surat']) . "</h5>
          </div>
				";           
				echo "<p>"  . $object_data2['header'] . "</p>";  					
        echo "
          <div style='padding:30px 15px'>
            <table class='table table-condensed no-wrap'>
              <tr>
                <td style='width:30%'>Nama</td>
                <td style='width:1%'>:</td>
                <td style='width:69%'>" . strtoupper($object_data[$i][0]['nama']) . "</td>
              </tr>
              <tr>
                <td style='width:30%'>NIK</td>
                <td style='width:1%'>:</td>
                 <td style='width:69%'>" . strtoupper($object_data[$i][0]['nik']) . "</td>
              </tr>
              <tr>
                <td style='width:30%'>Jabatan Terakhir</td>
                <td style='width:1%'>:</td>
                <td style='width:69%'>" . strtoupper($object_data[$i][0]['jabatan']) . "</td>
              </tr>             
            </table>
          </div>
        ";			
				echo "<p>"  . $object_data2['body'] . " " .
				$generates->tgl_indo(date('d m Y', strtotime($object_data[$i][0]['tgl_masuk']))) .
				" sampai dengan tanggal " . 
				$generates->tgl_indo(date('d m Y', strtotime($object_data[$i][0]['tgl_keluar']))) .
				". </p>";
echo "<p>"  . $object_data2['footer'] . "</p>";		
echo "<br/><br/><br/>
<br/><br/><br/><br/><br/><br/>
<br/><br/><br/><p>Bandung,&nbsp;" . $generates->tgl_indo(date('d m Y', strtotime($object_data[$i][0]['tgl_surat']))) . "</p>
<br/><br/><br/>
<br/><br/><br/>
<u><strong>Arief Hidayat</strong></u>
<br/>
Kepala HRD";
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