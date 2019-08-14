<?php include_once('../vxims.php'); 
isset($mediacss) ? $mediacss = $mediacss : $mediacss = 'a4.css';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $data['desc'];?>">
	<meta name="author" content="<?php echo $data['auth']?>">
	<link rel='icon' type='image/gif' href="../../<?php echo $data['icon']?>">
	<title>Print Amplop | <?php echo $data['title'];?></title>
	<link rel='stylesheet' type='text/css' href='../../custome/css/normalized.css'>	
	<link rel='stylesheet' type='text/css' href='../../custome/css/local-font.css'>
	<link rel='stylesheet' type='text/css' href='../../custome/css/<?php echo $mediacss; ?>'>
	<link rel='stylesheet' type='text/css' href="../../plugin/bootstrap.3.3.7/css/bootstrap.min.css">
	<link rel='stylesheet' type='text/css' href="../../plugin/ie10/css/ie10-viewport-bug-workaround.css">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
	.not{position:fixed;top:0px;right:0px;z-index:1;width:286px;height:200px;padding:10px;background-color:#fff}
	</style>
</head>
<body>
	<div class="not">	
	<div class="container-fluid">
				<div class='print-navigasi pull-right'>
					<div class="btn-group">
						<button class='btn btn-primary print'>Print</button>		
						<button class='btn btn-danger tutup'>Close</button>    
					</div>
				</div>	
				</div>	
		<div>
			<blockquote class="blockquote-reverse">
					<p class="text-danger">
						1. Klik Print</br>
						2. Orientasi : Landscape (amplop)</br>						
						3. Paper Size : Envelope #10 4 1/8 x 9 1/2 in"</br>
						4. Paper Size : A4 PORTRAIT u/surat</br>
						5. Disabled Print Header &amp; Footer</br>
					</p>
					<footer>Petunjuk dan Setting Kertas</footer>
				</blockquote>
				</ol> 
			</div>
		</div>