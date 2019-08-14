<?php include_once('../../../vxims.php'); // Amplop Konter
$tabel = 't_konter';
$field = 'kd_konter';
isset($_GET['parameter']) ? $parameter  = $_GET['parameter']  : $parameter  = NULL;
$ajax_res = '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="' . $data["desc"] . '">
	<meta name="author" content="' . $data["auth"] . '">
	<link rel="icon" type="image/gif" href="../' . $data["icons"] . '">
	<title>' . $data["title"] . '</title>
	<link rel="stylesheet" type="text/css" href="../custome/css/normalized.css">	
	<link rel="stylesheet" type="text/css" href="../custome/css/local-font.css">
	<link rel="stylesheet" type="text/css" href="../plugin/bootstrap.3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../plugin/ie10/css/ie10-viewport-bug-workaround.css">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  <style>	

  @media print{
		    html,body {
        margin: 0!important;
    }
		@page{size:9.5in 4.125in landscape;}
		@page :left {
			margin-left: 10mm;
			margin-right: 10mm;
		}
		@page :right {
			margin-left: 10mm;
			margin-right: 10mm;
		}
    header nav, footer{display: none!important;}   
    .print-navigasi, .not{display:none!important}
    .content{
			width:calc(100%)!important;
			height:calc(100% - 9cm)!important;			
			border:none!important;
			margin:0 auto!important;
			overflow:hidden!important
		}
		.containerx{		
			width:calc(9.5in);
			height:calc(4.125in)!important;
			display:block;margin:0 auto!important;
			border:none!important;
			padding:0.5cm!important
		}
		
  }
		*{font-family:"oswald",sans-serif;font-size:12px;box-sizing:border-box;border-radius:0!important}		
    .not{position:fixed;top:10px;left:10px}
    .print-navigasi{position:fixed;top:10px;right:10px}		
		body{background-color:#ddd}	
	.from{padding:20px;margin:0 20px}
  .containerx{
		font-size: 12px;		
		line-height: 1.2;
		border:1px solid #000;
		background-color:#fff;
		width:calc(9.5in);
		height:calc(4.125in);
		margin:20vh auto;
		padding:10px;
		color:#000
	}
  .to{margin-left:390px;margin-top:2.4cm;}
	.nmctr{font-weight:bold;font-size:16px;padding:0;margin:0}
  </style>
</head>
<body>
	<div class="not">
		<div class="row">
			<div class="pull-right">
				<div class="print-navigasi">
					<div class="btn-group">
						<button class="btn btn-primary print" onclick="print_page()">Print</button>		
						<button class="btn btn-danger tutup" onclick="close_page()">Close</button>    
					</div>
				</div>
			</div>
			<div class="container">
				<blockquote>
					<p>
						1. Klik Print</br>
						2. Orientasi : Landscape</br>
						3. Disabled Print Header &amp; Footer</br>
						4. Kertas/Paper Size : Envelope #10 4 1/8 x 9 1/2 in"</br>
					</p>
					<footer>Petunjuk dan Setting Kertas</footer>
				</blockquote>
				</ol> 
			</div>
		</div>
	</div>';

		for($i=0;$i<count($parameter);$i++):
$ajax_res .= '
  <div class="content">
  <div class="containerx">
		<div class="col-md-6 from">     
		<div class="row">';    
			$ajax_res .=  $data["from"];
			$ajax_res .= '
    </div>
    </div>
    <div class="col-md-6 to">     
    <div class="row">'; 
        $objects	= $generates->read_all_param($tabel,$field,$parameter[$i]);
        foreach($objects as $object_data):
          strtoupper($object_data['kd_konter']);
					$ajax_res .=  "<div>Yth.,</div>";
          $ajax_res .=  "<div class='nmctr'>" . strtoupper($object_data['nama_konter']) . "</div>";
          $ajax_res .=  strtoupper($object_data['alamat_1']) . "<br />";
          $ajax_res .=  strtoupper($object_data['alamat_2']) . " " . strtoupper($object_data['alamat_3']) . "<br />";
          $ajax_res .=  strtoupper($object_data['Kota']);
        endforeach;
      $ajax_res .= '
    </div>  
    </div> 

  </div>
  </div>';
	 endfor; 
	 $ajax_res .= '
	<script>
	function print_page(){
		window.print();
	}
	function close_page(){
		window.close();
	}
	</script>
</body>
</html>';

echo ($ajax_res);